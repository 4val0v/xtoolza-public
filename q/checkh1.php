<?php header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Выгрузка h1-h6 со страниц. H1-H6 checker.</title>
	<meta name="description" content="Инструмент пакетной проверки заголовков h1-h6 страниц сайта. С помощью данного инструмента можно пакетно выгрузить все заголовки h1 h6 с указанных страниц онлайн." />
	<meta name="keywords" content="выгрузить h1, выгрузить заголовки, заголовок h1" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
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
								<td><h1 class="jumbotron">Выгрузка h1-h6 со страниц</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/h1.png" width="80" alt="Выгрузка h1-h6 со страниц"> </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<table>
	<tr><td>
		<form action="/q/checkerh1.php" method="post">
		<textarea  name="textt" id="textarea" rows="20" cols="500"
		  onclick='if(this.value=="вставьте список страниц сюда") this.value=""'
		  onblur='if(this.value=="") this.value="вставьте список страниц сюда"'
		>вставьте список страниц сюда</textarea><br />
		<input type="submit" value="Проверить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";' />
		<span style="padding-left:5px;"><a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a></span>
	</form>
	</td>
	<td>
		<table>
			<tr>
				<td>
					<a class="btn" href="http://xtoolza.info/q/metarobotscheck.php" title="Проверить meta name robots" style="width:350px;"><img class="transition-scale" src="http://xtoolza.info/q/images/metarobots.jpg" width="80" title="Проверить meta name robots" alt="meta name robots">Проверить meta name robots</a>
				</td>
			</tr>
			<tr>
				<td>
					<a class="btn" href="http://xtoolza.info/q/checktdk.php" title="Пакетная выгрузка мета-тегов title, description, keywords с указанных страниц" style="width:350px;"><img class="transition-scale" src="http://xtoolza.info/q/images/tdk_mini.jpg" width="80" title="Пакетная выгрузка мета-тегов title, description, keywords с указанных страниц" alt="Выгрузить meta-теги">Выгрузить meta-теги</a>
				</td>
			</tr>
		<tr>
			<td>
				<a class="btn" href="http://xtoolza.info/q/tags/" title="Проверить кол-во тегов акцентирования" style="width:350px;"><img class="transition-scale" src="http://xtoolza.info/q/images/strong.png" width="80" title="Проверить кол-во тегов акцентирования" alt="теги акцентирования">Проверить кол-во тегов акцентирования</a>
			</td>
		</tr>
		</table>
	</td>
	</tr>
</table>
<div style='display:none' id="div"><img src='http://xtoolza.info/q/cms/ajax-loader.gif' alt="Loading..."><span style="padding-left:25px;">Идёт выгрузка заголовков. Пожалуйста, подождите и не закрывайте страницу.</span><br><br></div>
<div style="width: 750px">
<b style="text-decoration: none;">Заголовки H1-H6</b>- позволяют визуально и по степени важности оценить заголовки в тексте как для пользователя, так и для поисковых систем. H1-H6 позволяют структурировать документ примерно так:<br /><br />
<img src="http://xtoolza.info/q/images/razmetka.gif" alt="h1-h6 разметка" width="570"/><br>
С помощью данного инструмента можно пакетно выгрузить все заголовки с указанных страниц.
</div>
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
</body>
</html>
