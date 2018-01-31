<?php


class InformationManager {

    // version
    public $_version = "0.0.3.9";

    function GetPhpInfo(){
        ob_start();
        phpinfo();
        $phpInfo = ob_get_contents();
        ob_end_clean();
        return $phpInfo;
    }

    function GetToolzaVersion(){
        return $this->_version;
    }

} 