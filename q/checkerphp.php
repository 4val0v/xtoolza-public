<?
#error_reporting( E_ALL );
#ini_set('display_errors', 1);
#error_reporting(1);
ignore_user_abort(true);
set_time_limit(0);
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Результаты проверки сайтов на PHP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name ="robots" content="index, follow" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
</head>
<body id="linearBg1">
<?php
$filename=$_SERVER['DOCUMENT_ROOT'].'/sitemap.xml';?>
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
								<td><h1 class="jumbotron">Пакетная проверка сайтов PHP, версии PHP, вебсервера сайта</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/php.png" width="80" alt="Проверить PHP версию">
								 </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?
//titles
echo "<table border=\"1\" bordercolor=\"#CDC9C9\">
<tr>
	<td><b>URL</b></td>
	<td><b>Result</b></td>
	<td><b>PHP Version</b></td>
	<td><b>Server Frontend</b></td>
</tr>";
$plist = explode("\r\n",trim($_POST['textt']));

function result($plist) {
	foreach ($plist as $arraylist) {
		$arraylist = str_replace('http://','',$arraylist);
		$resrobots = $arraylist;
		$site = $arraylist . '/?=PHPB8B5F2A0-3C92-11d3-A3A9-4C7B08C10000'; //если включено expose_php=on
		echo "<tr><td style=\"word-break: break-all;\">".'<a href="http://'. $arraylist . '" target="_blank" >'.$arraylist.'</a>'. "</td>";
		echo "<td>"." ". parsphp($site). "<br /></td><td>"." ". getphpver($site)."</td><td>"." ".getserver($site)."</td></tr>";
		$log .= $arraylist . "|" . parsphp($site). "|" . getphpver($site) . "|" . getserver($site) . PHP_EOL;
		}
	echo "</table>";
	return $log;
}

$loger = result($plist);
function mylog($data) {
	$data = $data . PHP_EOL;
	file_put_contents('logs/phplogs.txt', $data);
}
mylog($loger);

function getphpver($host){
$headersArray = GetHeaders($host);
		if(!isset($headersArray)){
			return '';
		}
		foreach($headersArray as $h){
			if(stripos($h, 'X-Powered-By:') !== false){
			$loc = 'X-Powered-By:';
			return str_replace($loc,'',$h);
			}
		}
}

function getserver($host){
$headersArray = GetHeaders($host);
		if(!isset($headersArray)){
			return '';
		}
		foreach($headersArray as $s){
			if(stripos($s, 'Server:') !== false){
			$server = 'Server:';
			return str_replace($server,'',$s);
			}
		}

}

function GetHeaders($host){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $host);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		$result = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		$headers = substr($result,0,$info['header_size']-4);
		return preg_split('#\r\n#',$headers);
	}

function parsphp($site) {
	$arraylistscheme = parse_url($site);
	$url_host = $arraylistscheme['host'];
	if(mb_detect_encoding($url_host) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$site=$IDN->encode($url_host);
		}
	$rz = getpage($site);
	if (preg_match('/PHP Credits|X-Powered-By: PHP|Set-cookie: PHPSESSID|Server: Apache|wp-content\/themes/sei',$rz, $matched)){
		return 'TRUE';
		}
	// elseif (preg_match('/.php/sei', (getpage($site. '/robots.txt')), $resmatch)){
		// return 'TRUE';
		// }
	else return 'FALSE';
}


echo '</table><br><br><p color=\"green\">TRUE - Найдены признаки использования PHP</p><p color=\"red\">FALSE - Признаки использования PHP не найдены</p>';

//получить содержимое страницы
function getpage($a) {
	$ch = curl_init();
	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2062.124 Safari/537.36";
	curl_setopt($ch, CURLOPT_URL,$a);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSLVERSION, 3);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	$pagemeta = curl_exec($ch);
	curl_close($ch);
	return $pagemeta;
}

?>
<br /><a href="http://xtoolza.info/q/logs/phplogs.txt" download>Скачать результат</a><br />
<br>
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
</body>
</html>
