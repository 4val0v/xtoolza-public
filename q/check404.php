<? header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Проверить 404 статус код сайта</title>
	<meta name="description" content="Инструмент пакетной проверки 404 ошибки статус кода сайтов. С помощью этого инструмента вы можете массово проверить 404 ошибку на страницах вашего сайта онлайн" />
	<meta name="keywords" content="проверить 404 статус на сайте, 404 ошибка" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<?
	$current_page_uri = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$canonicaluri = rtrim(preg_replace( '/&?utm_.+?(&|$)$/', '', $current_page_uri ),'?');
	echo "<link rel='canonical' href='http://$canonicaluri'/>";
	?>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
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
								<td><h1 class="jumbotron">Проверить 404 статус код сайта</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/404.png" width="80" alt="Проверить 404 статус код сайта"></td>
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
			<form action="/q/checker404.php" method="post">
			<textarea  name="textt" id="textarea" rows="20" cols="500"
			  onclick='if(this.value=="вставьте список сайтов") this.value=""'
			  onblur='if(this.value=="") this.value="вставьте список сайтов"'
			>вставьте список сайтов</textarea><br />
			<input type="submit" value="Проверить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";'/>
			<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow" style="padding-left:5px">На главную</a>
			</form>
		</td>
		<td>
			<table>
				<tr>
					<td><a class="btn" href="http://xtoolza.info/q/checkheaders.php" title="Пакетная проверка HTTP статус-кодов страниц сайта" style="width:330px;"><img class="transition-scale" src="http://xtoolza.info/q/images/statuscode_mini.png" width="80" title="Пакетная проверка HTTP статус-кодов страниц сайта" alt="Статус-код страницы, http-код">Получить статус коды страниц сайта</a></td>
				</tr>
				<tr>
					<td>
					<a class="btn" href="http://xtoolza.info/q/checkencode.php" title="Пакетная проверка серверной и кодировки по мета-тегу" style="width:330px;"><img class="transition-scale" src="http://xtoolza.info/q/images/charset_mini.png" width="80" title="Пакетная проверка серверной и кодировки по мета-тегу" alt="Проверить кодировку">Проверить кодировку</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<div style='display:none' id="div"><img src='http://xtoolza.info/q/cms/ajax-loader.gif' alt="Loading..."><span style="padding-left:25px;">Идёт проверка 404 статусов. Пожалуйста, подождите и не закрывайте страницу.</span><br><br></div>
<div style="width: 750px">
<b style="text-decoration: none;">404 статус код</b> - статус-код несуществующей страницы. Если страница не существует, она должна отдавать 404 статус-код, а также должна наглядно дать понять пользователю, что он попал на несуществующую страницу. Если статус код будет отличным от 404 - поисковый робот может занести несуществующую страницу в выдачу, а это может негативно сказаться на позициях сайта. <br> С помощью данного сервиса вы можете пакетно проверить отдаёт ли сайт 404 статус-код.	 <br /><b>ВАЖНО!</b> Кириллические URL необходимо вводить в формате <a href="http://xtoolza.info/q/puny/punycode_converter.php" target="_blank">punycode</a><br /> Проверить какой статус код отдают страницы сайта вы можете <a href="http://xtoolza.info/q/checkheaders.php" target="_blank">здесь</a>
</div>
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
</body>
</html>
