<html>
<head>
<meta name="robots" content="noindex, nofollow" />
<link href="http://xtoolza.info/temp/menu3/bootstrap/css/bootstrap.css" rel="stylesheet"/>
</head>
<body>
<div style="margin-left: 30px">
<h3>введите текст на русском</h3>
<p></p>
<form method="post">
<input type="text" name="text111" value="текст в кирпичный" onclick='if(this.value=="текст в кирпичный") this.value=""'  
  onblur='if(this.value=="") this.value="текст в кирпичный"' size="150">
<input type="submit" value="Перевести">
<form>
<?
// echo substr(md5('1e0f34af30effc6584820cb788d68f21'),0,8);
?>
<?
function translitText($str) 
{
    $tr = array("а"=>"аса","е"=>"есе","ё"=>"ёсё","и"=>"иси","о"=>"осо","у"=>"усу","ы"=>"ысы","э"=>"эсэ","ю"=>"юсю","я"=>"яся",
				"А"=>"Аса","Е"=>"Есе","Ё"=>"Ёсё","И"=>"Иси","О"=>"Осо","У"=>"Усу","Ы"=>"Ысы","Э"=>"Эсэ","Ю"=>"Юсю","Я"=>"яся");
    return strtr($str,$tr);
}
$text = htmlspecialchars($_POST['text111']);
$translit = translitText($text);
echo '<br><br><h3>'.$translit.'</h3>';
?>
<br><br>
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<form class="btn">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
</form>&nbsp;&nbsp;&nbsp;
</div>
</body>
</html>