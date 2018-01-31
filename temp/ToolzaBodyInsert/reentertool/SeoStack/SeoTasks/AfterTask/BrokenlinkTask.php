<?php

/**
 * Class BrokenlinkTask
 */
class BrokenlinkTask implements ISeoAfterTask {

    /**
     * @var BrokenlinkManager
     */
    private $_brokenlinkManager;

    function __construct() {
        $this->_brokenlinkManager = Ioc::Get(IocConst::BrokenlinkManager);
    }

    /**
     * @param PageWrapper $pageWrapper
     * @return PageWrapper
     */
    function TryExecuteTaskOnContext($pageWrapper) {
        if (VarHelper::IsSetValue(ConfigsLazy::GetInstance()->brokenlinks)) {
            $pageWrapper->Content = $this->_brokenlinkManager->FixBrokenlinks($pageWrapper->Content, ConfigsLazy::GetInstance()->brokenlinks);
        }
        return $pageWrapper;
    }
}