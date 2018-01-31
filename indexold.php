<?
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>xToolza: пакетная проверка сайтов</title>
<meta name="description" content="xToolza: инструмент проверки кодировки страниц сайта, 404 ошибки, карты сайта, статус кодов и многих других параметров" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="ru" />
<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
<link href="/newcss1.css" rel="stylesheet"/>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">
  $(function(){
    $('.img2').hover(function(){
      $(this).children('img').stop().animate({width:"175px",height:"192px"}, 800);
    }, function(){ $(this).children('img').stop().animate({width:"100px",height:"124px"}, 800); });
  });
  </script>
<base href="http://xtoolza.info/" />  
</head>

<body id="linearBg1">

<table cellpadding="3"; cellspacing="0">
	<tr>
		<td>
			<div class="textblock">
				<a href="http://uptimus.ru" title="Понятное и результативное продвижение сайта" target="_blank"><img class="transition-scale" src="http://xtoolza.info/q/images/Upti_mini.png" width="80" title="Понятное и результативное продвижение сайта"></a>
				<a href="http://uptimus.ru" title="Понятное и результативное продвижение сайта" target="_blank">Продвинуть сайт</a>
			</div>
		</td>
		<td>
			<div class="textblock">
				<a class="btn" href="http://xtoolza.info/q/checkencode.php" title="Пакетная проверка серверной и кодировки по мета-тегу"><img class="transition-scale" src="http://xtoolza.info/q/images/charset_mini.png" width="80" title="Пакетная проверка серверной и кодировки по мета-тегу">Проверить кодировку</a>
			</div>
		</td>
		<td>
			<div class="textblock">
				<a class="btn" href="http://xtoolza.info/q/map_sait/sitemap_create.php" title="Создать карту сайта sitemap.xml онлайн"><img class="transition-scale" src="http://xtoolza.info/q/images/sitemapcreate_mini.png" width="80" title="Создать карту сайта sitemap.xml онлайн">Создать карту сайта</a>
			</div>
		</td>
		<td>
			<div class="textblock">
				<a class="btn" href="http://xtoolza.info/q/checkip.php" title="Инструмент проверки трасировки, пинга, whois и многого другово."><img class="transition-scale" src="http://xtoolza.info/q/images/TCPIP_mini.png" width="80" title="Инструмент проверки трасировки, пинга, whois и многого другово.">Инструмент сетевых запросов</a>
			</div>
		</td>
	</tr>	
	<tr>
		<td>
			<div class="textblock">
				<a class="btn" href="http://xtoolza.info/q/checkcy.php" title="Пакетная проверка тИЦ/PR сайта"><img class="transition-scale" src="http://xtoolza.info/q/images/tICPR_mini.jpg" width="80" title="Пакетная проверка тИЦ/PR сайта">Проверить тИЦ/PR сайтов</a>
			</div>
		</td>
		<td>
			<div class="textblock">
				<a class="btn" href="http://xtoolza.info/q/checkheaders.php" title="Пакетная проверка HTTP статус-кодов страниц сайта"><img class="transition-scale" src="http://xtoolza.info/q/images/statuscode_mini.png" width="80" title="Пакетная проверка HTTP статус-кодов страниц сайта">Получить статус коды</a>
			</div>
		</td>
		<td>
			<div class="textblock">
				<a class="btn" href="http://xtoolza.info/q/sitemapcheck.php" title="Проверка наличия страниц в sitemap.xml"><img class="transition-scale" src="http://xtoolza.info/q/images/sitemap_mini.png" width="80" title="Проверка наличия страниц в sitemap.xml">Проверка страниц sitemap.xml</a>
			</div>
		</td>
		<td>
			<div class="textblock">
				<a class="btn" href="http://xtoolza.info/q/cms/index.php"  title="Инструмент пакетной онлайн проверки CMS сайта"><img class="transition-scale" src="http://xtoolza.info/q/images/cms_mini.png" width="80" title="Инструмент пакетной онлайн проверки CMS сайта">Проверка CMS сайтов</a>
			</div>
		</td>
	</tr>	
	<tr>
		<td>
			<div class="textblock">
				<a class="btn" href="http://xtoolza.info/q/checktdk.php" title="Пакетная выгрузка мета-тегов title, description, keywords с указанных страниц"><img class="transition-scale" src="http://xtoolza.info/q/images/tdk_mini.jpg" width="80" title="Пакетная выгрузка мета-тегов title, description, keywords с указанных страниц"><br>Выгрузить Title, Description, Keywords</a>
			</div>
		</td>
		<td>
			<div class="textblock">
				<a class="btn" href="http://xtoolza.info/q/check404.php" title="Пакетная проверка отработки 404 статус-кода на сайтах"><img class="transition-scale" src="http://xtoolza.info/q/images/404_mini.png" width="80" title="Пакетная проверка отработки 404 статус-кода на сайтах"><br>Проверить 404 статус-код</a>
			</div>
		</td>
		<td>
			<div class="textblock">
				<a class="btn" href="http://xtoolza.info/q/broken/index.php" title="Инструмент поиска внешних и битых ссылок сайта"><img class="transition-scale" src="http://xtoolza.info/q/images/links_mini.jpg" width="80" title="Инструмент поиска внешних и битых ссылок сайта">Поиск внешних и битых ссылок (&beta;eta)</a>
			</div>
		</td>
		<td>
			<div class="textblock">
				<a class="btn" href="http://xtoolza.info/q/checkphp.php" title="Пакетная проверка сайтов на наличие PHP онлайн"><img class="transition-scale" src="http://xtoolza.info/q/images/php_mini.png" width="80" title="Пакетная проверка сайтов на наличие PHP онлайн">Пакетная проверка сайтов на PHP</a>
			</div>
		</td>
	</tr>	
	<tr>
		<td>
			<div class="textblock">
				<a class="btn" href="http://xtoolza.info/q/checkh1.php" title="Пакетная выгрузка тегов H1-H6 со страниц сайта"><img class="transition-scale" src="http://xtoolza.info/q/images/h1_mini.png" width="80" title="Пакетная выгрузка тегов H1-H6 со страниц сайта">Пакетная выгрузка h1-h6</a>
			</div>
		</td>
		<td>
			<div class="textblock">
				<a class="btn" href="http://xtoolza.info/q/fav/favicon.php" title="Пакетная выгрузка пиктограмм (Favicon) сайтов"><img class="transition-scale" src="http://xtoolza.info/q/images/favicon_mini.jpg" width="80" title="Пакетная выгрузка пиктограмм (Favicon) сайтов">Пакетная выгрузка Favicon</a>
			</div>
		</td>
		<td>
			<div class="textblock">
				<a class="btn" href="http://xtoolza.info/q/checklinks.php" title="Инструмент пакетной выгрузки всех ссылок со страниц"><img class="transition-scale" src="http://xtoolza.info/q/images/url_mini.png" width="80" title="Инструмент пакетной выгрузки всех ссылок со страниц">Выгрузить ссылки со страницы</a>
			</div>
		</td>
		<td>
			<div class="textblock">
				<a class="btn" href="http://xtoolza.info/q/puny/punycode_converter.php" title="Инструмент конвертирования кириллических доменов в punycode и обратно"><img class="transition-scale" src="http://xtoolza.info/q/images/punicode_mini.png" width="80" title="Инструмент конвертирования кириллических доменов в punycode и обратно">Punycode конвертер</a>
			</div>
		</td>
	</tr>	
	
</table>
<noindex>
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
</noindex>

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

<!--div style="padding-left:20px;width: 50%;">
<br>

<h1>Апдейты Google и Yandex:</h1-->

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

$rezlt = '<li><span style="color:red;"><b>Я</b></span>ндекс выдача: ' .$yv .$dayyv .'</li>
<li><span style="color:red;"><b>Я</b></span>ндекс тИЦ: ' .$cy .$daycy .'</li>
<li><b>G</b><span style="color:red;">o</span><span style="color:yellow;">o</span>g<span style="color:green;">l</span><span style="color:red;">e</span> PR: ' .$pr .$daypr .'</li>';
return $rezlt;
}
?>

<div id="footer">
   <a href="/q/checkpogoda.php" rel="nofollow" style="text-decoration: none;">© 2014 xtoolza.info</a><br />
   <a href="/whatnew.php" rel="nofollow">release note</a>
</div>

<div id="update">
	<? echo '<ul>';
	echo 'Апдейты:<br>';
	echo seo_news();
	echo '</ul>'; ?>
</div>


</body>
</html>