<!DOCTYPE html>
<? 
// считываем текущее время
$start_time = microtime();
// разделяем секунды и миллисекунды (становятся значениями начальных ключей массива-списка)
$start_array = explode(" ",$start_time);
// это и есть стартовое время
$start_time = $start_array[1] + $start_array[0];?>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
	<meta name ="robots" content="noindex, nofollow" />
    <title>HTTP Code Checker Result</title>
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>
	

</head>
<body>
<h4>Rookee Plus Status Code Checker</h4>
<div id="loader" class="loader" style="display:none;"> <img id="img-loader" src="q/loader.gif" alt="Loading"/> </div>
<?php

header('Content-Type: text/html; charset=utf-8');
$url = array(
'a2foton.com',
'abort-dr.com.ua',
'accord-stroy.ru',
'www.addictless.ru',
'a-fur.com',
'algeco.ru',
'amway-dostavka24.ru',
'arhivcentr.ru',
'conceptsound.ru',
'diplatt.com',
'dovgolittya-rodyni.com.ua',
'eco-dostavka24.ru',
'efca.ru',
'eurosmed.ru',
'eurovorota.net',
'forladyonly.ru',
'form4concrete.ru',
'gazovik-real.ru',
'get66.ru',
'hm-net.ru',
'altpremium.ru',
'eurolyx.ru',
'inautomatic.ru',
'lira-print.ru',
'lombard2000.ru',
'lssport.ru',
'mosvipremont.ru',
'multifin.ru',
'obuv-opt-nsk.ru',
'otdohnites.com',
'pro-cosmetik.ru',
'rukuxni.ru',
'sportcover.ru',
'stroy-legko.ru',
'styagkapola.ru',
'supertabak.ru',
'texsklad.ru',
'tkyul.ru',
'topshouse.ru',
'vaga007.ru',
'vendagroup.ru',
'versallis.ru',
'wmalliance.ru',
'www.cruzak.ru',
'www.dip555.com',
'www.esd.su',
'www.guestworkers.ru',
'www.kvartiraprosto.ru',
'www.mebmetall.ru',
'www.slon-tea.ru',
'www.vittat.com',
'yic-mfp.ru',
'xn----8sbdbpn5cqc1i.xn--p1ai',
'xn--80aahq5bdlid7b6c.xn--p1ai',
'xn--80agogmahibmm.xn--p1ai',
'xn----ctbinbefehuegehxcok.xn--p1ai',
'xn--b1ag1aplai.xn--p1ai'
);
echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>Сайт</b></td><td><b>Статус</b></td></tr>";

foreach ($url as $val)
{
	
	$answer = check_http_status($val);
	if ($answer == 200 || $answer == 301)
		echo '<tr><td>'.'<a href="http://'.$val.'" target="_blank">'.$val.'</a>'.'</td><td>&nbsp;доступен&nbsp;</td></tr>', PHP_EOL;
	else
	{
		if ($answer == 28) // See code status - http://curl.haxx.se/libcurl/c/libcurl-errors.html
		{
			echo '<tr><td>'.'<a href="http://'.$val.'" target="_blank">'.$val.'</a>'.'</td><td>&nbsp;не отвечает. Таймаут операции (время отклика более 10 секунд)&nbsp;</td></tr>'. PHP_EOL;
		}
		
		elseif ($answer == 6) 
		{
			echo '<tr><td>'.'<a href="http://'.$val.'" target="_blank">'.$val.'</a>'.'</td><td>&nbsp;не отнесен ни к одной ns-записи. Ресурс не резолвится.&nbsp;</td></tr>'. PHP_EOL;
		}
		
		
		else
		{
			echo '<tr><td>'.'<a href="http://'.$val.'" target="_blank">'.$val.'</a>'.'</td><td>&nbsp;недоступен. Причина: '.$answer.'&nbsp;</td></tr>', PHP_EOL;
		}
	}
}
echo "</table>"; 
function check_http_status($url)
{
	$user_agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:16.0) Gecko/20100101 Firefox/16.0';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($temp, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($temp, CURLOPT_SSLVERSION, 3);
    curl_setopt($temp, CURLOPT_SSL_VERIFYHOST, false);
	$page = curl_exec($ch);
 
	$error = curl_errno($ch);
	if (!empty($error))
		return $error;
 
	return ($httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE));
	curl_close($ch);
}

echo "<br><br><a href=\"http://curl.haxx.se/libcurl/c/libcurl-errors.html\" target=\"_blank\">http://curl.haxx.se/libcurl/c/libcurl-errors.html</a> - справка по статусам";
//echo phpinfo();

?>
<p><a href="http://ru.wikipedia.org/wiki/%D1%EF%E8%F1%EE%EA_%EA%EE%E4%EE%E2_%F1%EE%F1%F2%EE%FF%ED%E8%FF_HTTP" target="_blank">Список кодов HTTP (wiki)</a></p>
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>&nbsp;&nbsp;&nbsp;
<div style="text-align: center; bottom:10px; position: relative;">
<?php 
/*
//проверка работает ли mail()
if (mail("gennadiy.shershov@ingate.ru", "test subject", "test message",   
"From: webmaster@xtoolza.info \r\n")) { 
    echo "<br>messege accepted for delivery"; 
} else { 
    echo "<br>some error happen"; 
} */

//generate time
$end_time = microtime();
$end_array = explode(" ",$end_time);
$end_time = $end_array[1] + $end_array[0];
// вычитаем из конечного времени начальное
$time = $end_time - $start_time;
// выводим время генерации страницы
printf("<br>Страница сгенерирована за %f секунд",$time);

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

