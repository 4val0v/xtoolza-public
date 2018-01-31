<?php

class Actions{

    /**
     * @var ActionsFactory
     */
    private $_actionFactory;

    /**
     * @param ActionsFactory $actionFactory
     */
    public function __construct($actionFactory){
        $this->_actionFactory = $actionFactory;
    }

    /**
     * @param string $action
     * @return LoopbackModel|null
     */
    public function TryExecuteAction($action){
        if(Ioc::Get(IocConst::SecurityHelper)->IsSafeRequest(ROOT_PATH, ServerHelper::GetValue(ServerConst::REQUEST_URI))){
            return $this->DoAction($action);
        }
        return null;
    }

    /**
     * @param String $action
     * @return LoopbackModel|null
     */
    private function DoAction($action){
        $action = $this->_actionFactory->GetInstance($action);
        if($action === null){
            return null;
        }
        $result = $action->_class->{$action->_func}();
        return new LoopbackModel(null, $result);
    }

}