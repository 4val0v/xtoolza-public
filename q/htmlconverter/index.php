<?
header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Написать HTML код текстом. Конвертер HTML кода в символьные сущности</title>
	<meta name="Description" content="Конвертер html-кода онлайн. Как написать HTML код текстом? Для этого можно воспользоваться следующим конвертером" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="index, follow" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="/js/topbutton.js"></script>
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
								<td><h1 class="jumbotron">Конвертер HTML кода в символьные сущности</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/htmlentities.jpg" width="80" alt="Конвертер HTML кода в символьные сущности"> </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<p>Как написать код текстом на HTML странице? Чтобы написать html код текстом воспользуйтесь следующей формой:</p>

<table>
	<tr>
		<td>
		<form onsubmit="return false;"><textarea id="dencoder" rows="20" cols="300"></textarea><br>
			<input value="преобразовать" onclick="decode()" type="button">&nbsp;
			<input value="отменить" onclick="decode1()" type="button">
		</form>
		</td>
		<td>
			<table>
				<tr>
					<td>
						<a class="btn" href="http://xtoolza.info/q/htmlconverter/symbols/" title="Специальные символы HTML" style="width:300px"><img class="transition-scale" src="http://xtoolza.info/q/images/htmlchars.png" width="80" title="Специальные символы HTML" alt="Специальные символы HTML">Специальные символы HTML</a>
					</td>
				</tr>
				<tr>
					<td>
						<a class="btn" href="http://xtoolza.info/q/puny/mass_puny.php" title="Пакетный конвертер в punycode" style="width:300px"><img class="transition-scale" src="http://xtoolza.info/q/images/punicode_complex.png" width="80" title="Пакетный конвертер в punycode" alt="Пакетный конвертер в punycode">Пакетный конвертер в punycode</a>
					</td>
				</tr>
				<tr>
					<td>
						<a class="btn" href="http://xtoolza.info/q/puny/mass_cyrillic.php" title="Пакетный конвертер в кириллицу" style="width:300px"><img class="transition-scale" src="http://xtoolza.info/q/images/punicode_complex.png" width="80" title="Пакетный конвертер в кириллицу" alt="Пакетный конвертер в кириллицу">Пакетный конвертер в кириллицу</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
<script>
var obj = document.getElementById('dencoder');
function decode() {
 obj.value = obj.value.replace(/&/gi, '&amp;').replace(/</gi, '&lt;').replace(/>/gi, '&gt;');
}
function decode1() {
 obj.value = obj.value.replace(/\&lt;/gi, '<').replace(/\&gt;/gi, '>').replace(/\&amp;/gi, '&');
}
</script>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
