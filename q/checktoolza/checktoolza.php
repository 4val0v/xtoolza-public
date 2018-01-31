<!DOCTYPE HTML>
<html>
<?
Header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); //Дата в прошлом
Header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
Header("Pragma: no-cache"); // HTTP/1.1
Header("Last-Modified: ".gmdate("D, d M Y H:i:s")."GMT");
// error_reporting( E_ALL );
// ini_set('display_errors', 1);
ignore_user_abort(true);
set_time_limit(0);
?>
<head>
	<title>стоит ли на сайте toolza</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex, follow" />
	<link href="/q/style.css" rel="stylesheet"/>
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
</head>
<body id="linearBg1">

<?header('Content-Type: text/html; charset=utf-8');?>
<div style="align:left;">
	<table>
		<tbody>
			<tr>
				<td>
					<a href="http://xtoolza.info" rel="nofollow"><img src="http://xtoolza.info/q/images/logo.png" width="120px"></a>
				</td>
				<td>
					<table>
						<tbody>
							<tr>
								<td><h1 class="jumbotron">стоит ли на сайте toolza</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/magiya_poyav1s.png" width="80" alt="стоит ли на сайте toolza"></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?
//выводим таблицу с результатом
echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>URL</b></td><td><b>Toolza?</b></td></tr>";
$plist = explode("\r\n",trim($_POST['textt']));

function result($plist) {
	foreach ($plist as $arraylist) {
		$arraylister = str_replace('http://','',$arraylist);
		if (!stripos($arraylist,'http://')){
			// echo $arraylist .'<br />';
			$arraylist = 'http://'.$arraylist . "/?magiya=poyav1s";
		} else $arraylist = $arraylist."/?magiya=poyav1s";
		$log .= $arraylist . " " . checktoolza($arraylist) . PHP_EOL;
		echo "<tr><td style=\"word-break: break-all;\">".'<a href="http://'. $arraylist . '" target="_blank" >'.$arraylist.'</a>'. "</td>";
		echo "<td>"." ". checktoolza($arraylist) ."<br /></td></tr>";
		}
	echo "</table>";
	return $log;
}


function checktoolza($arraylist){
	$getpage = file_get_contents($arraylist);
	if (preg_match ('|.*<\(__\)>.*|ism',$getpage)){
		return 'Yes';
	} else return 'No';
}

$loger = result($plist);
function mylog($data){
	$data = $data . PHP_EOL;
	file_put_contents('/var/xtoolza.info/q/logs/toolzalogs.txt', $data);
}
mylog($loger);



function getpage($nadres){
	$arraylistscheme = parse_url($nadres);
	$url_host = $arraylistscheme['host'];
	if(mb_detect_encoding($url_host) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$nadres=$IDN->encode($url_host);
		}
		// var_dump($url_host);
	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2062.124 Safari/537.36";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$nadres);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// curl_setopt($ch, CURLOPT_SSLVERSION, 3);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	$pagemeta = curl_exec($ch);
	curl_close($ch);
	return $pagemeta;
}

?>
<br /><a href="http://xtoolza.info/q/logs/toolzalogs.txt" download>Скачать результат</a><br />
<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a><br><br>

<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
</body>
</html>
