<?php

$debug = 0;
if($debug === 1) {
    header("Content-Type: text/html; charset=utf-8");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}else{
    error_reporting( 0 );
}

//define('debug', '', true);
function debug_msg($msg){
    if(defined('debug')){
        echo "<!-- ".$msg." -->\n";
    }
}

function debug_dump_msg($obj){
    if(defined('debug')){
        echo "<!-- ";
        var_dump($obj);
        echo " -->";
    }
}

//-------------------

// домовская парсилка
if(function_exists('libxml_use_internal_errors')){
    libxml_use_internal_errors(true);
}

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(__FILE__) . DS);
if(isset($_GET['magiya']) && ($_GET['magiya']=='poyav1s')){
    echo "<pre>(⌐■_■)--︻╦╤─ - - -</pre>";
    exit();
}

require_once('Bootstrap.php');

$toolzaLogic = new ToolzaLogic();
$toolzaLogic->InitGlobalState();
$toolzaLogic->InitIoc();
$toolzaLogic->InitConfigsLazy();
$toolzaLogic->StartWork();

?>