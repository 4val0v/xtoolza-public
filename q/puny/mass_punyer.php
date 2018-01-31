<!DOCTYPE HTML>
<html>
<?
$start_time = microtime();
$start_array = explode(" ",$start_time);
$start_time = $start_array[1] + $start_array[0];
ignore_user_abort(true);
set_time_limit(0);
?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="noindex, follow" />
    <title>Пакетный конвертер кириллицы в punycode</title>
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="/js/topbutton.js"></script>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
</head>
<body id="linearBg1">
<?
header('Content-Type: text/html; charset=utf-8');
if ($_POST['textt'] != ''){
	echo "<table cellpadding=\"5\"><tr><td><img src=\"http://xtoolza.info/q/images/punypuny.jpg\" width=\"90\"></td><td><h1>Пакетный конвертер кириллицы в punycode:</h1></td></tr></table>";
	}
else die('Поле должно быть заполнено!');  

//вывод в таблицу	
echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>Cyrillic</b></td><td><b>Punycode</b></td></tr>"; 
$plist = explode("\r\n",$_POST['textt']); 

function result($plist)  {
	foreach ($plist as $arraylist) {
		if(mb_detect_encoding($arraylist) != "ASCII"){ //если сайт в кириллице переводим в punycode
			include_once("idna_convert.class.php");
			$IDN = new idna_convert(array('idn_version' => '2008'));
			$newarraylist=$IDN->encode($arraylist);
		}
		echo "<tr><td style=\"word-break: break-all;\">".'<a href="http://'. $arraylist . '" target="_blank" >'.$arraylist.'</a>'. "</td>";
		echo "<td>"." ". $newarraylist ."<br /></td></tr>";
		$log .= $arraylist . " " . $newarraylist . PHP_EOL;
	}  
	echo "</table>"; 
	return $log;
}


$loger = result($plist);
function mylog($data){
    $data = $data . PHP_EOL;
    file_put_contents('punylogs.txt', $data);
}
mylog($loger);

?>
<br /><a href="http://xtoolza.info/q/puny/punylogs.txt" download>Скачать результат</a><br />
<br />
<a class="btn-success btn" href="http://xtoolza.info/q/puny/mass_cyrillic.php">Пакетный конвертер в кириллицу</a><br /><br />
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
</body>
</html>