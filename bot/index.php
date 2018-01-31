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
	<title>Посмотреть страницу (сайт) как робот Яндекса</title>
	<meta name="description" content="Посмотреть страницу (сайт) как робот Яндекса" />
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
								<td><h1 class="jumbotron">Посмотреть страницу (сайт) как робот Яндекса</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/source.jpg" width="80" alt="Посмотреть страницу (сайт) как робот Яндекса"> </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<form action="result.php" method="post" id="clicked">
<!--form action="<?// exec("start /B /usr/bin/php /home/b/b10xwru/xtoolza.info/public_html/q/map_sait/sitemap_created.php"); ?>" method="get" id="clicked"-->
<input type="text" name="site" value="Введите URL c http://" onclick='if(this.value=="Введите URL c http://") this.value=""' onBlur='if(this.value=="") this.value="Введите URL c http://"'><br><br>
<input type="submit" value="Получить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";' />&nbsp;&nbsp;
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
</form>
<div style='display:none' id="div"><img src='http://xtoolza.info/q/images/99.GIF' width="90">&nbsp;&nbsp;&nbsp;<span>Выгружаем страничку. Подождите и не закрывайте страницу.</span><br><br></div>
<div style="width: 750px">С помощью данного инструмента можно посмотреть как видит страницу поисковый робот, а так же выгрузить значение тегов meta name robots, link rel="canonical", link rel="prev/next", а также все ссылки заключенные в rel="nofollow.<br />Адрес страницы введите с протоколом (http:// или https://)</div><br><br>
<table>
	<tr>
		<td>
			<a class="btn" href="http://xtoolza.info/q/lastmodified/" title="Проверить заголовок Last-Modified" style="width:330px"><img class="transition-scale" src="http://xtoolza.info/q/images/LastModified.png" width="80" title="Проверить заголовок Last-Modified" alt="Проверить заголовок Last-Modified">Проверить заголовок Last-Modified</a>
		</td>
	</tr>
</table>
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
</body>
</html>
