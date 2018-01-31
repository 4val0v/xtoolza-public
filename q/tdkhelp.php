<!DOCTYPE html>
<html>
<head>
    <title>FAQ - Status Code Checker</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
</head>
<body>

<?
header('Content-Type: text/html; charset=utf-8');
$referer = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<div style=\"position:fixed; margin-left:300px;\">
<form class=\"btn\">
<input type=\"button\" value=\"Назад на предыдущую страницу\" 
onClick=\"history.back()\">
</form></div>"; 	
?>
<br /><br /><br /><br />
<p><i>1) Почему мне отображены страницы с пустыми значениями?</i></p>
<p><b>Возможные причины:</b><ul><li>"Checker TDK" проверяет TDK с учетом 301 редиректа на конечную страницу. Если на странице отдающей 301 статус код ответа нет заполненных title, description, keywords - значения показаны не будут.</li>
<li>Тегов на странице нет по факту :)</li>
<li>Теги заполнены не по стандартуб например meta id="description", meta http-equiv="description" и т.п.. Проверка идёт только по точным совпадениям со стандартом оформления мета-тегов:</li></ul><i> < title >Заголовок< /title ><br />< meta name="description" content="описание" ><br />< meta name="keywords" content="описание,ключевые слова" ></i>
</p>
<p><i>2) Почему в некоторых тегах кодировка отображена неверно?</i></p>
<p>Обработчик обрабатывает наиболее распространенные кодировки: UTF-8, Windows-1251. Остальные могут отображаться не совсем корректно.</p>



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