<?php header('Content-Type: text/html; charset=utf-8');
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
$num=mt_rand(2000,10000);
error_reporting( E_ERROR );
ini_set('display_errors', 0);
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Пакетная проверка CMS сайтов</title>
	<meta name="description" content="Инструмент пакетной массовой проверки CMS сайтов. Данный инструмент с очень высокой долей вероятности позволяет массово онлайн проверить и определить CMS и движки сайтов. В базе более 450 различных видов CMS (платформ). " />
	<meta name="keywords" content="проверить CMS сайта, определить CMS, узнать платформу сайта, пакетная проверка CMS, узнать движок сайта">
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="robots" content="all" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="http://xtoolza.info/q/cms/light.js" type="text/javascript"></script>
	<script type="text/javascript" src="custom.js"></script>
<link rel='stylesheet' href='nprogress.css'/>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-0745697304390645",
    enable_page_level_ads: true
  });
</script>
</head>
<body onload="$('#site_list').focus()" id="linearBg1">
<script src='nprogress.js'></script>
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
							<td><h1 class="jumbotron">Пакетная проверка CMS сайтов</h1></td>
						</tr>
						<tr>
							<td><img src="http://xtoolza.info/q/images/cms.png" width="80" alt="Пакетная проверка CMS сайтов"></td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
<div class='tabs' id='whois_tab'>
<table id="tablespecial">
	<tr>
		<td style="vertical-align:top;">
			<form id='cms' method='post'>Cписок сайтов:<br><br>
				<textarea id='site_list' style='width:500px; height:300px'></textarea><br><br>
				<input type='button' value='Определить' onClick='check_cms();'>
				<input type='reset' value='Очистить' onClick='$("#site_list").focus();'>
			</form>
			<table class="cmstable" id='show_cms'></table>
		</td>
	</tr>
</table>
</div>
<a class="btn-success btn" href="http://xtoolza.info/dublicates/index.php">Список CMS и их характеристики</a>
<br>
<br>
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a><br><br>
<div style="width: 750px font-size:14px;">
<b style="text-decoration: none;">Инструмент бесплатного определения CMS</b> - Content Management System (Система управления сайтом или просто движок сайта). <br> Это набор программных модулей для легкого и быстрого редактирования контента, отслеживания заказов и прочих полезных сервисов на сайте.<br> Данный инструмент позволяет массово проверить и определить CMS списка сайтов. В базе <u> 415 различных видов CMS</u> и она постоянно обновляется. <br> В зависимости от количества сайтов, процесс может занять некоторое время.
</div><br>
<? include ('../../yandex_metrika.php'); ?>
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
<a class="btn-success btn" href="http://xtoolza.info/q/cms/cms_top.php">CMS TOP 04 2015</a>&nbsp;
<a class="btn-success btn" href="http://xtoolza.info/q/cms/cms_top_05.php">CMS TOP 05 2015</a>

<script>
 $('body').show();
 $('.version').text(NProgress.version);
 NProgress.start();
 setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);
 </script>
</body>
</html>
