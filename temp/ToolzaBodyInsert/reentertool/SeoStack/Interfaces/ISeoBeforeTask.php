<?php

interface ISeoBeforeTask {
    /**
     * @return PageWrapper|null
     */
    function TryExecuteTask();
}