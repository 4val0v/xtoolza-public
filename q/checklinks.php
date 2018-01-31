<?
header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Выгрузить ссылки со страницы</title>
	<meta name="description" content="Инструмент пакетной проверки внешних ссылок на странице." />
	<meta name="keywords" content="выгрузить внешние ссылки" />
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
								<td><h1 class="jumbotron">Выгрузить ссылки со страницы</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/url.png" width="80" alt="Выгрузить ссылки со страницы"> </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<form action="/q/checkerlinks.php" method="get">
	<input type="text" name="site" value="Введите адрес страницы" onclick='if(this.value=="Введите адрес страницы") this.value=""' onBlur='if(this.value=="") this.value="Введите адрес страницы"'><br><br>
	<input type="submit" value="Проверить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";' />&nbsp;&nbsp;
	<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
</form><br />
<div style='display:none' id="div"><img src='http://xtoolza.info/q/cms/ajax-loader.gif'>&nbsp;&nbsp;&nbsp;<span>Идёт выгрузка ссылок. Пожалуйста, подождите и не закрывайте страницу.</span></div>
<div style="width: 750px">
<b style="text-decoration: none;">Инструмент выгрузки ссылок</b> - позволяет выгрузить все ссылки со страницы. К примеру, это поможет отобрать внешние ссылки и закрыть их от индексации или убрать вообще.
</div>
<br />
<a class="btn" href="http://xtoolza.info/q/map_sait/unloadsitemaplinks/" title="Выгрузить ссылки из sitemap.xml" style="width:298px"><img class="transition-scale" src="http://xtoolza.info/q/images/url.png" width="80" title="Выгрузить ссылки из sitemap.xml" alt="Выгрузить ссылки из sitemap.xml">Выгрузить ссылки из sitemap.xml</a>
<a class="btn" href="http://xtoolza.info/q/broken/index.php" title="Инструмент поиска внешних и битых ссылок сайта" style="width:298px"><img class="transition-scale" src="http://xtoolza.info/q/images/links_mini.jpg" width="80" title="Инструмент поиска внешних и битых ссылок сайта" alt="внешние ссылки, битые ссылки">Поиск внешних и битых ссылок</a>
<a class="btn" href="http://xtoolza.info/q/checktdk.php" title="Пакетная выгрузка мета-тегов title, description, keywords с указанных страниц" style="width:298px"><img class="transition-scale" src="http://xtoolza.info/q/images/tdk_mini.jpg" width="80" title="Пакетная выгрузка мета-тегов title, description, keywords с указанных страниц" alt="Выгрузить meta-теги">Выгрузить meta-теги</a>
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
<body>
</html>
