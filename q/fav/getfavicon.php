<?
header('Content-Type: text/html; charset=utf-8');
$start_time = microtime();
$start_array = explode(" ",$start_time);
$start_time = $start_array[1] + $start_array[0];
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex, follow" />
	<title>Get Favicon Result</title>
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
								<td><h1 class="jumbotron">Выгрузить favicon сайта</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/favicon.jpg" width="80" alt="Выгрузить favicon сайта"> </td>
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
echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>URL</b></td><td><b>Favicon</b></td></tr>";
$plist = explode("\r\n",$_POST['textt']);

foreach ($plist as $arraylist){
	$arraylister = str_replace('http://','',$arraylist);
	echo "<tr><td style=\"word-break: break-all;\">".'<a href="http://'. $arraylister . '" target="_blank" >'.$arraylist.'</a>'. "</td>";
	echo "<td>"." ".'<center><img src="'.get_favicon($arraylist).'"></center>'."</td></tr>";
	}

function get_favicon($arraylist){
		$url = getpage($arraylist);
		$parse_result = parse_url($url);
		return "http://www.google.com/s2/favicons?domain=".$parse_result['host'];
}

//получить содержимое страницы
function getpage($arraylist){
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
	curl_setopt($temp, CURLOPT_TIMEOUT, 15);
	curl_setopt($temp, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($temp, CURLOPT_SSLVERSION, 3);
	curl_setopt($temp, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($temp, CURLOPT_FOLLOWLOCATION, true);
	$page = curl_exec($temp);
	$result = curl_getinfo($temp, CURLINFO_EFFECTIVE_URL);
	curl_close($temp);
	return $result;
}

?>
</table><br /><br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
