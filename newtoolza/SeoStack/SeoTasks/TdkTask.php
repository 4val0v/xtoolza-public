<?php

class TdkTask implements ISeoAfterTask{

    /**
     * @var TdkManager
     */
    private $tdkManager;

    function __construct()
    {
        $this->tdkManager = Ioc::Get(IocConst::TdkManager);
    }

    /**
     * @param LoopbackModel $loopbackModelResponse
     * @return LoopbackModel
     */
    function TryExecuteTask($loopbackModelResponse)
    {
        if(VarHelper::IsSetValue(ConfigsLazy::GetInstance()->tdk)){
            $loopbackModelResponse->Content = $this->tdkManager->AddOrReplaceTags($loopbackModelResponse->Content, $loopbackModelResponse->Headers);
        }
        return $loopbackModelResponse;
    }
}