<?php

class TemplateManager {

    public  $templateHtaccess = 'htaccess_base';
    public  $templateWebConfig = 'web.config_base';

    private $replacePattern = '#{{}}#';

    /**
     * @var array
     */
    private $_replaceParams;
    private $_currentTemplate;


    public function NewTemplate($templateName){
        $this->_currentTemplate = null;
        $this->_replaceParams = null;
        $this->_currentTemplate = File::ReadAllText($templateName);
    }

    public function Set($paramName, $variable){
        $this->AddReplaceParam($paramName, $variable);
    }

    public function Compile(){
        foreach($this->_replaceParams as $k => $v){
            $replacePatternParam = $this->GetPatternReplaceParam($k);
            $this->_currentTemplate = str_replace($replacePatternParam, $v, $this->_currentTemplate);
        }
        return $this->_currentTemplate;
    }

    private function  AddReplaceParam($paramName, $variable){
        $this->_replaceParams[$paramName] = $variable;
    }

    private function GetPatternReplaceParam($paramName){
        return substr($this->replacePattern, 0, 3) . $paramName . substr($this->replacePattern, 3);
    }

} 