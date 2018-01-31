<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Status Code Checker</title>
    <link href="http://192.168.7.211:8090//Content/bootstrap?v=8YCIH9299DddgE1MKHWh7q9nzhSIdUfJf5NkiSLBXG81" rel="stylesheet"/>

    <script src="http://192.168.7.211:8090//bundles/modernizr?v=_crq2QUT7I_NAMAaEv7T-Hgr0jkqYYHmaNBKKo2em_Q1"></script>

    <script src="http://192.168.7.211:8090//bundles/seotext?v=OjOdggkLiC5cfkVa57OFQwmj4Q1912ly629CdYYCDWg1"></script>

    <link href="http://192.168.7.211:8090//Content/css?v=m3ysgSEwNpKHzFBKrkh-PED-st5o-YqJ183jvKXgDEQ1" rel="stylesheet"/>

    
</head>
<body>
<h1>Status Code checker</h1>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<form action="/q/save.php" method="post">

<textarea  name="textt" id="textarea" rows="20" cols="500"
  onclick='if(this.value=="вставьте список целевых страниц сюда") this.value=""'  
  onblur='if(this.value=="") this.value="вставьте список целевых страниц сюда"' 
>вставьте список целевых страниц сюда</textarea><br />
<input type="submit" value="Проверить" class="btn-success btn">
	 </form>

  

<body>
</html>