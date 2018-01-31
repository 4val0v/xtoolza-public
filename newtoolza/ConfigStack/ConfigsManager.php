<?php

class ConfigsManager {

    /**
     * @var ConfigsProvider
     */
    private $_configsProvider;

    function __construct($configsProvider){
        $this->_configsProvider = $configsProvider;
    }

    public function SetCurrentDomain($domain){
        $this->_configsProvider->WriteCurrentDomain($domain);
    }

    /**
     * Проверяет что есть хотябы один конфиг
     * @return bool
     */
    public function IsExistsConfigs(){
        return $this->_configsProvider->IsExistsConfigs();
    }

} 