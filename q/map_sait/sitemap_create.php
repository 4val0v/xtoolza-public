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
	<title>Создать карту сайта sitemap.xml</title>
	<meta name="description" content="Создать карту сайта онлайн. Бесплатно создать карту sitemap.xml" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="all" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<link href="http://xtoolza.info/css/colorchange.css" rel="stylesheet"/>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body id="linearBg1">
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
							<td><h1 class="jumbotron">Создать карту сайта sitemap.xml</h1></td>
						</tr>
						<tr>
							<td><img src="http://xtoolza.info/q/images/sitemapcreate.png" width="80" alt="создать карту сайта">
							 </td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
<form action="/q/map_sait/sitemap_created.php" method="get" id="clicked">
<!--form action="<?// exec("start /B /usr/bin/php /home/b/b10xwru/xtoolza.info/public_html/q/map_sait/sitemap_created.php"); ?>" method="get" id="clicked"-->
<input type="text" name="site" value="Введите адрес сайта" onclick='if(this.value=="Введите адрес сайта") this.value=""' onBlur='if(this.value=="") this.value="Введите адрес сайта"'><br><br>
<input type="submit" value="Создать" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";' />
	<span style="padding-left:5px;"><a class="btn-success btn" href="http://xtoolza.info">На главную</a></span>
</form>

<div style='display:none' id="div"><img src='http://xtoolza.info/q/images/99.GIF' width="90">&nbsp;&nbsp;&nbsp;<span>Карта сайта создается. Пожалуйста, подождите и не закрывайте страницу.</span><br><br></div>
<div style="width: 750px">
<b style="text-decoration: none;">Карта сайта (sitemap.xml)</b> - технический файл, который содержит информацию для роботов поисковых систем о том какие страницы следует проиндексировать, как часто их индексировать и какой их приоритет важности. С помощью данного инструмента можно создать карту сайта. Для этого введите адрес сайта и нажмите "создать".
<br><br>
Чтобы разместить карту сайта, вы можете воспользоваться <a href="http://uptimus.ru" rel="nofollow">этим сервисом</a>
</div>
<table>
	<tr>
		<td>
			<a class="btn" href="http://xtoolza.info/q/map_sait/sitemapurllist/" title="Создать карту сайта из списка URL"><img class="transition-scale" src="http://xtoolza.info/q/images/sitemapcreate.png" width="80" title="Создать карту сайта из списка URL" alt="Создать карту сайта из списка URL">Создать карту сайта из списка URL</a>
		</td>
		<td>
			<a class="btn" href="http://xtoolza.info/q/sitemapcheck.php" title="Проверка наличия страниц в sitemap.xml"><img class="transition-scale" src="http://xtoolza.info/q/images/sitemap_mini.png" width="80" title="Проверка наличия страниц в sitemap.xml" alt="Проверить sitemap, проверить карту сайта">Проверка страниц sitemap.xml</a>
		</td>
		<td>
			<a class="btn" href="http://xtoolza.info/q/map_sait/unloadsitemaplinks/" title="Выгрузить ссылки из sitemap.xml"><img class="transition-scale" src="http://xtoolza.info/q/images/url.png" width="80" title="Проверка наличия страниц в sitemap.xml" alt="Проверить sitemap, проверить карту сайта">Выгрузить ссылки из sitemap.xml</a>
		</td>
		<td>
			<a class="btn" href="http://xtoolza.info/q/checklinks.php" title="Выгрузить ссылки"><img class="transition-scale" src="http://xtoolza.info/q/images/url_mini.png" width="80" title="Выгрузить ссылки" alt="Выгрузить ссылки из sitemap.xml">Выгрузить ссылки</a>
		</td>
	</tr>
</table>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
