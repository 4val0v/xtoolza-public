<?php
$ftp_server="a48785.ftp.mchost.ru";
$ftp_name="a48785_1";
$ftp_pass="0d1Hn77YyH";
$connect = @ftp_connect($ftp_server);
$soedine = @ftp_login($connect, $ftp_name, $ftp_pass);

$dir = "/";
// Запускаем сканер 
scan_ftp($connect, $dir); 
// Закрываем соединение с FTP-сервером 
ftp_close($connect); 
// Результат находится в глобальном массиве $filename 
echo "<pre>"; 
$foul=$filename['poiskkorendir.txt'];
echo "Корневая папка сайта: ".str_replace('/robots.txt', '', $foul);
echo "</pre>"; 
//////////////////////////////////////////////////////// 
// Рекурсивная функция спуска по дереву 
// директорий 
//////////////////////////////////////////////////////// 
function scan_ftp($connect, $dir) 
{ 
GLOBAL $filename; 
// Получаем все файлы корневого каталога 
// Дескриптор соединения $link получен в config.php 
$file_list = ftp_rawlist($connect, $dir); 
// Выводим содержимое каталога 
foreach($file_list as $file) 
{ 
// Разбиваем строку по пробельным символам 
list($acc, 
$bloks, 
$group, 
$user, 
$size, 
$month, 
$day, 
$year, 
$file) = preg_split("/[\s]+/", $file); 
// Если файл начинается с точки - игнорируем его 
if(substr($file, 0, 1) == '.') continue; 
// Определяем является ли объект директорией 
if(substr($acc, 0, 1) == 'd') 
{ 
// Директория 
scan_ftp($connect, $dir.$file."/"); 
} 
// Определяем является ли объект файлом 
if(substr($acc, 0, 1) == '-') 
{ 
// Файл 
$filename[$file] = $dir.$file; 
} 
} 
} 
?>