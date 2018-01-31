<?php

class Security {

    private $algorithm;

    function __construct($alg){
        $this->algorithm = $alg;
    }

    public function Decrypt($text){
        return $this->algorithm->decrypt($text);
    }

}

?>