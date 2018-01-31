<?php header('Content-Type: text/html; charset=utf-8');
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
$num=mt_rand(2000,10000);
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
	<title>Пакетная проверка статус кодов из фида YML</title>
	<meta name="description" content="Инструмент пакетной проверки HTTP статус кодов страниц сайта. Проверить статус-код целевой страницы онлайн.">
	<meta name="keywords" content="проверить статус код, узнать статус страницы, проверить HTTP-код">
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="robots" content="all" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://reentermanual.local/newcss4.css" rel="stylesheet"/>
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
								<td><h1 class="jumbotron">Пакетная проверка статус кодов из фида YML</h1></td>
							</tr>
							<tr>
								<td><img src="http://reentermanual.local/q/images/statuscode.png" width="80" alt="Пакетная проверка статус кодов"></td>
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
			<form id='context' method='post'>Рандомные 100 URL:<br><br>
			<?
				$PCREpattern = '/\r\n|\r|\n/u';
				function offers(){
						$counstr=100;
						$file=file('/var/www/feed/logs/feedavailable.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
						shuffle($file);
						for($i=0;$i<$counstr;$i++){
							echo trim($file[$i]).'?utm_source=test&utm_campaign=test'.PHP_EOL;
						}
					}
			?>
				<textarea id='site_list' style='width:500px; height:300px'><? preg_replace($PCREpattern,"",str_replace(PHP_EOL,"",offers())); ?></textarea><br><br>
				<input class="btn-success btn" type='button' value='Определить' onClick='check_context();'>
			</form>
			<table class="cmstable" id='show_context'></table>
		</td>
	</tr>
</table>
</div>
<div style='display:none' id="div"><img src='http://reentermanual.local/q/images/status.gif' width="50" alt="Loading..."><span style="margin-left:25px;">Идёт проверка статус-кодов. Пожалуйста, подождите и не закрывайте страницу.</span><br><br></div>
	<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<div style="width: 750px">
</div>
<br><br>
</body>
</html>
