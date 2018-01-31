<!DOCTYPE HTML>
<html>
<?
header('Content-Type: text/html; charset=utf-8');
error_reporting( E_ALL );
ini_set('display_errors', 1);
$start_time = microtime();
$start_array = explode(" ",$start_time);
$start_time = $start_array[1] + $start_array[0];
ignore_user_abort(true);
set_time_limit(0);
	include('simple_html_dom.php');
?>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex, follow" />
	<title>Результаты проверки хостингов</title>
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
								<td><h1 class="jumbotron">Проверка хостинга сайта</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/hosting.png" width="80" alt="Проверка хостинга сайта"> </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?
echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>Site</b></td><td><b>Hosting</b></td></tr>";
$plist = explode("\r\n",trim($_POST['textt']));

// function result($plist) {
// 	foreach ($plist as $arraylist) {
// 		$narray = preg_replace('~^(?!https??://)~i', 'http://', $arraylist, 1);
// 		$arraylist = str_replace('http://','',$arraylist);
// 		echo "<tr><td style=\"word-break: break-all;\">".'<a href="http://'. $arraylist . '" target="_blank" >'.$narray.'</a>'. "</td>";
// 		echo "<td>"." ". gethost($narray) . "</td></tr>";
// 		$log .= $arraylist . " " . gethost($narray) . PHP_EOL;
// 		}
// 	echo "</table>";
// 	return $log;
// }

// echo file_get_contents('http://www.whoishostingthis.com/?q=esmtools.ru');

// $loger = result($plist);
// function mylog($data){
// 	$data = $data . PHP_EOL;
// 	file_put_contents('logs.txt', $data);
// }
// mylog($loger);

$domain = $narray;
// function gethost($one) {
// 	$xml = file_get_contents('http://www.whoishostingthis.com/?q='.$one);
// 	if (preg_match('|</span> is hosted by  (.+?)</span>|is', $xml, $links)) {
// 		return strip_tags($links[1]);
// 	}
// }

$rets = getmetapage('http://www.whoishostingthis.com/?q=esmtools.ru');
var_dump($rets);


// function gethost($one) {
// 	$html = file_get_html($one);
// 	var_dump($html);
// 	foreach ($html->find('span[class=normal blue]') as $element) {
// 		echo $element;
// 	}
// }


// // Find all images
// foreach($html->find('img') as $element)
//        echo $element->src . '<br>';

// // Find all links
// foreach($html->find('a') as $element)
//        echo $element->href . '<br>';
// }

//получить содержимое страницы
function getmetapage($nadres){
	$arraylistscheme = parse_url($nadres);
	$url_host = $arraylistscheme['host'];
	if(mb_detect_encoding($url_host) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$nadres=$IDN->encode($url_host);
		}
	$ch = curl_init();
	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2062.124 Safari/537.36";
	curl_setopt($ch, CURLOPT_URL,$nadres);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// curl_setopt($ch, CURLOPT_SSLVERSION, 3);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	$pagemeta = curl_exec($ch);
	curl_close($ch);
	return $pagemeta;
}



?>
<br /><a href="http://xtoolza.info/q/hosting/logs.txt" download>Скачать результат</a><br />
<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
