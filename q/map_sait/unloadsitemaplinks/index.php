<!DOCTYPE html>
<html>
<head>
	<title>Выгрузить ссылки из sitemap.xml</title>
	<meta name="description" content="Инструмент ыыгрузки ссылок из sitemap.xml" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
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
								<td><h1 class="jumbotron">Выгрузить ссылки из sitemap.xml</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/url.png" width="80" alt="Выгрузить ссылки со страницы"></td>
							</tr> 
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div> 
<?php header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num)); ?>
<br />
<form action="/q/map_sait/unloadsitemaplinks/links.php" method="get">
<input type="text" name="site" value="Введите адрес карты сайта" onclick='if(this.value=="Введите адрес карты сайта") this.value=""' onBlur='if(this.value=="") this.value="Введите адрес карты сайта"'><br><br>
<input type="submit" value="Выгрузить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";' /><br /><br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
</form>
<div style="width: 750px">
<p>Инструмент, позволяющий произвести пакетную выгрузку всех ссылок из карты сайта (sitemap.xml).</p>
</div>
<br>
<table>
	<tr>
		<td>
			<a class="btn" href="http://xtoolza.info/q/map_sait/sitemapurllist/" title="Создать карту сайта из списка URL"><img class="transition-scale" src="http://xtoolza.info/q/images/sitemapcreate.png" width="80" title="Создать карту сайта из списка URL" alt="Создать карту сайта из списка URL">Создать карту сайта из списка URL</a>
		</td>
		<td>
			<a class="btn" href="http://xtoolza.info/q/sitemapcheck.php" title="Проверка наличия страниц в sitemap.xml"><img class="transition-scale" src="http://xtoolza.info/q/images/sitemap_mini.png" width="80" title="Проверка наличия страниц в sitemap.xml" alt="Проверить sitemap, проверить карту сайта">Проверка страниц sitemap.xml</a>
		</td>
		<td>
			<a class="btn" href="http://xtoolza.info/q/map_sait/sitemap_create.php" title="Создать карту сайта sitemap.xml"><img class="transition-scale" src="http://xtoolza.info/q/images/sitemapcreate.png" width="80" title="Создать карту сайта sitemap.xml" alt="Создать карту сайта sitemap.xml">Создать карту сайта sitemap.xml</a>
		</td>
		<td>
			<a class="btn" href="http://xtoolza.info/q/checklinks.php" title="Выгрузить ссылки"><img class="transition-scale" src="http://xtoolza.info/q/images/url_mini.png" width="80" title="Выгрузить ссылки" alt="Выгрузить ссылки из sitemap.xml">Выгрузить ссылки&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
		</td>
	</tr>
</table>	

<div style='display:none' id="div"><img src='http://xtoolza.info/q/cms/ajax-loader.gif'>&nbsp;&nbsp;&nbsp;<span>Идёт выгрузка ссылок. Пожалуйста, подождите и не закрывайте страницу.</span></div>

<? include ('../../../yandex_metrika.php'); ?>
<body>
</html>