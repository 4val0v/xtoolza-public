<?php

class SeoTaskContext {
    /**
     * @var bool
     */
    public $canExecute;
    /**
     * @var LoopbackWorkModel
     */
    public $data;

    /**
     * @param bool $canExecute
     * @param LoopbackModel $data
     */
    function __construct($canExecute, $data)
    {
        $this->canExecute = $canExecute;
        $this->data = $data;
    }
} 