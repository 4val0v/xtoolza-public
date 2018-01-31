<?php header('Content-Type: text/html; charset=utf-8'); 
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Проверить посещаемость сайтов</title>
	<meta name="description" content="Инструмент пакетной проверки посещаемости сайтов. Позволяет провести пакетную проверку посещаемости сайтов." />
	<meta name="keywords" content="Проверить посещаемость сайтов, проверить трафик, пакетная проверка посещаемости сайтов" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
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
								<td><h1 class="jumbotron">Проверить посещаемость сайтов</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/traffic.png" width="80" alt="Проверить посещаемость сайтов"></td>
							</tr> 
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<table>
	<tr>
		<td>
		<form action="/q/traffic/traffic.php" method="post">
			<textarea  name="textt" id="textarea" rows="20" cols="500"
			  onclick='if(this.value=="вставьте список сайтов сюда без http://") this.value=""'  
			  onblur='if(this.value=="") this.value="вставьте список сайтов сюда без http://"' 
			>вставьте список сайтов сюда без http://</textarea><br />
		<input type="submit" value="Проверить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";'/>&nbsp;&nbsp;
		<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
		</form>
		</td>
		<td>
			<table>
				<tr>
					<td><a class="btn" href="http://xtoolza.info/q/cms/" title="Инструмент пакетной онлайн проверки CMS сайта" rel="nofollow" style="width:330px;"><img class="transition-scale" src="http://xtoolza.info/q/images/cms_mini.png" width="80" title="Инструмент пакетной онлайн проверки CMS сайта" alt="Пакетная проверка CMS сайтов">Проверить CMS сайтов</a></td>
				</tr>
				<tr>
					<td><a class="btn" href="http://xtoolza.info/q/inetshop/" title="Проверить сайт на интернет-магазин" style="width:330px;"><img class="transition-scale" src="http://xtoolza.info/q/images/shop.png" width="80" title="Проверить сайт на интернет-магазин" alt="Проверить сайт на интернет-магазин">Проверить сайт на интернет-магазин</a></td>
				</tr>
				<tr>
					<td>
					<a class="btn" href="http://xtoolza.info/q/checkphp.php" title="Пакетная проверка сайтов на наличие PHP онлайн" rel="nofollow" style="width:330px;"><img class="transition-scale" src="http://xtoolza.info/q/images/php_mini.png" width="80" title="Пакетная проверка сайтов на наличие PHP онлайн" alt="Проверка на PHP">Пакетная проверка сайтов на PHP</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<div style='display:none' id="div">
	<span style="color:#FF0000; background-color:#000000; font-size:20px;"></span>
	<span>Идёт проверка посещаемости. Пожалуйста, подождите и не закрывайте страницу.</span><br><br>
</div>
<div style="width: 750px">
<strong>Проверить посещаемость сайтов</strong> достаточно просто. Для этого введите адреса сайтов в соответствующую форму. По результаты проверки будет предоставлена информация о количестве посещений каждого сайта по данным liveinternet. Если счетчик запаролен, посещаемость выведена не будет.
</div>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>