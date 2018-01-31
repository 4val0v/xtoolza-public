<?php

/**
 * Class UfManager
 */
class UfManager {

    private $_oldUrlFieldName = 'oldUrl';
    private $_newUrlFieldName = 'newUrl';

    /**
     * @param $ufConfigs
     * @param string $relativePath
     * @return string|null
     */
    public function GetNewUrl($ufConfigs, $relativePath){
    	$relativePath = urldecode($relativePath);
        uasort($ufConfigs, array($this, 'sortByOldUrl'));
        return $this->Algorithm($ufConfigs, $relativePath, $this->_oldUrlFieldName, $this->_newUrlFieldName);
    }

    /**
     * @param $ufConfigs
     * @param string $relativePath
     * @return string|null
     */
    public function GetRealUrl($ufConfigs, $relativePath){
        if($ufConfigs == null){
            return null;
        }
        $relativePath = urldecode($relativePath);
        $url = $this->Algorithm($ufConfigs, $relativePath, $this->_newUrlFieldName, $this->_oldUrlFieldName);

        //экранируем пробелы в урлах
        if ($url != null){
            $url = str_replace(" ", "%20", $url);
        }

        return $url;
    }

    private function Algorithm($ufConfigs, $relativePath, $search, $take){
        if($ufConfigs === null){
            return null;
        }
        $rpLength = strlen($relativePath);
        foreach($ufConfigs as $ufConfig){
            if($rpLength < strlen($ufConfig->$search)){
                continue;
            }
            //сравнение регулярным выражение замена stripos
            if(preg_match('%^'.preg_quote($ufConfig->$search).'$%', $relativePath) || preg_match('%^'.preg_quote($ufConfig->$search).'[/?#]%', $relativePath)){
                $other = substr($relativePath, strlen($ufConfig->$search));
                return $this->GoogleAnalyticsFix($ufConfig->$take, $other);
            }
        }
        return null;
    }

    private function sortByOldUrl($item1, $item2){
        $item1length = strlen($item1->{$this->_oldUrlFieldName});
        $item2length = strlen($item2->{$this->_oldUrlFieldName});
        if($item1length < $item2length) return 1;
        elseif($item1length > $item2length) return -1;
        else return 0;
    }

    /**
     * Компоновщик урлов GoogleAnalytics всегда приписывает ***?data=123 если нету символа "?"
     * Эта функция меняет второй сепаратор "?"(если есть) на &
     * @param string $take
     * @param string $other
     * @return string
     */
    private function GoogleAnalyticsFix($take, $other) {
        if(StringUtils::StartWith($other, '?') && StringUtils::ContainsInsensitive($take, '?')){
            return $take . '&' . trim($other, '?');
        }
        return $take . $other;
    }
}