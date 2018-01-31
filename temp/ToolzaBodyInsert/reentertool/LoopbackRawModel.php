<?php

/**
 * Class LoopbackRawModel
 * Содержит string, string[] работает с http-провайдерами
 */
class LoopbackRawModel {
    /**
     * @var string[] Заголовки
     */
    public $Headers;

    /**
     * @var string Контент
     */
    public $Content;

    /**
     * @param string[] $Headers
     * @param string $Content
     */
    public function __construct($Headers, $Content) {
        $this->Headers = $Headers;
        $this->Content = $Content;
    }

} 