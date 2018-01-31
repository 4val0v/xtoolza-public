<?php header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Проверить заголовок Last-Modified</title>
	<meta name="description" content="Инструмент пакетной проверки страниц сайта на заголовки Last-Modified" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/css/colorchange.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
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
							<td><h1 class="jumbotron">Проверить заголовок Last-Modified</h1></td>
						</tr>
						<tr>
							<td><img src="http://xtoolza.info/q/images/LastModified.png" width="75" alt="Проверить заголовок Last-Modified"> </td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
<table>
	<tr>
		<td>
			<form action="/q/lastmodified/result.php" method="post" id="xtoolza_form">
			<textarea name="textt" id="textarea" rows="20" cols="500"
			  onclick='if(this.value=="вставьте список целевых страниц сюда") this.value=""'
			  onblur='if(this.value=="") this.value="вставьте список целевых страниц сюда"'
			>вставьте список целевых страниц сюда</textarea><br />
			<input type="submit" value="Проверить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";' />&nbsp;&nbsp;
			<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
			</form>
		</td>
		<td>
			<table>
				<tr>
					<td>
						<a class="btn" href="http://xtoolza.info/q/checkheaders.php" title="Пакетная проверка HTTP статус-кодов страниц сайта" style="width:330px"><img class="transition-scale" src="http://xtoolza.info/q/images/statuscode_mini.png" width="80" title="Пакетная проверка HTTP статус-кодов страниц сайта" alt="Статус-код страницы, http-код">Получить статус коды страниц сайта</a>
					</td>
				</tr>
				<tr>
					<td>
						<a class="btn" href="http://xtoolza.info/q/check404.php" title="Пакетная проверка отработки 404 статус-кода на сайтах" style="width:330px"><img class="transition-scale" src="http://xtoolza.info/q/images/404_mini.png" width="80" title="Пакетная проверка отработки 404 статус-кода на сайтах" alt="404 статус-код">Проверить 404 статус-код</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<div style='display:none' id="div"><img src='http://xtoolza.info/q/cms/ajax-loader.gif' alt="loading..."><span style="margin-left:25px;">Кодировка проверяется. Пожалуйста, подождите и не закрывайте страницу.</span><br><br></div>
<div style="width: 750px">
<b style="text-decoration: none;">HTTP заголовок Last-Modified</b>, (последние изменения) передает клиенту время последнего изменения документа (веб-страницы). Благодаря last modified, мы показываем для робота только новые страницы (или обновленные). Робот приходит на сайт и берет сперва то, что нужно, а потом все остальное. Как и sitemap xml, заголовки last-modified являются рекомендацией, а не руководством к действию и поисковые роботы все равно будут индексировать даже старые страниц, но уже в другом порядке.
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
</body>
</html>
