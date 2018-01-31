<html>
<?// считываем текущее время
$start_time = microtime();
// разделяем секунды и миллисекунды (становятся значениями начальных ключей массива-списка)
$start_array = explode(" ",$start_time);
// это и есть стартовое время
$start_time = $start_array[1] + $start_array[0];
?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Links Check Result</title>
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
<h2>Links Check Result:</h2>
<table border="1" bordercolor="#CDC9C9">
<tr><td>URL</td><td>External?</td></tr>
<?
header('Content-Type: text/html; charset=utf-8');
//тащим ссылки, показываем
$contents = "http://yandex.ru/";
$a = getpage($contents);
preg_match_all('/href="([^"]+)"/', $a, $links);
foreach($links[1] as $key => $uri) {
	$newlink = uri2absolute($uri,$contents);
	echo '<tr><td>';
	echo '<a href="'. $newlink.'">'. $newlink.'</a>'.'<br/>' ;
	echo '</td></tr>';
/*	$domain = 'http://'.getdomain($newlink);
	$urldatadomain = parse_url($domain);
	$urldatanewlink = parse_url($newlink);
	$urldatacontents = parse_url($contents);
	if ($urldatanewlink[host] === $urldatacontents[host]) {
		echo "false";
	}
	else {
		echo "true"; 
	};

	// echo getdomain($newlink);
	echo '</td></tr>';
	*/
}

//получить имя хоста из URL

function getdomain($arraylist) {
	preg_match("/^(http:\/\/)?([^\/]+)/i", $arraylist, $matches);
	$host = $matches[2];
	return $host;
	preg_match("/[^\.\/]+\.[^\.\/]+$/",$host,$matches);
	// echo "domain name is: ".$matches[0]."\n";
	$dm = $matches[0];
	return $dm;
}


//преобразование ссылок к абсолютному виду ($link - ссылка, $base - домен)
function uri2absolute($link, $base)
		{
	if (!preg_match('~^(http://[^/?#]+)?([^?#]*)?(\?[^#]*)?(#.*)?$~i', $link.'#', $matchesLink)) {
	return false;
	}
	if (!empty($matchesLink[1])) {
	return $link;
	}
	if (!preg_match('~^(http://)?([^/?#]+)(/[^?#]*)?(\?[^#]*)?(#.*)?$~i', $base.'#', $matchesBase)) {
	return false;
	}
	if (empty($matchesLink[2])) {
		if (empty($matchesLink[3])) {
			return 'http://'.$matchesBase[2].$matchesBase[3].$matchesBase[4];;
		}
		return 'http://'.$matchesBase[2].$matchesBase[3].$matchesLink[3];
	}
	$pathLink = explode('/', $matchesLink[2]);
	if ($pathLink[0] == '') {
		return 'http://'.$matchesBase[2].$matchesLink[2].$matchesLink[3];
	}
	$pathBase = explode('/', preg_replace('~^/~', '', $matchesBase[3]));
	if (sizeOf($pathBase) > 0) {
		array_pop($pathBase);
	}
	foreach ($pathLink as $p) {
		if ($p == '.') {
			continue;
		} elseif ($p == '..') {
			if (sizeOf($pathBase) > 0) {
				array_pop($pathBase);
			}
		} else {
			array_push($pathBase, $p);
		}
	}
	return 'http://'.$matchesBase[2].'/'.implode('/', $pathBase).$matchesLink[3];
	}
	
//получить содержимое страницы
function getpage($contents){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$contents);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSLVERSION, 3);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
	}
?>
</table>
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