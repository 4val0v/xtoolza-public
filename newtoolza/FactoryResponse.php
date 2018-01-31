<?php

class FactoryResponse{

    /**
     * объект класса
     * @var
     */
    public $_class;
    /**
     * Название функции
     * @var string
     */
    public $_func;

    public function __construct($class, $func){
        $this->_class = $class;
        $this->_func = $func;
    }
}