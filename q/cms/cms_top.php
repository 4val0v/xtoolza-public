<?php header('Content-Type: text/html; charset=utf-8'); 
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
$num=mt_rand(2000,10000);
error_reporting( E_ERROR );
ini_set('display_errors', 0);
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>CMS TOP 04 2015</title>
	<meta name="description" content="Рейтинг наиболее часто используемых CMS апрель 2015 " />
	<meta name="keywords" content="рейтинг CMS, CMS TOP, известные CMS, популярные CMS">
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="robots" content="all" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/q/cms/cms_top.php" rel="canonical">
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<script src="jquery-2.1.1.min.js" type="text/javascript"></script>
	<script src="http://xtoolza.info/q/modernize.js"></script>
	<script src="http://xtoolza.info/q/seotext.js"></script>
</head>
<body id="linearBg1">
<table>
	<tr>
		<td><img src="http://xtoolza.info/q/images/cms.png" width="90" alt="Пакетная проверка CMS сайтов"></td>
		<td><h1>CMS TOP 04 2015</h1></td>
	</tr>
</table>
<div>
<img src="http://xtoolza.info/q/cms/cms_top_2015_04.png" alt="ейтинг наиболее часто используемых CMS апрель 2015">
</div>
<br>
<a class="btn-success btn" href="http://xtoolza.info">На главную</a><br><br>
<div style="width: 750px font-size:14px;">
Рейтинг наиболее часто используемых CMS апрель 2015
</div><br>
<p>Всего проверено:
<?
$filelines = file('http://xtoolza.info/q/cms/logs/cmslogs.txt');
// $startlines=$filelines[count($filelines)-1];
//echo $startlines;
echo $countlines = (445171 + count($filelines));
?> сайта</p>
<br>


<? include ('../../yandex_metrika.php'); ?>
</body>
</html>