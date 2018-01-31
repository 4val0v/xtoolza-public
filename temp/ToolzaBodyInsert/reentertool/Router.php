<?php

class Router {

    /**
     * @var UfManager
     */
    private $_ufManager;

    /**
     * @var RedirectManager
     */
    private $_redirectManager;

    function __construct($ufManager, $redirectManager) {
        $this->_ufManager = $ufManager;
        $this->_redirectManager = $redirectManager;
    }

    /**
     * @return PageWrapper|null
     */
    function TryGetMirrorRedirects() {
        //редирект на www. или без
        $pageWrapper = $this->_redirectManager->GetRedirectRemoveOrAddWWW();
        if ($pageWrapper->IsNotEmpty()) {
            return $pageWrapper;
        }

        //склейка между корнем и индексным файлом (только главная)
        if ($this->_redirectManager->IsRedirectToIndexMain()) {
            return $this->_redirectManager->GetRedirectToIndexMain();
        }

        //редирект на корень или index для разных каталогов (кроме главной)
        $pageWrapper = $this->_redirectManager->GetHeadersRedirectToIndexPath();
        if ($pageWrapper->IsNotEmpty()) {
            return $pageWrapper;
        }
        return null;
    }

    /**
     * Пытается найти редирект НА чпу
     * @return string|null
     */
    function TryGetUfRedirects() {
        return $this->_ufManager->GetNewUrl(ConfigsLazy::GetInstance()->uf, GlobalState::$requestRelativePathSorted);
    }

    /**
     * Пытается найти реальный url если это чпу
     * @return string|null
     */
    function TryFindSetRealUrlFromUf() {
        return $this->_ufManager->GetRealUrl(ConfigsLazy::GetInstance()->uf, GlobalState::$requestRelativePathSorted);
    }

} 