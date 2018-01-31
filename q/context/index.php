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
	<title>Пакетная проверка наличия контекстной рекламы на сайтах</title>
	<meta name="description" content="Пакетная проверка наличия контекстной рекламы на сайтах" />
	<meta name="keywords" content="Пакетная проверка наличия контекстной рекламы на сайтах">
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
</head>
<body onload="$('#site_list').focus()" id="linearBg1">
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
								<td><h1 class="jumbotron">Пакетная проверка наличия контекстной рекламы на сайтах</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/context/context.png" width="80" alt="Пакетная проверка наличия контекстной рекламы на сайтах"> </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<div class='tabs' id='whois_tab'>
	<table id="tablespecial">
		<tr>
			<td style="vertical-align:top;">
				<form id='context' method='post'>Cписок сайтов:<br><br>
					<textarea id='site_list' style='width:500px; height:300px'></textarea><br><br>
					<input type='button' value='Определить' onClick='check_context();'>
					<input type='reset' value='Очистить' onClick='$("#site_list").focus();'>
				</form>
				<table class="cmstable" id='show_context'></table>
			</td>
		</tr>
	</table>
</div>
<div><a href="logs/contextlogs.txt" download>логи скачать</a></div>
<br>
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a><br><br>
<div style="width: 750px; font-size:14px;">Данный инструмент позволяет проверить список страниц на наличие на них продажи контекстной рекламы (Яндекс.Директ, Google AdWords, Begun)
</div>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
