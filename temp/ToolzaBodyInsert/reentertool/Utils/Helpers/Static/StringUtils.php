<?php

/**
 * Class StringUtils
 */
class StringUtils {

    public static function Substr($text, $start, $length){
        if (function_exists('mb_substr')) {
            $text = mb_substr($text, $start, $length, '8bit');
        } else {
            $text = substr($text, $start, $length);
        }
        return $text;
    }

    /**
     * @param string $source
     * @param string $find
     * @return bool
     */
    public static function ContainsInsensitive($source, $find){
        return stripos($source, $find) !== false;
    }

    /**
     * @param $source
     * @param $find
     * @return bool
     */
    public static function StartWith($source, $find){
        $sourceEqLength = self::GetSourceEqLength($source, $find);
        if(VarHelper::IsSetNotValue($sourceEqLength)){
            return false;
        }
        return $sourceEqLength === $find;
    }

    /**
     * Регистронезависимый
     * @param $source
     * @param $find
     * @return bool
     */
    public static function StartWithInsensitive($source, $find){
        $sourceEqLength = self::GetSourceEqLength($source, $find);
        if(VarHelper::IsSetNotValue($sourceEqLength)){
            return false;
        }
        return self::CompareInsensitive($sourceEqLength, $find);
    }

    /**
     * В верхний регистр каждую первую букву слов
     * @param $text
     * @return string
     */
    public static function UpEveryFirstCharacter($text){
        return ucwords($text);
    }

    /**
     * @param $text
     * @return string
     */
    public static function UpAllCharacter($text){
        return strtoupper($text);
    }

    /**
     * @param $str1
     * @param $str2
     * @return bool
     */
    public static function CompareInsensitive($str1, $str2){
        return strcasecmp($str1, $str2) == 0;
    }

    /**
     * Пытается взять len($find) символов из $source
     * @param $source
     * @param $find
     * @return string|null
     */
    private static function GetSourceEqLength($source, $find){
        $lengthFind = strlen($find);
        $lengthSource = strlen($source);
        if($lengthSource < $lengthFind){
            return null;
        }
        return self::Substr($source, 0, $lengthFind);
    }

}