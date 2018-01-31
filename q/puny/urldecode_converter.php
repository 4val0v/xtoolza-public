<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="index, follow" />
    <title>Раскодировать URL (decode)</title>
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="/js/topbutton.js"></script>
</head>
<body>
<?header('Content-Type: text/html; charset=utf-8');?>
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
								<td><h1 class="jumbotron">Раскодировать URL (decode)</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/decode.png" width="80" alt="Конвертер HTML кода в символьные сущности"> </td>
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
		<?
		$urlscheme = parse_url($_POST['url']);
		$url_host = $urlscheme['host'];
		$encodedurl = urlencode($urlscheme['path'].$urlscheme['query']);
		$encodedurled = "$encodedurl";
		$slashedurl = str_replace('%2F', '/', $encodedurled);
		?>
			<form action="/q/puny/urlencode_converter.php" method="post">
				<input type="text" id="urlcoded" name="url" value="<? echo 'http://'.$url_host.$slashedurl; ?>" maxlength="255" size="48" /><br />
				<input class="btn-success btn" type="submit" value="Конвертировать" />
			</form>
		</td>
	</tr>
</table>
<div style="width: 750px">
<b style="text-decoration: none;">urldecode</b> — Декодирование URL-кодированной строки. Декодирует любые %## кодированные последовательности в данной строке. Символ "плюс" ('+') декодируется в символ пробела.
</div><br /><br /><br />
<a class="btn" href="http://xtoolza.info/q/puny/mass_puny.php" title="Пакетный конвертер в url"><img class="transition-scale" src="http://xtoolza.info/q/images/punicode_complex.png" width="80" title="Пакетный конвертер в url" alt="Пакетный конвертер в url">Пакетный конвертер в punycode</a>
<a class="btn" href="http://xtoolza.info/q/puny/mass_cyrillic.php" title="Пакетный конвертер в кириллицу"><img class="transition-scale" src="http://xtoolza.info/q/images/punicode_complex.png" width="80" title="Пакетный конвертер в кириллицу" alt="Пакетный конвертер в кириллицу">Пакетный конвертер в кириллицу</a><br />
<a class="btn" href="http://xtoolza.info/q/htmlconverter/index.php" title="Конвертер HTML кода"><img class="transition-scale" src="http://xtoolza.info/q/images/htmlentities.jpg" width="80" title="Конвертер HTML кода" alt="Конвертер HTML кода">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Конвертер HTML кода&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a class="btn" href="http://xtoolza.info/q/puny/urlencode_converter.php" title="Закодировать URL (encode)"><img class="transition-scale" src="http://xtoolza.info/q/images/encode.png" width="80" title="Закодировать URL (encode)" alt="Закодировать URL (encode)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Закодировать URL (encode)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a class="btn" href="http://xtoolza.info/q/puny/mass_urldecode_converter.php" title="Пакетный декодер URL (decode)"><img class="transition-scale" src="http://xtoolza.info/q/images/decode.png" width="80" title="Пакетный декодер URL (decode)" alt="Пакетный декодер URL (decode)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Пакетный декодер URL (decode)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><br/><br/>
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
