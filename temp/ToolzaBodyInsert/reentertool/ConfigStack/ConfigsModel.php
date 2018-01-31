<?php

/**
 * Class ConfigsModel
 * @deprecated
 */
class ConfigsModel {

    public $_global;
    public $_page;
    public $_robots;
    public $_seoText;
    public $_sitemap;
    public $_currentDomain;
    /**
     * @var string[]
     */
    public $_counters;
    // флаг что конфиги корректны
    public $_isConfigCorrect;
    // адрес к которому будет обращение
    public $_requiredAddress;
}