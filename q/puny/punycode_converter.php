<!DOCTYPE HTML>
<html>
<?// считываем текущее время
$start_time = microtime();
$start_array = explode(" ",$start_time);
$start_time = $start_array[1] + $start_array[0];
?>
<head>
<title>Punycode конвертер кириллицы</title>
<meta name="description" content="Пакетный punycode конвертер онлайн. С помощью данного инструмента вы можете преобразовать доменное имя в Punycode и обратно.">
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
require_once('idna_convert.class.php');
$idn = new idna_convert(array('idn_version'=>2008));
$punycode=isset($_REQUEST['punycode']) ? stripslashes($_REQUEST['punycode']) : '';
$punycode=(stripos($punycode, 'xn--')!==false) ? $idn->decode($punycode) : $idn->encode($punycode);
?>
<table cellpadding="5"><tr><td><img src="http://xtoolza.info/q/images/punicode.png" width="90"></td><td><h1>Punycode Converter</h1><br><br> <br><br></td></tr></table>
<table border="0" cellpadding="2" cellspacing="2" align="left">
	<tr>
		<td>Конвертация интернациональных имен доменов (IDN) в кодировку Punycode и обратно.<br /><br /></td>
	</tr>
	<tr>
		<td>
			<form action="" method="post">
				<input type="text" id="punycode" name="punycode" value="<?php echo htmlentities($punycode, null, 'UTF-8'); ?>" maxlength="255" size="48" /><br />
				<input class="btn-success btn" type="submit" value="Конвертировать" />
			</form>
		</td>
	</tr>
</table>
<br /><br /><br /><br /><br /><br /><br />
<table border="0" cellpadding="2" cellspacing="2" align="left">
	<tr>
		<td>
			<a class="btn" href="http://xtoolza.info/q/puny/base64_decoder.php" title="Раскодировать из base_64 (decode)" width="100%"><img class="transition-scale" src="http://xtoolza.info/q/images/base_64.png" width="80" title="Раскодировать из base_64 (decode)" alt="Раскодировать из base_64 (decode)">&nbsp;&nbsp;Раскодировать из base64(decode)</a>
		</td>
		<td>
			<a class="btn" href="http://xtoolza.info/q/puny/base64_encoder.php" title="Закодировать в base_64 (encode)"><img class="transition-scale" src="http://xtoolza.info/q/images/base_64.png" width="80" title="Закодировать в base_64 (encode)" alt="Закодировать в base_64 (encode)">&nbsp;&nbsp;Закодировать в base_64 (encode)</a>
		</td>
		<td>
			<a class="btn" href="http://xtoolza.info/q/htmlconverter/index.php" title="Конвертер HTML кода"><img class="transition-scale" src="http://xtoolza.info/q/images/htmlentities.jpg" width="80" title="Конвертер HTML кода" alt="Конвертер HTML кода">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Конвертер HTML кода&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
		</td>
	</tr>
	<tr>
		<td>
			<a class="btn" href="http://xtoolza.info/q/puny/mass_puny.php" title="Пакетный конвертер в url"><img class="transition-scale" src="http://xtoolza.info/q/images/punicode_complex.png" width="80" title="Пакетный конвертер в url" alt="Пакетный конвертер в url">&nbsp;&nbsp;Пакетный конвертер в punycode</a>
		</td>
		<td>
			<a class="btn" href="http://xtoolza.info/q/puny/mass_cyrillic.php" title="Пакетный конвертер в кириллицу"><img class="transition-scale" src="http://xtoolza.info/q/images/punicode_complex.png" width="80" title="Пакетный конвертер в кириллицу" alt="Пакетный конвертер в кириллицу">Пакетный конвертер в кириллицу</a>
		</td>
	</tr>
	<tr>
		<td>
			<a class="btn" href="http://xtoolza.info/q/puny/urldecode_converter.php" title="Раскодировать URL (decode)"><img class="transition-scale" src="http://xtoolza.info/q/images/decode.png" width="80" title="Раскодировать URL (decode)" alt="Раскодировать URL (decode)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Раскодировать URL (decode)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><br/>
		</td>
		<td>
			<a class="btn" href="http://xtoolza.info/q/puny/urlencode_converter.php" title="Закодировать URL (encode)"><img class="transition-scale" src="http://xtoolza.info/q/images/encode.png" width="80" title="Закодировать URL (encode)" alt="Закодировать URL (encode)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Закодировать URL (encode)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
		</td>
		<td>
		</td>
	</tr>
</table><br />
<br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br />
<div style="width: 750px"><br><br><br><br>
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a><br><br>
<b style="text-decoration: none;">Punycode</b> - это кодировка, используемая в разноязычной системе доменов. С помощью данного инструмента вы можете преобразовать доменное имя в Punycode и обратно.
</div>
<? include ('../../yandex_metrika.php'); ?>
<div style="text-align: center; bottom:10px; position: relative;">
<?   //generate time
$end_time = microtime();
$end_array = explode(" ",$end_time);
$end_time = $end_array[1] + $end_array[0];
$time = $end_time - $start_time;
printf("Страница сгенерирована за %f секунд",$time);
?>
</div>
</body>
</html>
