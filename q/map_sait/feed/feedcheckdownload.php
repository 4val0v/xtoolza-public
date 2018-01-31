<?
$data = $_POST['param'];
$filename = $_SERVER['DOCUMENT_ROOT'].'/feed/csvresult.csv';
$file = file_put_contents($filename, $data);
?>
