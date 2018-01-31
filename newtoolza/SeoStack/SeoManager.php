<?php

class SeoManager{

    const SeoTaskClassPostfix = 'Task';

    /**
     * @var ISeoBeforeTask[]
     */
    private $_seoTasksBefore;
    /**
     * @var ISeoBeforeTask[]
     */
    private $_seoTasksAfter;

    function __construct()
    {
        $this->_seoTasksBefore = SeoHelper::$seoBeforeList;
        $this->_seoTasksAfter = SeoHelper::$seoAfterList;
    }

    /**
     * seo оптимизации до скачки страницы
     * @return LoopbackWorkModel
     */
    public function DoBeforeOptimization(){
        foreach($this->_seoTasksBefore as $taskName){
            $taskInstance = $this->CreateTask($taskName);
            $taskContext = $taskInstance->TryGetTaskContext();
            if(isset($taskContext)){
                return $taskContext->data;
            }
        }
        return null;
    }

    /**
     * seo оптимизации обработки страницы
     * @param LoopbackModel $loopbackModelResponse
     * @return LoopbackModel
     */
    public function DoAfterOptimization($loopbackModelResponse){
        foreach($this->_seoTasksAfter as $taskName){
            $taskInstance = $this->CreateTask($taskName);
            $loopbackModelResponse = $taskInstance->TryExecuteTask($loopbackModelResponse);
        }
        return $loopbackModelResponse;
    }

    /**
     * @param $taskName
     * @return ISeoAfterTask|ISeoBeforeTask
     */
    private function CreateTask($taskName){
        return Activator::CreateInstance($taskName, self::SeoTaskClassPostfix);
    }

}
