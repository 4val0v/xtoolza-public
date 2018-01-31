<!DOCTYPE HTML>
<html>
<?
error_reporting( E_STRICT );
ini_set('display_errors', 1);
ignore_user_abort(true);
set_time_limit(0);
?>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex, follow" />
	<title>Результат проверки посещаемости сайтов</title>
	<link href="/q/style.css" rel="stylesheet"/>
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<script type="text/javascript">
	var check_preload;
	function preload_page() {
	  if(check_preload) {
		document.getElementById("total").style.visibility = "visible";
		document.getElementById("load").style.visibility = "hidden";
	  }
	}	
</script>
</head>
<body id="linearBg1">

<?header('Content-Type: text/html; charset=utf-8');?>
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
								<td><h1 class="jumbotron">Результат проверки посещаемости сайтов</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/traffic.png" width="80" alt="Результат проверки посещаемости сайтов"></td>
							</tr> 
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<table border="1" bordercolor=\"#333333\">
	<tr>
		<td><b>Site</b></td>
		<td><b>Просмотры в месяц</b></td>
		<td><b>Посетители в месяц</b></td>
		<!--td><b>Просмотры в неделю</b></td-->
		<!--td><b>Посетители в неделю</b></td-->
	</tr>
<?
$plist = explode("\r\n",trim($_POST['textt'])); 
function result($plist) {
	foreach ($plist as $arraylist) {
		$narray = preg_replace('~^(?!https??://)~i', '', $arraylist, 1);
		$narray = preg_replace('~^(?!http??://)~i', '', $arraylist, 1);
		$narray = str_replace('http://', '', $arraylist);
		$narray = str_replace('www.', '', $narray);
		$narray = rtrim($narray,'/');
		$arraylist = str_replace('http://','',$arraylist);
		$arraylist = str_replace('www.','',$arraylist);
		$arraylist = rtrim($arraylist,'/');
		// var_dump($narray);
		echo "<tr><td style=\"word-break: break-all;\">".'<a href="http://'. $arraylist . '" target="_blank" >'.$narray.'</a>'. "</td>";
		echo "<td>"." ". gettraf($narray) . "</td><td>"." ". gettraffic($narray) . "</td></tr>";
		$log .= $arraylist . " " . gettraf($narray) . " " . gettraffic($narray) . PHP_EOL;
		}  
	echo "</table>"; 
	return $log;
}

$loger = result($plist);
function mylog($data){
	$data = $data . PHP_EOL;
	file_put_contents('logs/trafficlogs.txt', $data , LOCK_EX);
}
mylog($loger);

$domain = $narray;
function gettraf($narray) {
	$xml = file_get_contents('http://counter.yadro.ru/values?site='.$narray);
	// var_dump($xml);
	preg_match('|LI_month_hit\s=\s(.*);|isU', $xml, $links);
	$LI_month_hit = "LI_month_hit = ";
		foreach ($links as $link){
			$res = iconv("Windows-1251", "UTF-8", $link);
			return rtrim(ltrim($res, $LI_month_hit),";");
		}
}	
function gettraffic($narray) {
	$xml = file_get_contents('http://counter.yadro.ru/values?site='.$narray);
	preg_match('|LI_month_vis\s=\s(.*);|isU', $xml, $links2);
	$LI_month_vis = "LI_month_vis = ";
				foreach ($links2 as $link2){
			$res2 = iconv("Windows-1251", "UTF-8", $link2);
			return rtrim(ltrim($res2, $LI_month_vis),";");
		}
}	
function gettrafficweekhit($narray) {
	$xml = file_get_contents('http://counter.yadro.ru/values?site='.$narray);
	preg_match('|LI_week_hit\s=\s(.*);|isU', $xml, $links3);
	$LI_week_hit = "LI_week_hit = ";
				foreach ($links3 as $link3){
			$res3 = iconv("Windows-1251", "UTF-8", $link3);
			return rtrim(ltrim($res3, $LI_week_hit),";");
		}
}	
function gettrafficweekvis($narray) {
	$xml = file_get_contents('http://counter.yadro.ru/values?site='.$narray);
	preg_match('|LI_week_vis\s=\s(.*);|isU', $xml, $links4);
	$LI_week_vis = "LI_week_vis = ";
				foreach ($links4 as $link4){
			$res4 = iconv("Windows-1251", "UTF-8", $link4);
			return rtrim(ltrim($res4, $LI_week_vis),";");
		}
}
?>
<br /><a href="http://xtoolza.info/q/traffic/logs/trafficlogs.txt" download>Скачать результат</a><br />
<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
<div style="text-align: center; bottom:10px; position: relative;">
</div>
<? include ('../../yandex_metrika.php'); ?>

</body>
</html>