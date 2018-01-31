<!DOCTYPE html>
<html>
<?
ignore_user_abort(true);
set_time_limit(0);
?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="noindex, follow" />
    <title>Результат проверки сайта на наличие Jivosite</title>
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
</head>
<body id="linearBg1">
<?
header('Content-Type: text/html; charset=utf-8');
if ($_POST['textt'] != ''){
	echo "<h2 class='jumbotron'>Результаты проверки на наличие кода Jivosite</h2> <br />";
	}
else die('Поле должно быть заполнено!');
echo
"<table border=\"1\" bordercolor=\"#CDC9C9\">
<tr>
	<td><b>URL</b></td>
	<td><b>JivoCode</b></td>

</tr>";
$plist = explode("\r\n",$_POST['textt']);
foreach ($plist as $narray) {
	$narray = preg_replace('~^(http://)|(https://)~i', '', $narray, 1); //отрезаем http или https, чтобы не выводить страницу на экран
		// var_dump($narray); для дебага кривых сайтов
	echo "<tr><td>".'<a href="http://'.$narray.'" target="_blank">'.$narray."</a></td>";
	echo "<td>"." ". parsjivo($narray). "<br /></td></tr>";
	}
echo "</table>";

function parsjivo($website) { //ищем совпадения в коде страницы
    $rz = getmetapage($website);
	if (preg_match_all('/(code.jivosite.com)/i',$rz, $matched)){
		$repcharset = $matched[1];
		return 'найден';
	}
	else return 'не найден';
}

//получить содержимое страницы
function getmetapage($nadres){
  $ch = curl_init();
  $user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2062.124 Safari/537.36";
  curl_setopt($ch, CURLOPT_URL,$nadres);
  curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_VERBOSE, false);
  curl_setopt($ch, CURLOPT_TIMEOUT, 5);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_SSLVERSION, 3);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

  $page = curl_exec($ch);
  curl_close($ch);
  return $page;
}

?>
<br />
<form class="btn">
<input type="button" border="0" value="Назад" onClick="history.back()">
</form>&nbsp;&nbsp;&nbsp;

</body>
</html>
