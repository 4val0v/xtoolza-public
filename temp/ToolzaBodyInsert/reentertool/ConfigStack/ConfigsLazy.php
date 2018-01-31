<?php

/**
 * Class ConfigsLazy
 * Не забываем что из гетов-сетов нельзя было обращатся к приватам <5.1.5
 *
 */
class ConfigsLazy {

    private static $instance = null;

    private $sitemap;
    private $tdk;
    private $redirects;
    private $encoding;
    private $metaRobots;
    private $uf;
    private $robots;
    private $seoTexts;
    private $seoTextsCheck;
    private $templatePage;
    private $templatePageCheck;
    private $domainPromotion;
    private $relinks;
    private $brokenlinks;

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
            case 'sitemap':
                $data = $this->_configsProvider->GetSitemap();
                break;
            case 'tdk':
                $data = $this->_configsProvider->GetTdk($this->_pageRealPath);
                break;
            case 'redirects':
                $data = $this->_configsProvider->GetRedirects();
                break;
            case 'encoding':
                $data = $this->GetValueByPageUrlHash($this->_configsProvider->GetEncoding(), $this->_pageRealPath, 'encoding');
                break;
            case 'metaRobots':
                $data = $this->_configsProvider->GetMetaRobots();
                break;
            case 'uf':
                $data = $this->_configsProvider->GetUfConfigs();
                break;
            case 'robots':
                $data = $this->_configsProvider->GetRobotsConfig();
                break;
            case 'seoTexts':
                $data = $this->_configsProvider->GetSeoTextConfig($this->_pageRealPath);
                break;
            case 'seoTextsCheck':
                $data = $this->GetValueByPageUrlHash($this->_configsProvider->GetSeoTextCheck(), $this->_pageRealPath, 'isExist');
                break;
            case 'domainPromotion':
                $data = $this->_configsProvider->GetDomainPromotion();
                break;
            case 'relinks':
                $data = $this->GetValueByPageUrlHash($this->_configsProvider->GetRelinksConfig(), $this->_pageRealPath, 'relinkForPageConfigs');
                break;
            case 'brokenlinks':
                $data = $this->GetValueByPageUrlHash($this->_configsProvider->GetBrokenlinkConfig(), $this->_pageRealPath, 'brokenlinks');
                break;
            case 'templatePage':
                $data = $this->_configsProvider->GetTemplatePageConfig($this->_pageRealPath);
                break;
            case 'templatePageCheck':
                $data = $this->GetValueByPageUrlHash($this->_configsProvider->GetTemplatePageCheckConfig(), $this->_pageRealPath, 'isExist');
                break;
            default:
                exit('Unknown config name for load');
        }
        return $data;
    }

    private function GetValueByPageUrlHash($configList, $currentPageUrl, $valueFieldName){
        if($configList === null){
            return null;
        }
        $currentPageUrlMd5 = md5($currentPageUrl);
        foreach($configList as $item){
            if($currentPageUrlMd5 == $item->pageUrlMd5){
                return $item->$valueFieldName;
            }
        }
        return null;
    }


} 