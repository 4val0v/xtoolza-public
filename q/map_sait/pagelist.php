<!DOCTYPE HTML>
<? header('Content-type: text/html; charset=utf-8'); 
ini_set('display_errors', 0);
error_reporting(0);
set_time_limit(0);
ignore_user_abort(true);
?>
<html>
<head>
	<title>Список найденных страниц</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex, nofollow" />
	<link href="/q/style.css" rel="stylesheet"/>
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
</head>
<body id="linearBg1">
<table cellpadding="5">
	<tr>
		<td><img src="http://xtoolza.info/q/images/sitemapcreate.png" width="90"></td>
		<td><h1>Список найденных страниц</h1></td>
	</tr>
</table>
<br />
<p>Всего <? $filelines = file('http://xtoolza.info/q/map_sait/result/sitemap.txt');
echo $countlines = count($filelines);?> страницы</p>
<textarea rows="20" cols="500"><?php 
$read = file_get_contents("http://xtoolza.info/q/map_sait/result/sitemap.txt");  
echo iconv("UTF-8", "Windows-1251", $read);
?> 
</textarea> 
<br /><h3><a href="http://xtoolza.info/q/map_sait/result/sitemap.xml" download>Скачать sitemap.xml &nbsp;<img src="http://xtoolza.info/q/images/arrow_curved_blue.png" width="70px"></a></h3>
<h5><a href="http://xtoolza.info/q/map_sait/result/sitemap.txt" download>Скачать список найденных страниц</a></h5><br />
<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
<div style="text-align: center; bottom:10px; position: relative;"><br>
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