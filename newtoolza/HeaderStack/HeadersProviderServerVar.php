<?php

/**
 * Class HeadersProviderServerVar
 */
class HeadersProviderServerVar implements IHeadersProvider {

    /**
     * @var WebAuthManager
     */
    private $_webAuthManager;

    public function __construct($webAuthManager){
        $this->_webAuthManager = $webAuthManager;
    }

    /**
     * @return HeaderModel[]
     */
    public function GetInputHeaders(){
        $headers = array();
        foreach ($_SERVER as $k => $v) {
            if(stripos($k, 'CONTENT_TYPE') !== false){
                $headers[] = new HeaderModel(str_replace('_', '-', $k), $v);
                continue;
            }
            if(stripos($k, 'X_Requested_With') !== false){
                $headers[] = new HeaderModel(str_replace('_', '-', substr($k, 5)), $v);
                continue;
            }
            if (((substr($k, 0, 5) == "HTTP_") && (substr($k, 0, 7) != "HTTP_X_"))) {
                $headers[] = new HeaderModel(str_replace('_', '-', substr($k, 5)), $v);
            }
        }

        $httpAuthHeader = $this->_webAuthManager->TryGetHttpBasicHeaderAuth();
        if($httpAuthHeader !== null){
            $headers[] = $httpAuthHeader;
        }
        return $headers;
    }
} 