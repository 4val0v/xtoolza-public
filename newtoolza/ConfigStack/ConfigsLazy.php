<?php

/**
 * Class ConfigsLazy
 * Не забываем что из гетов-сетов нельзя было обращатся к приватам <5.1.5
 *
 */
class ConfigsLazy {

    private static $instance = null;


    private $tdk;


    private $encoding;





    private $domainPromotion;
    private $relinks;


    private $_tryArray;
    private $_pageRealPath;
    /**
     * @var ConfigsProvider
     */
    private $_configsProvider;

    private function __construct($configsProvider){
        $this->_configsProvider = $configsProvider;
    }

    public static function Init($configProvider){
        self::$instance = new self($configProvider);
    }

    /**
     * @return ConfigsLazy
     * @throws Exception
     */
    public static function GetInstance(){
        if (self::$instance == null) {
            throw new Exception('Нужно 1 раз воспользоватся Init');
        }
        return self::$instance;
    }

    public function __get($name){
        if(!isset($this->_tryArray[$name])){
            $this->_tryArray[$name] = true;
            $this->$name = $this->TryLoadConfig($name);
        }
        return $this->$name;
    }

    public function SetRealRelativePath($pageRelativePath){
        $this->_pageRealPath = $pageRelativePath;
    }

    private function TryLoadConfig($name){
        $data = null;
        switch($name){


            case 'tdk':
                $data = $this->_configsProvider->GetTdk($this->_pageRealPath);
                break;



            case 'encoding':
                $data = $this->GetValueByPageUrlHash($this->_configsProvider->GetEncoding(), $this->_pageRealPath, 'encoding');
                break;












            case 'domainPromotion':
                $data = $this->_configsProvider->GetDomainPromotion();
                break;
            case 'relinks':
                $data = $this->GetValueByPageUrlHash($this->_configsProvider->GetRelinksConfig(), $this->_pageRealPath, 'relinkForPageConfigs');
                break;


            default:
                exit('Unknown config name for load');
        }
        return $data;
    }

    private function GetValueByPageUrlHash($configList, $correntPageUrl, $valueFieldName){
        if($configList === null){
            return null;
        }
        $correntPageUrlMd5 = md5($correntPageUrl);
        foreach($configList as $item){
            if($correntPageUrlMd5 == $item->pageUrlMd5){
                return $item->$valueFieldName;
            }
        }
        return null;
    }


} 