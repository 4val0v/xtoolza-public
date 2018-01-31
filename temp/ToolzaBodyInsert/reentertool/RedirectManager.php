<?php

/**
 * Class RedirectManager
 */
class RedirectManager {

    /**
     * Проверка на редирект корнем и индексным файлом (только главная)
     * @return bool
     */
    public function IsRedirectToIndexMain() {
        if (!VarHelper::IsSetValue(ConfigsLazy::GetInstance()->redirects)
            || !VarHelper::IsSetValue(ConfigsLazy::GetInstance()->redirects->rootPath)
        ) {
            return false;
        }
        return ((RegExer::IsMatch('#^/index\.(?:php|html|htm)$#i', GlobalState::$requestRelativePath) || GlobalState::$requestRelativePath == '/')
            && GlobalState::$requestRelativePath != ConfigsLazy::GetInstance()->redirects->rootPath);
    }

    /**
     * Cклейка между корнем и индексным файлом (только главная)
     * @return PageWrapper хэдеры с редиректом
     */
    public function GetRedirectToIndexMain() {
        $pageWrapper = new PageWrapper();
        $pageWrapper->Status->SetStatus(StatusCodeConst::Status_301);
        $pageWrapper->Headers->AddHeader(HeaderConst::Location, ConfigsLazy::GetInstance()->redirects->rootPath);
        return $pageWrapper;
    }

    /**
     * Редирект на www. или без
     * @return PageWrapper хэдеры c редиректом
     * @todo разделить, подчистить ненужные проверки, упростить логику
     */
    public function GetRedirectRemoveOrAddWWW() {
        $pageWrapper = new PageWrapper();
        if (!VarHelper::IsSetValue(ConfigsLazy::GetInstance()->redirects)
            || !VarHelper::IsSetValue(ConfigsLazy::GetInstance()->redirects->rootPathDomain)) {
            return $pageWrapper;
        }

        $needDomain = ConfigsLazy::GetInstance()->redirects->rootPathDomain;
        $firstChars = substr(ServerHelper::GetClientHeaderValue(HeaderConst::Host),0,4);
        if (UrlHelpers::HasUrlWww($firstChars)) {
            if (!StringUtils::CompareInsensitive($firstChars, $needDomain)) {
                $host = substr_replace(ServerHelper::GetClientHeaderValue(HeaderConst::Host), $needDomain, 0, 4);
                $pageWrapper->Status->SetStatus(StatusCodeConst::Status_301);
                $pageWrapper->Headers->AddHeader(HeaderConst::Location, UrlHelpers::WithHttp($host . GlobalState::$requestRelativePath));
            }
        } else {
            if ($needDomain != '') {
                $pageWrapper->Status->SetStatus(StatusCodeConst::Status_301);
                $pageWrapper->Headers->AddHeader(HeaderConst::Location,
                    UrlHelpers::WithHttp($needDomain . ServerHelper::GetClientHeaderValue(HeaderConst::Host) . GlobalState::$requestRelativePath));
            }
        }
        return $pageWrapper;
    }

    /**
     * Редирект на корень или index для разных каталогов (кроме главной)
     * @return PageWrapper хэдеров
     * @todo разделить, подчистить ненужные проверки, упростить логику
     */
    public function GetHeadersRedirectToIndexPath() {
        $pageWrapper = new PageWrapper();

        if (!VarHelper::IsSetValue(ConfigsLazy::GetInstance()->redirects) ||
            !VarHelper::IsSetValue(ConfigsLazy::GetInstance()->redirects->otherPath)) {
            return $pageWrapper;
        }

        $directories = explode('/', ltrim(GlobalState::$requestRelativePath, '/'));
        $needOtherPath = ConfigsLazy::GetInstance()->redirects->otherPath;
        if ($needOtherPath == '/') {
            $needOtherPath = '';
        }
        if (RegExer::IsMatch('#/index\..*#i', $needOtherPath)) {
            $needOtherPath = substr($needOtherPath, 1, strlen($needOtherPath));
        }
        if (count($directories) > 1) {
            $lastDir = $directories[count($directories) - 1];
            if ((RegExer::IsMatch('#^index\.(?:php|html|htm)$#i', $lastDir) || $lastDir == "") && $lastDir != $needOtherPath) {
                array_pop($directories);
                $directories = join('/', $directories);
                if (!empty($needOtherPath)) {
                    $needOtherPath = '/' . $needOtherPath;
                } else {
                    $needOtherPath = $needOtherPath . '/';

                }
                $pageWrapper->Status->SetStatus(StatusCodeConst::Status_301);
                $pageWrapper->Headers->AddHeader(HeaderConst::Location, '/' . $directories . $needOtherPath);
            }
        }
        return $pageWrapper;
    }

} 