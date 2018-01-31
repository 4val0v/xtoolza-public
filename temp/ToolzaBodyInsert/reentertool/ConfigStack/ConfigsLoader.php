<?php

/**
 * Class ConfigsLoader
 * @deprecated
 */
class ConfigsLoader {
    /**
     * @var ConfigsProvider
     */
    private $_configsProvider;
    /**
     * @var ServerHelper
     */
    private $_serverHelper;
    /**
     * @var UrlHelpers
     */
    private $_urlHelpers;

    function __construct($configsProvider, $serverHelper, $urlHelpers){
        $this->_configsProvider = $configsProvider;
        $this->_serverHelper = $serverHelper;
        $this->_urlHelpers = $urlHelpers;
    }

    /**
     * @return ConfigsModel
     */
    public function LoadConfigs(){
        $configs = new ConfigsModel();

        $this->SetCurrentDomain($configs);
        $this->SetValidityConfigs($configs);
        $this->SetGlobalConfig($configs);
        $this->SetPageConfig($configs);
        $this->SetSeoTextConfig($configs);
        $this->SetCounters($configs);

        $this->SetRobotsConfig($configs);
        $this->SetSitemapConfig($configs);

        return $configs;
    }

    /**
     * работаем только с единственным доменом
     * @param ConfigsModel $configs
     */
    private function SetCurrentDomain($configs){
        $configs->_currentDomain = $this->_configsProvider->GetCurrentDomain();
    }

    /**
     * проверки на наличие конфиг файлов и на их пустоту
     * @param ConfigsModel $configs
     */
    private function SetValidityConfigs($configs){
        $configs->_isConfigCorrect = $this->_configsProvider->IsConfigsCorrected();
    }

    /**
     * @param ConfigsModel $configs
     */
    private function SetGlobalConfig($configs){
        $configs->_global = $this->_configsProvider->GetGlobalConfig();
    }

    /**
     * @param ConfigsModel $configs
     */
    private function SetPageConfig($configs){
        $sortedPath = $this->_urlHelpers->SortGetParams($this->_serverHelper->GetValue('REQUEST_URI'));
        $configs->_page = $this->_configsProvider->GetPageConfig($sortedPath);
    }

    /**
     * @param ConfigsModel $configs
     */
    private function SetSeoTextConfig($configs){
        if(isset($configs->_page->seotext)){
            $configs->_seoText = $this->_configsProvider->GetSeoTextConfig($configs->_page->seotext);
        }
    }

    /**
     * @param ConfigsModel $configs
     */
    private function SetCounters($configs){
        $configs->_counters = $this->_configsProvider->GetCountersConfig();
    }

    /**
     * @param ConfigsModel $configs
     */
    private function SetRobotsConfig($configs){
        $configs->_robots = $this->_configsProvider->GetRobotsConfig();
    }

    /**
     * @param ConfigsModel $configs
     */
    private function SetSitemapConfig($configs){
        $configs->_sitemap = $this->_configsProvider->GetSitemapConfig();
    }
} 