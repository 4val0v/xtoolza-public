<?php

/**
 * Class IndexFiles
 * @deprecated
 */
class IndexFiles{

    /**
     * @var IndexFilesFactory
     */
    private $_indexFilesFactory;

    /**
     * @param IndexFilesFactory $indexFilesFactory
     */
    function __construct($indexFilesFactory){
        $this->_indexFilesFactory = $indexFilesFactory;
    }

    /**
     * @param String $type
     * @return LoopbackWorkModel|null
     */
    public function DoIndexFiles($type){
        $indexFile = $this->_indexFilesFactory->GetInstance($type);
        if($indexFile === null){
            return null;
        }
        $result = $indexFile->_class->{$indexFile->_func}();
        return $result;
    }
}