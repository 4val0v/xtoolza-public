<?php
function GlobRecursive($pattern, $flags) {
    $files = array_filter(glob($pattern, GLOB_MARK), 'is_dir');
    foreach ($files as $dir) {
        $files = array_merge($files, GlobRecursive($dir . DS . '*', $flags));
    }
    return $files;
}

function __autoload($className) {
    // spl > 5.1.2
    static $allCatalogs = array();
    if (empty($allCatalogs)) {
        $allCatalogs = GlobRecursive('*', GLOB_MARK);
        // var_dump($allCatalogs); exit();
        array_push($allCatalogs, '');
    }

    foreach ($allCatalogs as $catalog) {
        if (file_exists($catalog  . $className . '.php')) {
            require_once($catalog  . $className . '.php');
            return;
        }
    }
}