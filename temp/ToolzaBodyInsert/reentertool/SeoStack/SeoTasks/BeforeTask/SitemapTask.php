<?php

/**
 * Class SitemapTask
 */
class SitemapTask implements ISeoBeforeTask {

    /**
     * @var SitemapManager
     */
    private $_sitemapManager;
    /**
     * @var ConfigsManager
     */
    private $_configManager;

    function __construct() {
        $this->_sitemapManager = Ioc::Get(IocConst::SitemapManager);
        $this->_configManager = Ioc::Get(IocConst::ConfigsManager);
    }

    /**
     * @return PageWrapper|null
     */
    public function TryExecuteTask() {
        if (!$this->_sitemapManager->IsSitemapRequest(GlobalState::$requestRelativePath)) {
            return null;
        }
        $pageWrapper = new PageWrapper();
        // значит это динамический сейтмэп
        if($this->_configManager->IsTemplatePagesExists()){
            $pageWrapper->Status->SetStatus(StatusCodeConst::Status_200_0);
            $pageWrapper->Headers->AddHeader(HeaderConst::ContentType, 'text/xml; charset=UTF-8');
            $pageWrapper->Content = $this->_sitemapManager->GetDynamicSitemap($this->_configManager->GetAllTemplatePageUrls());
            return $pageWrapper;
        }
        return $this->_sitemapManager->GetSitemapResponse();
    }
}