<!DOCTYPE html>
<html>
<?
ignore_user_abort(true);
set_time_limit(0);
error_reporting( E_ALL );
ini_set('display_errors', 1);
?>
<head>
	<title>Посмотреть страницу (сайт) как робот Яндекса <?echo ($_POST['site'])?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex, nofollow" />
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
</head>
<body id="linearBg1">
<?
header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));?>


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
								<td><h1 class="jumbotron">Посмотреть страницу (сайт) как робот Яндекса <? echo $_POST['site']?></h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/source.jpg" width="80" alt="Посмотреть страницу (сайт) как робот Яндекса"></td>
							</tr> 
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>

 
<?
$url = $_POST['site'];
$arraylistscheme = parse_url($url);
// var_dump($arraylistscheme);exit();

if ($arraylistscheme['path']){
	$url_host = $arraylistscheme['path'];
} else {
	$url_host = $arraylistscheme['host'];
}
// var_dump($arraylistscheme);
if(mb_detect_encoding($url_host) != "ASCII"){ //если сайт в кириллице переводим в punycode
	include_once("idna_convert.class.php");
	$IDN = new idna_convert(array('idn_version' => '2008'));
	$url=$IDN->encode($url_host);
	}
function page($url){
	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36";
	$handle = curl_init();
    curl_setopt($handle, CURLOPT_URL, $url);
	curl_setopt($handle, CURLOPT_USERAGENT, $user_agent);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($handle, CURLOPT_VERBOSE, false);
	curl_setopt($handle, CURLOPT_TIMEOUT, 30);
	curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($handle, CURLOPT_FOLLOWLOCATION, false);
	curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
    $homepage = curl_exec($handle);
	return encoding($homepage);
    curl_close($handle);
	
}

function encoding($keywords){
	if (mb_detect_encoding($keywords, 'UTF-8', true)){
		return $keywords;
		}
	else {
		$keywords1 = cp1251_to_utf8($keywords);
		return $keywords1;
		}
}

function cp1251_to_utf8 ($repcharset)  {
	$in_arr = array (
		chr(208), chr(192), chr(193), chr(194),
		chr(195), chr(196), chr(197), chr(168),
		chr(198), chr(199), chr(200), chr(201),
		chr(202), chr(203), chr(204), chr(205),
		chr(206), chr(207), chr(209), chr(210),
		chr(211), chr(212), chr(213), chr(214),
		chr(215), chr(216), chr(217), chr(218),
		chr(219), chr(220), chr(221), chr(222),
		chr(223), chr(224), chr(225), chr(226),
		chr(227), chr(228), chr(229), chr(184),
		chr(230), chr(231), chr(232), chr(233),
		chr(234), chr(235), chr(236), chr(237),
		chr(238), chr(239), chr(240), chr(241),
		chr(242), chr(243), chr(244), chr(245),
		chr(246), chr(247), chr(248), chr(249),
		chr(250), chr(251), chr(252), chr(253),
		chr(254), chr(255)
	);   
 
	$out_arr = array (
		chr(208).chr(160), chr(208).chr(144), chr(208).chr(145),
		chr(208).chr(146), chr(208).chr(147), chr(208).chr(148),
		chr(208).chr(149), chr(208).chr(129), chr(208).chr(150),
		chr(208).chr(151), chr(208).chr(152), chr(208).chr(153),
		chr(208).chr(154), chr(208).chr(155), chr(208).chr(156),
		chr(208).chr(157), chr(208).chr(158), chr(208).chr(159),
		chr(208).chr(161), chr(208).chr(162), chr(208).chr(163),
		chr(208).chr(164), chr(208).chr(165), chr(208).chr(166),
		chr(208).chr(167), chr(208).chr(168), chr(208).chr(169),
		chr(208).chr(170), chr(208).chr(171), chr(208).chr(172),
		chr(208).chr(173), chr(208).chr(174), chr(208).chr(175),
		chr(208).chr(176), chr(208).chr(177), chr(208).chr(178),
		chr(208).chr(179), chr(208).chr(180), chr(208).chr(181),
		chr(209).chr(145), chr(208).chr(182), chr(208).chr(183),
		chr(208).chr(184), chr(208).chr(185), chr(208).chr(186),
		chr(208).chr(187), chr(208).chr(188), chr(208).chr(189),
		chr(208).chr(190), chr(208).chr(191), chr(209).chr(128),
		chr(209).chr(129), chr(209).chr(130), chr(209).chr(131),
		chr(209).chr(132), chr(209).chr(133), chr(209).chr(134),
		chr(209).chr(135), chr(209).chr(136), chr(209).chr(137),
		chr(209).chr(138), chr(209).chr(139), chr(209).chr(140),
		chr(209).chr(141), chr(209).chr(142), chr(209).chr(143)
	);   
 
	$repcharset = str_replace($in_arr,$out_arr,$repcharset);
	return $repcharset;
}


function headers($url){
	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36";
	$handler = curl_init();
	curl_setopt($handler, CURLOPT_URL, $url);
	curl_setopt($handler, CURLOPT_USERAGENT, $user_agent);
    curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($handler, CURLOPT_VERBOSE, false);
	curl_setopt($handler, CURLOPT_NOBODY,true);
	curl_setopt($handler, CURLOPT_HEADER,true);
    $page = curl_exec($handler);
	return $page;
    curl_close($handler);

}
?>	
<html>
<head>
	<script type="text/javascript" src="scripts/shCore.js"></script>
	<script type="text/javascript" src="scripts/shBrushJScript.js"></script>
	<link type="text/css" rel="stylesheet" href="styles/shCoreMidnight.css"/>
	<script type="text/javascript">SyntaxHighlighter.all();</script>
	<script type="text/javascript" src="scripts/shAutoloader.js"></script>
	<script language="javascript" src="scripts/shBrushXml.js"></script> 
</head>
<body>
<table>
	<tr>
		<td><h2>Страница <?echo $url;?></h2></td>
	</tr>
	<tr>
	<tr>
		<td><h4>Заголовки:</h4></td>
	</tr>
		<td>
			<pre>
<?echo headers($url);?>
			</pre>
		</td>
	</tr>
	<tr>
		<td><h4>Исходник:</h4></td>
	</tr>
	<tr>
		<td>
			<pre name="code" class="brush: html">
			<? echo page($url); ?>
			</pre>
		</td>
	</tr>
</table>

<table border="2px"; bordercolor="black"; style="border-collapse: collapse; ">
	<tr>
		<td>
			<b>meta name robots: </b>
		</td>
		<td>
			<? echo metarobots($url); ?>
		</td>
	</tr>
			<? echo canonical($url); ?>
<table>
<?


function metarobots($url){
	if(mb_detect_encoding($url) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$url=$IDN->encode($url);
		}
	$charrz = page($url);
	if (preg_match('#<meta\s*name\s*=\s*["\']robots["\']\s*content\s*=\s*["\'](.*?)["\']\s*/?>#si',$charrz, $metamatch)){
		return $metamatch[1];
		}
	else return 'Not Found';
}


function loger($url){
	$data = $_POST['site']. PHP_EOL . headers($url). PHP_EOL . page($url). PHP_EOL;
    file_put_contents('logs.txt', $data);	
}
loger($url);


function canonical($url){
	include_once 'simple_html_dom.php';
	$data = file_get_html($url);
	
	if($data->find('link [rel=canonical]')){ 
		echo '<tr><td>Canonical: </td>';
		foreach($data->find('link [rel=canonical]') as $link){ 
			echo '<td><a href="'.$link->href.'">'.$link->href.'</a></td>'; 
		} 
		echo '</tr>';	
	}else echo '<tr><td>Canonical: </td><td>Not Found</td>';
	
	
	if($data->find('a')){ 
		echo '<tr>
				<td>Nofollow links: </td>
					<td>
						<table>';
						foreach($data->find('a') as $a){ 
							if (preg_match("/\bnofollow\b/is", $a)){
							echo '<tr><td>'.$a->href.'</td></tr>'; 
							}
						} 
				echo '</table>
					</td>
			</tr>';
	}else echo '<tr><td>Nofollow links: </td><td>Not Found</td>';
	
	if($data->find('link [rel=prev]')){ 
		echo '<tr><td>Link Rel Prev: </td>';
		foreach($data->find('link [rel=prev]') as $link){ 
			echo '<td><a href="'.$link->href.'">'.$link->href.'</a></td>'; 
		} 
		echo '</tr>';	
	}else echo '<tr><td>Link Rel Prev: </td><td>Not Found</td>';
	
	if($data->find('link [rel=next]')){ 
		echo '<tr><td>Link Rel Next : </td>';
		foreach($data->find('link [rel=next]') as $link){ 
			echo '<td><a href="'.$link->href.'">'.$link->href.'</a></td>'; 
		} 
		echo '</tr>';	
	}else echo '<tr><td>Link Rel Next: </td><td>Not Found</td>';
	
}

?>
<br />
<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">&emsp;
<a class="btn-success btn" href="http://xtoolza.info">На главную</a><br><br>
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
</body>
</html>