<!DOCTYPE HTML>
<html>
<head>
	<title>Проверить стоит ли на сайте toolza</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="robots" content="noindex, nofollow">
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
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
								<td><h1 class="jumbotron">Проверить стоит ли на сайте toolza</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/magiya_poyav1s.png" width="80" alt="Проверить стоит ли на сайте toolza"> </td>
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
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
ignore_user_abort(true);
set_time_limit(0);
?>

<table>
	<tr>
		<td>
		<form action="/q/checktoolza/checktoolza.php" method="post">
			<textarea  name="textt" id="textarea" rows="20" cols="500"
			  onclick='if(this.value=="вставьте сюда список сайтов") this.value=""'
			  onblur='if(this.value=="") this.value="вставьте сюда список сайтов"'
			>вставьте сюда список сайтов</textarea><br />
			<input type="submit" value="Проверить" class="btn-success btn" onclick='document.getElementById("div").style.display = "block";'>&nbsp;&nbsp;
			<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
		</form>
		</td>
	<td>
		<table>
			<tr>
				<td>
					<a class="btn" href="http://xtoolza.info/q/check404.php" title="Пакетная проверка отработки 404 статус-кода на сайтах"><img class="transition-scale" src="http://xtoolza.info/q/images/404_mini.png" width="80" title="Пакетная проверка отработки 404 статус-кода на сайтах" alt="404 статус-код">&nbsp;&nbsp;&nbsp;&nbsp;Проверить 404 статус-код&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
				</td>
			</tr>
			<tr>
				<td>
					<a class="btn" href="http://xtoolza.info/q/sitemapcheck.php" title="Проверка наличия страниц в sitemap.xml"><img class="transition-scale" src="http://xtoolza.info/q/images/sitemap_mini.png" width="80" title="Проверка наличия страниц в sitemap.xml" alt="Проверить sitemap, проверить карту сайта">&nbsp;Проверка страниц sitemap.xml&nbsp;</a>
				</td>
			</tr>
		<tr>
			<td>
				<a class="btn" href="http://xtoolza.info/q/broken/index.php" title="Инструмент поиска внешних и битых ссылок сайта"><img class="transition-scale" src="http://xtoolza.info/q/images/links_mini.jpg" width="80" title="Инструмент поиска внешних и битых ссылок сайта" alt="внешние ссылки, битые ссылки">Поиск внешних и битых ссылок</a>
			</td>
		</tr>
		</table>
	</td>
	</tr>
</table>

<div style='display:none' id="div"><img src='http://xtoolza.info/q/images/status.gif' width="50" alt="Loading...">&nbsp;&nbsp;&nbsp;<span>Проверяем стоит ли на сайтах тулза!</span><br><br></div>

<div style="width: 750px">
</div>

<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
</body>
</html>
