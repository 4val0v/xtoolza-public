<?php

class HeaderModel{
    /**
     * @var string
     */
    public $_name;
    /**
     * @var string
     */
    public $_value;

    /**
     * @param string $name
     * @param string $value
     */
    public function __construct($name, $value){
        $this->_name = $name;
        $this->_value = $value;
    }
}