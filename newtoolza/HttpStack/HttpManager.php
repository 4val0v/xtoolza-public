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
     * @return LoopbackModel
     */
    public function GetPage($address, $headers){
        $this->PrepareRequest($address,$headers);

        if (ServerHelper::IsPost()) {
            $loopbackRawModel = $this->_httpProvider->PostMethod($address, $headers->JoinHeaders());
        } else {
            $loopbackRawModel = $this->_httpProvider->GetMethod($address, $headers->JoinHeaders());
        }

        $headersResponse = new Headers();
        $headersResponse->AddHeadersFromLineArray($loopbackRawModel->Headers);
        return new LoopbackModel($headersResponse, $loopbackRawModel->Content);
    }

    /**
     * @param string $address
     * @param Headers $headers
     * @return LoopbackModel
     */
    public function TransferPost($address, $headers){
        return $this->GetPage($address, $headers);
    }

    /**
     * @param LoopbackModel $loopbackModel
     */
    public function ShowPage($loopbackModel){
        $this->PrepareResponse($loopbackModel);
        $headers = array();
        if($loopbackModel->Headers->HasHeaders()){
            $headers = $loopbackModel->Headers->GetLineArrayHeaders();
        }
        $this->_httpProvider->ShowPage($headers, $loopbackModel->Content);
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
     * @param LoopbackModel $loopbackModel
     */
    private function PrepareResponse($loopbackModel){
        $loopbackModel->Headers = $this->_headersManager->SetEmptyHeadersIfNull($loopbackModel->Headers);
        $this->_headersManager->PrepareResponse($loopbackModel->Headers, $loopbackModel->Content);
    }

    // заметки:
    // Когда придет запрос на getpage надо апдейтить хост хеадер от запрашиваемого юрла +
    // апдейтить контел-ленф, леном от отправляемого контента (не верить серваку) +
    // удалять Transfer-Encoding  (это ответ) +
    // удалять HTTP/1.1 200 OK') === 0) || (stripos($v, 'HTTP/1.0 200 OK +

    // удалять Connection: not close
    // content_type стандартный без http_ из серверной

}