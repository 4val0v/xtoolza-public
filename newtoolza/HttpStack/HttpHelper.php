<?php

/**
 * Class HttpHelper
 */
class HttpHelper {

    /**
     * @param $transportHelper
     * @return HttpProviderCurl|HttpProviderIO|HttpProviderSocket|null
     */
    public static function GetInitProvider($transportHelper){
        $httpProvider = null;
        if (function_exists('fsockopen')) {
            $httpProvider = new HttpProviderSocket($transportHelper);
        } elseif (function_exists('curl_init')) {
            $httpProvider = new HttpProviderCurl($transportHelper);
        } else {
            $httpProvider = new HttpProviderIO($transportHelper);
        }
        return $httpProvider;
    }

    /**
     * Всегда устанавливает полный url
     * @param $url
     */
    public static function SetRealAddress($url){
        if(!UrlHelpers::IsRelativeUrl($url)){
            $url = UrlHelpers::WithHttp(ServerHelper::GetValue(ServerConst::SERVER_NAME)) . $url;
        }
        GlobalState::$realDomainWithPath = $url;
    }

} 