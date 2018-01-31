<?php


#error_reporting( E_ALL );
#ini_set('display_errors', 1);

error_reporting(0);

// домовская парсилка
if(function_exists('libxml_use_internal_errors')){
    libxml_use_internal_errors(true);
}

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(__FILE__) . DS);

if(isset($_GET['magiya']) && ($_GET['magiya']=='poyav1s')){
    echo "<pre>(╯°□°)--︻╦╤─ - - - </pre>";
    exit();
}

require_once('Bootstrap.php');

$toolzaLogic = new ToolzaLogic();
$toolzaLogic->InitGlobalState();
$toolzaLogic->InitIoc();
$toolzaLogic->InitConfigsLazy();
$toolzaLogic->StartWork();

?>