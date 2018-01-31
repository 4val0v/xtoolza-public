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
	<title>Result Status Code Checker. Результат проверки статус кодов.</title>
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
								<td><h1 class="jumbotron">Результат проверки статус кодов страниц</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/statuscode.png" width="80" alt="Результат проверки статус кодов страниц"> </td>
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
echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>URL</b></td><td><b>Статус</b></td><td><b>Location</b></td></tr>";
$plist = explode("\r\n",trim($_POST['textt']));

function result($plist) {
	foreach ($plist as $arraylist) {
		$arraylister = str_replace('http://','',$arraylist);
		$log .= $arraylist . " " . proverit_dostupnost_saita($arraylist) . " " . location($arraylist) . PHP_EOL;
		echo "<tr><td style=\"word-break: break-all;\">".'<a href="http://'. $arraylister . '" target="_blank" >'.$arraylist.'</a>'. "</td>";
		echo "<td>"." ". proverit_dostupnost_saita($arraylist) ."<br /></td>"."<td>".location($arraylist)."</td></tr>";
		}
	echo "</table>";
	return $log;
	// echo $log;
}

$loger = result($plist);
function mylog($data){
	$data = $data . PHP_EOL;
	file_put_contents('logs/statuslogs.txt', $data);
	// var_dump (file_put_contents('logs/statuslogs.txt', $data));
}
mylog($loger);

//location
function location($host){
$headersArray = GetHeaders($host);
		if(!isset($headersArray)){
			return '';
		}
		foreach($headersArray as $h){
			if(stripos($h, 'Location') !== false){
			$loc = 'Location: ';
			$LOC = 'LOCATION: ';
			return trim(trim($h,$loc),$LOC);
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
	curl_setopt($temp, CURLOPT_TIMEOUT, 10);
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
<br /><a href="http://xtoolza.info/q/logs/statuslogs.txt" download>Скачать результат</a><br />
<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a><br><br>
<form class="btn">
<input type="button" border="0" value="Помощь" onclick="location.href='http://www.xtoolza.info/q/help.php'">
</form>
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
</body>
</html>
