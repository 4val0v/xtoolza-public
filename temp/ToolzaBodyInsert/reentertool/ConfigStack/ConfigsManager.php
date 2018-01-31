<?php

/**
 * Class ConfigsManager
 */
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

    /**
     * @return bool
     */
    public function IsTemplatePagesExists(){
        return $this->_configsProvider->IsTemplatePagesCheckExists();
    }

    /**
     * @return string[]|null
     */
    public function GetAllTemplatePageUrls(){
        $templatePagesConfig = $this->_configsProvider->GetTemplatePageCheckConfig();
        if(VarHelper::IsSetNotValue($templatePagesConfig)){
            return null;
        }
        $urls = array();
        foreach($templatePagesConfig as $item){
            $urls[] = $item->pageUrl;
        }
        return $urls;
    }

} 