<?php

/**
 * Class TdkTask
 */
class TdkTask implements ISeoAfterTask {

    /**
     * @var TdkManager
     */
    private $tdkManager;

    function __construct() {
        $this->tdkManager = Ioc::Get(IocConst::TdkManager);
    }

    /**
     * @param PageWrapper $pageWrapper
     * @return PageWrapper
     */
    function TryExecuteTaskOnContext($pageWrapper) {
        if (VarHelper::IsSetValue(ConfigsLazy::GetInstance()->tdk)) {
            $pageWrapper->Content = $this->tdkManager->AddOrReplaceTags($pageWrapper->Content);
        }
        return $pageWrapper;
    }
}