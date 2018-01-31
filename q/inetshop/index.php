<?php header('Content-Type: text/html; charset=utf-8');
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
$num=mt_rand(2000,10000);
error_reporting( E_ERROR );
ini_set('display_errors', 0);
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Проверить сайт на интернет-магазин</title>
	<meta name="description" content="Проверить сайт на интернет-магазин " />
	<meta name="keywords" content="Проверить сайт на интернет-магазин">
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="robots" content="all" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<script src="jquery-2.1.1.min.js" type="text/javascript"></script>
	<script src="light.js" type="text/javascript"></script>
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
</head>
<body onload="$('#site_list').focus()" id="linearBg1">
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
							<td><h1 class="jumbotron">Проверить сайт на интернет-магазин</h1></td>
						</tr>
						<tr>
							<td><img src="http://xtoolza.info/q/images/shop.png" width="80" alt="Проверить сайт на интернет-магазин"> </td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
<div class='tabs' id='whois_tab'>
<table id="tablespecial">
	<tr>
		<td style="vertical-align:top;">
			<form id='cms' method='post'>Cписок сайтов:<br><br>
				<textarea id='site_list' style='width:500px; height:300px'></textarea><br><br>
				<input type='button' value='Определить' onClick='check_cms();'>
				<input type='reset' value='Очистить' onClick='$("#site_list").focus();'>
			</form>
			<table class="cmstable" id='show_cms'></table>
		</td>
	</tr>
</table>
</div>
<br>
<a class="btn-success btn" href="http://xtoolza.info">На главную</a><br><br>
<br>
<br>

<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
