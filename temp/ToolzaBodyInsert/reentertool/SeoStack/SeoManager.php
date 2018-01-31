<?php

class SeoManager {

    /**
     * Применяем after-доработки только к контенту который отдал такой mime-type
     */
    const MimeTypeToExecute = 'text/html';
    const SeoTaskClassPostfix = 'Task';

    /**
     * @var ISeoBeforeTask[]
     */
    private $_seoTasksBefore;
    /**
     * @var ISeoAfterTask[]
     */
    private $_seoTasksAfter;
    /**
     * @var ISeoMockTask[]
     */
    private $_seoTaskMock;


    function __construct() {
        $this->_seoTasksBefore = SeoHelper::$seoBeforeList;
        $this->_seoTasksAfter = SeoHelper::$seoAfterList;
        $this->_seoTaskMock = SeoHelper::$seoMockList;
    }

    /**
     * seo оптимизации до скачки страницы
     * @return PageWrapper|null
     */
    public function DoBeforeOptimization() {
        foreach ($this->_seoTasksBefore as $taskName) {
            $taskInstance = $this->CreateTask($taskName);
            $taskResult = $taskInstance->TryExecuteTask();
            if (VarHelper::IsSetValue($taskResult) && $taskResult->IsNotEmpty()) {
                return $taskResult;
            }
        }
        return null;
    }

    /**
     * seo оптимизации замены страниц
     * @return PageWrapper
     */
    public function DoMockOptimization(){
        $pageWrapper = new PageWrapper();
        foreach($this->_seoTaskMock as $taskName){
            $taskInstance = $this->CreateTask($taskName);
            $pageWrapper = $taskInstance->TryExecuteTask();
        }
        return $pageWrapper;
    }

    /**
     * seo оптимизации обработки страницы
     * @param PageWrapper $pageWrapper
     * @return PageWrapper
     */
    public function DoAfterOptimization($pageWrapper) {
        foreach ($this->_seoTasksAfter as $taskName) {
            $taskInstance = $this->CreateTask($taskName);
            $pageWrapper = $taskInstance->TryExecuteTaskOnContext($pageWrapper);
        }
        return $pageWrapper;
    }

    /**
     * Применяем доработки к контенту если он text/html и есть tag html
     * @param string $contentType
     * @param string $content
     * @return bool
     */
    public function CanDoAfterOptimization($contentType, $content) {
        return StringUtils::ContainsInsensitive($contentType, self::MimeTypeToExecute)
            && (StringUtils::ContainsInsensitive($content, '<html') || StringUtils::ContainsInsensitive($content, '<body') );
    }

    /**
     * @param $taskName
     * @return ISeoAfterTask|ISeoBeforeTask
     */
    private function CreateTask($taskName) {
        return Activator::CreateInstanceWithPostfix($taskName, self::SeoTaskClassPostfix);
    }

}
