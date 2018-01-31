<!DOCTYPE HTML>
<html>
<head>
	<title>Выгрузить canonical со страниц сайта</title>
	<meta name="description" content="Выгрузить canonical со страниц сайта">
	<meta name="keywords" content="Выгрузить canonical">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<link href="/q/style.css" rel="stylesheet"/>
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
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
								<td><h1 class="jumbotron">Выгрузить canonical со страниц сайта</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/canonical.png" width="80" alt="Выгрузить canonical со страниц сайта"> </td>
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
		<form action="/q/canonical/result.php" method="post">
			<textarea  name="textt" id="textarea" rows="20" cols="500"
			  onclick='if(this.value=="вставьте список сайтов сюда") this.value=""'
			  onblur='if(this.value=="") this.value="вставьте список сайтов сюда"'
			>вставьте список сайтов сюда</textarea><br />
			<input type="submit" value="Проверить" class="btn-success btn" onclick='document.getElementById("div").style.display = "block";'>&nbsp;&nbsp;
			<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
		</form>
	</td>
	<td>
		<table>
			<tr>
				<td>
					<a class="btn" href="http://xtoolza.info/q/cms/index.php" title="Инструмент пакетной онлайн проверки CMS сайта"><img class="transition-scale" src="http://xtoolza.info/q/images/cms_mini.png" width="80" title="Инструмент пакетной онлайн проверки CMS сайта" alt="Пакетная проверка CMS сайтов">Пакетная проверка CMS сайтов&nbsp;</a>
				</td>
			</tr>
			<tr>
				<td>
					<a class="btn" href="http://xtoolza.info/q/map_sait/sitemap_create.php" title="Создать карту сайта sitemap.xml онлайн"><img class="transition-scale" src="http://xtoolza.info/q/images/sitemapcreate_mini.png" width="80" title="Создать карту сайта sitemap.xml онлайн" alt="Создать карту сайта">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Создать карту сайта&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
				</td>
			</tr>
		<tr>
			<td>
				<a class="btn" href="http://xtoolza.info/q/checkcy.php" title="Пакетная проверка тИЦ/PR сайта"><img class="transition-scale" src="http://xtoolza.info/q/images/tICPR_mini.jpg" width="80" title="Пакетная проверка тИЦ/PR сайта" alt="Проверить тИЦ/PR">Проверить тИЦ, PR, YaCa, DMOZ</a>
			</td>
		</tr>
		</table>
	</td>
	</tr>
</table>
<div style='display:none' id="div"><img src='http://xtoolza.info/q/images/magnifier.gif' alt="Loading..." width='80'>&nbsp;&nbsp;&nbsp;<span>Выгружаем canonical. Пожалуйста, подождите и не закрывайте страницу.</span><br><br></div>
<div style="width: 750px">
	<p><strong>Canonical</strong> - это атрибут тега link, который позволяет указать поисковому роботу предпочитаемый (канонический) адрес страницы. Данный тег используется в первую очередь для сокрытия страниц с дублирующим контентом из выдачи поисковой системы, перенаправляя бота на указанный в href="" адрес.</p>
</div>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
