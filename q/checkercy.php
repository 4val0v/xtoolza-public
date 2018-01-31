<?
header('Content-Type: text/html; charset=utf-8');
error_reporting( E_STRICT );
ini_set('display_errors', 1);
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex, follow" />
	<title>CY/PR/Yaca/DMOZ Checker Result</title>
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<script type="text/javascript">
		var check_preload;
		function preload_page() {
			if(check_preload) {
				document.getElementById("total").style.visibility = "visible";
				document.getElementById("load").style.visibility = "hidden";
			}
		}
	</script>
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
								<td><h1 class="jumbotron">Результаты проверки тИЦ, PR, Яндекс каталог, DMOZ для сайтов</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/tICPR.png" width="80" alt="Проверить тИЦ, PR, Яндекс каталог, DMOZ для сайтов"></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?
echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>Site</b></td><td><b>CY</b></td><td><b>PR</b></td><td><b>В Яндекс Каталоге</b></td><td><b>В DMOZ</b></td></tr>";
$plist = explode("\r\n",trim($_POST['textt']));

function result($plist) {
	foreach ($plist as $arraylist) {
		$narray = preg_replace('~^(?!https??://)~i', 'http://', $arraylist, 1);
		$arraylist = str_replace('http://','',$arraylist);
		echo "<tr><td style=\"word-break: break-all;\">".'<a href="http://'. $arraylist . '" target="_blank" >'.$narray.'</a>'. "</td>";
		echo "<td>"." ". getcy($narray) . "</td><td>" . getpagerank($narray) . "</td><td>" . str_replace("\n",' ', strip_tags(getyaca($narray))) . "</td><td>" . getdmoz($narray) . "</td></tr>";
		$log .= $arraylist . " " . getcy($narray) . " " . getpagerank($narray) . " " . str_replace("\n",' ', strip_tags(getyaca($narray))) . " " . getdmoz($narray) . PHP_EOL;
		}
	echo "</table>";
	return $log;
}

$loger = result($plist);
function mylog($data){
	$data = $data . PHP_EOL;
	file_put_contents('logs/cyprlogs.txt', $data);
}
mylog($loger);



$domain = $narray;
function getcy($narray) {
	//считываем XML-файл с данными
	$xml = file_get_contents(
		'http://bar-navig.yandex.ru/u?ver=2&show=32&url='.$narray
	);
	//если XML файл прочитан, то возвращаем значение параметра value,
	//иначе возвращаем false - ошибка
	return $xml ? (int) substr(strstr($xml, 'value="'), 7) : false;
}

function getyaca($narray) {
	$xml = file_get_contents('http://bar-navig.yandex.ru/u?ver=2&show=32&url='.$narray);
	preg_match('|<textinfo>(.*)</textinfo>|ism', $xml, $links);
		foreach ($links as $link){
			$res = iconv("Windows-1251", "UTF-8", $link);
			return $res;
		}
}


function getdmoz($narray) {
	$xml = file_get_contents(
		'http://www.dmoz.org/search/?q=u:'.$narray
	);
	if(preg_match('#DMOZ Sites#ui',$xml)){
		return 'В каталоге';
	} else {
		return 'Нет в каталоге';
	}
}


function StrToNum($Str, $Check, $Magic) {
	$Int32Unit = 4294967296;
	$length = strlen($Str);
	for ($i = 0; $i < $length; $i++) {
		$Check *= $Magic;
		if ($Check >= $Int32Unit) {
			$Check = ($Check - $Int32Unit * (int) ($Check / $Int32Unit));
			$Check = ($Check < -2147483648) ? ($Check + $Int32Unit) : $Check;
			}
	$Check += ord($Str{$i});
	}
	return $Check;
}
function HashURL($String) {
	$Check1 = StrToNum($String, 0x1505, 0x21);
	$Check2 = StrToNum($String, 0, 0x1003F);
	$Check1 >>= 2;
	$Check1 = (($Check1 >> 4) & 0x3FFFFC0 ) | ($Check1 & 0x3F);
	$Check1 = (($Check1 >> 4) & 0x3FFC00 ) | ($Check1 & 0x3FF);
	$Check1 = (($Check1 >> 4) & 0x3C000 ) | ($Check1 & 0x3FFF);
	$T1 = (((($Check1 & 0x3C0) << 4) | ($Check1 & 0x3C)) <<2 ) | ($Check2 & 0xF0F );
	$T2 = (((($Check1 & 0xFFFFC000) << 4) | ($Check1 & 0x3C00)) << 0xA) | ($Check2 & 0xF0F0000 );
	return ($T1 | $T2);
}
function CheckHash($Hashnum) {
	$CheckByte = 0;
	$Flag = 0;
	$HashStr = sprintf('%u', $Hashnum) ;
	$length = strlen($HashStr);
	for ($i = $length - 1;  $i >= 0;  $i --) {
		$Re = $HashStr{$i};
		if (1 === ($Flag % 2)) {
			$Re += $Re;
			$Re = (int)($Re / 10) + ($Re % 10);
			}
		$CheckByte += $Re;
		$Flag ++;
		}
	$CheckByte %= 10;
	if (0 !== $CheckByte) {
		$CheckByte = 10 - $CheckByte;
		if (1 === ($Flag % 2) ) {
			if (1 === ($CheckByte % 2)) {
				$CheckByte += 9;
				}
			$CheckByte >>= 1;
			}
		}
	return '7'.$CheckByte.$HashStr;
}
function getpagerank($url) {
	$fp = fsockopen("toolbarqueries.google.com", 80, $errno, $errstr, 30);
	if (!$fp) {
		}
	else {
		$out = "GET /tbr?client=navclient-auto&ch=".CheckHash(HashURL($url))
		."&features=Rank&q=info:".$url."&num=100&filter=0 HTTP/1.1\r\n";
		$out .= "Host: toolbarqueries.google.com\r\n";
		$out .= "User-Agent: Mozilla/4.0 (compatible; GoogleToolbar 2.0.114-big; Windows XP 5.1)\r\n";
		$out .= "Connection: Close\r\n\r\n";
		fwrite($fp, $out);
		while (!feof($fp)) {
			$data = fgets($fp, 128);
			$pos = strpos($data, "Rank_");
			if($pos === false)
				{
				}
			else {
				$pagerank = substr($data, $pos + 9);
				}
			}
		fclose($fp);
	}
	$pagerank = (strlen($pagerank) > 0) ? $pagerank : -1;
	$pagerank = intval($pagerank);
	if ($pagerank == -1) {
			$pagerank = '0';
		}
	return $pagerank;
}

//Конвертируем полученные данные функцией file_get_contents
function _convert_file($utf = ''){
	if($utf == '' || !is_string($utf)) return($utf);
	$max_count = 5;
	$max_mark = 248;
	$html = '';
	for($str_pos = 0; $str_pos < strlen($utf); $str_pos++) {
	$old_chr = $utf{$str_pos};
	$old_val = ord( $utf{$str_pos} );
	$new_val = 0;
	$utf8_marker = 0;
	if( $old_val > 127 ) {
		$mark = $max_mark;
		for($byte_ctr = $max_count; $byte_ctr > 2; $byte_ctr--) {
			if( ( $old_val & $mark  ) == ( ($mark << 1) & 255 ) ) {
				$utf8_marker = $byte_ctr - 1;
				 break;
				}
			$mark = ($mark << 1) & 255;
		}
	}
	if($utf8_marker > 1 and isset( $utf{$str_pos + 1} ) ) {
		$str_off = 0;
		$new_val = $old_val & (127 >> $utf8_marker);
		for($byte_ctr = $utf8_marker; $byte_ctr > 1; $byte_ctr--) {
			if( (ord($utf{$str_pos + 1}) & 192) == 128 ) {
				$new_val = $new_val << 6;
				$str_off++;
				$new_val = $new_val | ( ord( $utf{$str_pos + $str_off} ) & 63 );
			} else $new_val = $old_val;
		}
		if ($new_val == 1025) { $html .= chr(168); }
		elseif ($new_val == 1105) { $html .= chr(184); }
		elseif (1040 <= $new_val and $new_val <= 1103) { $html .= chr($new_val - 848); }
		else { $html .= '&#'.$new_val.';'; }
		$str_pos = $str_pos + $str_off;
	}
	else { $html .= chr($old_val);$new_val = $old_val; }
	}
return($html);
}
?>
<br /><a href="http://xtoolza.info/q/logs/cyprlogs.txt" download>Скачать результат</a><br />
<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
</body>
</html>
