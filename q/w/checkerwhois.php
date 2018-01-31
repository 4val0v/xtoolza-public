<!DOCTYPE html>
<html>
<?// считываем текущее время
$start_time = microtime();
// разделяем секунды и миллисекунды (становятся значениями начальных ключей массива-списка)
$start_array = explode(" ",$start_time);
// это и есть стартовое время
$start_time = $start_array[1] + $start_array[0];
?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Hosting Checker Result</title>
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>
	
	<script type="text/javascript">
var check_preload;
function preload_page() {
  if(check_preload) {
    document.getElementById("total").style.visibility = "visible";
    document.getElementById("load").style.visibility = "hidden";
  }
}    
</script>
</head>
<body>

<?
header('Content-Type: text/html; charset=utf-8');

//данные из textarea через $_POST.
if ($_POST['textt'] != ''){
	echo "<h2>Hosting Check Result:</h2> <br />";
	}
else die('Поле должно быть заполнено!');  

//вывод в таблицу	
echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>Site</b></td><td><b>Hosting </b></td></tr>"; 
$plist = explode("\r\n",$_POST['textt']); 
foreach ($plist as $arraylist) {
	echo "<tr><td>".$arraylist."</td>"; 
	echo "<td>"." ". /*ns($arraylist) .*/"<br /></td></tr>";
	}  
echo "</table>"; 

// доменное имя (com, net, org)
$domain = "xtoolza.info";
// получаем whois-запись
$resp = get_whois($domain);
// извлекаем адрес whois-сервера
preg_match("!^\s*nserver:\s+([\w\.]+)\b!im", $resp, $matches);
$server = $matches[1];
print "<br><br>".$server;

function get_whois($domain, $server="whois.arin.net")
{
if (trim($domain) <> "")
{
$domain = trim($domain);
$fp = fsockopen($server, 43, $errno, $errstr, 30);
if (!$fp) $response = "$errstr ($errno)";
else{
   $response = "";
   fputs($fp, "$domain\r\n");
   while (!feof($fp))
    $response .= fread($fp,128);
   fclose ($fp);
   }
}
return $response;
}


	
	






//получить содержимое страницы+заголовок
function getpage($adres){
  $temp = curl_init();
  curl_setopt($temp, CURLOPT_URL,$adres);
  curl_setopt($temp, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($temp, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($temp, CURLOPT_VERBOSE, false);
  curl_setopt($temp, CURLOPT_TIMEOUT, 5);
  curl_setopt($temp, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($temp, CURLOPT_SSLVERSION, 3);
  curl_setopt($temp, CURLOPT_SSL_VERIFYHOST, false);
  
  $page = curl_exec($temp);
  curl_close($temp);
  return $page;
}


?>

<br />
<form class="btn">
<input type="button" border="0" value="Назад" onClick="history.back()">
</form>&nbsp;&nbsp;&nbsp;
<!--form class="btn"-->
<!--input type="button" border="0" value="Помощь" onclick="location.href='http://www.xtoolza.info/q/help.php'"-->
<!--/form-->
<div style="text-align: center; bottom:10px; position: relative;">
<?   //generate time
$end_time = microtime();
$end_array = explode(" ",$end_time);
$end_time = $end_array[1] + $end_array[0];
// вычитаем из конечного времени начальное
$time = $end_time - $start_time;
// выводим в выходной поток (броузер) время генерации страницы
printf("Страница сгенерирована за %f секунд",$time);
?>
</div>
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
</body>
</html>