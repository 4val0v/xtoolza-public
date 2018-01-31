<?php

interface ISeoAfterTask {
    /**
     * @param LoopbackModel $loopbackModelResponse
     * @return LoopbackModel
     */
    function TryExecuteTask($loopbackModelResponse);
}