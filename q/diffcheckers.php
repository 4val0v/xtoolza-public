<?
$num=mt_rand(2000,10000);
$today  = gmdate('D, d M Y H:i:s \G\M\T');
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
header('Content-Type: text/html; charset=utf-8');
header ('Content-Language: ru');
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>xToolza: время ответа сервера, robots.txt, .htaccess, proxy и прочее</title>
	<meta name="description" content="Проверить время ответа сервера, создать robots.txt, правила .htaccess и прочие проверки." />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="W3Techs-verification" content="uWt0v7rsJIitpuOh" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link href="/newcsstestsame.css" rel="stylesheet"/>
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<link href="http://xtoolza.info/css/stylefeed.css" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="http://xtoolza.info/js/custom.js"></script>
	<base href="http://xtoolza.info/" />  
</head>
<body>
<div>
<!--xToolza: Проверить время ответа сервера, создать robots.txt, правила .htaccess и прочие проверки.-->
<table>
	<table class="total">
		<tr>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock">
					<a class="btn" href="http://xtoolza.info/q/array/" title="Сравнить 2 массива"><img class="transition-scale" src="http://xtoolza.info/q/images/array.png" width="80" title="Сравнить 2 массива" alt="Сравнить 2 массива">Сравнить 2 массива</a>
				</div>
			</td>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock"><br />
					<a class="btn" href="http://xtoolza.info/q/context/" title="Проверка контекста"><img class="transition-scale" src="http://xtoolza.info/q/context/context.jpg" width="80" title="Проверка контекста" alt="Проверка контекста">Проверка контекста</a><br /><br />
				</div>
			</td>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock">
					<a class="btn" href="http://xtoolza.info/q/ftp/" title="Проверить FTP доступы"><img class="transition-scale" src="http://xtoolza.info/q/ftp/ftp.jpg" width="80" title="Проверить FTP доступы" alt="Проверить FTP доступы"><br>Проверить FTP доступы</a>
				</div>
			</td>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock">
					<a class="btn" href="http://xtoolza.info/q/translit/" title="Кириллица в translit"><img class="transition-scale" src="http://xtoolza.info/q/images/translit.png" width="80" title="Кириллица в translit" alt="Кириллица в translit">Кириллица в translit</a>
				</div>
			</td>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock"><br />
					<a class="btn" href="http://xtoolza.info/q/traffic/" title="Проверить посещаемость сайтов"><img class="transition-scale" src="http://xtoolza.info/q/images/traffic.png" width="80" title="Проверить посещаемость сайтов" alt="Проверить посещаемость сайтов">Проверить посещаемость сайтов</a>
				</div>
			</td>
		</tr>	
		<tr>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock"><br>
					<a class="btn" href="http://xtoolza.info/q/siteinfo/" title="кол-во страниц в индексе и кол-во внешних ссылок на сайт"><img class="transition-scale" src="http://xtoolza.info/q/images/analysis.png" width="80" title="кол-во страниц в индексе и кол-во внешних ссылок на сайт" alt="кол-во страниц в индексе и кол-во внешних ссылок на сайт">страницы в индексе, внешние ссылки</a>
				</div>
			</td>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock"><br /><br>
					<a class="btn" href="http://xtoolza.info/proxy/"  title="Прокси сервер"><img class="transition-scale" src="http://xtoolza.info/q/images/proxy.png" width="80" title="Прокси сервер" alt="Прокси сервер">Прокси сервер</a><br><br><br><br><br>
				</div>
			</td>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock">
					<a class="btn" href="http://xtoolza.info/proxy2" title="Прокси сервер 2"><img class="transition-scale" src="http://xtoolza.info/q/images/proxy2.png" width="80" title="Прокси сервер 2" alt="Прокси сервер 2"><br>Прокси сервер 2</a><br><br>
				</div>
			</td>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock">
					<a class="btn" href="http://xtoolza.info/proxy3/" title="Прокси сервер 3"><img class="transition-scale" src="http://xtoolza.info/q/images/source.jpg" width="80" title="Прокси сервер 3" alt="Прокси сервер 3">Прокси сервер 3 (исходный код)</a>
				</div>
			</td>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock">
					<a class="btn" href="http://xtoolza.info/q/metagenerator/" title="Мета генератор"><img class="transition-scale" src="http://xtoolza.info/q/images/metagen.jpg" width="80" title="Мета генератор" alt="Мета генератор">Мета генератор</a>
				</div><br />
			</td>
		</tr>	
		<tr>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock">
					<a class="btn" href="http://xtoolza.info/q/d/sembook.pdf" title="Энциклопедия СЕО"><img class="transition-scale" src="http://xtoolza.info/q/images/encyseo.png" width="80" title="Энциклопедия СЕО" alt="Энциклопедия СЕО">Энциклопедия СЕО</a><br>
				</div>
			</td>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock">
					<a class="btn" href="http://xtoolza.info/q/pagetofile.php" title="Сохранить страницы в файл"><img class="transition-scale" src="http://xtoolza.info/q/images/save.png" width="80" title="Сохранить страницы в файл" alt="Сохранить страницы в файл"><br>Страницы в файл</a>
				</div>
			</td>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock"><br />
					<a class="btn" href="http://xtoolza.info/q/shingles/" title="Сравнение текстов на схожесть"><img class="transition-scale" src="http://xtoolza.info/q/images/copypaste.png" width="80" title="Сравнение текстов на схожесть" alt="Сравнение текстов на схожесть">Сравнение текстов на схожесть</a>
				</div>
			</td>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock">
					<a class="btn" href="http://xtoolza.info/q/callback/" title="Установлен ли онлайн-чат"><img class="transition-scale" src="http://xtoolza.info/q/images/jivother.png" width="80" title="Установлен ли jivosite?" alt="Установлен ли jivosite?">Установлен ли онлайн-чат</a>
				</div>
			</td>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock"><br />
					<a class="btn" href="http://xtoolza.info/q/metrika/" title="Проверка Яндекс Метрики"><img class="transition-scale" src="http://xtoolza.info/q/images/metrika.png" width="80" title="Проверка Яндекс Метрики" alt="Проверка Яндекс Метрики">Проверка Яндекс Метрики</a>
				</div>
			</td>
		</tr>	
		<tr>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock"><br />
					<a class="btn" href="http://xtoolza.info/q/uni/coloredtext.php" title="Разукрасить текст"><img class="transition-scale" src="http://xtoolza.info/q/images/color_letter.png" width="80" title="Разукрасить текст" alt="Выгрузка h1-h6">Разукрасить текст</a><br><br>
				</div>
			</td>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock"><br />
					<a class="btn" href="http://xtoolza.info/q/info.php" title="Словарь терминов"><img class="transition-scale" src="http://xtoolza.info/q/images/terms.png" width="80" title="Словарь терминов" alt="Словарь терминов">Словарь терминов</a><br><br>
				</div>
			</td>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock">
					<a class="btn" href="http://xtoolza.info/q/d/annoying.php" title="Генератор паролей и транслитератор"><img class="transition-scale" src="http://xtoolza.info/q/images/pass-generator.png" width="80" title="Генератор паролей и транслитератор" alt="Генератор паролей и транслитератор">Генератор паролей</a>
				</div>
			</td>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock">
					<a href="http://xtoolza.info/q/uni/calc.php" title="Калькулятор" target="_blank"><img class="transition-scale" src="http://xtoolza.info/q/images/calc.png" width="80" title="Калькулятор" alt="Калькулятор">Калькулятор</a><br><br>
				</div>
			</td>
			<td style="padding-bottom:10px; padding: 10px;">
				<div class="textblock"><br />
					<a class="btn" href="http://xtoolza.info/q/analytics/" title="Проверка Google Analytics"><img class="transition-scale" src="http://xtoolza.info/q/images/analytics.png" width="80" title="Проверка Google Analytics" alt="Проверка Яндекс Метрики">Проверка Google Analytics</a>
				</div>
			</td>
		</tr>	
	</table>
</table>
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
	echo '<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://xtoolza.info" style="text-decoration: none;"><img src="/q/images/home.png" alt="На главную" width="60"><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;На главную</a>'; 
	?>
</div>

</div>
<div id="feedback" class="open_modal">
<a href="#"><center><img src="/q/images/mail.png" alt="обратная связь" width="60"></center><span>Обратная связь</span></a>
</div>
<div class="overlay"></div>
    <div class="popup">
        <div class="close_modal">x</div>
        <form class="fofm" action="">
            <h5>Форма обратной связи</h5>
            <input type="text" required="" placeholder="Ваше имя" name="txtname">
            <input type="email" placeholder="Ваш Email" name="txtemail">
            <textarea name="txtmessage" placeholder="Сообщение" rows="10"></textarea>
            <label><input type="checkbox">Я не робот</label>
            <input type="hidden" name="valTrFal" class="valTrFal" value="valTrFal_disabled">
    		<input type="submit" class="button" value="Отправить" disabled="disabled" name="btnsend">
        </form>
    </div>

    <div class="popup2">
    <div class="close_modal">x</div>
    	<div class="window">
    		<div class="insText">
    			<h5>запрос отправлен</h5>
    			<p><strong>Ваш запрос отправлен.</strong>Наш специалист свяжется с вами в ближайшее время!</p>
    			<hr>
    		</div>
    	</div>
    </div>
	<div style="position:fixed; left:0%; top:0%; z-index:-3"><img src="http://xtoolza.info/q/images/logo.png" width="42%"></div>
</body>
</html>