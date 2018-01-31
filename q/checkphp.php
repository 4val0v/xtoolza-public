<?php header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Проверка сайтов на PHP</title>
	<meta name="description" content="Пакетная проверка сайтов на PHP позволяет массово проверить на наличие на них платформы PHP, версию PHP и вебсервера сайта">
	<meta name="keywords" content="пакетная проверка сайтов на PHP, проверить версию PHP, проверить фронтэнд сервера сайта, Frontend Server checker, php version checker, проверить PHP? проверить сервер сайта">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
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
								<td><h1 class="jumbotron">Пакетная проверка сайтов PHP, версии PHP, вебсервера сайта</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/php.png" width="80" alt="Проверить PHP версию"> </td>
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
		<form action="/q/checkerphp.php" method="post">
			<textarea  name="textt" id="textarea" rows="20" cols="500"
			  onclick='if(this.value=="вставьте список сайтов сюда") this.value=""'
			  onblur='if(this.value=="") this.value="вставьте список сайтов сюда"'
			>вставьте список сайтов сюда</textarea><br />
			<input type="submit" value="Проверить" class="btn-success btn" onclick='document.getElementById("div").style.display = "block";'>
			<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow" style="padding-left:5px;">На главную</a>
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
					<a class="btn" href="http://xtoolza.info/q/map_sait/sitemap_create.php" title="Создать карту сайта sitemap.xml онлайн" style="width:300px;"><img class="transition-scale" src="http://xtoolza.info/q/images/sitemapcreate_mini.png" width="80" title="Создать карту сайта sitemap.xml онлайн" alt="Создать карту сайта">Создать карту сайта</a>
				</td>
			</tr>
		<tr>
			<td>
				<a class="btn" href="http://xtoolza.info/q/checkcy.php" title="Пакетная проверка тИЦ/PR сайта" style="width:300px;"><img class="transition-scale" src="http://xtoolza.info/q/images/tICPR_mini.jpg" width="80" title="Пакетная проверка тИЦ/PR сайта" alt="Проверить тИЦ/PR">Проверить тИЦ, PR, YaCa, DMOZ</a>
			</td>
		</tr>
		</table>
	</td>
	</tr>
</table>
<div style='display:none' id="div"><img src='http://xtoolza.info/q/images/logo.php' alt="Loading..."><span style="padding-left:25px;">Идёт проверка на наличие PHP. Пожалуйста, подождите и не закрывайте страницу.</span><br><br></div>
<div style="width: 750px">
<b style="text-decoration: none;">Проверить сайт на PHP</b> - позволяет пакетно проверить список сайтов на наличине на них PHP-платформы, версию PHP и frontend сервер. Вероятность определения примерно 85%.
</div>
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
</body>
</html>
