<?php

/**
 * Class EncodingTask
 */
class EncodingTask implements ISeoAfterTask {

    /**
     * @var EncodingManager
     */
    private $_encodingManager;

    function __construct() {
        $this->_encodingManager = Ioc::Get(IocConst::EncodingManager);
    }

    /**
     * @param PageWrapper $pageWrapper
     * @return PageWrapper
     */
    function TryExecuteTaskOnContext($pageWrapper) {
        if (VarHelper::IsSetValue(ConfigsLazy::GetInstance()->encoding)) {
            $pageWrapper = $this->_encodingManager->ChangeEncoding($pageWrapper, ConfigsLazy::GetInstance()->encoding);
        }
        return $pageWrapper;
    }
}