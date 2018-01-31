<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="index, follow" />
    <title>Пакетный енкодер URL (encode)</title>
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>
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
					<a href="http://xtoolza.info" rel="nofollow"><img src="http://xtoolza.info/q/images/logo.png" width="120px"></a>
				</td>
				<td>
					<table>
						<tbody>
							<tr>
								<td><h1 class="jumbotron">Пакетный енкодер URL (encode)</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/decode.png" width="80" alt="Пакетный енкодер URL (encode)"> </td>
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
		<?$urlscheme = parse_url($_POST['url']);?>
			<form action="/q/puny/mass_urldecode_converter.php" method="post">
				<? if ($_POST['text'] != null) {
					echo '<textarea name="text2" id="text2" rows="20" cols="500">';
					$plist = explode("\r\n",$_POST['text']);
					foreach ($plist as $list){
						echo urldecode($list).PHP_EOL;
					}
					} else {
						echo "<textarea  name=\"text2\" id=\"text2\" rows=\"20\" cols=\"500\"
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
<b style="text-decoration: none;">urlencode</b> — URL-кодирование строки. Возвращает строку, в которой все не цифробуквенные символы, кроме -_. должны быть заменены знаком процента (%), за которым следует два шестнадцатеричных числа, а пробелы кодируются как знак сложения (+).
</div><br /><br /><br />
<a class="btn" href="http://xtoolza.info/q/puny/mass_puny.php" title="Пакетный конвертер в url"><img class="transition-scale" src="http://xtoolza.info/q/images/punicode_complex.png" width="80" title="Пакетный конвертер в url" alt="Пакетный конвертер в url">Пакетный конвертер в punycode</a>
<a class="btn" href="http://xtoolza.info/q/puny/mass_cyrillic.php" title="Пакетный конвертер в кириллицу"><img class="transition-scale" src="http://xtoolza.info/q/images/punicode_complex.png" width="80" title="Пакетный конвертер в кириллицу" alt="Пакетный конвертер в кириллицу">Пакетный конвертер в кириллицу</a><br />
<a class="btn" href="http://xtoolza.info/q/htmlconverter/index.php" title="Конвертер HTML кода"><img class="transition-scale" src="http://xtoolza.info/q/images/htmlentities.jpg" width="80" title="Конвертер HTML кода" alt="Конвертер HTML кода">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Конвертер HTML кода&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a class="btn" href="http://xtoolza.info/q/puny/urlencode_converter.php" title="Закодировать URL (encode)"><img class="transition-scale" src="http://xtoolza.info/q/images/encode.png" width="80" title="Закодировать URL (encode)" alt="Закодировать URL (encode)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Закодировать URL (encode)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a class="btn" href="http://xtoolza.info/q/puny/mass_urldecode_converter.php" title="Пакетный декодер URL (decode)"><img class="transition-scale" src="http://xtoolza.info/q/images/decode.png" width="80" title="Пакетный декодер URL (decode)" alt="Пакетный декодер URL (decode)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Пакетный декодер URL (decode)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><br/><br/>
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
