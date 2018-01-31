<?php

class RelinkManager {

    /**
     * @param $content
     * @param array $relinks
     * @return mixed
     */
    public function DoRelink($content, $relinks){
        $bodyPattern = '#(<body[^>]*>)(.*?)</body>#si';

        $pregResult = preg_match($bodyPattern, $content, $matches);
        if(!$matches || !$pregResult){
            return $content;
        }

        $bodyStartTag = $matches[1];
        $body = $matches[2];

        foreach($relinks as $relink){
            $body = RegExer::PregReplace('#(' . $relink->sourceText . ')#i', '<a href="'. $relink->hrefUrl .'">$1</a>', $body);
        }
        $content = RegExer::PregReplace($bodyPattern, $bodyStartTag . $body . '</body>', $content);
        return $content;
    }

} 