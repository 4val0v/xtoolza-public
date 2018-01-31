<?php

/**
 * Class HeadersProviderServerVar
 */
class HeadersProviderServerVar implements IHeadersProvider {

    private $_serverSyntaxDelimiter = '_';
    private $_httpSyntaxDelimiter = '-';

    private $_headerServerPrefix = 'HTTP_';
    private $_headerServerHidePrefix = 'HTTP_X_';

    /**
     * @var WebAuthManager
     */
    private $_webAuthManager;

    /**
     * @param WebAuthManager $webAuthManager
     */
    public function __construct($webAuthManager){
        $this->_webAuthManager = $webAuthManager;
    }

    /**
     * @return Headers
     */
    public function GetInputHeaders(){
        $headers = new Headers();
        foreach ($_SERVER as $k => $v) {
            if(stripos($k, ServerConst::CONTENT_TYPE) !== false){
                $headers->AddHeader($this->ToHttpSyntax($k), $v);
                continue;
            }
            if(stripos($k, $this->ToServerSyntax(HeaderConst::XRequestedWith)) !== false){
                $headers->AddHeader($this->ToHttpSyntax($this->CutHeaderServerPrefix($k)), $v);
                continue;
            }
            if(StringUtils::StartWith($k, $this->_headerServerPrefix) && !StringUtils::StartWith($k, $this->_headerServerHidePrefix)){
                $headers->AddHeader($this->ToHttpSyntax($this->CutHeaderServerPrefix($k)), $v);
            }
        }

        $httpAuthHeader = $this->_webAuthManager->TryGetHttpBasicHeaderAuth();
        if($httpAuthHeader->HasHeaders()){
            $headers->MergeWith($httpAuthHeader);
        }
        return $headers;
    }

    /**
     * @param string $line
     * @return string
     */
    private function ToHttpSyntax($line){
        return str_replace($this->_serverSyntaxDelimiter, $this->_httpSyntaxDelimiter, $line);
    }

    /**
     * @param string $line
     * @return string
     */
    private function ToServerSyntax($line){
        return str_replace($this->_httpSyntaxDelimiter, $this->_serverSyntaxDelimiter, $line);
    }

    /**
     * @param string $line
     * @return string
     */
    private function CutHeaderServerPrefix($line){
        if(StringUtils::StartWith($line, $this->_headerServerPrefix)){
            return substr($line, strlen($this->_headerServerPrefix));
        }
        return $line;
    }
} 