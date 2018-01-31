<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="noindex, follow" />
    <title>Результат выгрузки ссылок из sitemap.xml</title>
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
</head>
<body id="linearBg1">
<?
// error_reporting( E_ALL );
// ini_set('display_errors', 1);
?>
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
								<td><h1 class="jumbotron">Результат выгрузки ссылок из sitemap.xml</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/url.png" width="80" alt="Результат выгрузки ссылок из sitemap.xml"></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<table border="1" bordercolor="#CDC9C9">
	<tr><td>URL</td></tr>
<?
header('Content-Type: text/html; charset=utf-8');
//тащим ссылки, показываем
$contents = $_GET['site'];
function result($contents) {
	$a = getpage($contents);
	preg_match_all('|<loc>(.*)</loc>|i', $a, $links, PREG_SET_ORDER);
	// var_dump($links);
	echo 'Найдено: <b>'.count($links) . '</b> url';
	foreach ($links as $link) {
		$log .=  ($link['1']) . PHP_EOL;
		echo "<tr><td>".($link['1']) . "</td></tr>";
		}
	echo '</table>';
	return $log;
}

$loger = result($contents);
function mylog($data){
    $data = $data . PHP_EOL;
	file_put_contents('/var/xtoolza.info/q/logs/sitemaplinkslog.txt', $data);
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
?>
</table>
<br /><a href="http://xtoolza.info/q/logs/sitemaplinkslog.txt" download>Скачать результат</a><br />
<br>
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
<? include ('../../../yandex_metrika.php'); ?>
</body>
</html>
