<?php

/**
 * Class IndexFilesFactory
 * @deprecated
 */
class IndexFilesFactory {

    /**
     * @var ConfigsModel
     */
    public $_configs;

    /**
     * @param ConfigsModel $configs
     */
    function __construct($configs){
        $this->_configs = $configs;
    }

    /**
     * @param string $type
     * @return FactoryResponse|null
     */
    public function GetInstance($type){

        $class = null;
        $func = null;

        switch ($type){
            case '/robots.txt':
                $class = new RobotsManager($this->_configs);
                $func = 'GetRobotsResponse';
                break;
            case '/sitemap.xml':
                $class = new SitemapManager($this->_configs);
                $func = 'GetSitemapResponse';
                break;
        }

        if($class == null || $func == null){
            return null;
        }

        return new FactoryResponse($class, $func);
    }

} 