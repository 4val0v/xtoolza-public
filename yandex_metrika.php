<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- xtoolza -->
<ins class="adsbygoogle"
		 style="display:block"
		 data-ad-client="ca-pub-0745697304390645"
		 data-ad-slot="5937572266"
		 data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<!--noindex-->
<span class="splus">
<script type="text/javascript">
(function() {
	if (window.pluso)if (typeof window.pluso.start == "function") return;
	if (window.ifpluso==undefined) { window.ifpluso = 1;
		var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
		s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
		s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
		var h=d[g]('body')[0];
		h.appendChild(s);
	}})();
</script>
<span class="pluso" data-background="transparent" data-options="small,round,line,horizontal,nocounter,theme=03" data-services="vkontakte,odnoklassniki,facebook,twitter,google,print" data-url="http://xtoolza.info" data-title="xToolza: пакетная проверка сайтов" data-description="xToolza: инструмент проверки cms сайта, кодировки страниц сайта, 404 ошибки, карты сайта, статус кодов и многих других параметров"></span>
</span>
<!--/noindex-->

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
<!--noindex-->
<!--LiveInternet counter--><script type="text/javascript"><!--
new Image().src = "//counter.yadro.ru/hit?r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random();//--></script><!--/LiveInternet-->
<p><a href="http://xtoolza.info/q/logs" rel="nofollow">все логи</a></p>
<!--/noindex-->
<?
    require_once($_SERVER['DOCUMENT_ROOT'].'/uniplacer_config.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/'._UNIPLACE_USER_.'/uniplacer.php'); 
    $Uniplacer = new Uniplacer(_UNIPLACE_USER_);
    $Uniplacer->GetCode();
    $links = $Uniplacer->GetLinks();
  echo "test";
    if($links){
    foreach($links as $link){
        echo $link.'<br>';
    }
    }
?>