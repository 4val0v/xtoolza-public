<!DOCTYPE HTML>
<html>
<?
error_reporting( E_ERROR );
ini_set('display_errors', 0);
ignore_user_abort(true);
set_time_limit(0);
?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="noindex, follow" />
    <title>Результаты выгрузки canonical со страниц сайта</title>
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
</head>
<body id="linearBg1">

<?
header('Content-Type: text/html; charset=utf-8');?>

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
								<td><h1 class="jumbotron">Результаты выгрузки canonical со страниц сайта</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/canonical.png" width="80" alt="Результаты выгрузки canonical со страниц сайта"></td>
							</tr> 
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div> 

<?
echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>Site</b></td><td><b>Canonical</b></td></tr>"; 
$plist = explode("\r\n",trim($_POST['textt'])); 

function result($plist) {
	foreach ($plist as $arraylist) {
		$narray = preg_replace('~^(?!https??://)~i', 'http://', $arraylist, 1);
		$arraylist = str_replace('http://','',$arraylist);
		echo "<tr><td style=\"word-break: break-all;\">".'<a href="http://'. $arraylist . '" target="_blank" >'.$narray.'</a>'. "</td>";
		echo "<td>"." ". canonical($narray) . "</td></tr>";
		$log .= $arraylist . " " . strip_tags(canonical($narray)) . PHP_EOL;
		}  
	echo "</table>"; 
	return $log;
}

$loger = result($plist);
function mylog($data){
    $data = $data . PHP_EOL;
    file_put_contents('logs.txt', $data);
}
mylog($loger);

function canonical($url){
	include_once 'simple_html_dom.php';
	$data = file_get_html($url);
	if($data->find('link [rel=canonical]')){ 
		foreach($data->find('link [rel=canonical]') as $link){ 
			return '<a href="'.$link->href.'">'.$link->href.'</a>'; 
		} 
	}else return 'not found';
	
}
  
?>
<br /><a href="http://xtoolza.info/q/canonical/logs.txt" download>Скачать результат</a><br />
<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>