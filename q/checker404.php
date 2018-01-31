<? header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Результат проверки 404 статуса</title>
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<meta name="robots" content="noindex, follow" />
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
</head>
<body id="linearBg1">
<div style="align:left;">
	<table>
		<tbody>
			<tr>
				<td>
					<div class="TmgWrae">
						<a href="http://xtoolza.info" rel="nofollow"><img class="image UE" src="http://xtoolza.info/q/images/logo.png" width="120px" border="0" width="120px"><img class="image Dowe" src="http://xtoolza.info/q/images/logo_new.png" width="120px" /></a>
					</div>
				</td>
				<td>
					<table>
						<tbody>
							<tr>
								<td><h1 class="jumbotron">Проверить 404 статус код сайта</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/404.png" width="80" alt="Проверить 404 статус код сайта"></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?
//вывод в таблицу
echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>URL</b></td><td><b>Статус</b></td><td></td></tr>";
$plist = explode("\r\n",trim($_POST['textt']));

function results($plist) {
	foreach ($plist as $arraylist) {
		$newlist = $arraylist."/asd32r3fazv342t2tvsdvs.html";
		$newlist = str_replace('http://','',$newlist);
		$narray = preg_replace('~^(?!https??://)~i', 'http://', $newlist, 1);;
		echo "<tr><td style=\"word-break: break-all;\">".'<a href="http://'. $newlist . '" target="_blank" >'.$newlist.'</a>'. "</td>";
		echo "<td>"." ". proverit_dostupnost_saita($narray) ."</td><td>". okornot($narray) . "</td></tr>";
		$log .= $arraylist . " " . proverit_dostupnost_saita($narray). " " . okornot($narray) . PHP_EOL;
	}
	echo "</table>";
	return $log;
}

function okornot($arraylist){
	if (proverit_dostupnost_saita($arraylist) == '404') {
		return 'OK';
		} else {
		return 'False';
	}
}

$loger = results($plist);
function mylog($data){
	$data = $data . PHP_EOL;
	file_put_contents('logs/404logs.txt', $data);
}
mylog($loger);

//проверим статусы
function proverit_dostupnost_saita($arraylist) {
	$arraylistscheme = parse_url($arraylist);
	$url_host = $arraylistscheme['host'];
	if(mb_detect_encoding($url_host) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$arraylist=$IDN->encode($url_host);
		}
	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2062.124 Safari/537.36";
	$temp = curl_init();
	curl_setopt($temp, CURLOPT_URL,$arraylist);
	curl_setopt($temp, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($temp, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($temp, CURLOPT_VERBOSE, false);
	curl_setopt($temp, CURLOPT_TIMEOUT, 5);
	curl_setopt($temp, CURLOPT_SSL_VERIFYPEER, false);
	// curl_setopt($temp, CURLOPT_SSLVERSION, 3);
	curl_setopt($temp, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($temp, CURLOPT_FOLLOWLOCATION, true);
	$page = curl_exec($temp);
	$result = curl_getinfo($temp, CURLINFO_HTTP_CODE);
	curl_close($temp);
	return $result;
}
?>
<br /><a href="http://xtoolza.info/q/logs/404logs.txt" download>Скачать результат</a><br />
<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
</body>
</html>
