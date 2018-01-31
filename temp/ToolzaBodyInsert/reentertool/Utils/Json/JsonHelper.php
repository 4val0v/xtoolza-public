<?php

class JsonHelper {
    /**
     * @return IJson
     */
    public static function GetInitJson(){
        if(function_exists('json_decode')){
            return new JsonNative();
        }
        return new JsonSimple();
    }
} 