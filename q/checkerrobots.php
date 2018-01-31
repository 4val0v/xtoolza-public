<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Robots Result Checker</title>
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>
</head>
<body>

<?
header('Content-Type: text/html; charset=utf-8');

//вывод результата в таблицу
if ($_POST['textt'] != ''){
	echo "<h2>Robots.txt</h2> <br />";
	}
else die('Поле должно быть заполнено!');  


//titles	
echo "<table>";
echo "</table>"; 

//получить содержимое страницы
function getmetapage($nadres){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,$nadres);
  curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_VERBOSE, false);
  curl_setopt($ch, CURLOPT_TIMEOUT, 5);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_SSLVERSION, 3);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

  $pagemeta = curl_exec($ch);
  curl_close($ch);
  return $pagemeta;
}
	
?>

<br />
<form class="btn">
<input type="button" border="0" value="Назад" onClick="history.back()">
</form>&nbsp;&nbsp;&nbsp;
<form class="btn">
<input type="button" border="0" value="Помощь" onclick="location.href='http://www.xtoolza.info/q/help.php'">
</form>
</body>
</html>