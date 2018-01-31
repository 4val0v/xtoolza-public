<?php header('Content-Type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Выгрузить meta-теги.</title>
	<meta name="description" content="Инструмент для пакетной выгрузки title, description и keywords со страниц сайтов" />
	<meta name="keywords" content="выгрузить title, выгрузить description, выгрузить keywords" />
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
								<td><h1 class="jumbotron">Выгрузить meta-теги</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/tdk.png" width="80" alt="Выгрузить meta-теги"> </td>
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
			<form action="/q/checkertdk.php" method="post"><br /><br /><br />
			<textarea  name="textt" id="textarea" rows="20" cols="500"
			  onclick='if(this.value=="вставьте список целевых страниц") this.value=""'
			  onblur='if(this.value=="") this.value="вставьте список целевых страниц"'
			>вставьте список целевых страниц</textarea><br />
			<input type="submit" value="Проверить" class="btn-success btn" onclick='document.getElementById("div").style.display = "block";'>
			<span style="padding-left:5px"><a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a></span><br /><br />
			</form>
		</td>
		<td>
			<table style="vertical-align: top;">
				<tr>
					<td><a class="btn" href="http://xtoolza.info/q/metarobotscheck.php" title="Проверить meta name robots" style="width:350px;"><img class="transition-scale" src="http://xtoolza.info/q/images/metarobots.jpg" width="80" title="Проверить meta name robots" alt="meta name robots">Проверить meta name robots</a>
					</td>
				</tr>
				<tr>
					<td>
					<a class="btn" href="http://xtoolza.info/q/tags/" title="Проверить кол-во тегов акцентирования" style="width:350px;"><img class="transition-scale" src="http://xtoolza.info/q/images/strong.png" width="80" title="Проверить кол-во тегов акцентирования" alt="теги акцентирования">Проверить кол-во тегов акцентирования</a>
					</td>
				</tr>
				<tr>
					<td>
					<a class="btn" href="http://xtoolza.info/q/canonical/" title="http://xtoolza.info/q/canonical/" style="width:350px;"><img class="transition-scale" src="http://xtoolza.info/q/images/canonical.png" width="80" title="Выгрузить canonical со страниц сайта" alt="Выгрузить canonical со страниц сайта">Выгрузить canonical со страниц сайта</a>
					</td>
				</tr>
				<tr>
					<td>
					<a class="btn" href="http://xtoolza.info/q/checkh1.php" title="Пакетная выгрузка тегов H1-H6 со страниц сайта" style="width:350px;"><img class="transition-scale" src="http://xtoolza.info/q/images/h1_mini.png" width="80" title="Пакетная выгрузка тегов H1-H6 со страниц сайта" alt="Выгрузка h1-h6">Пакетная выгрузка h1-h6</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<div style='display:none' id="div"><img src='http://xtoolza.info/q/images/kote.gif' alt="Loading..."<span style="padding-left:25px;">Теги выгружаются. Пожалуйста, подождите и не закрывайте страницу.</span></div>
<div style="width: 750px">
<b style="text-decoration: none;">Title</b> - один из наиболее значимых тегов для продвижения сайта. Он отображается в заголовке сниппета результатов выдачи поисковой системы и напрямую участвует в ранжировании сайта.<br>
<b style="text-decoration: none;">Description</b> - не менее важный тег. Он описывает страницу сайта и, хоть и не виден на самой странице, зачастую отображается в сниппете выдачи поисковых систем.<br>
<b style="text-decoration: none;">Keywords</b> - набор ключевых слов, описывающих страницу. Важно не злоупотреблять ключевыми словами в данном теге и стараться их разбавлять каким-либо окружением.<br>
С помощью данного инструмента можно выгрузить title, description, keywords (TDK) с указанных страниц. В зависимости от количества проверяемых страниц, процесс выгрузки может занять некоторое время.<br><br>Исправить мета-теги можно <a href="http://xtoolza.info/go.php?url=http://uptimus.ru" rel="nofollow" target=" blank">здесь</a>.
</div>
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
</body>
</html>
