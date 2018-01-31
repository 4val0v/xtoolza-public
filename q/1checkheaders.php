<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Status Code Checker</title>
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>

    
</head>
<body>
<h1>Status Code checker</h1>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<form action="/q/1checkheaders_resultpage.php" method="post">

<textarea  name="textt" id="textarea" rows="20" cols="500"
  onclick='if(this.value=="вставьте список целевых страниц сюда") this.value=""'  
  onblur='if(this.value=="") this.value="вставьте список целевых страниц сюда"' 
>вставьте список целевых страниц сюда</textarea><br />
<input type="submit" value="Проверить" class="btn-success btn">&nbsp;&nbsp;
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
	 </form>

  

<body>
</html>