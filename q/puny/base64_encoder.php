<?
header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Закодировать в base_64 (encode)</title>
	<meta name="description" content="">
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="all" />
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
								<td><h1 class="jumbotron">Закодировать в base_64 (encode)</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/base_64.png" width="80" alt="Закодировать в base_64 (encode)"> </td>
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
			<form action="/q/puny/base64_decoder.php" method="post">
				<? if ($_POST['text2'] != null) {
				echo '<textarea name="text" id="text" rows="20" cols="500">';
					echo base64_decode($_POST['text2']);
					} else {
						echo "<textarea  name=\"text\" id=\"text\" rows=\"20\" cols=\"500\"
						onclick='if(this.value==\"введите текст\") this.value=\"\"'
						onblur='if(this.value==\"\") this.value=\"введите текст\"'>введите текст";
					}
				?></textarea><br />

				<input class="btn-success btn" type="submit" value="Конвертировать" />
			</form>
		</td>
		<td>
			<a class="btn" href="http://xtoolza.info/q/puny/base64_decoder.php" title="Раскодировать из base_64 (decode)" style="width:310px;"><img class="transition-scale" src="http://xtoolza.info/q/images/base_64.png" width="80" title="Раскодировать из base_64 (decode)" alt="Раскодировать из base_64 (decode)">Раскодировать из base64(decode)</a><br />
			<a class="btn" href="http://xtoolza.info/q/puny/mass_puny.php" title="Пакетный конвертер в url" style="width:310px;"><img class="transition-scale" src="http://xtoolza.info/q/images/punicode_complex.png" width="80" title="Пакетный конвертер в url" alt="Пакетный конвертер в url">Пакетный конвертер в punycode</a>
			<a class="btn" href="http://xtoolza.info/q/puny/mass_cyrillic.php" title="Пакетный конвертер в кириллицу" style="width:310px;"><img class="transition-scale" src="http://xtoolza.info/q/images/punicode_complex.png" width="80" title="Пакетный конвертер в кириллицу" alt="Пакетный конвертер в кириллицу">Пакетный конвертер в кириллицу</a><br />
			<a class="btn" href="http://xtoolza.info/q/htmlconverter/index.php" title="Конвертер HTML кода" style="width:310px;"><img class="transition-scale" src="http://xtoolza.info/q/images/htmlentities.jpg" width="80" title="Конвертер HTML кода" alt="Конвертер HTML кода">Конвертер HTML кода</a>
			<a class="btn" href="http://xtoolza.info/q/puny/urldecode_converter.php" title="Раскодировать URL (decode)" style="width:310px;"><img class="transition-scale" src="http://xtoolza.info/q/images/decode.png" width="80" title="Раскодировать URL (decode)" alt="Раскодировать URL (decode)">Раскодировать URL (decode)</a><br/>
		</td>
	</tr>
</table>
<div style="width: 750px">
<b style="text-decoration: none;">base64_encode</b> — Kодирует данные алгоритмом MIME base64.
</div>
<br /><br />

<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
