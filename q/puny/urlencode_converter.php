<!DOCTYPE HTML>
<html>
<head>
<title>Закодировать URL (encode)</title>
<meta name="description" content="">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width" />
<meta name="robots" content="all" />
<link href="/q/style.css" rel="stylesheet"/>
<script src="/q/modernize.js"></script>
<script src="/q/seotext.js"></script>
<link href="/q/css.css" rel="stylesheet"/>
<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
</head>
<body>
<?php
header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
?>

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
								<td><h1 class="jumbotron">Закодировать URL (encode)</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/encode.png" width="80" alt="Закодировать URL (encode)"> </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<br /><br />
<table border="0" cellpadding="2" cellspacing="2" align="left">
	<tr>
		<td>
			<form action="/q/puny/urldecode_converter.php" method="post">
				<input type="text" id="url" name="url" value="<? echo urldecode($_POST['url']); ?>" maxlength="255" size="48" /><br />
				<input class="btn-success btn" type="submit" value="Конвертировать" />
			</form>
		</td>
	</tr>
</table>
<div style="width: 750px">
<b style="text-decoration: none;">urlencode</b> — URL-кодирование строки. Возвращает строку, в которой все не цифробуквенные символы, кроме -_. должны быть заменены знаком процента (%), за которым следует два шестнадцатеричных числа, а пробелы кодируются как знак сложения (+).
</div>
<br /><br />
<a class="btn" href="http://xtoolza.info/q/puny/mass_puny.php" title="Пакетный конвертер в url"><img class="transition-scale" src="http://xtoolza.info/q/images/punicode_complex.png" width="80" title="Пакетный конвертер в url" alt="Пакетный конвертер в url">Пакетный конвертер в punycode</a>
<a class="btn" href="http://xtoolza.info/q/puny/mass_cyrillic.php" title="Пакетный конвертер в кириллицу"><img class="transition-scale" src="http://xtoolza.info/q/images/punicode_complex.png" width="80" title="Пакетный конвертер в кириллицу" alt="Пакетный конвертер в кириллицу">Пакетный конвертер в кириллицу</a><br />
<a class="btn" href="http://xtoolza.info/q/htmlconverter/index.php" title="Конвертер HTML кода"><img class="transition-scale" src="http://xtoolza.info/q/images/htmlentities.jpg" width="80" title="Конвертер HTML кода" alt="Конвертер HTML кода">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Конвертер HTML кода&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a class="btn" href="http://xtoolza.info/q/puny/urldecode_converter.php" title="Раскодировать URL (decode)"><img class="transition-scale" src="http://xtoolza.info/q/images/decode.png" width="80" title="Раскодировать URL (decode)" alt="Раскодировать URL (decode)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Раскодировать URL (decode)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a class="btn" href="http://xtoolza.info/q/puny/mass_urlencode_converter.php" title="Пакетный енкодер URL (encode)"><img class="transition-scale" src="http://xtoolza.info/q/images/encode.png" width="80" title="Пакетный енкодер URL (encode)" alt="Пакетный енкодер URL (encode)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Пакетный енкодер URL (encode)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><br/><br/>
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
