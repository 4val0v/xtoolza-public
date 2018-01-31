<?php

/**
 * Class WebAuthManager
 */
class WebAuthManager {

    /**
     * @return Headers
     */
    public function TryGetHttpBasicHeaderAuth() {
        $headers = new Headers();
        if (function_exists("getallheaders")) {
            foreach (getallheaders() as $name => $value) {
                if ((stripos($name, 'Authorization') !== false) && !empty($value)) {
                    $headers->AddHeader($name, $value);
                }
            }
        } else {
            if (isset($_SERVER[ServerConst::PHP_AUTH_USER]) && isset($_SERVER[ServerConst::PHP_AUTH_PW])) {
                if (function_exists('base64_encode')) {
                    $key = base64_encode($_SERVER[ServerConst::PHP_AUTH_USER] . ':' . $_SERVER[ServerConst::PHP_AUTH_PW]);
                    $headers->AddHeader(HeaderConst::Authorization, 'Basic ' . $key);
                }
            }
        }
        return $headers;
    }
} 