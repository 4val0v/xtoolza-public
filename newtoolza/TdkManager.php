<?php

/**
 * Class TdkManager
 */
class TdkManager {
    private $_defaultCharset = 'UTF-8';
    /**
     * Добавляет или заменяет tdk тэги
     * @param $content
     * @param Headers $headers
     * @return string
     */
    public function AddOrReplaceTags($content, $headers){
        $tdk = ConfigsLazy::GetInstance()->tdk;
        $charset = $this->GetEncoding($headers);

        if ($charset != $this->_defaultCharset) {
            $tdk->title = iconv($this->_defaultCharset, $charset, $tdk->title);
        }

        $attrHead = '';
        if(preg_match('#<\s*head(.*?)>#si', $content, $matches)){
            $attrHead = $matches[1];
        }

        $newHead = '<head'. $attrHead . '><title>' . $tdk->title . '</title>';
        $content = preg_replace('#<\s*title.*?>[^<]*<\s*/\s*title\s*>#si', '', $content);
        $content = preg_replace('#<\s*head.*?>(.*?)<\s*/\s*head\s*>#si', $newHead . '$1</head>', $content, 1, $counter);
        if ($counter === 0) {
            $content = $newHead . '</head>' . $content;
        }
        return $content;
    }

    /**
     * @param Headers $headers
     * @return string
     */
    private function GetEncoding($headers){
        $charsetHeader = $this->GetEncodingFromHeaders($headers);
        if(VarHelper::IsSetNotValue($charsetHeader)){
            $charsetHeader = $this->GetEncodingFromConfig();
        }
        return VarHelper::IsSetValue($charsetHeader)?$charsetHeader:$this->_defaultCharset;
    }

    /**
     * @param Headers $headers
     * @return null
     */
    private function GetEncodingFromHeaders($headers){
        $headers->GetValue(HeaderConst::ContentType);
        $headerContentType = $headers->GetValue(HeaderConst::ContentType);
        if(VarHelper::IsSetNotValue($headerContentType)){
            return null;
        }
        $charsetHeader = RegExer::PregMatch('#charset=(.*)#i', $headerContentType);
        return $charsetHeader;
    }

    private function GetEncodingFromConfig(){
        return ConfigsLazy::GetInstance()->encoding;
    }
} 