<?php header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Проверка Meta name robots.</title>
	<meta name="description" content="Инструмент пакетной проверки страниц сайта на серверную и кодировку по мета-тегу" />
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
<div id="loader" style="position: fixed; background-color: white; width: 100%; height: 100%; top: 0px; left: 0px; opacity: 0.7; display: none">
<img src="/Content/images/loader.gif" alt="Загрузка..." style="position: fixed; width: 128px; height: 128px; left:50%; top:50%; margin: -64px 0 0 -64px" />
</div>
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
								<td><h1 class="jumbotron">Проверка Meta name robots</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/metarobots.png" width="80" alt="Проверка Meta name robots"> </td>
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
		<form action="/q/metarobots.php" method="post" id="xtoolza_form">
		<textarea name="textt" id="textarea" rows="20" cols="500"
		  onclick='if(this.value=="вставьте список целевых страниц сюда") this.value=""'
		  onblur='if(this.value=="") this.value="вставьте список целевых страниц сюда"'
		>вставьте список целевых страниц сюда</textarea><br />
		<input type="submit" value="Проверить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";' />
		<span style="padding-left:5px;"><a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a></span>
		</form>
	</td>
	<td>
		<table>
			<tr>
				<td><a class="btn" href="http://xtoolza.info/q/tags/" title="Проверить кол-во тегов акцентирования" style="width:350px;"><img class="transition-scale" src="http://xtoolza.info/q/images/strong.png" width="80" title="Проверить кол-во тегов акцентирования" alt="теги акцентирования">Проверить кол-во тегов акцентирования</a></td>
			</tr>
			<tr>
				<td>
				<a class="btn" href="http://xtoolza.info/q/checktdk.php" title="Пакетная выгрузка мета-тегов title, description, keywords с указанных страниц" style="width:350px;"><img class="transition-scale" src="http://xtoolza.info/q/images/tdk_mini.jpg" width="80" title="Пакетная выгрузка мета-тегов title, description, keywords с указанных страниц" alt="Выгрузить meta-теги">Выгрузить meta-теги</a>
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
<div style='display:none' id="div"><img src='http://xtoolza.info/q/cms/ajax-loader.gif' alt="Loading..."><span style="padding-left:25px;">Мета-тег robots проверяется. Пожалуйста, подождите и не закрывайте страницу.</span><br><br></div>
<div style="width: 750px">
<b>Мета тег robots</b> предоставляет информацию для робота поисковой системы о том, следует ли индексировать текущую страницу, а также следует ли переходить по ссылкам на ней. Например:<br>
<ul>
<li>&lt;meta name="robots" content="all"/&gt; - даёт понять роботу, что можно индексировать текст на странице и переходить по ссылкам</li>
<li>&lt;meta name="robots" content="index, follow"/&gt; - работает аналогично</li>
<li>&lt;meta name="robots" content="noindex"/&gt; - запрещает поисковому роботу индексировать текст на странице</li>
<li>&lt;meta name="robots" content="nofollow"/&gt;  - запрещает поисковому роботу переходить по ссылкам на странице, а следовательно, вес ссылки не будет передан</li>
<li>&lt;meta name="robots" content="none"/&gt;  - запрещает поисковому роботу переходить по ссылкам на странице и индексировать текст</li>
<li>&lt;meta name="robots" content="noindex, nofollow"/&gt;  - работает аналогично предыдущему</li>
<li>&lt;meta name="robots" content="noarchive"/&gt;  - запрещает показывать ссылку на сохраненную копию на странице выдачи поисковой системы</li>
<li>&lt;meta name="robots" content="noyaca"/&gt;  - запрещает Яндексу показывать в выдаче описание из Яндекс.Каталога</li>
<li>&lt;meta name="robots" content="noodp"/&gt;  - запрещает Яндексу показывать в выдаче описание из DMOZ</li>
</ul>
<p>Здесь стоит отметить, что если на странице meta тегом robots разрешено следовать по ссылкам, но на странице в ссылке указан атрибут тега rel="nofollow" - переход по ссылке не будет осуществлен. То есть, преимущество перед тегом имеет атрибут nofollow. Аналогично и для тега &lt;noindex&gt; , используемого поисковой системой Яндекс. Текст находящийся между &lt;noindex&gt;&lt;/noindex&gt; не будет проиндексирован, даже если мета-тегом robots он разрешен к индексации.
</div>
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
</body>
</html>
