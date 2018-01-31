<html>
<?
ignore_user_abort(true);
set_time_limit(0);
?>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex, follow" />
	<title>Результат выгрузки ссылок из CSV</title>
	<link href="/q/style.css" rel="stylesheet"/>
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
	<link href="/q/css.css" rel="stylesheet"/>
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
								<td><h1 class="jumbotron">Результат выгрузки ссылок из CSV</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/url.png" width="80" alt="Результат выгрузки ссылок из csv"></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<table border="1" bordercolor="#CDC9C9">
	<tr><td>URL</td><td>Статус</td></tr>
<?
header('Content-Type: text/html; charset=utf-8');

$contents = $_GET['site'];
function result($contents) {
	$a = getpage($contents);
	$a = str_replace("<![CDATA[","",$a);
	$a = str_replace("]]>","",$a);
	// var_dump($a);
	$csv = array_map('str_getcsv', file($contents));
	foreach ($csv as $inner) {
		echo "<tr><td>".$inner[3]."</td><td>".proverit_dostupnost_saita(strip_tags($inner[3]))."</td></tr>";
		$log .=  ($inner[3]) . ' '.proverit_dostupnost_saita(strip_tags($inner[3])). PHP_EOL;
	}
	// echo 'Найдено: <b>'.count($inner[3]) . '</b> url';
}

$loger = result($contents);
function mylog($data){
	$data = $data . PHP_EOL;
	file_put_contents('/var/xtoolza.info/q/logs/feedurl.txt', $data);
}
mylog($loger);

//получить содержимое страницы
function getpage($contents){
	if(mb_detect_encoding($contents) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$contents=$IDN->encode($contents);
		}
	$ch = curl_init();
	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2062.124 Safari/537.36";
	curl_setopt($ch, CURLOPT_URL,$contents);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSLVERSION, 3);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

//проверим статусы
function proverit_dostupnost_saita($arraylist) {
	if (!preg_match('|^http:.*|i',$arraylist)){
		$arraylist = 'http://'.$arraylist;
		}
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
	curl_setopt($temp, CURLOPT_SSL_VERIFYPEER, 0);
	// curl_setopt($temp, CURLOPT_SSLVERSION, 3);
	curl_setopt($temp, CURLOPT_FOLLOWLOCATION, 0);
	curl_setopt($temp, CURLOPT_SSL_VERIFYHOST, 0);
	$page = curl_exec($temp);
	$result = curl_getinfo($temp, CURLINFO_HTTP_CODE);
	curl_close($temp);
	return $result;
}

?>
</table>
<br /><a href="http://xtoolza.info/q/logs/feedurl.txt" download>Скачать результат</a><br />
<br>
<a href="http://xtoolza.info/q/map_sait/unloadsitemaplinks/tags.php">Выгрузить содержимое произвольных тегов из xml</a> <br><br>
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
</body>
</html>
