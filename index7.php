<?
$num=mt_rand(2000,10000);
$today  = gmdate('D, d M Y H:i:s \G\M\T');
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
header('Content-Type: text/html; charset=utf-8');
header ('Content-Language: ru');
header ('Cache-Control: max-age=3600, must-revalidate');
header ('Expires: Fri, 30 Oct 2016 14:19:41 GMT');
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>xToolza: пакетная проверка сайтов</title>
	<meta name="description" content="xToolza: инструмент проверки кодировки страниц сайта, пакетной проверки CMS, 404 ошибки, карты сайта, статус кодов и многих других параметров" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="W3Techs-verification" content="uWt0v7rsJIitpuOh" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link href="/newcss666.css" rel="stylesheet"/>
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<base href="http://xtoolza.info/" /> 
</head>
<body>
<div class="linearBg1">
<!--xToolza: инструмент проверки кодировки страниц сайта, пакетной проверки CMS, 404 ошибки, карты сайта, статус кодов и многих других параметров-->
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
<span class="pluso" data-background="transparent" data-options="small,round,line,vertical,nocounter,theme=03" data-services="vkontakte,odnoklassniki,facebook,twitter,google,print" data-url="http://xtoolza.info" data-title="xToolza: пакетная проверка сайтов" data-description="xToolza: инструмент проверки кодировки страниц сайта, 404 ошибки, карты сайта, статус кодов и многих других параметров"></span>
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


<br>



<?php
function seo_news(){

function updates(){
 error_reporting(0);
 $str=@file_get_contents('http://www.pr-cy.ru/updates.xml');
 preg_match( "'<cy>(.*?)</cy>'si", $str, $rez1 );
 preg_match( "'<pr>(.*?)</pr>'si", $str, $rez2 );
 preg_match( "'<yav>(.*?)</yav>'si", $str, $rez3 );
 $rez4 = array ($rez1[1],$rez2[1],$rez3[1]);
 return $rez4;
}

function elm($str){
$elms = explode(" ", $str); // Выбрать из строки даты день, месяц и год
return $elms;
}

function days($m, $d, $y){ // Дней назад
$tm=time();                // Сегодня
$rez1=intval(($tm-mktime(0, 0, 0, $m, $d, $y))/86400,10); // Разница между сегодня и апдейтом (в сутках 86400 секунд)
if($rez1==0){$rez=' (сегодня)';}else
if($rez1==1){$rez=' (вчера)';}else
if($rez1==2){$rez=' (позавчера)';}else
if($rez1==3){$rez=' (' .$rez1 .' дня назад)';}else
if($rez1==4){$rez=' (' .$rez1 .' дня назад)';}else
$rez=' (' .$rez1 .' дней назад)';
return $rez;
}

$out = updates();
$cy=$out[0]; $pr=$out[1]; $yv=$out[2];
$cy1=preg_replace ( "'\.'si", ' ',$cy); // Замена точек на пробелы в строке даты
$pr1=preg_replace ( "'\.'si", ' ',$pr);
$yv1=preg_replace ( "'\.'si", ' ',$yv);
$ecy=elm($cy1); $epr=elm($pr1); $eyv=elm($yv1);
$cyd=$ecy[0]; $cym=$ecy[1]; $cyy=$ecy[2];
$prd=$epr[0]; $prm=$epr[1]; $pry=$epr[2];
$yvd=$eyv[0]; $yvm=$eyv[1]; $yvy=$eyv[2];

$daycy=days($cym,$cyd,$cyy); $daypr=days($prm,$prd,$pry); $dayyv=days($yvm,$yvd,$yvy);

//storm
$storm = file_get_contents('http://tools.promosite.ru/');
$dom = new DomDocument();
$dom->loadHTML('http://tools.promosite.ru/');
$xpath = new DomXPath( $dom );
$_res = $xpath->query("html/body/table/tbody/tr[2]/td[2]/p[1]/table/tbody/tr/td[1]/p[1]/span");
echo $xpath->saveHTML();



$rezlt = '<li><span style="color:red;"><b>Я</b></span>ндекс выдача: ' .$yv .$dayyv .'</li>
<li><span style="color:red;"><b>Я</b></span>ндекс тИЦ: ' .$cy .$daycy .'</li>
<li><b>G</b><span style="color:red;">o</span><span style="color:yellow;">o</span>g<span style="color:green;">l</span><span style="color:red;">e</span> PR: ' .$pr .$daypr .'</li>';
return $rezlt;
}
?>

<div id="footer">
   
© 2015 xtoolza.info<br />
   <a href="/whatnew.php" rel="nofollow">release note</a>&nbsp;&nbsp;&nbsp;<br />
</div>

<div id="update">
	<? echo '<ul>';
	echo '<li style="list-style-type: none;">Апдейты:</li>'.PHP_EOL;
	echo seo_news();
	echo '</ul>';
	echo '<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/q/diffcheckers.php" style="text-decoration: none;"><img src="/q/images/diffcheck.png" alt="Прочие инструменты" width="60"><br />Прочие инструменты</a>'; 
	?>
</div>

</div>
<div id="feedback">
<a href="/feedback/index.php">&nbsp;&nbsp;&nbsp;&nbsp;<img src="/q/images/mail.png" alt="обратная связь" width="60"><br />Обратная связь</a>
</div>
</body>
</html>