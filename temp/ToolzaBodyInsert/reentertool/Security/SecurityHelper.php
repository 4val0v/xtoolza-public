<?php

class SecurityHelper {

    /**
     * Проверяет что команды от наших серваков принимает только с учетом gui'ов
     * @param $nowPath
     * @param $requestUri
     * @return bool
     */
    public function IsSafeRequest($nowPath, $requestUri){
        $currentDir = basename($nowPath);
        return $currentDir === basename(dirname($requestUri));
    }

    public function InitAES($alg){
        return $this->FillAlgorithm($alg);
    }

    private function FillAlgorithm($alg){
        $content = base64_decode(File::ReadAllText($alg->configFileName));
        $this->SetKey($alg, $content);
        $this->SetIV($alg, $content);
        return $alg;
    }

    public function SetKey($alg, $content){
        $key = StringUtils::Substr($content, $alg->keyStart, $alg->keyLen);
        $alg->setKey($key);
    }

    public function SetIV($alg, $content){
        $iv = StringUtils::Substr($content, $alg->ivStart, $alg->ivLen);
        $alg->setIV($iv);
    }

}

?>