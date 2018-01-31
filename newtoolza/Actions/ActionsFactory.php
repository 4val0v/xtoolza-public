<?php


class ActionsFactory {
    private $_templateManager;
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
     * @return FactoryResponse|null
     */
    public function GetInstance($action){

        $class = null;
        $func = null;

        switch ($action){
            case 'poweroff':
                $class = new PowerManager($this->_templateManager, $this->_configsManager);
                $func = 'Disable';
                break;
            case 'htaccess':
                $class = new PowerManager($this->_templateManager, $this->_configsManager);
                $func = 'Activate';
                break;
            case 'phpinfo':
                $class = new InformationManager();
                $func = 'GetPhpInfo';
                break;
            case 'version':
                $class = new InformationManager();
                $func = 'GetToolzaVersion';
        }

        if($class == null || $func == null){
            return null;
        }

        return new FactoryResponse($class, $func);
    }
} 