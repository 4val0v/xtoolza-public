<?php

class UfTask implements ISeoBeforeTask {

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
        if(VarHelper::IsSetNotValue(ConfigsLazy::GetInstance()->uf)){
            return null;
        }
        // узнали что текущий это ЧПУ
        $realPath = $this->_router->TryFindSetRealUrlFromUf();
        if (VarHelper::IsSetValue($realPath)) {
            HttpHelper::SetRealAddress($realPath);
            ConfigsLazy::GetInstance()->SetRealRelativePath($realPath);
            return null;
        }


        // на ЧПУ
        $newUrl = $this->_router->TryGetUfRedirects();
        if(VarHelper::IsSetValue($newUrl)){
            $pageWrapper = new PageWrapper();
            $pageWrapper->Status->SetStatus(StatusCodeConst::Status_301);
            $pageWrapper->Headers->AddHeader(HeaderConst::Location, $newUrl);
            return $pageWrapper;
        }

        return null;
    }
}