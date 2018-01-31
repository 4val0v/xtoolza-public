<?php

/**
 * Class EncodingTask
 */
class HfuTask implements ISeoAfterTask {
    /**
     * @var Router
     */
    private $_router;

    function __construct() {
        $this->_router = Ioc::Get(IocConst::Router);
    }

    /**
     * @param PageWrapper $pageWrapper
     * @return PageWrapper
     */
    function TryExecuteTaskOnContext($pageWrapper) {
        if (!preg_match('#<\s*base.*?>#si', $pageWrapper->Content)) {
            $realPath = $this->_router->TryFindSetRealUrlFromUf();
            if (VarHelper::IsSetValue($realPath)) {
                if (array_key_exists("extension", pathinfo($realPath)) === true) {
                    $realPath = dirname($realPath).'/';
                }
                $realPath = HttpHelper::FormatRealAddress($realPath);

                $attrHead = '';
                if(preg_match('#<\s*head(.*?)>#si', $pageWrapper->Content, $matches)){
                    $attrHead = $matches[1];
                }

                $newHead = '<head'. $attrHead . '>';
                $newHead = $newHead . '<base href="' . $realPath . '">';
                $pageWrapper->Content = preg_replace('#<\s*base.*?>#si', '', $pageWrapper->Content);

                $pageWrapper->Content = preg_replace('#<\s*head.*?>(.*?)<\s*/\s*head\s*>#si', $newHead . '$1</head>', $pageWrapper->Content, 1, $counter);
                if ($counter === 0) {
                    $pageWrapper->Content = $newHead . '</head>' . $pageWrapper->Content;
                }
            }
        }
        return $pageWrapper;
    }
}