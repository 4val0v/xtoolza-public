<?
// error_reporting( E_ALL );
ini_set('display_errors', 1);
ini_set("max_execution_time", "1200");
include_once('pclzip.lib.php');
$archive = new PclZip('archive.zip');
$result = $archive->create('data/context.jpg'); // Этим методом класса мы создаём архив с заданным выше названием 
var_dump($result); // Если всё прошло хорошо, возращаем массив с данными (время создание архива, занесённым файлом и т.д)
if($result == 0) {
echo $archive->errorInfo(true); //Возращает причину ошибки
}
$from="http://xtoolza.info/";  #откуда будем тягать картинки
$str = file_get_contents ($from); #парсим страницу
preg_match_all ("!<img.*?src=\"?'?([^ \"'>]+)\"?'?.*?>(.*?)>!is", $str, $ok); #тянем все что связано с ссылками
for ($i=0; $i<count($ok[1]); $i++) { #с какой ссылки начинаем (0 - первая)
    $url= $ok[1][$i]; #относит. url файла, т.к. в запрашиваемой странице url вида <a href="0001.jpg"> ( $url= $from.$ok[1][$i];  - для относительных
	// echo $url.'<br />';
	
    $destination_folder="data"; #указываем куда сохранять картинки
    $filename = (($pos = strrpos($url, '/')) !== false)?substr($url, $pos + 1):$url; #обрезаем url до имя_файла.расширение
	// echo $destination_folder.$filename;
    if (!copy($url, $destination_folder.'/'.$filename)) { #копируем
       echo "<br />не удалось скопировать $filename...";
       }else echo '<br />Файл '.$url.' cкопирован'; #вывод отчета
    }
?>