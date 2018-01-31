
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>xToolza: пакетная проверка сайтов</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="ru" />
<meta name="description" content="xToolza: инструмент проверки кодировки страниц сайта, 404 ошибки, карты сайта, статус кодов и многих других параметров" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<base href="http://xtoolza.info/" />

<style type="text/css">
html { 
min-height:100%; 
}
body { 
padding:0; margin:0; min-height:100%; color:#ffffff;
background: #000000 url('/back.png') fixed top left no-repeat;
background-size: 100% 100%;
usemap="#Map"
}
</style>
<link href="/q/css.css" rel="stylesheet"/>
<link href="/q/style.css" rel="stylesheet"/>
<style type="text/css">
    BODY { 
    margin-bottom: 50px; 
    }
    #footer {
    position: fixed;
    left: 0; bottom: 0;
    padding: 10px;
    color: #fff;
    width: 100%;
    font-size: 10px;
    text-decoration: none;
    }
</style>
<style type='text/css'>
    #test{
    display:none;
    }
</style>


<style type="text/css">
   div.a { 
    text-decoration: none;
   } 
</style>
</head>

<body>
<script type="text/javascript" src="http://xtoolza.info/egg.js"></script>
<h1 style="color:white; font-weight:bold; font-size:18px">Инструменты пакетной выгрузки информации о сайтах</h1>
<a class="btn" href="http://uptimus.ru"><img src="http://xtoolza.info/q/images/uptimus.png" width="25">&nbsp;&nbsp;Продвинуть сайт</a><br /><br />
<a class="btn" href="http://xtoolza.info/q/checkencode.php"><img src="http://xtoolza.info/q/images/charset.png" width="25">&nbsp;&nbsp;Кодировка</a><br /><br />
<a class="btn" href="http://xtoolza.info/q/checkcy.php"><img src="http://xtoolza.info/q/images/tICPR.jpg" width="25">&nbsp;&nbsp;тИЦ/PR</a><br /><br />
<a class="btn" href="http://xtoolza.info/q/checkip.php"><img src="http://xtoolza.info/q/images/TCPIP.png" width="25">&nbsp;&nbsp;Инструмент сетевых запросов</a><br /><br />
<a class="btn" href="http://xtoolza.info/q/sitemapcheck.php"><img src="http://xtoolza.info/q/images/sitemap.png" width="25">&nbsp;&nbsp;Проверка страниц sitemap.xml</a><br /><br />
<a class="btn" href="http://xtoolza.info/q/checkheaders.php"><img src="http://xtoolza.info/q/images/statuscode.png" width="25">&nbsp;&nbsp;Статус коды</a><br /><br />
<a class="btn" href="http://xtoolza.info/q/checktdk.php"><img src="http://xtoolza.info/q/images/tdk.jpg" width="25">&nbsp;&nbsp;Title, Description, Keywords</a><br /><br />
<a class="btn" href="http://xtoolza.info/q/checkh1.php"><img src="http://xtoolza.info/q/images/h1.png" width="25">&nbsp;&nbsp;Выгрузить h1-h6</a><br /><br />
<a class="btn" href="http://xtoolza.info/q/check404.php"><img src="http://xtoolza.info/q/images/404.png" width="25">&nbsp;&nbsp;404 статус</a><br /><br />
<a class="btn" href="http://xtoolza.info/q/checkphp.php"><img src="http://xtoolza.info/q/images/php.png" width="25">&nbsp;&nbsp;Проверка на PHP</a><br /><br />
<a class="btn" href="http://xtoolza.info/q/cms/index.php"><img src="http://xtoolza.info/q/images/cms.png" width="25">&nbsp;&nbsp;Проверка CMS</a><br /><br />
<a class="btn" href="http://xtoolza.info/q/checklinks.php"><img src="http://xtoolza.info/q/images/url.png" width="25">&nbsp;&nbsp;Выгрузить ссылки со страницы</a><br /><br />
<a class="btn" href="http://xtoolza.info/q/broken/index.php"><img src="http://xtoolza.info/q/images/links.jpg" width="25">&nbsp;&nbsp;Поиск внешних и битых ссылок</a><br /><br />
<a class="btn" href="http://xtoolza.info/q/map_sait/sitemap_create.php"><img src="http://xtoolza.info/q/images/sitemapcreate.png" width="25">&nbsp;&nbsp;Создать карту сайта</a><br /><br />
<a class="btn" href="http://xtoolza.info/q/puny/punycode_converter.php"><img src="http://xtoolza.info/q/images/punicode.png" width="25">&nbsp;&nbsp;Punycode конвертер</a><br /><br />
<a class="btn" href="http://xtoolza.info/q/fav/favicon.php"><img src="http://xtoolza.info/q/images/favicon.jpg" width="25">&nbsp;&nbsp;Выгрузить Favicon</a><br /><br />

<img id="test" src="http://xtoolza.info/qwe/32.gif" alt="32" />

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

<div id="footer">
   <a href="/q/checkpogoda.php" rel="nofollow" style="text-decoration: none;">© 2014 theblackpost</a><br />
   <a href="/whatnew.php" rel="nofollow">release note</a>
</div>

</body>
</html>