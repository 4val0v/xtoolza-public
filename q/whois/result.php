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
    <meta name="robots" content="noindex, follow" />
    <title>NS checker result</title>
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
<table cellpadding="5"><tr><td><img src="http://xtoolza.info/q/images/favicon.jpg" width="90"></td><td><h1>Favicons Result</h1></td></tr></table>


<?
header('Content-Type: text/html; charset=utf-8');

//вывод в таблицу
echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>URL</b></td><td><b>NS checker result</b></td></tr>";
$plist = explode("\r\n",$_POST['textt']);

// тут надо допиливать)
foreach ($plist as $arraylist){
	$json = file_get_contents ('http://htmlweb.ru/analiz/api.php?dns&url=rookee.ru&json');
	$obj = json_decode($json);
	print $obj['dns']['1']['type'];
	echo "<tr><td style=\"word-break: break-all;\">".'<a href="http://'. $arraylist . '" target="_blank" >'.$arraylist.'</a>'. "</td>";
	}


//получить содержимое страницы
function getpage($arraylist){
	$result = array(
		'kod_http' => 'не удалось определить',
		'dostupen' => false
		);
	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2062.124 Safari/537.36";
	$temp = curl_init();
	curl_setopt($temp, CURLOPT_URL,$arraylist);
	curl_setopt($temp, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($temp, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($temp, CURLOPT_VERBOSE, false);
	curl_setopt($temp, CURLOPT_TIMEOUT, 15);
	curl_setopt($temp, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($temp, CURLOPT_SSLVERSION, 3);
	curl_setopt($temp, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($temp, CURLOPT_FOLLOWLOCATION, true);
	$page = curl_exec($temp);
	$result = curl_getinfo($temp, CURLINFO_EFFECTIVE_URL);
	curl_close($temp);
	return $result;
}

?>
</table><br /><br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
<div style="text-align: center; bottom:10px; position: relative;">
<?   //generate time
$end_time = microtime();
$end_array = explode(" ",$end_time);
$end_time = $end_array[1] + $end_array[0];
$time = $end_time - $start_time;
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

</table>
</body>
</html>
