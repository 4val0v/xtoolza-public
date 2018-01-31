<?php

class TemplatePageTask implements ISeoMockTask {

    /**
     * @var TemplatePageManager
     */
    private $_templatePageManager;

    function __construct() {
        $this->_templatePageManager = Ioc::Get(IocConst::TemplatePageManager);
    }

    /**
     * @return PageWrapper|null
     */
    function TryExecuteTask() {
        $pageWrapper = new PageWrapper();
        if (VarHelper::IsSetValue(ConfigsLazy::GetInstance()->templatePageCheck)) {
            $templatePageConfig = ConfigsLazy::GetInstance()->templatePage;
            $pageWrapper = $this->_templatePageManager->ApplyTemplatePage($pageWrapper, $templatePageConfig);
        }
        return $pageWrapper;
    }
}