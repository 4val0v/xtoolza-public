<?
header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Пакетный конвертер punycode в кириллицу</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="all" />
	<link href="/q/style.css" rel="stylesheet"/>
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
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
								<td><h1 class="jumbotron">Пакетный конвертер punycode в кириллицу</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/punypuny.png" width="80" alt="Пакетный конвертер punycode в кириллицу"> </td>
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
		<form action="/q/puny/mass_cyrillicer.php" method="post">
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
						<a class="btn" href="http://xtoolza.info/q/puny/mass_puny.php" title="Пакетный конвертер в punycode" style="width:300px;"><img class="transition-scale" src="http://xtoolza.info/q/images/punicode_complex.png" width="80" title="Пакетный конвертер в punycode" alt="Пакетный конвертер в punycode">Пакетный конвертер в punycode</a>
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
<div style='display:none' id="div"><img src='http://xtoolza.info/q/cms/ajax-loader.gif'><span style="padding-left:25px;">Кодировка проверяется. Пожалуйста, подождите и не закрывайте страницу.</span><br><br></div>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
