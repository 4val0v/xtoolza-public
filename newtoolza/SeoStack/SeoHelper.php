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




    );

    /**
     * Список возможных дороботок после загрузки страницы
     * @var array
     */
    public static $seoAfterList = array(
        'tdk',






        'relink'

    );

} 