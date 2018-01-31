<!DOCTYPE HTML>
<html>
<?// считываем текущее время
$start_time = microtime();
$start_array = explode(" ",$start_time);
$start_time = $start_array[1] + $start_array[0];
?>
<head>
<title>Пакетный конвертер URLEncode/URLDecode</title>
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
<div id="loader" style="position: fixed; background-color: white; width: 100%; height: 100%; top: 0px; left: 0px; opacity: 0.7; display: none">
<img src="/Content/images/loader.gif" alt="Загрузка..." style="position: fixed; width: 128px; height: 128px; left:50%; top:50%; margin: -64px 0 0 -64px" />
</div>
<table cellpadding="5"><tr><td><img src="http://xtoolza.info/q/images/punypuny.jpg" width="90"></td><td><h1>Пакетный конвертер URLEncode/URLDecode</h1></td></tr></table>
<form action="/q/urlcoding/encoded.php" method="post">

<textarea  name="textt" id="textarea" rows="20" cols="500"
  onclick='if(this.value=="вставьте список URL сюда") this.value=""'  
  onblur='if(this.value=="") this.value="вставьте список URL сюда"' 
>вставьте список URL сюда</textarea><br />
<input type="submit" value="Конвертировать" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";' />&nbsp;&nbsp;<br/><br/>
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">&nbsp;&nbsp;<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
	 </form>
<div style='display:none' id="div"><img src='http://xtoolza.info/q/cms/ajax-loader.gif'>&nbsp;&nbsp;&nbsp;<span>Конвертируем. Пожалуйста, подождите и не закрывайте страницу.</span><br><br></div> 
<div style="width: 750px">

</div>
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>



</body>
</html>