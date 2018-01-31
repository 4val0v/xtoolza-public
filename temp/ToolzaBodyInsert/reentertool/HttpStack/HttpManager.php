<?php

class HttpManager{

    /**
     * @var IHttpProvider
     */
    private $_httpProvider;
    /**
     * @var HeadersManager
     */
    private $_headersManager;
    /**
     * @var SessionManager
     */
    private $_sessionManager;

    /**
     * @param IHttpProvider $httpProvider
     * @param HeadersManager $headersManager
     * @param SessionManager $sessionManager
     */
    function __construct($httpProvider, $headersManager, $sessionManager){
        $this->_httpProvider = $httpProvider;
        $this->_headersManager = $headersManager;
        $this->_sessionManager = $sessionManager;
    }

    /**
     * @param string $address
     * @param Headers $headers
     * @throws Exception
     * @return PageWrapper
     */
    public function GetPage($address, $headers){

        $this->PrepareRequest($address,$headers);

        $loopbackRawModel = null;
        $requestMethod = ServerHelper::GetRequestMethod();
        switch($requestMethod){
            case RequestMethodConst::GET:
                $loopbackRawModel = $this->_httpProvider->GetMethod($address, $headers->GetJoinHeaders());
                break;
            case RequestMethodConst::OPTIONS:
                $loopbackRawModel = $this->_httpProvider->OptionMethod($address, $headers->GetJoinHeaders());
                break;
            case RequestMethodConst::POST:
                $loopbackRawModel = $this->_httpProvider->PostMethod($address, $headers->GetJoinHeaders());
                break;
            default:
                throw new Exception('NotImplementedRequestMethod: ' . $requestMethod);
        }

        if(VarHelper::IsSetNotValue($loopbackRawModel)){
            throw new Exception('Вернулся null при выполнении метода: ' . $requestMethod);
        }

        $pageWrapper = PageHelper::ParseToPageWrapper($loopbackRawModel);;
        return $pageWrapper;

    }


    /**
     * @param PageWrapper $pageWrapper
     */
    public function ShowPage($pageWrapper){

        $this->PrepareResponse($pageWrapper);

        $headers = array();
        if($pageWrapper->Headers->HasHeaders()){
            $headers = $pageWrapper->Headers->GetLineArrayHeaders();
        }
        $this->_httpProvider->ShowPage($pageWrapper->Status->GetStatus(), $headers, $pageWrapper->Content);
    }

    /**
     * Исправляет критические моменты при запросе
     * @param string $address
     * @param Headers $headers
     */
    private function PrepareRequest($address, $headers){

        $this->_sessionManager->SessionWriteClose();
        $this->_headersManager->PrepareRequest($address, $headers);

    }

    /**
     * Исправляет критические моменты при отправке
     * @param PageWrapper $pageWrapper
     */
    private function PrepareResponse($pageWrapper){
        $this->DeleteProtocolVersionHeader($pageWrapper);
        $this->_headersManager->PrepareResponse($pageWrapper->Headers, $pageWrapper->Content);
    }

    /**
     * Если этого не сделать, будут на некоторых сайтах появляется 4 символа вначале контента.
     * Дело в том, в скриптах, жестко указывается отдача заголовков, используя протокол HTTP/1.1. В то время,
     * как на сервере работает связка apache + nginx. И nginx в свою очередь обращается к Apache
     * по протоколу HTTP/1.0. Apache, будучи поставлен перед необходимостью отдать ответ HTTP/1.1 на запрос в HTTP/1.0,
     * начинает отдавать все chunk'ами, добавляя в заголовок Transfer-Encoding: chunked
     * Непонятные символы — это длина чанков. nginx же такого поведения не ожидает и воспринимает их как часть ответа.
     * @param PageWrapper $pageWrapper
     */
    private function DeleteProtocolVersionHeader($pageWrapper){
        $status = $pageWrapper->Status->GetStatus();
        if($status == StatusCodeConst::Status_200_0 || $status == StatusCodeConst::Status_200_1 ){
            $pageWrapper->Status->Name = '';
            $pageWrapper->Status->Version = '';
            $pageWrapper->Status->StatusCode = '';
        }
    }

    // заметки:
    // Когда придет запрос на getpage надо апдейтить хост хеадер от запрашиваемого юрла +
    // апдейтить контел-ленф, леном от отправляемого контента (не верить серваку) +
    // удалять Transfer-Encoding  (это ответ) +
    // удалять HTTP/1.1 200 OK') === 0) || (stripos($v, 'HTTP/1.0 200 OK +

    // удалять Connection: not close
    // content_type стандартный без http_ из серверной

}