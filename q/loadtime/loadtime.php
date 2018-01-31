<!DOCTYPE HTML>
<? header('Content-type: text/html; charset=utf-8'); 
ini_set('display_errors', E_ERROR);
error_reporting(0);
set_time_limit(0);
ignore_user_abort(true);
?>
<html>
<head>
	<title>Пакетная проверка времени ответа сервера</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="index, follow" />
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
								<td><h1 class="jumbotron">Пакетная проверка времени ответа сервера</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/loadtime.png" width="80" alt="Пакетная проверка времени ответа сервера"></td>
							</tr> 
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?

include_once('http://xtoolza.info/q/idna_convert.class.php');
function converttopuny($host) {
	$idn = new idna_convert(array('idn_version'=>2008));
	$punycode=isset($_REQUEST['punycode']) ? stripslashes($_REQUEST['punycode']) : '';
	$punycode=(stripos($punycode, 'xn--')!==false) ? $idn->decode($punycode) : $idn->encode($punycode);
	return $punycode;
	}

echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>URL</b></td><td><b>время ответа сервера</b></td></tr>";
$hosts = explode("\r\n",trim($_POST['site']));
loadtime($hosts);

function loadtime($hosts){
	foreach ($hosts as $host){
		$start = gettimeofday();//начало
		file_get_contents ("http://$host");
		$end = gettimeofday();
		$result = (float)($end['sec'] - $start['sec']) + ((float)($end['usec'] - $start['usec'])/1000000);
		$loadtime = sprintf('%.5f сек.', $result);
		echo '<tr>';
		echo "<td><b><a href='http://$host' target='_blank'>".$host."</a></b></td>";
		echo '<td>'.$loadtime.'</td>';
		echo '</tr>';
		}
	}
?>
</table>
<br />
<br />
<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>