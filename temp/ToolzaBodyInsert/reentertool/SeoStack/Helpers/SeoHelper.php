<?php

/**
 * Учитывайте порядок сео-дороботок
 * Class SeoHelper
 */
class SeoHelper {

    /**
     * Список возможных дороботок до загрузки страницы
     * @var array
     */
    public static $seoBeforeList = array(
        // 'redirects',
        // 'uf',
        // 'sitemap',
        // 'robots'
    );

    /**
     * Список возможных дороботок после загрузки страницы
     * @var array
     */
    public static $seoAfterList = array(
        // 'tdk',
        // 'metaRobots',
        // 'encoding',
        // 'seoTexts',
        // 'relink',
        // 'brokenlink',
        // 'hfu',
        'AfterBodyScript'
    );

    /**
     * Список возможных дороботок подмены страниц
     * @var array
     */
    public static $seoMockList = array(
        'templatePage'
    );

} 