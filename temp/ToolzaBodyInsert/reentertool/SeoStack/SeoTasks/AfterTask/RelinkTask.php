<?php

/**
 * Class RelinkTask
 */
class RelinkTask implements ISeoAfterTask {

    /**
     * @var RelinkManager
     */
    private $_relinkManger;

    function __construct() {
        $this->_relinkManger = Ioc::Get(IocConst::RelinkManager);
    }

    /**
     * @param PageWrapper $pageWrapper
     * @return PageWrapper
     */
    function TryExecuteTaskOnContext($pageWrapper) {
        if (VarHelper::IsSetValue(ConfigsLazy::GetInstance()->relinks)) {
            $pageWrapper->Content = $this->_relinkManger->DoRelink($pageWrapper->Content, ConfigsLazy::GetInstance()->relinks);
        }
        return $pageWrapper;
    }

}