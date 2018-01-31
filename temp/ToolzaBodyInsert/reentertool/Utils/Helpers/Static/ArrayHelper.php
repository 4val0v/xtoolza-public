<?php

/**
 * Class ArrayHelper
 */
class ArrayHelper {

    /**
     * @param $array
     * @return bool
     */
    public static function IsNullOrEmpty($array){
        if(VarHelper::IsSetNotValue($array)){
            return true;
        }
        return count($array) === 0;
    }
} 