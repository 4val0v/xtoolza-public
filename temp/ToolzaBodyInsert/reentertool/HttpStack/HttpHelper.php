<?php

/**
 * Class HttpHelper
 */
class HttpHelper {

    /**
     * @param $transportHelper
     * @return HttpProviderCurl|HttpProviderIO|HttpProviderSocket|null
     */
    public static function GetInitProvider($transportHelper) {
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
     * Устанавливаем глобальное состояние
     * Всегда устанавливает полный url
     * @param string $url
     */
    public static function SetRealAddress($url) {
        GlobalState::$realDomainWithPath = HttpHelper::FormatRealAddress($url);
    }

    public static function FormatRealAddress($url) {
        if (!UrlHelpers::IsRelativeUrl($url)) {
            $url = UrlHelpers::WithHttp(ServerHelper::GetValue(ServerConst::HTTP_HOST)) . $url;
        }
        return $url;
    }

    /**
     * Проверяем адрес на https
     */
    public static function IsHttps($address) {
        $url_info = parse_url($address);
        return $url_info['scheme'] ==='https';
    }

} 