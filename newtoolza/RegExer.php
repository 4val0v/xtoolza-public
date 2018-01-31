<?php


class RegExer {

    /**
     * @param $pattern
     * @param $subject
     * @return bool
     */
    public static function IsMatch($pattern, $subject){
        $count = preg_match($pattern, $subject);
        return $count > 0;
    }

    public static function PregReplace($pattern, $to, $subject){
        return preg_replace($pattern, $to, $subject);
    }

    public static function PregMatch($pattern, $subject){
        preg_match($pattern, $subject, $matches);
        if($matches){
            return $matches[1];
        }
        return null;
    }

} 