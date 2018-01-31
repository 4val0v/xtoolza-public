<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Hosting checker</title>
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>

    
</head>
<body>
<div id="loader" style="position: fixed; background-color: white; width: 100%; height: 100%; top: 0px; left: 0px; opacity: 0.7; display: none">
<img src="/Content/images/loader.gif" alt="Загрузка..." style="position: fixed; width: 128px; height: 128px; left:50%; top:50%; margin: -64px 0 0 -64px" />
</div>
<h1>Hosting checker</h1>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<form action="/q/w/checkerwhois.php" method="post">

<textarea  name="textt" id="textarea" rows="20" cols="500"
  onclick='if(this.value=="вставьте список сайтов сюда") this.value=""'  
  onblur='if(this.value=="") this.value="вставьте список сайтов сюда"' 
>вставьте список сайтов сюда</textarea><br />
<input type="submit" value="Проверить" class="btn-success btn" id="rollover" />&nbsp;&nbsp;
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
	 </form>

<!--p style="color:red">Используйте основное зеркало. Редиректы временно не обрабатываются</p-->
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
<body>
</html>