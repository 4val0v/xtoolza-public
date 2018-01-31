<?php

/**
 * Class PageWrapper
 */
class PageWrapper {
    /**
     * @var PageStatus
     */
    public $Status;
    /**
     * @var Headers
     */
    public $Headers;
    /**
     * @var string
     */
    public $Content;

    public function __construct(){
        $this->Status = new PageStatus();
        $this->Headers = new Headers();
    }

    /**
     * Что с объектом были какие-то манипуляции
     * @return bool
     */
    public function IsNotEmpty(){
        return $this->Headers->HasHeaders()
            || $this->Status->HasStatus()
            || VarHelper::IsSetValue($this->Content);
    }
} 