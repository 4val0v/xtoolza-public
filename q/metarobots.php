<?
ignore_user_abort(true);
set_time_limit(0);
header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex, follow" />
	<title>Meta robots Result. Результат проверки тега.</title>
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="/js/topbutton.js"></script>
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
								<td><h1 class="jumbotron">Проверка Meta name robots</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/metarobots.png" width="80" alt="Проверка Meta name robots"> </td>
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
echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>URL</b></td><td><b>Meta robots</b></td></tr>";
$plist = explode("\r\n",$_POST['textt']);

function result($plist){
	foreach ($plist as $arraylist) {
		$arraylist = str_replace('http://','',$arraylist);
		echo "<tr><td style=\"word-break: break-all;\">".'<a href="http://'. $arraylist . '" target="_blank" >'.$arraylist.'</a>'. "</td>";
		echo "<td>"." ". metarobots($arraylist). PHP_EOL . "\r\n" . "</td></tr>" ;
		$log .= $arraylist . " " . metarobots($arraylist) . PHP_EOL;
	}
	echo "</table>";
	return $log;
}

$loger = result($plist);
function mylog($data){
	$data = $data . PHP_EOL;
	file_put_contents('logs/robotslogs.txt', $data);
}
mylog($loger);

//проверим кодировку по мета-тегу
function metarobots($arraylist){
	if(mb_detect_encoding($arraylist) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$arraylist=$IDN->encode($arraylist);
		}
	$charrz = getmetapage($arraylist);
	if (preg_match('#<meta\s*name\s*=\s*["\']robots["\']\s*content\s*=\s*["\'](.*?)["\']\s*/?>#si',$charrz, $metamatch)){
		return $metamatch[1];
		}
	else return 'NOT FOUND';
}

function parsrobots($arraylist) {
	if(mb_detect_encoding($arraylist) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$arraylist=$IDN->encode($arraylist);
		}
	$tags = get_meta_tags($arraylist);
	$robots = $tags['robots'];
	echo $robots;
}

//получить содержимое страницы
function getmetapage($nadres){
	if(mb_detect_encoding($nadres) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$nadres=$IDN->encode($nadres);
		}
	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2062.124 Safari/537.36";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$nadres);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSLVERSION, 3);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	$pagemeta = curl_exec($ch);
	curl_close($ch);
	return $pagemeta;
}

?>
<br /><a href="http://xtoolza.info/q/logs/robotslogs.txt" download>Скачать результат</a><br />
<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
</body>
</html>
