<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Encoding checker</title>
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>

    
</head>
<body>

  <script type="text/javascript">
$(document).ready(function(){              
    // вешаем на клик по элементу с id = example-1
    $('#example-1').click(function(){
        // загрузку HTML кода из файла example.html
        $(this).load('http://xtoolza.infoq/q/loader.gif');       
    }) 
});   
</script>
<h1>Charset checker (beta)</h1>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<form action="/q/temp.php" method="post">

<textarea  name="textt" id="textarea" rows="20" cols="500"
  onclick='if(this.value=="вставьте список целевых страниц сюда в абсолютном виде") this.value=""'  
  onblur='if(this.value=="") this.value="вставьте список целевых страниц сюда в абсолютном виде"' 
>вставьте список целевых страниц сюда в абсолютном виде</textarea><br />
<input type="submit" value="Проверить" class="btn-success btn" id="rollover" />
	 </form>

<body>
</html>