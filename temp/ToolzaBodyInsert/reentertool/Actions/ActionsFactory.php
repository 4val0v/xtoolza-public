<?php

/**
 * Class ActionsFactory
 */
class ActionsFactory extends FactoryAbstract {
    /**
     * @var TemplateManager
     */
    private $_templateManager;
    /**
     * @var ConfigsManager
     */
    private $_configsManager;

    /**
     * @param TemplateManager $templateManager
     * @param ConfigsManager $configsManager
     */
    public function __construct($templateManager, $configsManager){
        $this->_templateManager = $templateManager;
        $this->_configsManager = $configsManager;
    }

    /**
     * @param string $action
     * @return PageWrapper|null
     */
    public function TryExecuteAction($action){
        return $this->Execute($action);
    }

    /**
     * @param string $action
     * @return FactoryResponse|null
     */
    public function GetInstance($action){

        $class = null;
        $func = null;

        switch ($action){
            case ActionsConst::PowerOff:
                $class = new PowerManager($this->_templateManager, $this->_configsManager);
                $func = 'Disable';
                break;
            case ActionsConst::PowerOn:
                $class = new PowerManager($this->_templateManager, $this->_configsManager);
                $func = 'Activate';
                break;
            case ActionsConst::PhpInfo:
                $class = new InformationManager();
                $func = 'GetPhpInfo';
                break;
            case ActionsConst::ToolzaVersion:
                $class = new InformationManager();
                $func = 'GetToolzaVersion';
        }

        if($class == null || $func == null){
            return null;
        }

        return new FactoryResponse($class, $func);
    }
} 