<!DOCTYPE HTML>
<? header('Content-type: text/html; charset=utf-8');
ini_set('display_errors', E_ALL);
error_reporting(1);
set_time_limit(0);
ignore_user_abort(true);
?>
<html>
<head>
	<title>Получить количество страниц в индексе и количество внешних ссылок на сайт</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex, follow" />
	<link href="/q/style.css" rel="stylesheet"/>
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
								<td><h1 class="jumbotron">Получить количество страниц в индексе и количество внешних ссылок на сайт</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/analysis.png" width="80" alt="Получить количество страниц в индексе и количество внешних ссылок на сайт"></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?
include_once('idna_convert.class.php');
function converttopuny($host) {
	$idn = new idna_convert(array('idn_version'=>2008));
	$punycode=isset($_REQUEST['punycode']) ? stripslashes($_REQUEST['punycode']) : '';
	$punycode=(stripos($punycode, 'xn--')!==false) ? $idn->decode($punycode) : $idn->encode($punycode);
	return $punycode;
	}

echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>site</b></td><td><b>страниц в индексе</b></td><td><b>Внешних ссылок</b></td><td><b>Исходящих ссылок</b></td></tr>";
$hosts = explode("\r\n",$_POST['site']);
sitecheck($hosts);
function sitecheck($hosts){
	foreach ($hosts as $host) {
		$linkpad = 'http://xml.linkpad.ru/?url=http://'.$host;
		$linkpadinfo = getmetapage($linkpad);
		$dom = new domDocument;
		$dom->loadXML($linkpadinfo);
		if (!$dom){
			echo "error import data<br />";
			exit;
		}

		echo '<tr>';
		echo "<td><b><a href='http://$host' target='_blank'>".$host."</a></b></td>";
		$rez = simplexml_import_dom($dom);
		echo '<td>'.$rez->index.'</td>';
		echo '<td>'.$rez->hin.'</td>';
		echo '<td>'.$rez->hout.'</td>';
		$date = preg_match('|date=\"(.*)\"|/sU',$linkpadinfo);
		echo $date;
		// var_dump($linkpadinfo);
		echo '</tr>';
	}
}
?>
</table>
<?
function getmetapage($nadres){
	if(mb_detect_encoding($nadres) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$nadres=$IDN->encode($nadres);
		}
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
	$linkpadinfo = curl_exec($ch);
	curl_close($ch);
	return $linkpadinfo;
}
?>
<br />
<span>*по данным linkpad</span>
<br />
<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
