<?php

/**
 * Class HeadersManagerSeo
 * @deprecated
 */
class HeadersManagerSeo {
    /**
     * @var ConfigsModel
     */
    private $_configs;

    /**
     * @param ConfigsModel $configs
     */
    public function __construct($configs){
        $this->_configs = $configs;
    }

    /**
     * Список Сео-шных штучек
     * @param Headers $headers
     * @return Headers
     */
    public function DoProcessing($headers){
        $this->Set200okToPromotedPages($headers);
        $this->Set302To301Redirect($headers);
        $this->SetCharsetHeader($headers);
    }

    /**
     * Почему тут не выставляем просто 200ок см описание к HeadersManager.php -> DeleteProtocolVersionHeader
     * @param Headers $headers
     */
    private function Set200okToPromotedPages($headers)
    {
        if($this->_configs->_page == null){
            return;
        }
        $headers->DeleteOnName('HTTP/1.0 404 Not Found');
        $headers->DeleteOnName('HTTP/1.1 404 Not Found');
    }

    /**
     * @param Headers $headers
     */
    private function Set302To301Redirect($headers)
    {
        $movedCodeResponse = array('HTTP/1.0 302 Moved Temporarily', 'HTTP/1.1 302 Found');
        $currentCode = $headers->GetFirstExistIn($movedCodeResponse);
        if($currentCode == null){
            return;
        }
        $headers->SwitchOnKey($currentCode, 'HTTP/1.1 301 Moved Permanently', '');
    }

    /**
     * @param Headers $headers
     */
    private function SetCharsetHeader($headers)
    {
        $encoding = $this->_configs->_global->encoding;
        if($encoding != null){
            $headers->AddOrUpdate('Content-Type', 'text/html; charset=' . $encoding);
        }
    }
} 