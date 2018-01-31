<?php

// TODO: полносью переделать и подсадить на него

class Logger {

    public $_htaccess = 'log_htaccess';

    /**
     * @var File
     */
    private $_fileProvider;

    public function __construct($fileProvider){
        $this->_fileProvider = $fileProvider;
    }

    public function Log($fileName, $msg){
        $msg = date("d:m:Y H:i:s") . "\r\n" . $msg . "\r\n\r\n";
        $this->_fileProvider->Append($fileName, $msg);
    }

}