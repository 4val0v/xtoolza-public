<?
header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Favicon checker. Пакетная выгрузка favicon сайта</title>
	<meta name="description" content="Инструмент пакетной выгрузки favicon сайтов. Выгрузить фавикон с сайта" />
	<meta name="keywords" content="выгрузить favicon, скачать фавинон" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link href="/q/style.css" rel="stylesheet"/>
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
								<td><h1 class="jumbotron">Выгрузить favicon сайта</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/favicon.jpg" width="80" alt="Выгрузить favicon сайта"> </td>
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
		<form action="/q/fav/getfavicon.php" method="post">
			<textarea  name="textt" id="textarea" rows="20" cols="500"
			  onclick='if(this.value=="вставьте список сайтов сюда") this.value=""'
			  onblur='if(this.value=="") this.value="вставьте список сайтов сюда"'
			>вставьте список сайтов сюда</textarea><br />
			<input type="submit" value="Выгрузить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";'/>
			<a class="btn-success btn" href="http://xtoolza.info" style="padding:left:5px;">На главную</a>
		</form>
		</td>
	<td>
		<table>
			<tr>
				<td>
					<a class="btn" href="http://xtoolza.info/q/cms/index.php" title="Инструмент пакетной онлайн проверки CMS сайта" style="width:300px;"><img class="transition-scale" src="http://xtoolza.info/q/images/cms_mini.png" width="80" title="Инструмент пакетной онлайн проверки CMS сайта" alt="Пакетная проверка CMS сайтов">Пакетная проверка CMS сайтов</a>
				</td>
			</tr>
			<tr>
				<td>
					<a class="btn" href="http://xtoolza.info/q/checklinks.php" title="Инструмент пакетной выгрузки всех ссылок со страниц" style="width:300px;"><img class="transition-scale" src="http://xtoolza.info/q/images/url_mini.png" width="80" title="Инструмент пакетной выгрузки всех ссылок со страниц" alt="Выгрузить ссылки">Выгрузить ссылки со страницы</a>
				</td>
			</tr>
		<tr>
			<td>
				<a class="btn" href="http://xtoolza.info/q/puny/punycode_converter.php" title="Инструмент конвертирования кириллических доменов в punycode и обратно" style="width:300px;"><img class="transition-scale" src="http://xtoolza.info/q/images/punicode_mini.png" width="80" title="Инструмент конвертирования кириллических доменов в punycode и обратно" alt="Конвертировать в punycode online">Punycode конвертер</a>
			</td>
		</tr>
		</table>
	</td>
	</tr>
</table>
<div style='display:none' id="div"><img src='http://xtoolza.info/q/cms/ajax-loader.gif' alt='Loading...'><span style="padding-left:25px;">Favicon'ки выгружаются. Пожалуйста, подождите и не закрывайте страницу.</span></div>
<div style="width: 750px">
<b style="text-decoration: none;">Favicon</b> - маленькое изображение (пиктограмма) в заголовке браузера, рядом с заголовком страницы. Также favicon отображается в сниппете в поисковой системе Яндекс. Привлекательность сниппета позволяет пользователю легче ориентироваться во вкладках браузера, а также быстрее находить желаемый сайт в выдаче поисковой системы.
</div>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
