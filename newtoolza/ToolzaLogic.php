<?php

class ToolzaLogic
{
    // ----------------------------  Code  ---------------------------------- //

    public function StartWork(){
        /* @var HttpManager $httpManager */
        $httpManager =  Ioc::Get(IocConst::HttpManager);
        $inputHeaders = Ioc::Get(IocConst::HeadersManager)->GetInputHeaders();

        // пробрасываем пост
        if(ServerHelper::IsPost()){
            $loopbackModelResponse = $httpManager->TransferPost(GlobalState::$realDomainWithPath, $inputHeaders);
            $httpManager->ShowPage($loopbackModelResponse);
            return;
        }

        // экшены
        if(isset($_GET['action']) && !empty($_GET['action'])){
            $actionResult = Ioc::Get(IocConst::Actions)->TryExecuteAction($_GET['action']);
            if(isset($actionResult)){
                $httpManager->ShowPage($actionResult);
                return;
            }
            throw new Exception('Пытаемся выполнить непонятный экшен');
        }

        // если нету конфигов или не тот домен
        if(!Ioc::Get(IocConst::ConfigsManager)->IsExistsConfigs()
            || !$this->IsPromotionDomain()){
            $loopbackResponse = $httpManager->GetPage(GlobalState::$realDomainWithPath, $inputHeaders);
            $httpManager->ShowPage($loopbackResponse);
            return;
        }

        /* @var SeoManager $seoManager */
        $seoManager = Ioc::Get(IocConst::SeoManager);

        // seo-before







        // скачивает страницу
        $loopbackModelResponse = $httpManager->GetPage(GlobalState::$realDomainWithPath, $inputHeaders);

        // анти - редирект





        // seo-after
        $loopbackModelResponse = $seoManager->DoAfterOptimization($loopbackModelResponse);
        $httpManager->ShowPage($loopbackModelResponse);
    }

    private function IsPromotionDomain(){
        $domainConfig = ConfigsLazy::GetInstance()->domainPromotion;
        return isset($domainConfig) && UrlHelpers::IsDomainsEqualse($domainConfig, ServerHelper::GetValue(ServerConst::SERVER_NAME));
    }

    public function InitGlobalState(){
        GlobalState::$realDomainWithPath = UrlHelpers::WithHttp(ServerHelper::GetValue(ServerConst::SERVER_NAME) . ServerHelper::GetValue(ServerConst::REQUEST_URI));
        GlobalState::$requestRelativePath = ServerHelper::GetValue(ServerConst::REQUEST_URI);
        GlobalState::$requestRelativePathSorted = UrlHelpers::SortGetParams(GlobalState::$requestRelativePath);
    }

    public function InitConfigsLazy(){
        ConfigsLazy::Init(Ioc::Get(IocConst::ConfigsProvider));
        ConfigsLazy::GetInstance()->SetRealRelativePath(GlobalState::$requestRelativePathSorted);
    }

    /**
     * Пока такой ioc
     * TODO: выяснить с какой версии типовые параметры
     */
    public function InitIoc(){



        // TODO: все атомарные сделать на автомат?!
        Ioc::Set(IocConst::SeoManager);
        Ioc::Set(IocConst::WebAuthManager);
        Ioc::Set(IocConst::SecurityHelper);
        Ioc::Set(IocConst::AES);
        Ioc::Set(IocConst::TransportUtils);
        Ioc::Set(IocConst::TemplateManager);
        Ioc::Set(IocConst::HeadProcessor);
        Ioc::Set(IocConst::TdkManager);
        Ioc::Set(IocConst::EncodingManager);
        Ioc::Set(IocConst::RelinkManager);

        Ioc::Set(IocConst::SessionManager);

        // шифрование
        Ioc::SetObject(IocConst::Security, new Security(Ioc::Get(IocConst::SecurityHelper)->InitAES(Ioc::Get(IocConst::AES))));

        // конфиги
        Ioc::SetObject(IocConst::ConfigsProvider, new ConfigsProvider(Ioc::Get(IocConst::Security), JsonHelper::GetInitJson()));
        Ioc::SetObject(IocConst::ConfigsManager, new ConfigsManager(Ioc::Get(IocConst::ConfigsProvider)));

        // хедерный стек
        Ioc::SetObject(IocConst::HeadersProviderServerVar, new HeadersProviderServerVar(Ioc::Get(IocConst::WebAuthManager)));
        Ioc::SetObject(IocConst::HeadersManager, new HeadersManager(Ioc::Get(IocConst::HeadersProviderServerVar)));

        // подбираем httpProvider
        Ioc::SetObject(IocConst::HttpManager, new HttpManager(HttpHelper::GetInitProvider(Ioc::Get(IocConst::TransportUtils)), Ioc::Get(IocConst::HeadersManager), Ioc::Get(IocConst::SessionManager)));

        // маршрутизатор


        // экшены
        Ioc::SetObject(IocConst::ActionsFactory, new ActionsFactory(Ioc::Get(IocConst::TemplateManager), Ioc::Get(IocConst::ConfigsManager)));
        Ioc::SetObject(IocConst::Actions, new Actions(Ioc::Get(IocConst::ActionsFactory)));

        // Seo-штучки

    }

    // -------------------------- ВСЕ ЧТО НИЖЕ РАЗОБРАТЬ И ПОД СНОС ------------------------


    public function RouterStart()
    {


        // отображаем страницу со всеми изменениями

        # $this->Logger($request_headers,$response);


    }


    /**
     * Отдаем реальный IP сервера (внешний)
     * @return string отдаем IP
     */
    private function GetActionIP(){
        $remoteAddr = '';
        $remoteAddr = $_SERVER['REMOTE_ADDR'];
        return $remoteAddr;
    }

    /**
     * Проверка на запрос обновления тулзы
     * @return bool
     */
    private function IsToolzaUpdate(){
        if(isset($_POST['upfilename']) && isset($_POST['upcont']) && $this->IsPost()) {
            return true;
        }
        return false;
    }

    /**
     * Проверка на запрос обновления конфигов
     * @return bool
     */
    private function IsConfigsUpdate(){
        if((isset($_POST['globalConfig']) || isset($_POST['pageConfig'])
        || isset($_POST['robotsConfig']) || isset($_POST['sitemapConfig']))  && $this->IsPost()) {
            return true;
        }
        return false;
    }

    /**
     * Обновляем файл через POST запрос
     * @return string логирование обновления
     */
    private function DoToolzaUpdate(){
        $log = '';
        $content = $_POST['upcont'];
        if(get_magic_quotes_gpc()){
            $content = stripslashes($_POST['upcont']);
        }
        $res = $this->_fileProvider->FileWrite($_POST['upfilename'], $content);
        if($res === false) {
            $log .= "cant change";
        } else {
            $log .= "update done";
        }
        return $log;
    }

    /**
     * Берем первый ip'шник
     * @param $content
     * @return null
     */
    private function GetIPFromContent($content){
        $ipPattern = '#(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})#';
        if(preg_match($ipPattern,$content, $match) != 1){
            return null;
        }
        return $match[1];
    }




    public function SetRealAdress($addr){
        $this->_siteAddr = $addr;
    }


    //------------------FixListFunctions-------------------//

    public function IsSitemap($path){
        $path = trim($path,'/');
        if(substr($path,0,7) == "sitemap"){
            return true;
        }
        return false;
    }

    /**
     * Быстрый логер на 500 (выпилить)
     * @param $req
     * @param $res
     */
    private function Logger($req,$res){
        foreach($res->Headers as $k=>$v){
            if(stripos($v,"500 Internal Server Error") !== false){
                file_put_contents("Logger.txt", "\n\n ########################   " . $_SERVER['REQUEST_URI'] . " \r\n " . date("d G:i:s") . "\r\n" . join(":",$req) . "\n------------\n" . join(" ",$res->Headers), FILE_APPEND);
                break;
            }
        }
    }


    private function SetHostHeaders($request_headers,$host){
        $newHeaders = array();
        foreach ($request_headers as $k => $v) {
            if (stripos($v, 'HOST: ') !== false) {
                array_push($newHeaders, "HOST: ".$host);
                continue;
            }
            array_push($newHeaders,$v);
        }
        return $newHeaders;
    }

    private function GetLocationAddressFromHeaders($response){
        foreach ($response->Headers as $k => $v) {
            if (stripos($v, 'Location') === 0) {
                $val = $this->GetValueFromHeaderString($v);
                return $val;
            }
        }
        return '';
    }

    private function GetValueFromHeaderString($string){
        $val = explode(': ', $string);
        return $val[1];
    }

    private function ChangeHeadersCharset()
    {
        if (!$this->ConfigGlobalExists()) {
            return;
        }
        $contentType = 'text/html';
        $charset = $this->_configGlobal->encoding or 'UTF-8';
        $r = headers_list();
        foreach ($r as $i) {
            if (strpos($i, 'Content-type') !== false) {
                $ff = preg_match('/Content-type:\s*([^\s;]*)\s*/', $i, $matches);
                if ($ff > 0) {
                    $contentType = $matches[1];
                }
            }
        }
        Header('Content-type:' . $contentType . '; charset=' . $charset);
    }

    /**private function ReplaceBackgroundColor(&$buffer)
    {
        $buffer = str_replace('red', 'grey', $buffer);
    }**/


    public function CutOnPattern($content, $patternBase){
        return preg_replace($patternBase, '', $content);
    }

    //------------------------------Utils------------------------------------//

    /**
     * выполняет post изменения
     * @param $response полученный хедер и контент
     * @return LoopbackResponse измененные данные
     */
    private function PostAction($response)
    {

        $headers = array();
        $content = $response->Content;

        // берем все хедеры с редиректом только от первой страницы
        //$needArray = GetHeadersOnlyFirstPage($responseHeaders);
        // отдаем полученные хедеры, а также заменяем 302->301 редирект
        // заменяем кодировку

        $contentType = 'text/html';
        $charset = $this->_configGlobal->encoding or 'UTF-8';

        foreach ($response->Headers as $k => $v) {
            if (stripos($v, 'Location') === 0) {
                array_push($headers, "HTTP/1.1 301 Moved Permanently");
            }
            if (stripos($v, '302 Found') !== false) {
                continue;
            }
            if (stripos($v, 'Content-type') !== false) {
                $ff = preg_match('/Content-type:\s*([^\s;]*)\s*/i', $v, $matches);
                if ($ff > 0) {
                    $contentType = $matches[1];
                }
                if($contentType == 'text/html'){
                    array_push($headers, 'Content-Type: ' . $contentType . '; charset=' . $charset);
                    continue;
                }
            }
            if (stripos($v, 'Transfer-Encoding') !== false) {
                continue;
            } //скрытое зло поймано мухахаха
            array_push($headers, "$v");
        }

        return new LoopbackModel($headers, $content);
    }


    private function ReplaceMetaRobots($content){
        $metaRobotsPattern = '#<meta\s*name\s*=\s*["\']robots["\']\s*content\s*=\s*["\'](.*?)["\']\s*/>#si';
        return preg_replace($metaRobotsPattern, '<meta name="robots" content="index,follow"/>', $content);
    }



    /**
     * Только браузерские + магический для петли
     * @return array
     */
    private function GetRequestHeadersOnlyBrowser()
    {
        $listHead = array();
        foreach ($_SERVER as $k => $v) {
            if (stripos($k, 'ACCEPT_ENCODING') !== false) {
                array_push($listHead, 'Accept-Encoding: identity');
                continue;
            }
            if(stripos($k, 'CONTENT_TYPE') !== false){
                array_push($listHead, str_replace('_', '-', $k) . ': ' . $v);
                continue;
            }
            if(stripos($k, 'X_Requested_With') !== false){
                array_push($listHead, str_replace('_', '-', substr($k, 5)) . ': ' . $v);
                continue;
            }
            if (((substr($k, 0, 5) == "HTTP_") && (substr($k, 0, 7) != "HTTP_X_"))) {
                array_push($listHead, str_replace('_', '-', substr($k, 5)) . ': ' . $v);
            }
        }

        $httpAuth = $this->TryGetHttpBasicHeaderAuth();
        if(!empty($httpAuth)){
            array_push($listHead, $httpAuth);
        }

        return $this->AddRingMagicHeader($listHead);
    }



    // берем все хедеры с редиректом только от первой страницы
    private function GetHeadersOnlyFirstPage($responseHeaders)
    {
        $needArray = array();
        $countHeader = 0;
        foreach ($responseHeaders as $k => $v) {
            if (strpos($v, "HTTP/") !== false) {
                $countHeader++;
            }
        }
        if ($countHeader > 1) {
            $needArray[] = array_shift($responseHeaders);
            foreach ($responseHeaders as $k => $v) {
                if (strpos($v, "HTTP/") !== false) {
                    break;
                }
                $needArray[] = $v;
            }
        }

        if (empty($needArray)) {
            $needArray = $responseHeaders;
        }

        return $needArray;
    }

    private function ShowError404($com = '')
    {
        Header('HTTP/1.0 404 Not Found');
        Header('Content-type: text/html; charset=UTF-8');
        echo $com, '404чка =)';
    }

    private function UpdateConfigs()
    {
        $log = '';
        $log .= 'start config update<br>';
        if (isset($_POST['globalConfig'])) {
            if ($this->_config->WriteGlobalConfig($_POST['globalConfig'])) {
                $log .= 'global config success<br>';
            }
        }
        if(isset($_POST['pageConfig'])) {
            if ($this->_config->WritePageConfig($_POST['pageConfig'])) {
                $log .= 'page config success<br>';
            }
        }
        if(isset($_POST['sitemapConfig'])) {
            if ($this->_config->WriteSitemapConfig($_POST['sitemapConfig'])) {
                $log .= 'sitemap config success<br>';
            }
        }
        if(isset($_POST['robotsConfig'])) {
            if ($this->_config->WriteRobotsConfig($_POST['robotsConfig'])) {
                $log .= 'robots config success<br>';
            }
        }

        $log .= 'stop config update<br>';
        return $log;
    }

}