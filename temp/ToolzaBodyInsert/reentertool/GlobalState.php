<?php

/**
 * Class GlobalState
 */
class GlobalState {
    /**
     * Начинается с /page1.php?b=1&a=2
     * @var string
     */
    public static $requestRelativePath;
    /**
     * Начинается с /page1.php?a=2&b=1
     * PathAndQuery с отсортированными параметрами ключей
     * @var string
     */
    public static $requestRelativePathSorted;
    /**
     * Начинается с http://domain.ru/page1.php?b=1&a=2
     * @var string
     */
    public static $realDomainWithPath;
    /**
     * Начинается с http://domain.ru
     * Без / в конце
     * @var string
     */
    public static $httpDomain;

} 