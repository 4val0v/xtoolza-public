<?php


class ServerHelper {

    public static function IsPost(){
        return $_SERVER[ServerConst::REQUEST_METHOD] === 'POST';
    }

    public static function GetValue($name){
        if(!isset($_SERVER[$name])){
            return null;
        }
        return $_SERVER[$name];
    }

    public static function IsEnableMagicQuotes(){
        return get_magic_quotes_gpc();
    }

} 