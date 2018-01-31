<?php

interface ISeoBeforeTask {
    /**
     * @return SeoTaskContext
     */
    function TryGetTaskContext();
}