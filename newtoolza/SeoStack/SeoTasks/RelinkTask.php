<?php

class RelinkTask implements ISeoAfterTask {

    /**
     * @var RelinkManager
     */
    private $_relinkManger;

    function __construct()
    {
        $this->_relinkManger = Ioc::Get(IocConst::RelinkManager);
    }

    function TryExecuteTask($loopbackModelResponse)
    {
        if(VarHelper::IsSetValue(ConfigsLazy::GetInstance()->relinks)){
            $loopbackModelResponse->Content = $this->_relinkManger->DoRelink($loopbackModelResponse->Content, ConfigsLazy::GetInstance()->relinks);
        }
        return $loopbackModelResponse;
    }

}