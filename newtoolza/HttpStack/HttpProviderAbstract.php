<?php

abstract class HttpProviderAbstract {

    /**
     * @var TransportUtils
     */
    protected $_transportUtils;
    /**
     * @var int Таймаут на установку соединения
     */
    protected $_connectTimeout = 15;
    /**
     * @var int Таймаут на ожидания первых данных
     */
    protected $_readTimeout = 8;

    function __construct($transportUtils){
        $this->_transportUtils = $transportUtils;
    }

    /**
     * @param Array $headers заголовки страницы
     * @param string $content контент страницы
     */
    public function ShowPage($headers, $content) {
        foreach($headers as $v){
            header($v, false);
        }
        echo $content;
    }

    /**
     * @param resource $stream
     */
    protected abstract function CloseConnection($stream);
}