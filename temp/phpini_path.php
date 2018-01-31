<?php
$inipath = php_ini_loaded_file();

if ($inipath) {
    echo 'Загруженный php.ini: ' . $inipath;
} else {
    echo 'Файл php.ini не загружен';
}
?>