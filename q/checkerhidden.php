<!DOCTYPE html>
<html>
<?// считываем текущее время
$start_time = microtime();
// разделяем секунды и миллисекунды (становятся значениями начальных ключей массива-списка)
$start_array = explode(" ",$start_time);
// это и есть стартовое время
$start_time = $start_array[1] + $start_array[0];
?>
<head>
	<meta name="robots" content="noindex,nofollow" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Результат выгрузки скрытых в {display:none} и visibility:hidden элементов со страниц</title>
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>
	
	<script type="text/javascript">
var check_preload;
function preload_page() {
  if(check_preload) {
    document.getElementById("total").style.visibility = "visible";
    document.getElementById("load").style.visibility = "hidden";
  }
}    
</script>
<style>
.letter1 {
color: red;
}
.letter2 {
color: green;
}
</style>


</head>
<body>

<?
header('Content-Type: text/html; charset=utf-8');

//данные из textarea через $_POST.
if ($_POST['textt'] != ''){
	echo "<h2>{display:none} & visibility:hidden Result</h2> <br />";
	}
else die('Поле должно быть заполнено!');  

//вывод в таблицу	
echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>URL</b></td><td><b>Статус</b></td><td></td></tr>"; 
$plist = explode("\r\n",$_POST['textt']); 

foreach ($plist as $arraylist) {
	$getpage = getpage($arraylist);
	preg_match_all ('|<h1(.*)</h1>|isU', $getpage, $content, PREG_SET_ORDER);
	foreach ($content as $contentlist) {
		echo "<tr><td>".'<a href="http://'. $arraylist . '" target="_blank" >'.$arraylist.'</a>'. "</td>";
		echo "<td>&lt;h1".encoding($contentlist['1']) . "&lt;/h1&gt;</td>";
		echo "</tr>";
		}
}

foreach ($plist as $arraylist) {
	$getpage = getpage($arraylist);
	preg_match_all ('|<h1(.*)</h1>|isU', $getpage, $content, PREG_SET_ORDER);
	foreach ($content as $contentlist) {
		echo "<tr><td>".'<a href="http://'. $arraylist . '" target="_blank" >'.$arraylist.'</a>'. "</td>";
		echo "<td>&lt;h1".encoding($contentlist['1']) . "&lt;/h1&gt;</td>";
		echo "</tr>";
		}
}

//проверим статусы
function proverit_dostupnost_saita($arraylist) {
  $result = array(
    'kod_http' => 'не удалось определить',
    'dostupen' => false
  );
  $user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:16.0) Gecko/20100101 Firefox/16.0";
  $temp = curl_init();
  curl_setopt($temp, CURLOPT_URL,$arraylist);
  curl_setopt($temp, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($temp, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($temp, CURLOPT_VERBOSE, false);
  curl_setopt($temp, CURLOPT_TIMEOUT, 5);
  curl_setopt($temp, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($temp, CURLOPT_SSLVERSION, 3);
  curl_setopt($temp, CURLOPT_SSL_VERIFYHOST, false);
  $page = curl_exec($temp);
  //print curl_error($temp);
  $result = curl_getinfo($temp, CURLINFO_HTTP_CODE);
  curl_close($temp);
  return $result;
}


?>
<br /><a href="http://xtoolza.info/q/logs/404logs.txt" download>Скачать результат</a><br />
<br />
<form class="btn">
<input type="button" border="0" value="Назад" onClick="history.back()">
</form>&nbsp;&nbsp;&nbsp;
<!--form class="btn"-->
<!--input type="button" border="0" value="Помощь" onclick="location.href='http://www.xtoolza.info/q/help.php'"-->
<!--/form-->
<div style="text-align: center; bottom:10px; position: relative;">
<?   //generate time
$end_time = microtime();
$end_array = explode(" ",$end_time);
$end_time = $end_array[1] + $end_array[0];
// вычитаем из конечного времени начальное
$time = $end_time - $start_time;
// выводим в выходной поток (броузер) время генерации страницы
printf("Страница сгенерирована за %f секунд",$time);
?>
</div>
</body>
</html>