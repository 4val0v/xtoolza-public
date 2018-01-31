<?php header('Content-Type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);
define(debug, 0);
define(message, 0);
if (debug == 1) {
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  if (message == 1){
    echo '<pre style="border:3px;color:red;font-weight:bold;font-size:20px;">
    Идут технические работы!!!
    Проверка может работать некорректно!!!
    По всем вопросам писать на gennadiy.shershov@ingate.ru
  </pre>';
  }
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Проверка наличия скрипта Reenter на URL</title>
	<meta name="description" content="Проверка наличия скрипта Reenter на URL" />
	<meta name="keywords" content="Проверка наличия скрипта Reenter на URL">
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="robots" content="all" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://reentermanual.local/newcss4.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" type="image/ico" href="http://reentermanual.local/favicon.ico" />
	<link rel="apple-touch-icon" href="http://reentermanual.local/favicon.png" />
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
						<a href="http://reentermanual.local" rel="nofollow"><img class="image UE" src="http://reentermanual.local/q/images/logo.png" width="120px" border="0" width="120px"><img class="image Dowe" src="http://reentermanual.local/q/images/logo_new.png" width="120px" /></a>
					</div>
				</td>
				<td>
					<table>
						<tbody>
							<tr>
								<td><h1 class="jumbotron">Проверка наличия скрипта Reenter на URL</h1></td>
							</tr>
							<tr>
								<td><img src="http://reentermanual.local/q/images/metrika.png" width="80" alt="Проверка наличия скрипта Reenter на URL"></td>
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
			<form id='context' method='post'>Cписок URL:<br><br>
				<textarea id='site_list' style='width:500px; height:300px'></textarea><br><br>
				<input type='button' value='Определить' onClick='check_context();'>
				<input type='reset' value='Очистить' onClick='$("#site_list").focus();'>
			</form>
			<table class="cmstable" id='show_context'></table>
		</td>
	</tr>
</table>
</div>
<!-- <div><a href="logs/metrika.txt" download>логи скачать</a></div> -->
<br>
<a class="btn-success btn" href="http://reentermanual.local">На главную</a><br><br>
<div style="width: 750px font-size:14px;">Данный инструмент позволяет проверить список страниц на наличие на них кода ReEnter
</div><br>
</body>
</html>
