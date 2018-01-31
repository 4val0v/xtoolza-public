<?php

class SitemapManager {

    const SitemapName = 'sitemap.xml';
    const SitemapContentCheck = '<?xml version';

    /**
     * @var HttpManager
     */
    private $_httpManager;
    /**
     * @var TemplateManager
     */
    private $_templateManager;

    /**
     * @param HttpManager $httpManager
     * @param TemplateManager $templateManager
     */
    function __construct($httpManager, $templateManager){
        $this->_httpManager = $httpManager;
        $this->_templateManager = $templateManager;
    }

    /**
     * Отдаем Sitemap из конфигов
     * @return PageWrapper|null ответ петли
     */
    public function GetSitemapResponse() {
        if (VarHelper::IsSetNotValue(ConfigsLazy::GetInstance()->sitemap)) {
            return null;
        }
        $pageWrapper = new PageWrapper();
        $pageWrapper->Headers->AddHeader(HeaderConst::ContentType, 'text/xml; charset=UTF-8');
        $pageWrapper->Content = ConfigsLazy::GetInstance()->sitemap;
        return $pageWrapper;
    }

    /**
     * @param $path string PathAndQuery
     * @return bool
     */
    public function IsSitemapRequest($path) {
        $path = trim($path, '/');
        return StringUtils::StartWithInsensitive($path, self::SitemapName);
    }

    /**
     * Добавляем в конец виртуальные страницы или создаем новый с главной и виртуальной
     * @param string[] $urls
     * @return null|PageWrapper
     * @throws Exception
     */
    public function GetDynamicSitemap($urls){
        if(VarHelper::IsSetNotValue($urls)){
            return null;
        }

        $pageWrapper = $this->_httpManager->GetPage(GlobalState::$httpDomain . '/' . self::SitemapName, new Headers());
        if(VarHelper::IsSetValue($pageWrapper) && StringUtils::ContainsInsensitive($pageWrapper->Content, self::SitemapContentCheck)){
            $urlsetEnd = '</urlset>';
            $content = trim($pageWrapper->Content);
            if(substr($content, -strlen($urlsetEnd)) != $urlsetEnd){
                return null;
            }
            $content = substr($content, 0, strlen($content) - strlen($urlsetEnd));

            $parts = $this->FormUrlParts($urls);
            return $content . implode('', $parts) . $urlsetEnd;
        }else{
            $mainPage = new SitemapUrlPart();
            $mainPage->Loc = GlobalState::$httpDomain;
            $mainPage->Lastmod = $this->GetTimeForLastmod();
            $mainPage ->Changefreq = 'weekly';
            $mainPage->Priority = 1.0;

            $parts = $this->FormUrlParts($urls);
            $parts[] = $mainPage;

            $this->_templateManager->NewTemplate($this->_templateManager->templateSitemap);
            $this->_templateManager->Set('urls', implode('', $parts));
            return $this->_templateManager->Compile();
        }
    }

    private function FormUrlParts($urls){
        $parts = array();
        foreach ($urls as $url) {
            $part = new SitemapUrlPart();
            $part->Loc = GlobalState::$httpDomain . $url;
            $part->Lastmod = $this->GetTimeForLastmod();
            $part ->Changefreq = 'weekly';
            $part->Priority = 0.8;
            $parts[] = $part;
        }
        return $parts;
    }

    private function GetTimeForLastmod(){
        $minusHour = rand(1, 6);
        return date('c', time() - $minusHour * 3600);
    }

}