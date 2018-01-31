<!DOCTYPE html>
<html>
<meta name="robots" content="index, follow">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Some xtoolza features ;) </title>
	<link href="http://xtoolza.info/temp/menu3/bootstrap/css/bootstrap.css" rel="stylesheet"/>
	<script type="text/javascript">
var check_preload;
function preload_page() {
  if(check_preload) {
    document.getElementById("total").style.visibility = "visible";
    document.getElementById("load").style.visibility = "hidden";
  }
}
</script>
<style type="text/css">
.spoiler {
    display: block;
}

.btn {
    display: inline-block;
    border: none;
    border-radius: 4px;
    font-size: 15px;
    padding: 10px 10px;
    background: #4876FF;
    color: black;
    font-family: Tahoma, sans-serif;
    cursor: pointer;
}

.btn666 {
    display: inline-block;
    border: none;
    border-radius: 4px;
    font-size: 22px;
    padding: 10px 10px;
    background: yellow;
    color: yellow;
    font-family: Tahoma, sans-serif;
    cursor: pointer;
}

.spoiler input[type=checkbox] {
    display: none;
}

.text {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin: 12px 0 20px;
}

.spoiler input[type=checkbox] ~ .text {
    display: none;
}

.spoiler input[type=checkbox]:checked ~ .text {
    display: block;
}
</style>
</head>
<body>
<div style="margin-left: 30px; margin-top: 30px">
<table border="1" color="grey"><tr><td>Курс валют</td><td>Случайный пароль</td><td>Русский в транслит</td><tr><td>
<br>
<br>
<br>
              <br><br>
<?
header('Content-Type: text/html; charset=utf-8'); ?>
<?php
  // Получаем текущие курсы валют в rss-формате с сайта www.cbr.ru
  $content = get_content();
  // Разбираем содержимое, при помощи регулярных выражений
  $pattern = "#<Valute ID=\"([^\"]+)[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>([^<]+)#i";
  preg_match_all($pattern, $content, $out, PREG_SET_ORDER);
  $dollar = "";
  $euro = "";
  foreach($out as $cur)
  {
    if($cur[2] == 840) $dollar = str_replace(",",".",$cur[4]);
    if($cur[2] == 978) $euro   = str_replace(",",".",$cur[4]);
  }
  echo "Доллар - ".$dollar."<br>";
  echo "&nbsp;&nbsp;&nbsp;&nbsp;Евро - ".$euro."<br>";
  function get_content()
  {
    // Формируем сегодняшнюю дату
    $date = date("d/m/Y");
    // Формируем ссылку
    $link = "http://www.cbr.ru/scripts/XML_daily.asp?date_req=$date";
    // Загружаем HTML-страницу
    $fd = fopen($link, "r");
    $text="";
    if (!$fd) echo "Запрашиваемая страница не найдена";
    else
    {
      // Чтение содержимого файла в переменную $text
      while (!feof ($fd)) $text .= fgets($fd, 4096);
    }
    // Закрыть открытый файловый дескриптор
    fclose ($fd);
    return $text;
  }
?>
</td>
<td><form method="post">
<input type="text" name="number" value="кол-во знаков" onclick='if(this.value=="кол-во знаков") this.value=""'
  onblur='if(this.value=="") this.value="кол-во знаков"'>
<input type="submit" value="Генерировать">
<form><br><br>
<?php
  // Параметр $number - сообщает число
  // символов в пароле
  echo generate_password(intval($_POST['number']));

  function generate_password($number)
  {
    $arr = array('a','b','c','d','e','f',
                 'g','h','i','j','k','l',
                 'm','n','o','p','r','s',
                 't','u','v','x','y','z',
                 'A','B','C','D','E','F',
                 'G','H','I','J','K','L',
                 'M','N','O','P','R','S',
                 'T','U','V','X','Y','Z',
                 '1','2','3','4','5','6',
                 '7','8','9','0');
    // Генерируем пароль
    $pass = "";
    for($i = 0; $i < $number; $i++)
    {
      // Вычисляем случайный индекс массива
      $index = rand(0, count($arr) - 1);
      $pass .= $arr[$index];
    }
    return $pass;
  }
?></td>
<td>
<form method="post">
<input type="text" name="text111" value="текст в translit" onclick='if(this.value=="текст в translit") this.value=""'
  onblur='if(this.value=="") this.value="текст в translit"' size="150">
<input type="submit" value="Перевести">
<form><br><br>

<?php
  // функция превода текста с кириллицы в траскрипт
function translitText($str)
{
    $tr = array(
        "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
        "Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
        "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
        "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
        "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
        "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"'",
        "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
        "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
        "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"",
        "ы"=>"yi","ь"=>"'","э"=>"e","ю"=>"yu","я"=>"ya"," "=>"_"
    );
    return strtr($str,$tr);
}
$text = htmlspecialchars($_POST['text111']);
$translit = translitText($text);
echo $translit;
// echo encodestring(htmlspecialchars($_POST['text111']));



?>

</td>



</tr>
<tr>
</tr><tr>
</tr><tr>
</tr>
<tr>
<td><a href="http://xtoolza.info/temp/kirpich/index.php" rel="nofollow">Перевести в кирпичный ;)</a>
</td>
<td><a href="http://xtoolza.info/q/d/makegood.php" rel="nofollow">Сделать хорошо</a>
</td>
</tr>
</table>
</br></br>
<?// require '/home/b/b10xwru/xtoolza.info/public_html/q/d/guessnum.php'; ?>
<?// require '/home/b/b10xwru/xtoolza.info/public_html/q/d/id2872.php'; ?>
<? #require_once '/home/b/b10xwru/xtoolza.info/public_html/q/d/4CM_Quoter_2.0.php'; ?>



<form class="btn">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
</form>&nbsp;&nbsp;&nbsp;
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter25643246 = new Ya.Metrika({id:25643246,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/25643246" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</div>
</body>
</html>
