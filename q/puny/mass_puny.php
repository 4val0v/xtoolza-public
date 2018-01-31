<?
header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Пакетный конвертер кириллицы в punycode</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="all" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
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
								<td><h1 class="jumbotron">Пакетный конвертер кириллицы в punycode</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/punypuny.png" width="80" alt="Пакетный конвертер кириллицы в punycode"> </td>
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
		<form action="/q/puny/mass_punyer.php" method="post">
			<textarea  name="textt" id="textarea" rows="20" cols="500"
			  onclick='if(this.value=="вставьте список сайтов сюда") this.value=""'
			  onblur='if(this.value=="") this.value="вставьте список сайтов сюда"'
			>вставьте список сайтов сюда</textarea><br />
			<input type="submit" value="Конвертировать" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";' />&nbsp;&nbsp;<br/><br/>
			<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">&nbsp;&nbsp;<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
		</form>
	 	</td>
		<td>
			<table>
				<tr>
					<td>
						<a class="btn" href="http://xtoolza.info/q/puny/mass_cyrillic.php" title="Пакетный конвертер в кириллицу" style="width:300px;"><img class="transition-scale" src="http://xtoolza.info/q/images/punicode_complex.png" width="80" title="Пакетный конвертер в кириллицу" alt="Пакетный конвертер в кириллицу">Пакетный конвертер в кириллицу</a>
					</td>
				</tr>
				<tr>
					<td>
						<a class="btn" href="http://xtoolza.info/q/htmlconverter/index.php" title="Конвертер HTML кода" style="width:300px;"><img class="transition-scale" src="http://xtoolza.info/q/images/htmlentities.jpg" width="80" title="Конвертер HTML кода" alt="Конвертер HTML кода">Конвертер HTML кода</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<div style='display:none' id="div"><img src='http://xtoolza.info/q/cms/ajax-loader.gif'><span style="padding-left:25px;">Конвертируем. Пожалуйста, подождите и не закрывайте страницу.</span><br><br></div>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
