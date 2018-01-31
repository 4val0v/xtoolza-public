<!DOCTYPE html>
<html>
<head>
	<title>Выгрузка скрытых в {display:none} и visibility:hidden элементов со страниц</title>
	<meta name="description" content="Инструмент пакетной выгрузки скрытых в {display:none} и visibility:hidden элементов со страниц" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>

    
</head>
<body>
<h1>{display:none} & visibility:hidden checker</h1>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<form action="/q/checkerhidden.php" method="post">

<textarea  name="textt" id="textarea" rows="20" cols="500"
  onclick='if(this.value=="вставьте список сайтов сюда без http://") this.value=""'  
  onblur='if(this.value=="") this.value="вставьте список сайтов сюда без http://"' 
>вставьте список сайтов сюда без http://</textarea><br />
<input type="submit" value="Проверить" class="btn-success btn" id="rollover" />&nbsp;&nbsp;
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
	 </form>

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