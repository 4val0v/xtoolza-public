<?php

/**
 * Class SeoTextsTask
 */
class SeoTextsTask implements ISeoAfterTask {

    /**
     * Можеть null, т.к. некоторые запрещают DOMElement
     * @var SeoTextManager|null
     */
    private $_seoTextManager;

    function __construct() {
        $this->_seoTextManager = Ioc::Get(IocConst::SeoTextManager);
    }

    /**
     * @param PageWrapper $pageWrapper
     * @return PageWrapper
     */
    function TryExecuteTaskOnContext($pageWrapper) {
        if (VarHelper::IsSetValue(ConfigsLazy::GetInstance()->seoTextsCheck)
            && VarHelper::IsSetValue($this->_seoTextManager)) {
            $seoTextsConfig = ConfigsLazy::GetInstance()->seoTexts;
            $pageWrapper->Content = $this->_seoTextManager->ReplaceTexts($pageWrapper->Content, $seoTextsConfig);
        }
        return $pageWrapper;
    }
}