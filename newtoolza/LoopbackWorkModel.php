<?php

/**
 * Class LoopbackWorkModel
 * Модель для удобной работы с кодом
 * TODO: оставить это или LoopbackModel
 */
class LoopbackWorkModel {
    /**
     * @var HeaderModel[] Заголовки
     */
    public $Headers;

    /**
     * @var string Контент
     */
    public $Content;

    /**
     * @param HeaderModel[] $Headers
     * @param string $Content
     */
    public function __construct($Headers, $Content)
    {
        $this->Headers = $Headers;
        $this->Content = $Content;
    }

    public function thisToLoopbackModel(){
        $headers = new Headers();
        $headers->AddHeaderModels($this->Headers);
        return new LoopbackModel($headers, $this->Content);
    }
}