<?php

/**
 * Class MetaRobotsManager
 */
class MetaRobotsManager extends MetaManager {

    /**
     * @var array Имена плохих meta
     */
    private $_badSeoMetaList = array('yandex', 'googlebot');
    /**
     * @var HeadProcessor
     */
    private $_headProcessor;

    function __construct($_headProcessor) {
        $this->_headProcessor = $_headProcessor;
    }

    public function OptimizeMetaRobots($content) {
        $content = $this->DeleteBadSeoMeta($content);
        return $this->ReplaceMetaRobots($content);
    }

    private function ReplaceMetaRobots($content) {
        $metaRobotsCorrect = '<meta name="robots" content="index,follow"/>';
        $metaRobotsPattern = '#<meta\s*name\s*=\s*["\']robots["\']\s*content\s*=\s*["\'](.*?)["\']\s*/>#si';
        return $this->_headProcessor->AddOrReplaceMetaHead($metaRobotsPattern, $metaRobotsCorrect, $content);
    }

    private function DeleteBadSeoMeta($content) {
        foreach ($this->_badSeoMetaList as $meta) {
            $content = parent::DeleteMetaOnName($meta, $content);
        }
        return $content;
    }

}