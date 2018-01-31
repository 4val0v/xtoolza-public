<?php

/**
 * Class ContentManager
 * @deprecated
 */
class ContentManager {

    /**
     * @var HeadersManagerSeo
     */
    private $_headersManagerSeo;
    /**
     * @var MetaManager
     */
    private $_metaManager;
    /**
     * @var ContentProcessor
     */
    private $_contentProcessor;
    /**
     * @var SeoTextManager
     */
    private $_seoTextManager;

    function __construct($headersManagerSeo, $metaManager, $contentProcessor, $seoTextManager){
        $this->_headersManagerSeo = $headersManagerSeo;
        $this->_metaManager = $metaManager;
        $this->_contentProcessor = $contentProcessor;
        $this->_seoTextManager = $seoTextManager;
    }

    /**
     * @param LoopbackModel $loopbackModel
     * @return LoopbackModel
     */
    public function DoProcessing($loopbackModel){
        $this->_headersManagerSeo->DoProcessing($loopbackModel->Headers);
        $loopbackModel->Content = $this->_metaManager->DoReplace($loopbackModel->Content);
        $loopbackModel->Content = $this->_seoTextManager->DoReplace($loopbackModel->Content);
        $loopbackModel->Content = $this->_contentProcessor->DoProcessing($loopbackModel->Content);
        return $loopbackModel;
    }
} 