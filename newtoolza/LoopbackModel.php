<?php

/*
 * Данные отправляемые к сайту по обратной петле
 * Самый высокий уровень, общается с HttpManager
 */
class LoopbackModel {

    /**
     * @var Headers Заголовки
     */
    public $Headers;

    /**
     * @var string Контент
     */
    public $Content;

    /**
     * @param Headers $Headers
     * @param string $Content
     */
    public function __construct($Headers, $Content)
    {
        $this->Headers = $Headers;
        $this->Content = $Content;
    }

    public function DataEmpty(){
        return (empty($this->Headers) && empty($this->Content));
    }
}