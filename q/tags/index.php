<?php header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Проверить и выгрузить количество тегов акцентирования</title>
	<meta name="description" content="Инструмент для проверки и выгрузки количества тегов акцентирования онлайн" />
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
								<td><h1 class="jumbotron">Проверить количество тегов акцентирования</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/strong.png" width="80" alt="Проверить количество тегов акцентирования"></td>
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
	<form action="http://xtoolza.info/q/tags/tagschecker.php" method="post">
		<textarea  name="textt" id="textarea" rows="20" cols="500"
		  onclick='if(this.value=="вставьте список целевых страниц") this.value=""'  
		  onblur='if(this.value=="") this.value="вставьте список целевых страниц"' 
		>вставьте список целевых страниц</textarea><br />
		<input type="submit" value="Проверить" class="btn-success btn" onclick='document.getElementById("div").style.display = "block";'>&nbsp;&nbsp;
		<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a><br /><br />
	</form>
	</td>
	<td>
		<table>
			<tr>
				<td>
					<a class="btn" href="http://xtoolza.info/q/metarobotscheck.php" title="Проверить meta name robots"><img class="transition-scale" src="http://xtoolza.info/q/images/metarobots.jpg" width="80" title="Проверить meta name robots" alt="meta name robots">&nbsp;&nbsp;&nbsp;&nbsp;Проверить meta name robots&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
				</td>
			</tr>
			<tr>
				<td>
					<a class="btn" href="http://xtoolza.info/q/checktdk.php" title="Пакетная выгрузка мета-тегов title, description, keywords с указанных страниц"><img class="transition-scale" src="http://xtoolza.info/q/images/tdk_mini.jpg" width="80" title="Пакетная выгрузка мета-тегов title, description, keywords с указанных страниц" alt="Выгрузить meta-теги">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Выгрузить meta-теги&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
				</td>
			</tr>
			<tr>
				<td>
					<a class="btn" href="http://xtoolza.info/q/checkh1.php" title="Пакетная выгрузка тегов H1-H6 со страниц сайта"><img class="transition-scale" src="http://xtoolza.info/q/images/h1_mini.png" width="80" title="Пакетная выгрузка тегов H1-H6 со страниц сайта" alt="Выгрузка h1-h6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Пакетная выгрузка h1-h6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
				</td>
			</tr>
		</table>	
	</td>
	</tr>
</table>

<div style='display:none' id="div"><img src='http://xtoolza.info/q/images/tags.gif' alt="Loading...">&nbsp;&nbsp;&nbsp;<span>Теги выгружаются. Пожалуйста, подождите и не закрывайте страницу.</span></div>
<div style="width: 750px">
<strong>Теги акцентирования</strong> используются в тексте для визуального (для посетителя страницы) выделения текста жирным текстом, курсивом и т.п. , а также для указания наиболее важных элементов на странице для поисковых систем. 
&lt;strong&gt; - как и тег &lt;b&gt; используется для выделения жирным шрифтом, однако он более приоритетен в глазах поисковых систем.<br>
&lt;em&gt; - как и тег &lt;i&gt; используется для выделения курсивом, но также более приоритетен для ПС.<br><br>
Злоупотребление тегами акцентирования не только негативно сказывается на визуальном оформлении страницы, но и крайне негативно расценивается поисковыми системами, с наложением возможных фильтров на страницу или/и сайт в целом.
</div>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>