<?php

/**
 * Class CloseExternalLinkTask
 * Более чем полностью переделать
 */
class CloseExternalLinkTask implements ISeoAfterTask {

    /**
     * @param PageWrapper $pageWrapper
     * @return PageWrapper
     */
    function TryExecuteTaskOnContext($pageWrapper) {
        // TODO: Implement TryGetTaskContext() method.
    }


    /**
     * Закрывает внешние ссылки
     * @param string $buffer контент
     * @return string контент с закрытыми ссылками
     * @note тормозной участок оптимизировать!!! (наверно чтото усложнил)
     */
    private function CloseExternalLink($buffer) {
        $domain = $this->_serverHelper->GetValue('SERVER_NAME');
        if (strpos($domain, 'www.') !== false) {
            $domain = substr($domain, 4, strlen($domain) - 4);
        }
        $getAllLinksWithoutNoindexRegEx = "#(?<!<noindex>)<a[^<>]*?href=[\"']http://(?:www\.)?.*?[\"'][^>]*?>.*?</a>#i";

        $linksDefaultMatches = array();
        $linksToReplace = array();
        $resMatch = preg_match_all($getAllLinksWithoutNoindexRegEx, $buffer, $linksDefaultMatches);

        if ($resMatch === false || $resMatch == 0) {
            return $buffer;
        }

        $getDomainRegex = "#.*?http://(?:www\.)?(.*?)[\"'].*#i";
        foreach ($linksDefaultMatches[0] as $k => $v) {
            $domainMatch = preg_match($getDomainRegex, $v, $domainFromLink);

            if (($domainMatch !== false) && !empty($domainFromLink)) {
                $host = explode('/', $domainFromLink[1]);
                $domainFromLink = $host[0];

                if (($domainFromLink !== $domain) && !in_array($domainFromLink, $this->_configs->_counters)) {
                    $linkWithHref = $v;
                    if (stripos($linkWithHref, "rel=\"nofollow\"") === false) {
                        preg_match("#.*?(href=[\"'].*?[\"'])#i", $v, $linkHref);
                        $linkWithHref = str_replace($linkHref[1], $linkHref[1] . " rel=\"nofollow\"", $v);
                    }
                    $linksToReplace[$v] = "<noindex>$linkWithHref</noindex>";
                }
            }
        }
        foreach ($linksToReplace as $k => $v) {
            $buffer = str_replace($k, $v, $buffer);
        }
        return $buffer;
    }
}