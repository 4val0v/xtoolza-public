<?
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>xToolza: анализ сайта</title>
<meta name="description" content="xToolza: анализ сайта" />
<meta name="viewport" content="width=device-width" /> 
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="ru" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
<link href="/newcss2.css" rel="stylesheet"/>
<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<base href="http://xtoolza.info/" />  
</head>
<body id="linearBg1">
<h1 style="color:white">Анализ сайта</h1>
<form action="/q/analysed.php" method="get" id="clicked">
<!--form action="<?// exec("start /B /usr/bin/php /home/b/b10xwru/xtoolza.info/public_html/q/map_sait/sitemap_created.php"); ?>" method="post" id="clicked"-->
<input type="text" name="site" value="Введите адрес сайта" onclick='if(this.value=="Введите адрес сайта") this.value=""' onBlur='if(this.value=="") this.value="Введите адрес сайта"'><br><br>
	 
	 
<input type="submit" value="Анализировать" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";' />&nbsp;&nbsp;
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
</form>

<div style='display:none' id="div"><img src='http://xtoolza.info/q/images/99.GIF' width="90">&nbsp;&nbsp;&nbsp;<span>Идёт анализ сайта. Пожалуйста, подождите и не закрывайте страницу.</span><br><br></div>






</body>
</html>