<?php

/**
 * Class FactoryPart
 */
class FactoryPart {
    /**
     * @var PageWrapper
     */
    protected $PageWrapper;

    public function __construct(){
        $this->PageWrapper = new PageWrapper();
    }

    /**
     * @return PageWrapper
     */
    public function GetResult(){
        return $this->PageWrapper;
    }
} 