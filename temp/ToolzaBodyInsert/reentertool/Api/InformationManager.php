<?php

/**
 * Class InformationManager
 */
class InformationManager extends FactoryPart {

    /**
     * @var string
     */
    public $_version = "0.0.3.9";

    function __construct() {
        parent::__construct();
    }

    function GetPhpInfo() {
        ob_start();
        phpinfo();
        $phpInfo = ob_get_contents();
        ob_end_clean();
        $this->PageWrapper->Content = $phpInfo;
    }

    function GetToolzaVersion() {
        $this->PageWrapper->Content = $this->_version;
    }

} 