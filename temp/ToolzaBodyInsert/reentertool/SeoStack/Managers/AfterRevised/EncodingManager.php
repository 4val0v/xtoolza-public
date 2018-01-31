<?php

/**
 * Class EncodingManager
 */
class EncodingManager {

    /**
     * @param PageWrapper $pageWrapper
     * @param string $encoding
     * @return PageWrapper
     */
    public function ChangeEncoding($pageWrapper, $encoding){
        $pageWrapper->Headers = $this->ChangeHeaderEncoding($pageWrapper->Headers, $encoding);
        $pageWrapper->Content = $this->ChangeHeadEncoding($pageWrapper->Content, $encoding);
        return $pageWrapper;
    }

    /**
     * @param Headers $headers
     * @param string $encoding
     * @return Headers
     */
    private function ChangeHeaderEncoding($headers, $encoding){
        $contentType = 'text/html';
        $headerContentType = $headers->GetValue(HeaderConst::ContentType);
        if(isset($headerContentType)){
            $ff = preg_match('/([^\s;]*)\s*/i', $headerContentType, $matches);
            if ($ff > 0) {
                $contentType = $matches[1];
            }
            if($contentType == 'text/html'){
                $headers->AddOrUpdate(HeaderConst::ContentType, $contentType . '; charset=' . $encoding);
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
        $content = RegExer::PregReplace($charsetPatter1, '', $content);
        $content = RegExer::PregReplace($charsetPatter2, '', $content);
        return $content;
    }
} 