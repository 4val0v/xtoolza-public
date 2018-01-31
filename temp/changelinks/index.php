<?
$debug = 1;
if ($debug == 1) {
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	$message = 1;
	if ($message == 0){
		echo '<pre>
		Идёт отладка!
		Проверка может работать некорректно!
	</pre>';
	}
}

header('Content-Type: text/html; charset=utf-8');
//тащим ссылки, показываем
function result($contents) {
	$a = file_get_contents('old.html');
	preg_match_all('/href="([^"]+)"/', $a, $links);
	preg_replace("#([^\"'=])((https?|ftp)://[^'\"<>\n\r ]+)(?!<\/a>)(['\"<>\n\r ])#i", '\\1<a href="\\">\\2</a>\\4', $text);



		// echo '<tr><td style="word-break: break-all;">';
		// echo '<a href="'. $newlink.'">'. $newlink.'</a>'.'<br/>' ;
		// echo '</td></tr>';
		// $log .= $newlink . PHP_EOL;
	}
	return $log;
}

$loger = result($contents);
function mylog($data){
    $data = $data . PHP_EOL;
    file_put_contents('result.txt', $data);
}
mylog($loger);


//получить имя хоста из URL
function getdomain($arraylist) {
	preg_match("/^(http:\/\/)?([^\/]+)/i", $arraylist, $matches);
	$host = $matches[2];
	return $host;
	preg_match("/[^\.\/]+\.[^\.\/]+$/",$host,$matches);
	// echo "domain name is: ".$matches[0]."\n";
	$dm = $matches[0];
	return $dm;
}

//преобразование ссылок к абсолютному виду ($link - ссылка, $base - домен)
function uri2absolute($link, $base) {
	if (!preg_match('~^(http://[^/?#]+)?([^?#]*)?(\?[^#]*)?(#.*)?$~i', $link.'#', $matchesLink)) {
		return false;
		}
	if (!empty($matchesLink[1])) {
		return $link;
		}
	if (!preg_match('~^(http://)?([^/?#]+)(/[^?#]*)?(\?[^#]*)?(#.*)?$~i', $base.'#', $matchesBase)) {
		return false;
		}
	if (empty($matchesLink[2])) {
		if (empty($matchesLink[3])) {
			return 'http://'.$matchesBase[2].$matchesBase[3].$matchesBase[4];;
			}
		return 'http://'.$matchesBase[2].$matchesBase[3].$matchesLink[3];
	}
	$pathLink = explode('/', $matchesLink[2]);
	if ($pathLink[0] == '') {
		return 'http://'.$matchesBase[2].$matchesLink[2].$matchesLink[3];
		}
	$pathBase = explode('/', preg_replace('~^/~', '', $matchesBase[3]));
	if (sizeOf($pathBase) > 0) {
		array_pop($pathBase);
		}
	foreach ($pathLink as $p) {
		if ($p == '.') {
			continue;
			} 
		elseif ($p == '..') {
			if (sizeOf($pathBase) > 0) {
				array_pop($pathBase);
				}
			} 
		else {
			array_push($pathBase, $p);
		}
	}
	return 'http://'.$matchesBase[2].'/'.implode('/', $pathBase).$matchesLink[3];
}
	
//получить содержимое страницы
function getpage($contents){
	if(mb_detect_encoding($contents) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$contents=$IDN->encode($contents);
		}
	$ch = curl_init();
	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36";
	curl_setopt($ch, CURLOPT_URL,$contents);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSLVERSION, 3);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

?>