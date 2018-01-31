<?php

/**
 * Class PowerManager
 */
class PowerManager extends FactoryPart {
    /**
     * @var TemplateManager
     */
    private $_templateManager;
    /**
     * @var ConfigsManager
     */
    private $_configsManager;

    function __construct($templateManager, $configsManager){
        parent::__construct();
        $this->_templateManager = $templateManager;
        $this->_configsManager = $configsManager;
    }

    public function Activate(){
        $this->PageWrapper->Content = $this->DoActivate();
    }

    public function Disable(){
        $this->PageWrapper->Content = $this->DoPowerOff();
    }

    private function DoPowerOff(){
        $disabled = "disabled";
        $error = "error";
        $notActivated = "not activated";

        $pathHtaccess = '../.htaccess';

        if(!File::IsWritable($pathHtaccess)){
            return $error;
        }

        $contentHtaccess = File::ReadAllText($pathHtaccess);

        if(empty($contentHtaccess) || $contentHtaccess === false){
            return $error;
        }

        $patternDisable = '/#MonitorEngineS_1010011010.*?#MonitorEngineE_1010011010/s';
        $cutHtaccess =  RegExer::PregReplace($patternDisable,'',$contentHtaccess);

        if($cutHtaccess === null){
            return $error;
        }

        if($cutHtaccess == $contentHtaccess){
            return $notActivated;
        }

        if(!File::Write($pathHtaccess,$cutHtaccess)){
            return $error;
        }

        return $disabled;
    }

    private function DoActivate(){
        $guid = basename(dirname(__FILE__));
        $log = $this->AppendHtaccessRules($guid);
        $this->_configsManager->SetCurrentDomain(ServerHelper::GetValue(ServerConst::SERVER_NAME));
        return $log;
    }

    private function AppendHtaccessRules($guid){
        $ansCantCreateHtaccess = 'CantCreateHtaccess';
        $ansCantAppendToHtaccess = 'CantAppendToHtaccess';
        $ansDone = 'Done';

        $log = null;
        $rootPath = substr(dirname(__FILE__),0,strrpos(dirname(__FILE__), DIRECTORY_SEPARATOR)) . DIRECTORY_SEPARATOR;  # DOCUMENT_ROOT нельзя
        $htaccessName = '.htaccess';

        if(!File::IsFileExists($rootPath . $htaccessName)){
            if(!File::Create($rootPath, $htaccessName)){
                return $ansCantCreateHtaccess;
            }
        }

        $mainSep = '';
        $this->_templateManager->NewTemplate($this->_templateManager->templateHtaccess);
        $this->_templateManager->Set('pathToToolza', $mainSep . $guid);
        $this->_templateManager->Set('lastHtaccess', File::ReadAllText($rootPath . $htaccessName));
        $appendContent = $this->_templateManager->Compile();

        if(!$this->TryAppendHtaccess($rootPath . $htaccessName, $appendContent)){
            return $ansCantAppendToHtaccess;
        }

        return $ansDone;

 /*       $htaccessList = $this->_fileProvider->FindFiles($rootPath, $htaccessName);
        if(empty($htaccessList)){
            $log .= "не удалось найти htaccess";
            return $log;
        }

        $this->_logger->Log($this->_logger->_htaccess, implode("\r\n", $htaccessList));

        foreach($htaccessList as $htaccessPath){

            // для основного нужно относительный (статистика отказа)
            $mainSep = '/';
            if($htaccessPath == $rootPath . '.htaccess'){
                $mainSep = '';
            }

            $this->_templateManager->NewTemplate($this->_templateManager->templateHtaccess);
            $this->_templateManager->Set('pathToToolza', $mainSep . $guid);
            $this->_templateManager->Set('lastHtaccess', $this->_fileProvider->FileRead($htaccessPath));
            $appendContent = $this->_templateManager->Compile();

            if(!$this->TryAppendHtaccess($htaccessPath, $appendContent)){
                $log .= "в файл не добавлен код: " . $htaccessPath;
                return $log;
            }
        }
 */
    }


    private function TryAppendHtaccess($pathHtaccess, $content){
        if(!File::IsFileExists($pathHtaccess)
            || !File::IsWritable($pathHtaccess)){
            return false;
        }
        File::Copy($pathHtaccess, $pathHtaccess . 'MEBak');
        return File::Write($pathHtaccess,$content);
    }


} 