<?
	error_reporting( E_ALL ); //отображаем только значительные ошибки
	ini_set('display_errors', 1); //не показываем ошибки





function bk($fileName, $htontent){
$htaccess = '.htaccess';
$htcontent = file_get_contents($htaccess);
$fileName = '.ht_back';
	if (file_put_contents($fileName, $htcontent) === false){
		echo 'not';
	} else echo 'ok';
}
bk();
?>