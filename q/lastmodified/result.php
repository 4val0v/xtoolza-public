<!DOCTYPE HTML>
<html>
<?
ignore_user_abort(true);
set_time_limit(0);
?>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex, follow" />
	<title>Результаты проверки заголовков Last-Modified</title>
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<link href="http://xtoolza.info/css/colorchange.css" rel="stylesheet"/>
	<script src="../js/topbutton.js"></script>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
</head>
<body id="linearBg1">
<?header('Content-Type: text/html; charset=utf-8');?>
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
							<td><h1 class="jumbotron">Результаты проверки заголовков Last-Modified</h1></td>
						</tr>
						<tr>
							<td><img src="LastModified.png" width="75" alt="Результаты проверки заголовков Last-Modified"> </td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
<?
echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>URL</b></td><td><b>Last-Modified</b></td></tr>";
$plist = explode("\r\n",trim($_POST['textt']));

function result($plist)  {
	foreach ($plist as $arraylist) {
		$arraylist = str_replace('http://','',$arraylist);
		echo "<tr><td style=\"word-break: break-all;\">".'<a href="http://'. $arraylist . '" target="_blank" >'.$arraylist.'</a>'. "</td>";
		echo "<td>"." ". encode($arraylist) ."<br /></td></tr>";
		$log .= $arraylist . " " . encode($arraylist) . PHP_EOL;
	}
	echo "</table>";
	return $log;
}

$loger = result($plist);
function mylog($data){
	$data = $data . PHP_EOL;
	file_put_contents('../logs/lastmodified.txt', $data);
}
mylog($loger);

//проверим серверную кодировку
function encode($arraylist) {
	if(mb_detect_encoding($arraylist) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$arraylist=$IDN->encode($arraylist);
		}
	$rz = getpage($arraylist);
	if (preg_match('|Last-Modified(.*?)\r\n|i',$rz, $matched)){
		return $matched[1];
	}
	else return 'NULL';
}


//получить содержимое страницы+заголовок
function getpage($adres){
	if (!preg_match('|^http:.*|i',$adres)){
	$adres = 'http://'.$adres;
		}
	$arraylistscheme = parse_url($adres);
	$url_host = $arraylistscheme['host'];
	if(mb_detect_encoding($url_host) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$adres=$IDN->encode($adres);
		}
	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2062.124 Safari/537.36";
	$temp = curl_init();
	curl_setopt($temp, CURLOPT_URL,$adres);
	curl_setopt($temp, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($temp, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($temp, CURLOPT_VERBOSE, false);
	curl_setopt($temp, CURLOPT_TIMEOUT, 5);
	curl_setopt($temp, CURLOPT_SSL_VERIFYPEER, false);
	// curl_setopt($temp, CURLOPT_SSLVERSION, 3);
	curl_setopt($temp, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($temp, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($temp, CURLOPT_HEADER, 1);
	$page = curl_exec($temp);
	curl_close($temp);
	return $page;
}
?>
<br /><a href="http://xtoolza.info/q/logs/last-modified.txt" download>Скачать результат</a><br />
<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
<table>
	<tr>
		<td>
			<a class="btn" href="http://xtoolza.info/q/lastmodified/" title="Проверить заголовок Last-Modified" style="width:330px"><img class="transition-scale" src="http://xtoolza.info/q/images/charset.png" width="80" title="Проверить заголовок Last-Modified" alt="Проверить заголовок Last-Modified">Проверить заголовок Last-Modified</a>
		</td>
	</tr>
</table>
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
</body>
</html>
