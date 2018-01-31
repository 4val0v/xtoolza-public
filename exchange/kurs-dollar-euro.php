<?
$addr = "http://www.rbc.ru/index.html";  // адрес страницы
$begblock1 = "USD ЦБ РФ"; $begblock2 = "EUR ЦБ РФ"; // идентификатор начала блока

$begin = "<FONT SIZE=\"-2\">"; // фрагмент HTML-кода до полезных данных
$end = "</FONT>"; // фрагмент HTML-кода после полезных данных

$result = array();  // массив строк результата

$screen = file($addr);

$i = 0;
while ($i < sizeof($screen) && strpos($screen[$i], $begblock1) == false) {$i++;}
$temp = explode($begin, $screen[$i + 2]);
$temp = explode($end, $temp[1]);
$kursdollar = $temp[0];

$i = 0;
while ($i < sizeof($screen) && strpos($screen[$i], $begblock2) == false) {$i++;}
$temp = explode($begin, $screen[$i + 2]);
$temp = explode($end, $temp[1]);
$kurseuro = $temp[0];

echo "Доллар - <B>$kursdollar</B><BR>Евро &nbsp;&nbsp;&nbsp;&nbsp;- <B>$kurseuro</B>");
?>
