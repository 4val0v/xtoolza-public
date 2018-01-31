<?php header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Проверка хостинга сайта</title>
	<meta name="description" content="Инструмент пакетной проверки хостинга сайтов. Определить хостинг с помощью этого инструмента - самое простое решение.">
	<meta name="keywords" content="Проверка хостинга сайта, определить хостинг, узнать хостинг сайта">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
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
								<td><h1 class="jumbotron">Проверка хостинга сайта</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/hosting.png" width="80" alt="Проверка хостинга сайта"> </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<div style="position: absolute; left: 160px; top: -180px; ">
<iframe src="http://www.whoishostingthis.com/" width="1000" height="600" scrolling="no" frameborder="0" sandbox="allow-forms allow-scripts"></iframe>
</div>

<div style='display:none' id="div"><img src='http://xtoolza.info/q/images/hdd.gif' alt="Loading..." width='80'><span style="padding-left:25px;">Определяем хостинг. Пожалуйста, подождите и не закрывайте страницу.</span><br><br></div>
<div style="width: 750px; position: absolute; left: 160px; top: 300px;">
	<p><strong>Хостинг сайта</strong> - это возможность разместить свой сайт в интернете. После размещения сайта на сервере - любой может получить к нему доступ, набрав доменное имя в строке браузера. Грубо говоря, это как квартира для вашего сайта в огромном многоэтажном доме интернета. Данный инструмент позволяет проверить у какого хостинг-провайдера числится сайт.</p>
</div>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
