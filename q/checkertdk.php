<?
ignore_user_abort(true);
set_time_limit(0);
header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Result TDK Checker. Результат проверки title, description, keywords</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex, follow" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
</head>
<body id="linearBg1">
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
								<td><h1 class="jumbotron">Title, Description, Keywords</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/tdk.png" width="80" alt="Title, Description, Keywords"> </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?
//titles
echo
"<table border=\"1\" bordercolor=\"#CDC9C9\">
<tr>
	<td><b>URL</b></td>
	<td><b>Title</b></td>
	<td><b>Description</b></td>
	<td><b>Keywords</b></td>
</tr>";
$plist = explode("\r\n",trim($_POST['textt']));

function result($plist) {
	foreach ($plist as $arraylist) {
		$arraylist = trim($arraylist);
		$narray = preg_replace('~^(?!https??://)~i', 'http://', $arraylist, 1);
		$arraylist = str_replace('http://','',$arraylist);
		echo "<tr><td style=\"word-break: break-all;\">".'<a href="http://'. $arraylist . '" target="_blank" >'.$arraylist.'</a>'. "</td>";
		echo "<td>"." ". parstitle($narray). "<br /></td>";
		echo "<td>"." ". parsdesc($narray). "<br /></td>";
		echo "<td>"." ". parskeys($narray). "<br /></td></tr>";
		$log .= $arraylist . "|" . parstitle($narray). "|" . parsdesc($narray). "|" . parskeys($narray) . PHP_EOL;
		}
	echo "</table>";
	return $log;
}

$loger = result($plist);
function mylog($data){
	$data = $data . PHP_EOL;
	file_put_contents('logs/tdklogs.txt', $data);
}
mylog($loger);

function parstitle($website) {
	if(mb_detect_encoding($website) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$website=$IDN->encode($website);
		}
	$rz = getmetapage($website);
	if (preg_match('|<title.*?>(.*)</title>|sei',$rz, $matched)){
		$repcharset = $matched[1];
		return encoding($repcharset);
		}
	else return 'NULL';
}

function parsdesc($narray) {
	if(mb_detect_encoding($narray) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$narray=$IDN->encode($narray);
		}
	$rz1 = getmetapage($narray);
	//var_dump ($rz1);
	$tags = get_meta_tags($narray);
	$description = $tags['description'];
	return encoding1($description);
}

function parskeys($narray) {
	if(mb_detect_encoding($narray) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$narray=$IDN->encode($narray);
		}
	$rz1 = getmetapage($narray);
	//var_dump ($rz1);
	$tags = get_meta_tags($narray);
	$keywords = $tags['keywords'];
	return encoding2($keywords);
}

//перекодируем title в uft-8 если требуется
function encoding($repcharset){
	if (mb_detect_encoding($repcharset, 'UTF-8', true)){
		return $repcharset;
		}
	else {
		$repcharset1 = cp1251_to_utf8($repcharset);
		return $repcharset1;
		}
}

//перекодируем description, если надо
function encoding1($description){
	if (mb_detect_encoding($description, 'UTF-8', true)){
		return $description;
		}
	else {
		$description1 = cp1251_to_utf8($description);
		return $description1;
		}
}

//перекодируем keywords, если надо
function encoding2($keywords){
	if (mb_detect_encoding($keywords, 'UTF-8', true)){
		return $keywords;
		}
	else {
		$keywords1 = cp1251_to_utf8($keywords);
		return $keywords1;
		}
}

function cp1251_to_utf8 ($repcharset) {
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

//получить содержимое страницы
function getmetapage($nadres){
	if (!preg_match('|^http:.*|i',$nadres)){
		$nadres = 'http://'.$nadres;
		}
	$arraylistscheme = parse_url($nadres);
	$url_host = $arraylistscheme['host'];
	if(mb_detect_encoding($url_host) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$nadres=$IDN->encode($url_host);
		}
	$ch = curl_init();
	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2062.124 Safari/537.36";
	curl_setopt($ch, CURLOPT_URL,$nadres);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// curl_setopt($ch, CURLOPT_SSLVERSION, 3);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	$pagemeta = curl_exec($ch);
	curl_close($ch);
	return $pagemeta;
}
?>
<br /><a href="http://xtoolza.info/q/logs/tdklogs.txt" download>Скачать результат</a><br />
<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a><br><br>
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
</body>
</html>
