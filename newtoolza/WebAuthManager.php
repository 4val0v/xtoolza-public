<?php

class WebAuthManager {

    /**
     * @return HeaderModel|null
     */
    public function TryGetHttpBasicHeaderAuth(){
        $headerModel = null;
        if(function_exists("getallheaders")){
            foreach (getallheaders() as $name => $value) {
                if((stripos($name, 'Authorization') !== false) && !empty($value)){
                    $headerModel = new HeaderModel($name, $value);
                }
            }
        } else {
            if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
                if(function_exists('base64_encode')){
                    $key = base64_encode($_SERVER['PHP_AUTH_USER'] . ":" . $_SERVER['PHP_AUTH_PW']);
                    $headerModel = new HeaderModel("Authorization","Basic " . $key);
                }
            }
        }
        return $headerModel;
    }

} 