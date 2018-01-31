<?php

/**
 * Class RobotsTask
 */
class RobotsTask implements ISeoBeforeTask {

    /**
     * @var RobotsManager
     */
    private $robotsManager;

    function __construct() {
        $this->robotsManager = Ioc::Get(IocConst::RobotsManager);
    }

    /**
     * @return PageWrapper|null
     */
    function TryExecuteTask() {
        if (!$this->robotsManager->IsRobotsRequest(GlobalState::$requestRelativePath)) {
            return null;
        }
        return $this->robotsManager->GetRobotsResponse();
    }
}