<?php header('Content-Type: text/html; charset=utf-8');
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
$num=mt_rand(2000,10000);
ignore_user_abort(true);
set_time_limit(0);
$debug = 1;
function debugger(){
	$debug = 0;
	if($debug === 1) {
	    header("Content-Type: text/html; charset=utf-8");
	    error_reporting(E_ALL);
	    ini_set('display_errors', 1);
	}else{
	    error_reporting( 0 );
	}
}
debugger();


?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Получить статус коды страниц</title>
	<meta name="description" content="Инструмент пакетной проверки HTTP статус кодов страниц сайта. Проверить статус-код целевой страницы онлайн.">
	<meta name="keywords" content="проверить статус код, узнать статус страницы, проверить HTTP-код">
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="robots" content="all" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<script src="jquery-2.1.1.min.js" type="text/javascript"></script>
	<script src="light.js" type="text/javascript"></script>
</head>
<body onload="$('#site_list').focus()" id="linearBg1">
<div style="align:left;">
	<table>
		<tbody>
			<tr>
				<td>
					<div class="TmgWrae">
						<a href="http://xtoolza.info" rel="nofollow"><img class="image UE" src="http://xtoolza.info/q/images/logo.png" width="120px" border="0" width="120px"><img class="image Dowe" src="http://xtoolza.info/q/images/logo_new.png" width="120px" /></a>
					</div>
				</td>
				<td>
					<table>
						<tbody>
							<tr>
								<td><h1 class="jumbotron">Пакетная проверка статус кодов</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/statuscode.png" width="80" alt="Пакетная проверка статус кодов">
								 </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<div class='tabs' id='whois_tab'>
<table id="tablespecial">
	<tr>
		<td style="vertical-align:top;">
			<form id='context' method='post'>Cписок URL:<br><br>
				<textarea id='site_list' style='width:500px; height:300px'></textarea><br><br>
				<input type='button' value='Определить' onClick='check_context();'>
				<input type='reset' value='Очистить' onClick='$("#site_list").focus();'>
			</form>
			<table class="cmstable" id='show_context'></table>
		</td>
	</tr>
</table>
</div>
<div style='display:none' id="div"><img src='http://xtoolza.info/q/images/status.gif' width="50" alt="Loading..."><span style="margin-left:25px;">Идёт проверка статус-кодов. Пожалуйста, подождите и не закрывайте страницу.</span><br><br></div>
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
<div style="width: 750px">
	<strong>Статус-код страницы</strong> - один из наиболее значимых факторов ранжирования. В выдачу поисковой системы никогда не попадут страницы с 301, 302, 404, 500 и многими другими кодами. Правильными HTTP статус-кодами рабочей страницы являются 200 ОК и 304 If-Modified-Since. Важно регулярно проверять доступность целевых страниц. И исправлять ошибку, если она есть.<br><br>
	Чтобы проверить статус-коды страниц, вставьте список в соответствующее поле и нажмите "Проверить". В зависимости от количества страниц, проверка может занять некоторое время.
</div>

<table>
	<tr>
		<td>
			<a class="btn" href="http://xtoolza.info/q/check404.php" title="Пакетная проверка отработки 404 статус-кода на сайтах" style="width:310px;"><img class="transition-scale" src="http://xtoolza.info/q/images/404_mini.png" width="80" title="Пакетная проверка отработки 404 статус-кода на сайтах" alt="404 статус-код">Проверить 404 статус-код</a>
		</td>
		<td>
			<a class="btn" href="http://xtoolza.info/q/sitemapcheck.php" title="Проверка наличия страниц в sitemap.xml" style="width:310px;"><img class="transition-scale" src="http://xtoolza.info/q/images/sitemap_mini.png" width="80" title="Проверка наличия страниц в sitemap.xml" alt="Проверить sitemap, проверить карту сайта">Проверка страниц sitemap.xml</a>
		</td>
	</tr>
<tr>
	<td>
		<a class="btn" href="http://xtoolza.info/q/broken/index.php" title="Инструмент поиска внешних и битых ссылок сайта" style="width:310px;"><img class="transition-scale" src="http://xtoolza.info/q/images/links_mini.jpg" width="80" title="Инструмент поиска внешних и битых ссылок сайта" alt="внешние ссылки, битые ссылки">Поиск внешних и битых ссылок</a>
	</td>
		<td>
			<a class="btn" href="http://xtoolza.info/q/lastmodified/" title="Проверить заголовок Last-Modified" style="width:310px"><img class="transition-scale" src="http://xtoolza.info/q/images/LastModified.png" width="80" title="Проверить заголовок Last-Modified" alt="Проверить заголовок Last-Modified">Проверить заголовок Last-Modified</a>
		</td>
	</tr>
</table>

<?
// echo file_get_contents("https://tvoe.ru/catalog/product/view/id/959099/");
?>
<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/uniplacer_config.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/'._UNIPLACE_USER_.'/uniplacer.php');
    $Uniplacer = new Uniplacer(_UNIPLACE_USER_);
    $Uniplacer->GetCode();
    $links = $Uniplacer->GetLinks();

    if($links){
    foreach($links as $link){
        echo $link.'<br>';
    }
    }
?>

</body>
</html>
