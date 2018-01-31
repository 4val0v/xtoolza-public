<?php

abstract class HttpProviderAbstract {

    /**
     * @var TransportUtils
     */
    protected $_transportUtils;
    /**
     * @var int Таймаут на установку соединения
     */
    protected $_connectTimeout = 25;
    /**
     * @var int Таймаут на ожидания первых данных
     */
    protected $_readTimeout = 10;

    /**
     * @param TransportUtils $transportUtils
     */
    function __construct($transportUtils){
        $this->_transportUtils = $transportUtils;
    }

    /**
     * @param string $status
     * @param string[] $headers заголовки страницы
     * @param string $content контент страницы
     */
    public function ShowPage($status, $headers, $content) {
        header($status, false);
        foreach($headers as $v){
            header($v, false);
        }
        echo $content;
    }

    /**
     * @param resource $stream
     */
    protected abstract function CloseConnection($stream);

    /**
     * Является запрос обычным пост запросом 'application/x-www-form-urlencoded'
     * @return bool
     */
    protected function IsDefaultPost(){
        return StringUtils::StartWithInsensitive(ServerHelper::GetValue(ServerConst::CONTENT_TYPE), 'application/x-www-form-urlencoded');
    }
}