<?php header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Проверка наличия страниц в карте сайта sitemap.xml</title>
	<meta name="description" content="Инструмент проверки sitemap.xml (карты сайта) онлайн. Проверить наличие целевых страниц в карте сайта." />
	<meta name="keywords" content="проверить карту сайта, есть ли в карте сайта страница" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<script type="text/javascript" src="http://yandex.st/jquery/1.7.1/jquery.min.js"></script>
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
								<td><h1 class="jumbotron">Проверка наличия страниц в карте сайта sitemap.xml</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/sitemap.png" width="80" alt="Проверка наличия страниц в карте сайта sitemap.xml">
								 </td>
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
		<form action="/q/sitemapchecker.php" method="post">
			<input type="text" name="site" value="Введите адрес карты сайта (http://site.ru/sitemap.xml)" onclick='if(this.value=="Введите адрес карты сайта (http://site.ru/sitemap.xml)") this.value=""' onBlur='if(this.value=="") this.value="Введите адрес карты сайта (http://site.ru/sitemap.xml)"'><br>
			<textarea  name="textt" id="textarea" rows="20" cols="500"
			  onclick='if(this.value=="вставьте список страниц для проверки сюда") this.value=""'
			  onblur='if(this.value=="") this.value="вставьте список страниц для проверки сюда"'
			>вставьте список страниц для проверки сюда</textarea><br />
			<input type="submit" value="Проверить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";'/>
			<span style="padding-left:5px"><a class="btn-success btn" href="http://xtoolza.info">На главную</a></span>
		</form>
		</td>
		<td>
			<table>
				<tr>
					<td>
						<a class="btn" href="http://xtoolza.info/q/map_sait/sitemap_create.php" title="Создать карту сайта sitemap.xml онлайн" style="width:300px;"><img class="transition-scale" src="http://xtoolza.info/q/images/sitemapcreate_mini.png" width="80" title="Создать карту сайта sitemap.xml онлайн" alt="Создать карту сайта">Создать карту сайта</a>
					</td>
				</tr>
				<tr>
					<td>
						<a class="btn" href="http://xtoolza.info/q/map_sait/unloadsitemaplinks/" title="Выгрузить ссылки из sitemap.xml" style="width:300px;"><img class="transition-scale" src="http://xtoolza.info/q/images/url.png" width="80" title="Выгрузить ссылки из sitemap.xml" alt="Выгрузить ссылки из sitemap.xml">Выгрузить ссылки из sitemap.xml</a>
					</td>
				</tr>
				<tr>
					<td>
						<a class="btn" href="http://xtoolza.info/q/cms/index.php" title="Инструмент пакетной онлайн проверки CMS сайта" style="width:300px;"><img class="transition-scale" src="http://xtoolza.info/q/images/cms_mini.png" width="80" title="Инструмент пакетной онлайн проверки CMS сайта" alt="Пакетная проверка CMS сайтов">Пакетная проверка CMS сайтов</a>
					</td>
				</tr>
			<tr>
				<td>
					<a class="btn" href="http://xtoolza.info/q/checktdk.php" title="Пакетная выгрузка мета-тегов title, description, keywords с указанных страниц" style="width:300px;"><img class="transition-scale" src="http://xtoolza.info/q/images/tdk_mini.jpg" width="80" title="Пакетная выгрузка мета-тегов title, description, keywords с указанных страниц" alt="Выгрузить meta-теги">Выгрузить meta-теги</a>
				</td>
			</tr>
			</table>
		</td>
	</tr>
</table>
<div style='display:none' id="div"><img src='http://xtoolza.info/q/images/300.GIF' alt="Loading..."><span style="padding-left:25px">Карта сайта проверяется. Пожалуйста, подождите и не закрывайте страницу.</span></div>
<div><p>В карте сайта должны быть указаны все целевые страницы сайта для того, чтобы поисковые роботы легче ориентировались в структуре сайта и быстрее находили их.<br /> С помощью данного инструмента можно <strong>проверить наличие целевых страниц в sitemap.xml</strong></p>
</div>
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
</body>
</html>
