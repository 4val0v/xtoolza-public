<?php

class UrlHelpers {

    const prefHttp = 'http://';
    const prefHttps = 'https://';
    const prefWww = 'www.';

    public static function CutHttp($addr){
        if(self::HasUrlHttp($addr)){
            return substr($addr, strlen(self::prefHttp),strlen($addr));
        }
        return $addr;
    }

    public static function CutWww($addr){
        if(self::HasUrlWww($addr)){
            return substr($addr,strlen(self::prefWww),strlen($addr));
        }
        return $addr;
    }

    public static function HasUrlHttp($addr){
        return substr($addr,0,strlen(self::prefHttp)) === self::prefHttp;
    }

    public static function HasUrlHttps($addr){
        return substr($addr,0,strlen(self::prefHttps)) === self::prefHttps;
    }

    public static function HasUrlWww($addr){
        return substr($addr,0,strlen(self::prefWww)) === self::prefWww;
    }

    public static function WithHttp($addr){
        if(!self::HasUrlHttp($addr)){
            return self::prefHttp . $addr;
        }
        return $addr;
    }

    public static function WithHttps($addr){
        if(!self::HasUrlHttp($addr)){
            return self::prefHttps . $addr;
        }
        return $addr;
    }

    public static function WithWww($addr){
        if(!self::HasUrlWww($addr)){
            return self::prefWww . $addr;
        }
        return $addr;
    }

    public static function GetHostFromAddress($url){
        $url = self::CutHttp($url);
        $host = explode('/',$url);
        return $host[0];
    }

    public static function IsRelativeUrl($address){
        return (self::HasUrlHttp($address) || self::HasUrlWww($address));
    }

    public static function IsDomainsEqualse($domain1, $domain2){
        return self::CutWww(self::GetHost($domain1)) === self::CutWww(self::GetHost($domain2));
    }

    /**
     * сортирует get параметры по значениям
     * @param string $url относительный путь
     * @return string
     */
    public static function SortGetParams($url){
        $str = explode("?", urldecode($url));
        if (count($str) > 1) {
            $stq = explode("&", $str[1]);
            $array_lowercase = array_map('strtolower', $stq);
            array_multisort($array_lowercase, SORT_ASC, SORT_STRING, $stq);
            return $str[0] . "?" . join("&", $stq);
        }
        return $url;
    }

    /**
     * @param $url
     * @return mixed
     */
    public static function ParseUrl($url){
        return parse_url($url);
    }

    /**
     * @param $url
     * @return null
     */
    public static function GetHost($url){
        $parseUrl = self::ParseUrl($url);
        return isset($parseUrl['host'])?$parseUrl['host']:null;
    }

    /**
     * @param $url
     * @return string
     */
    public static function GetPathWithQuery($url){
        $parseUrl = self::ParseUrl($url);
        $pathWithQuery = $parseUrl['path'];
        if(isset($parseUrl['query'])){
            $pathWithQuery .= '?' . $parseUrl['query'];
        }
        return $pathWithQuery;
    }

    public static function UrlEncode($url) {
        return preg_replace_callback('#://([^/]+)/([^?]+)#', 'explodematch', $url);
    }

} 

function explodematch($match) {
    return '://' . $match[1] . '/' . join('/', array_map('rawurlencode', explode('/', $match[2])));
}
