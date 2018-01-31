<?php
header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Пакетная проверка времени ответа сервера</title>
	<meta name="description" content="Пакетная проверка времени ответа сервера. Время ответа сервера - важный показатель как для посетителя сайта, так и для поисковых роботов. " />
	<meta name="keywords" content="проверить время ответа сервера, проверить загрузку страницы" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="all" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
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
								<td><img src="http://xtoolza.info/q/images/loadtime.png" width="80" alt="Пакетная проверка времени ответа сервера"> </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<form action="/q/loadtime/loadtime.php" method="post">
<textarea  name="site" id="textarea" rows="20" cols="500"
  onclick='if(this.value=="вставьте список страниц") this.value=""'
  onblur='if(this.value=="") this.value="вставьте список страниц"'
>вставьте список страниц</textarea><br />
<input type="submit" value="Проверить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";'/>&nbsp;&nbsp;
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
</form>

<div style='display:none' id="div"><img src='http://xtoolza.info/q/images/timer.gif' width="90" alt="loading...">&nbsp;&nbsp;&nbsp;<span>Проверяем время. Пожалуйста, подождите.</span><br>Среднее время проверки: 100 страниц - 1:20 (минута двадцать секунд).<br></div>
<div style="width: 750px">
	<p><strong>Время ответа сервера</strong> - важный показатель как для посетителя сайта, так и для поисковых роботов. Чем дольше загружается страница, тем больше шансов, что посетитель и/или поисковый робот не дождется окончания загрузки страницы и уйдёт с неё. <br />Так оптимальное временя загрузки страницы не более 5 секунд. Если ответа не поступило более 10 секунд - это уже повод для беспокойства и стоит задуматься как минимум над оптимизацией работы веб-сервера, так и над возможной сменой хостинга.</p>
</div>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
