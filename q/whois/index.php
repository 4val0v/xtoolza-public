<!DOCTYPE html>
<html>
<head>
	<title>NS name checker</title>
	<meta name="description" content="NS name checker" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>

    
</head>
<body>
<div id="loader" style="position: fixed; background-color: white; width: 100%; height: 100%; top: 0px; left: 0px; opacity: 0.7; display: none">
<img src="/Content/images/loader.gif" alt="Загрузка..." style="position: fixed; width: 128px; height: 128px; left:50%; top:50%; margin: -64px 0 0 -64px" />
</div>
<table cellpadding="5"><tr><td><img src="http://xtoolza.info/q/images/favicon.jpg" width="90"></td><td><h1>NS name checker</h1></td></tr></table>
<?php header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num)); ?>
<form action="/q/whois/result.php" method="post">

<textarea  name="textt" id="textarea" rows="20" cols="500"
  onclick='if(this.value=="вставьте список сайтов сюда") this.value=""'  
  onblur='if(this.value=="") this.value="вставьте список сайтов сюда"' 
>вставьте список сайтов сюда</textarea><br />
<input type="submit" value="Выгрузить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";'/>&nbsp;&nbsp;
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
	 </form>

<div style='display:none' id="div"><img src='http://xtoolza.info/q/cms/ajax-loader.gif'>&nbsp;&nbsp;&nbsp;<span>Favicon'ки выгружаются. Пожалуйста, подождите и не закрывайте страницу.</span></div>	 
<div style="width: 750px">
<!--description-->
</div>  	 
<? include ('../../yandex_metrika.php'); ?>

<body>
</html>