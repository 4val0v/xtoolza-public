<?php

/**
 * Class InfinityManager
 * TODO: Тут вообще регулярки не нужны (оптимизировать и разнести)
 */
class InfinityManager {

    /**
     * @param string $location
     * @return bool
     */
    public function IsInfinityRedirect($location) {
        if (VarHelper::IsSetNotValue($location) || VarHelper::IsSetNotValue(ConfigsLazy::GetInstance()->redirects)) {
            return false;
        }
        if ($this->IsInfinityWWW($location)
            || $this->IsInfinityRoot($location)
            || $this->IsInfinityPath($location)) {
            return true;
        }
        return false;
    }

    /**
     * TODO: Опт и вынести проверки
     * @param $url
     * @return bool
     */
    private function IsInfinityPath($url) {
        $url = UrlHelpers::CutHttp($url);
        $path = explode('/', $url);
        if (count($path) < 3) {
            return false;
        }
        $last = $path[count($path) - 1];
        if (($last == "") && preg_match('#^/index\.(?:php|html|htm)$#i', ConfigsLazy::GetInstance()->redirects->otherPath)) {
            return true;
        }
        if (preg_match('#^index\.(?:php|html|htm)$#i', $last) && (ConfigsLazy::GetInstance()->redirects->otherPath == "/")) {
            return true;
        }
        return false;
    }

    /**
     * TODO: Опт и вынести проверки
     * @param string $url
     * @return bool
     */
    private function IsInfinityRoot($url) {
        $url = UrlHelpers::CutHttp($url);
        $path = explode('/', $url);
        if (count($path) > 2) {
            return false;
        }
        if (count($path) == 1) {
            $indexfile = "";
        }
        if (count($path) == 2) {
            $indexfile = $path[1];
        }
        if (preg_match('#^index\.(?:php|html|htm)$#i', $indexfile) && (ConfigsLazy::GetInstance()->redirects->rootPath == "/")) {
            return true;
        }
        if (($indexfile == "") && preg_match('#^/index\.(?:php|html|htm)$#i', ConfigsLazy::GetInstance()->redirects->rootPath)) {
            return true;
        }
        return false;
    }

    /**
     * TODO: Опт и вынести проверки
     * @param string $location
     * @return bool
     */
    private function IsInfinityWWW($location) {
        // если путь не абсолютный
        if (!(UrlHelpers::HasUrlHttp($location) || UrlHelpers::HasUrlWww($location))) {
            return false;
        }

        $nowAddress = UrlHelpers::CutWww(UrlHelpers::CutHttp(ServerHelper::GetClientHeaderValue(HeaderConst::Host)));
        $locationResponse = UrlHelpers::GetHostFromAddress(UrlHelpers::CutWww(UrlHelpers::CutHttp($location)));

        // если на разные домены то false
        if (!StringUtils::CompareInsensitive($nowAddress, $locationResponse)) {
            return false;
        }

        $location = UrlHelpers::CutHttp($location);
        // кажется что ниже можно сократить
        if (UrlHelpers::HasUrlWww($location) && (ConfigsLazy::GetInstance()->redirects->rootPathDomain === '')) {
            return true;
        }
        if (!UrlHelpers::HasUrlWww($location) && ConfigsLazy::GetInstance()->redirects->rootPathDomain === 'www.') {
            return true;
        }
        return false;
    }

} 