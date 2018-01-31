<!DOCTYPE HTML>

<html>
<head>
	<title>Sitemap Checker Result. Результат проверки sitemap.xml</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex, follow" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
</head>
<body id="linearBg1">
<?php
ignore_user_abort(true);
set_time_limit(0);
header('Content-Type: text/html; charset=utf-8');
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
								<td><h1 class="jumbotron">Результат проверки наличия страниц в карте сайта sitemap.xml</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/sitemap.png" width="80" alt="Результат проверки наличия страниц в карте сайта sitemap.xml"> </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?
$plist = explode("\r\n",$_POST['textt']);
$site = trim($_POST['site']); //заодно отрежем пробелы
$siteh3 = str_replace('http://','',trim($_POST['site']));
echo '<h3>'.'<a href="http://'.$siteh3.'" target="_blank">'.$site.'</a>'.'</h3>';
echo "<table border=\"1\" bordercolor=\"#CDC9C9\ width=\"100%\"><tr><td><b>URL</b></td><td><b>Есть ли в карте сайта?</b></td></tr>";


function result1($plist) {
$site = trim($_POST['site']);
$a = POSTpage($site);
	foreach ($plist as $arraylist) {
		//обрезаем www.
		if (preg_match ('/(?:[^:]*:\/\/)?(?:www)?\.?([^\/]+\.[^\/]+.*)/i',$arraylist,$h)) {
			$host = $h[1];
		}
		//сравниваем
		$pos = strpos((trim(strtolower($a))), (trim(strtolower($host))));
		$check = ($pos === false) ? 'Нет' : 'Да';
		echo "<tr><td style=\"word-break: break-all;\">".'<a href="http://'.$host.'" target="_blank">'.$host.'</a>'."</td>";
		echo "<td>" . $check . "</td></tr>";
		$log .= $host . " " . $check . PHP_EOL;
	}
	return $log;
	}

$loger = result1($plist);
function mylog($data){
	$data = $data . PHP_EOL;
	file_put_contents('logs/sitemaplogs.txt', $data);
	}
mylog($loger);


echo '</table>';

//получить содержимое страницы
function POSTpage($nadres){
	$ch = curl_init();
	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2062.124 Safari/537.36";
	curl_setopt($ch, CURLOPT_URL,$nadres);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSLVERSION, 3);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	$pagemeta = curl_exec($ch);
	curl_close($ch);
	return $pagemeta;
}

?>
<br /><a href="http://xtoolza.info/q/logs/sitemaplogs.txt" download>Скачать результат</a><br />
<br>
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
</body>
</html>
