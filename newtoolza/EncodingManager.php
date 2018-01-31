<?php

/**
 * Class EncodingManager
 */
class EncodingManager {

    /**
     * @param LoopbackModel $loopbackModelResponse
     * @param string $encoding
     * @return LoopbackModel
     */
    public function ChangeEncoding($loopbackModelResponse, $encoding){
        $loopbackModelResponse->Headers = $this->ChangeHeaderEncoding($loopbackModelResponse->Headers, $encoding);
        $loopbackModelResponse->Content = $this->ChangeHeadEncoding($loopbackModelResponse->Content, $encoding);
        return $loopbackModelResponse;
    }

    /**
     * @param Headers $headers
     * @param string $encoding
     * @return Headers
     */
    private function ChangeHeaderEncoding($headers, $encoding){
        $contentType = 'text/html';
        $headerContentType = $headers->GetValue('Content-Type');
        if(isset($headerContentType)){
            $ff = preg_match('/([^\s;]*)\s*/i', $headerContentType, $matches);
            if ($ff > 0) {
                $contentType = $matches[1];
            }
            if($contentType == 'text/html'){
                $headers->AddOrUpdate('Content-Type', $contentType . '; charset=' . $encoding);
            }
        }
        return $headers;
    }

    /**
     * TODO: этот код надо вынести в HeadProcessor
     * @param string $content
     * @param string $encoding
     * @return string
     */
    private function ChangeHeadEncoding($content, $encoding){
        $attrHead = '';
        if(preg_match('#<\s*head(.*?)>#si', $content, $matches)){
            $attrHead = $matches[1];
        }
        $metaCharset = '<meta http-equiv="content-type" content="text/html; charset=' . $encoding . '">';
        $content = $this->DeleteCharsetMeta($content);

        $newHead = '<head'. $attrHead . '>' . $metaCharset;
        $content = preg_replace('#<\s*head.*?>(.*?)<\s*/\s*head\s*>#si', $newHead . '$1</head>', $content, 1, $counter);
        if ($counter === 0) {
            $content = $newHead . '</head>' . $content;
        }
        return $content;
    }

    private function DeleteCharsetMeta($content){
        $charsetPatter1 = '#<meta\s*charset.*?/?>#si';
        $charsetPatter2 = '#<meta\s*http-equiv\s*=\s*[\'"]Content-Type["\'].*?/?>#si';
        $content = preg_replace($charsetPatter1, '', $content);
        $content = preg_replace($charsetPatter2, '', $content);
        return $content;
    }
} 