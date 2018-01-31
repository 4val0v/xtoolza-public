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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>xToolza: пакетная проверка сайтов</title>
	<meta name="description" content="xToolza: инструмент проверки кодировки страниц сайта, пакетной проверки CMS, 404 ошибки, карты сайта, статус кодов и многих других параметров" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="W3Techs-verification" content="uWt0v7rsJIitpuOh" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link href="http://xtoolza.info/temp/menu3/newcsstestsame.css" rel="stylesheet"/>
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<!--base href="http://xtoolza.info/" /--> 
	<link href="http://xtoolza.info/css/stylefeed.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://xtoolza.info/temp/menu3/jquery.fullPage.css" />
	<link rel="stylesheet" type="text/css" href="http://xtoolza.info/temp/menu3/bootstrap/css/bootstrap.css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="http://xtoolza.info/temp/menu3/vendors/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="http://xtoolza.info/temp/menu3/jquery.fullPage.js"></script>
	<script type="text/javascript" src="http://xtoolza.info/js/custom.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
				anchors: ['firstPage', 'secondPage'],
				navigation: true,
				navigationPosition: 'left',
				navigationTooltips: ['', '']
			});
		});
	</script>
	<script src="http://xtoolza.info/js/arcticmodal/jquery.arcticmodal-0.3.min.js"></script>
	<link rel="stylesheet" href="http://xtoolza.info/js/arcticmodal/jquery.arcticmodal-0.3.css">
	<script src="//yandex.st/jquery/cookie/1.0/jquery.cookie.min.js"></script>
	<link rel="stylesheet" href="http://xtoolza.info/js/arcticmodal/themes/dark.css">
</head>
<body style="height:100%;">
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
		
<script>
(function($) {
$(function() {

  // Проверим, есть ли запись в куках о посещении посетителя
  // Если запись есть - ничего не делаем
  if (!$.cookie('was')) {

    // Покажем всплывающее окно
    $('#boxUserFirstInfo').arcticmodal({
      closeOnOverlayClick: false,
      closeOnEsc: true
    });

  }

  // Запомним в куках, что посетитель к нам уже заходил
  $.cookie('was', true, {
    expires: 365,
    path: '/'
  });

})
})(jQuery)
</script>		
<div style="display: none;">
  <div class="box-modal" id="boxUserFirstInfo">
    <div class="box-modal_close arcticmodal-close">закрыть</div>
    <b>Обновление сайта</b><br>
    <br>
Привет! Мы немного обновили дизайн. Теперь все прочие проверки внизу на второй странице экрана. <br />Просто поверни колесо мышки вниз или нажми на красную точку слева :)</div>
</div>		
		
<div id="fullpage">
	<div class="section active" id="section0">
		<div class="container">
			<div class="row">
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/uptimus_promo.php" title="Понятное и результативное продвижение сайта" target="_blank">
							<img class="transition-scale" src="http://xtoolza.info/q/images/Upti_mini.png" width="80" title="Понятное и результативное продвижение сайта" alt="Uptimus, продвижение сайта, купить рекламу"><br /><b>Бесплатно продвинуть сайт</b>
						</a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/checkencode.php" title="Пакетная проверка серверной и кодировки по мета-тегу"><img class="transition-scale" src="http://xtoolza.info/q/images/charset_mini.png" width="80" title="Пакетная проверка серверной и кодировки по мета-тегу" alt="Проверить кодировку"><br /><b>Проверить кодировку</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/map_sait/sitemap_create.php" title="Создать карту сайта sitemap.xml онлайн"><img class="transition-scale" src="http://xtoolza.info/q/images/sitemapcreate_mini.png" width="80" title="Создать карту сайта sitemap.xml онлайн" alt="Создать карту сайта"><br /><b>Создать карту сайта</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/checkheaders.php" title="Пакетная проверка HTTP статус-кодов страниц сайта"><img class="transition-scale" src="http://xtoolza.info/q/images/statuscode_mini.png" width="80" title="Пакетная проверка HTTP статус-кодов страниц сайта" alt="Статус-код страницы, http-код"><br /><b>Получить статус коды</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/htaccess/" title="Редиректы для .htaccess"><img class="transition-scale" src="http://xtoolza.info/q/images/htaccess.png" width="80" title="Редиректы для .htaccess" alt="Редиректы для .htaccess"><br /><b>Редиректы для .htaccess</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/robots/" title="Правильные robots.txt для CMS"><img class="transition-scale" src="http://xtoolza.info/q/images/robots_txt.png" width="80" title="Правильные robots.txt для CMS" alt="Правильные robots.txt для CMS"><br /><b>Правильные <br />robots.txt для CMS</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/checkcy.php" title="Пакетная проверка тИЦ/PR сайта"><img class="transition-scale" src="http://xtoolza.info/q/images/tICPR_mini.jpg" width="80" title="Пакетная проверка тИЦ/PR сайта" alt="Проверить тИЦ/PR"><br /><b>Проверить тИЦ, PR, YaCa, DMOZ</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/sitemapcheck.php" title="Проверка наличия страниц в sitemap.xml"><img class="transition-scale" src="http://xtoolza.info/q/images/sitemap_mini.png" width="80" title="Проверка наличия страниц в sitemap.xml" alt="Проверить sitemap, проверить карту сайта"><br /><b>Проверка страниц sitemap.xml</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/cms/"  title="Инструмент пакетной онлайн проверки CMS сайта"><img class="transition-scale" src="http://xtoolza.info/q/images/cms_mini.png" width="80" title="Инструмент пакетной онлайн проверки CMS сайта" alt="Пакетная проверка CMS сайтов"><br /><b>Проверка CMS сайтов</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/loadtime/" title="Время ответа сервера"><img class="transition-scale" src="http://xtoolza.info/q/images/loadtime.png" width="80" title="Время ответа 	сервера" alt="Время ответа сервера"><br /><b>Время ответа сервера</b></a>
					</div>
				</div>
				<div class="col-xs-3">				
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/checktdk.php" title="Пакетная выгрузка мета-тегов title, description, keywords с указанных страниц"><img class="transition-scale" src="http://xtoolza.info/q/images/tdk_mini.jpg" width="80" title="Пакетная выгрузка мета-тегов title, description, keywords с указанных страниц" alt="Выгрузить meta-теги"><br><b>Выгрузить meta-теги</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/check404.php" title="Пакетная проверка отработки 404 статус-кода на сайтах"><img class="transition-scale" src="http://xtoolza.info/q/images/404_mini.png" width="80" title="Пакетная проверка отработки 404 статус-кода на сайтах" alt="404 статус-код"><br><b>Проверить 404 статус-код</b></a>
					</div>
				</div>
				<div class="col-xs-3">				
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/broken/" title="Инструмент поиска внешних и битых ссылок сайта"><img class="transition-scale" src="http://xtoolza.info/q/images/links_mini.jpg" width="80" title="Инструмент поиска внешних и битых ссылок сайта" alt="внешние ссылки, битые ссылки"><br /> <b>Поиск внешних и битых ссылок</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/checkphp.php" title="Пакетная проверка сайтов на наличие PHP онлайн"><img class="transition-scale" src="http://xtoolza.info/q/images/php_mini.png" width="80" title="Пакетная проверка сайтов на наличие PHP онлайн" alt="Проверка на PHP"><br /><b>Проверка сайтов на PHP</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/hosting/" title="Проверить хостинг сайта"><img class="transition-scale" src="http://xtoolza.info/q/images/hosting.png" width="80" title="Проверить хостинг сайта" alt="Проверить хостинг сайта"><br /><b>Проверить хостинг сайта</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/checkh1.php" title="Пакетная выгрузка тегов H1-H6 со страниц сайта"><img class="transition-scale" src="http://xtoolza.info/q/images/h1_mini.png" width="80" title="Пакетная выгрузка тегов H1-H6 со страниц сайта" alt="Выгрузка h1-h6"><br /><b>Пакетная выгрузка h1-h6</b></a>
					</div>
				</div>
				<div class="col-xs-3">				
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/fav/" title="Пакетная выгрузка пиктограмм (Favicon) сайтов"><img class="transition-scale" src="http://xtoolza.info/q/images/favicon_mini.jpg" width="80" title="Пакетная выгрузка пиктограмм (Favicon) сайтов" alt="выгрузить Favicon с сайта"><br /><b>Пакетная выгрузка Favicon</b></a>
					</div>
				</div>
				<div class="col-xs-3">				
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/checklinks.php" title="Инструмент пакетной выгрузки всех ссылок со страниц"><img class="transition-scale" src="http://xtoolza.info/q/images/url_mini.png" width="80" title="Инструмент пакетной выгрузки всех ссылок со страниц" alt="Выгрузить ссылки"><br/><b>Выгрузить ссылки</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/converters.php" title="Конвертеры html, php, punycode и прочие"><img class="transition-scale" src="http://xtoolza.info/q/images/сonvert.png" width="80" title="Конвертеры html, php, punycode и прочие" alt="Конвертеры html, php, punycode и прочие"><br /><b>Конвертеры html, php, punycode</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/traffic/" title="Проверить посещаемость сайтов"><img class="transition-scale" src="http://xtoolza.info/q/images/traffic.png" width="80" title="Проверить посещаемость сайтов" alt="Проверить посещаемость сайтов"><br /><b>Проверить посещаемость сайтов</b></a>
					</div>
				</div>
			</div>
		</div>

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
	</div>
	<div class="section" id="section2">
		<div class="container">
			<div class="row">
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/array/" title="Сравнить 2 массива"><img class="transition-scale" src="http://xtoolza.info/q/images/array.png" width="80" title="Сравнить 2 массива" alt="Сравнить 2 массива"><br /><b>Сравнить 2 массива</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/context/" title="Проверка контекста"><img class="transition-scale" src="http://xtoolza.info/q/context/context.jpg" width="80" title="Проверка контекста" alt="Проверка контекста"><br /><b>Проверка контекста</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/ftp/" title="Проверить FTP доступы"><img class="transition-scale" src="http://xtoolza.info/q/ftp/ftp.jpg" width="80" title="Проверить FTP доступы" alt="Проверить FTP доступы"><br /><b>Проверить FTP доступы</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/translit/" title="Кириллица в translit"><img class="transition-scale" src="http://xtoolza.info/q/images/translit.png" width="80" title="Кириллица в translit" alt="Кириллица в translit"><br /><b>Кириллица в translit</b></a>
					</div>
				</div>
				<div class="col-xs-3">				
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/checkip.php" title="Инструмент проверки трасировки, пинга, whois и многого другово."><img class="transition-scale" src="http://xtoolza.info/q/images/TCPIP_mini.png" width="80" title="Инструмент проверки трасировки, пинга, whois и многого другого." alt="Инструмент сетевых запросов"><br /><b>Инструмент сетевых запросов</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/siteinfo/" title="кол-во страниц в индексе и кол-во внешних ссылок на сайт"><img class="transition-scale" src="http://xtoolza.info/q/images/analysis.png" width="80" title="кол-во страниц в индексе и кол-во внешних ссылок на сайт" alt="кол-во страниц в индексе и кол-во внешних ссылок на сайт"><br /><b>страницы в индексе, ссылки</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/proxy/"  title="Прокси сервер"><img class="transition-scale" src="http://xtoolza.info/q/images/proxy.png" width="80" title="Прокси сервер" alt="Прокси сервер"><br /><b>Прокси сервер</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/proxy2" title="Прокси сервер 2"><img class="transition-scale" src="http://xtoolza.info/q/images/proxy2.png" width="80" title="Прокси сервер 2" alt="Прокси сервер 2"><br /><b>Прокси сервер 2</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/proxy3/" title="Прокси сервер 3"><img class="transition-scale" src="http://xtoolza.info/q/images/source.jpg" width="80" title="Прокси сервер 3" alt="Прокси сервер 3"><br /><b>Прокси сервер 3 (исходный код)</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/metagenerator/" title="Мета генератор"><img class="transition-scale" src="http://xtoolza.info/q/images/metagen.jpg" width="80" title="Мета генератор" alt="Мета генератор"><br /><b>Мета генератор</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/d/sembook.pdf" title="Энциклопедия СЕО"><img class="transition-scale" src="http://xtoolza.info/q/images/encyseo.png" width="80" title="Энциклопедия СЕО" alt="Энциклопедия СЕО"><br /><b>Энциклопедия СЕО</b></a>
					</div>
				</div>
				<div class="col-xs-3">				
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/pagetofile.php" title="Сохранить страницы в файл"><img class="transition-scale" src="http://xtoolza.info/q/images/save.png" width="80" title="Сохранить страницы в файл" alt="Сохранить страницы в файл"><br /><b>Страницы в файл</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/shingles/" title="Сравнение текстов на схожесть"><img class="transition-scale" src="http://xtoolza.info/q/images/copypaste.png" width="80" title="Сравнение текстов на схожесть" alt="Сравнение текстов на схожесть"><br /><b>Сравнение текстов на схожесть</b></a>
					</div>
				</div>
				<div class="col-xs-3">				
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/callback/" title="Установлен ли онлайн-чат"><img class="transition-scale" src="http://xtoolza.info/q/images/jivother.png" width="80" title="Установлен ли jivosite?" alt="Установлен ли jivosite?"><br /><b>Установлен ли онлайн-чат</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
					<a class="btn" href="http://xtoolza.info/q/metrika/" title="Проверка Яндекс Метрики"><img class="transition-scale" src="http://xtoolza.info/q/images/metrika.png" width="80" title="Проверка Яндекс Метрики" alt="Проверка Яндекс Метрики"><br /><b>Проверка Яндекс Метрики</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/analytics/" title="Проверка Google Analytics"><img class="transition-scale" src="http://xtoolza.info/q/images/analytics.png" width="80" title="Проверка Google Analytics" alt="Проверка Яндекс Метрики"><br /><b>Проверка Google Analytics</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/info.php" title="Словарь терминов"><img class="transition-scale" src="http://xtoolza.info/q/images/terms.png" width="80" title="Словарь терминов" alt="Словарь терминов"><br /><b>Словарь терминов</b></a>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/d/annoying.php" title="Генератор паролей и транслитератор"><img class="transition-scale" src="http://xtoolza.info/q/images/pass-generator.png" width="80" title="Генератор паролей и транслитератор" alt="Генератор паролей и транслитератор"><br /><b>Генератор паролей</b></a>
					</div>
				</div>
				<div class="col-xs-3">				
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/uni/calc.php" title="Калькулятор" target="_blank"><img class="transition-scale" src="http://xtoolza.info/q/images/calc.png" width="80" title="Калькулятор" alt="Калькулятор"><br /><b>Калькулятор</b></a>
					</div>
				</div>
				
				<div class="col-xs-3">
					<div class="textblock">
						<a class="btn" href="http://xtoolza.info/q/uni/coloredtext.php" title="Разукрасить текст"><img class="transition-scale" src="http://xtoolza.info/q/images/color_letter.png" width="80" title="Разукрасить текст" alt="Выгрузка h1-h6"><br /><b>Разукрасить текст</b></a>
					</div>
				</div>
			</div>
		</div>
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
<div id="footer">
	© 2015 xtoolza.info<br />
	<a href="http://uptimus.ru/whatnew.php" rel="nofollow">release note</a><br />
</div>
<div id="update">
	<? 
	echo '<ul>';
	echo '<li style="list-style-type: none;">Апдейты:</li>'.PHP_EOL;
	echo seo_news();
	echo '</ul>';
	?>
</div>
</body>
</html>