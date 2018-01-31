<!DOCTYPE HTML>
<html>
<head>
<title>Пакетная декодер URL (decode)</title>
<meta name="description" content="">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width" />
<meta name="robots" content="all" />
<link href="/q/style.css" rel="stylesheet"/>
<script src="/q/modernize.js"></script>
<script src="/q/seotext.js"></script>
<link href="/q/css.css" rel="stylesheet"/>
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
					<a href="http://xtoolza.info" rel="nofollow"><img src="http://xtoolza.info/q/images/logo.png" width="120px"></a>
				</td>
				<td>
					<table>
						<tbody>
							<tr>
								<td><h1 class="jumbotron">Пакетная декодер URL (decode)</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/encode.png" width="80" alt="Пакетная декодер URL (decode)"> </td>
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
			<form action="/q/puny/mass_urlencode_converter.php" method="post">
				<? if ($_POST['text2'] != null) {
				echo '<textarea name="text" id="text" rows="20" cols="500">';
					$plist = explode("\r\n",$_POST['text2']);
					foreach ($plist as $list){
						echo urlencode($list).PHP_EOL;
					}
					} else {
						echo "<textarea  name=\"text\" id=\"text\" rows=\"20\" cols=\"500\"
						onclick='if(this.value==\"введите текст\") this.value=\"\"'
						onblur='if(this.value==\"\") this.value=\"введите текст\"'>введите текст";
					}
				?></textarea><br />
				<input class="btn-success btn" type="submit" value="Конвертировать" />
			</form>
		</td>
	</tr>
</table>
<div style="width: 750px">
<b style="text-decoration: none;">urldecode</b> — Декодирование URL-кодированной строки. Декодирует любые %## кодированные последовательности в данной строке. Символ "плюс" ('+') декодируется в символ пробела.
</div>
<br /><br />
<a class="btn" href="http://xtoolza.info/q/puny/mass_puny.php" title="Пакетный конвертер в url"><img class="transition-scale" src="http://xtoolza.info/q/images/punicode_complex.png" width="80" title="Пакетный конвертер в url" alt="Пакетный конвертер в url">Пакетный конвертер в punycode</a>
<a class="btn" href="http://xtoolza.info/q/puny/mass_cyrillic.php" title="Пакетный конвертер в кириллицу"><img class="transition-scale" src="http://xtoolza.info/q/images/punicode_complex.png" width="80" title="Пакетный конвертер в кириллицу" alt="Пакетный конвертер в кириллицу">Пакетный конвертер в кириллицу</a><br />
<a class="btn" href="http://xtoolza.info/q/htmlconverter/index.php" title="Конвертер HTML кода"><img class="transition-scale" src="http://xtoolza.info/q/images/htmlentities.jpg" width="80" title="Конвертер HTML кода" alt="Конвертер HTML кода">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Конвертер HTML кода&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a class="btn" href="http://xtoolza.info/q/puny/urldecode_converter.php" title="Раскодировать URL (decode)"><img class="transition-scale" src="http://xtoolza.info/q/images/decode.png" width="80" title="Раскодировать URL (decode)" alt="Раскодировать URL (decode)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Раскодировать URL (decode)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a class="btn" href="http://xtoolza.info/q/puny/mass_urlencode_converter.php" title="Пакетный енкодер URL (encode)"><img class="transition-scale" src="http://xtoolza.info/q/images/encode.png" width="80" title="Пакетный енкодер URL (encode)" alt="Пакетный енкодер URL (encode)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Пакетный енкодер URL (encode)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><br/><br/>
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
