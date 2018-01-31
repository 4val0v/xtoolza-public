<?php

/**
 * Class VarHelper
 */
class VarHelper {
    /**
     * Обходим isset по значению без проверок конструкций
     * Перегрузка __isset для закрытых появилась в >5.1.0
     * @param $object
     * @return bool
     */
    public static function IsSetValue($object){
        return isset($object);
    }

    public static function IsSetNotValue($object){
        return !self::IsSetValue($object);
    }

    public static function IsSetNotValueOrEmpty($object){
        // inline только 5.5+
        $object = trim($object);
        return empty($object);
    }
}