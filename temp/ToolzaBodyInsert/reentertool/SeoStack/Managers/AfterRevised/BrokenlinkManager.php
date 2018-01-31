<?php

/**
 * Class BrokenlinkManager
 */
class BrokenlinkManager {
    /**
     * @param string $content
     * @param array $brokenlinks
     * @return string
     */
    public function FixBrokenlinks($content, $brokenlinks) {
        foreach ($brokenlinks as $brokenlink) {
            $content = RegExer::PregReplace('#<a.*?href\s*=\s*["\']' . $brokenlink . '["\'][^>]*>(.*?)</a>#', '$1', $content);
        }
        return $content;
    }
} 