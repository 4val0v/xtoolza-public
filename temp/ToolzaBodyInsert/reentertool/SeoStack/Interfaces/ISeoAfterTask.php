<?php

/**
 * Interface ISeoAfterTask
 */
interface ISeoAfterTask {
    /**
     * @param PageWrapper $pageWrapper
     * @return PageWrapper
     */
    function TryExecuteTaskOnContext($pageWrapper);
}