<?php

class RedirectsTask implements ISeoBeforeTask {

    /**
     * @var Router
     */
    private $_router;

    function __construct() {
        $this->_router = Ioc::Get(IocConst::Router);
    }

    /**
     * @return PageWrapper|null
     */
    function TryExecuteTask() {
        if(VarHelper::IsSetNotValue(ConfigsLazy::GetInstance()->redirects)){
            return null;
        }
        return $this->_router->TryGetMirrorRedirects();
    }
}