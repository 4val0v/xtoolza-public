<?php

class StringUtils {

    public static function Substr($text, $start, $length){
        if (function_exists('mb_substr')) {
            $text = mb_substr($text, $start, $length, '8bit');
        } else {
            $text = substr($text, $start, $length);
        }
        return $text;
    }

    public static function StartWith($source, $find){
        $lengthFind = strlen($find);
        $lengthSource = strlen($source);
        if($lengthSource < $lengthFind){
            return false;
        }
        $partSource = self::Substr($source, 0, $lengthFind);
        return $partSource === $find;
    }

    public static function UpEveryFirstCharacter($text){
        return ucwords($text);
    }

}