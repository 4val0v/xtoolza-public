<?php

/**
 * Class MetaRobotsTask
 */
class MetaRobotsTask implements ISeoAfterTask {

    /**
     * @var MetaRobotsManager
     */
    private $_metaRobotsManager;

    function __construct() {
        $this->_metaRobotsManager = Ioc::Get(IocConst::MetaRobotsManager);
    }

    /**
     * @param PageWrapper $pageWrapper
     * @return PageWrapper
     */
    public function TryExecuteTaskOnContext($pageWrapper) {
        if (VarHelper::IsSetValue(ConfigsLazy::GetInstance()->metaRobots)
            && ConfigsLazy::GetInstance()->metaRobots->isOn) {
            $pageWrapper->Content = $this->_metaRobotsManager->OptimizeMetaRobots($pageWrapper->Content);
        }
        return $pageWrapper;
    }
}