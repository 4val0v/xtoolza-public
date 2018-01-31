<?php
// echo '111';exit();

header('Content-Type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);

// function curl_redir_exec($ch) {
//         static $curl_loops = 0;
//         static $curl_max_loops = 5; # Максимальное количество перебросов.
//         if ($curl_loops >= $curl_max_loops) {
//                 $curl_loops = 0;
//                 return FALSE;
// 			}
//         curl_setopt($ch, CURLOPT_HEADER, true);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         $data = curl_exec($ch);
//         list($header, $data) = explode("\n\n", $data, 2);
//         $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//         return $http_code
// }

function getRemoteFileSize($url){
	$parse = parse_url($url);
	$host = $parse['host'];
	$fp = @fsockopen ($host, 80, $errno, $errstr, 20);
	if(!$fp){
		$ret = 0;
	}else{
		$host = $parse['host'];
		fputs($fp, "HEAD ".$url." HTTP/1.1\r\n");
		fputs($fp, "HOST: ".$host."\r\n");
		fputs($fp, "Connection: close\r\n\r\n");
		$headers = "";
		while (!feof($fp)){
			$headers .= fgets ($fp, 128);
		}
		fclose ($fp);
		$headers = strtolower($headers);
		var_dump($headers);
		$array = preg_split("|[\s,]+|",$headers);
		$key = array_search('content-length:',$array);
		$ret = $array[$key+1];
	}
	if($array[1]==200) return $ret;
	else return -1*$array[1];
}

 /*
 $url = 'http://artkiev.com/blog/wp-content/uploads/2012/12/sreda.zip';
 $size = getRemoteFileSize($url);
 if($size==0) echo "Не могу соединиться";
 elseif($size<0) echo "Ошибка. Код ответа HTTP: ".(-1*$size);
 else echo "Размер удалённого файла (bytes): ".$size;
*/

function grab($site) {
if (!preg_match('|^http:.*|i',$site)){
		$site = 'http://'.$site;
		}
	$sitescheme = parse_url($site);
	$url_host = $sitescheme['host'];
	if(mb_detect_encoding($url_host) != "ASCII"){ //если сайт в кириллице переводим в punycode
			include_once("idna_convert.class.php");
			$IDN = new idna_convert(array('idn_version' => '2008'));
			$site=$IDN->encode($url_host);
		}

	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2623.87 Safari/537.36";
	$temp = curl_init();
	curl_setopt($temp, CURLOPT_URL,$site);
	curl_setopt($temp, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($temp, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($temp, CURLOPT_VERBOSE, false);
	curl_setopt($temp, CURLOPT_TIMEOUT, 10);
	curl_setopt($temp, CURLOPT_SSL_VERIFYPEER, false);
	// curl_setopt($temp, CURLOPT_SSLVERSION, 3);
	curl_setopt($temp, CURLOPT_FOLLOWLOCATION, false);
	curl_setopt($temp, CURLOPT_SSL_VERIFYHOST, 2);
	$page = curl_exec($temp);
	$result = curl_getinfo($temp, CURLINFO_HTTP_CODE);
	// var_dump($result);
	curl_close($temp);
	return $result;
}

function length($host){
	$headersArray = GetHeaders($host);
	// var_dump($headersArray);
	$Status = GetStatus($host);

	if ($Status !== 200) {
		echo 'Не могу получить изображение';
	} else {
			// var_dump($headersArray);
			if(!isset($headersArray)){
				return '';
			}
			foreach($headersArray as $h){
				if(strripos($h, 'Content-Length') !== false){
					$loc = 'Content-length: ';
					$LOC = 'CONTENT-LENGTH: ';
					$LoC = 'Content-Length: ';
					$ContentLength = trim(trim(trim($h,$loc),$LOC),$LoC);
					if ($ContentLength > 4194303) {
						return '<span style="color:red">'.$ContentLength.'</span>';
					} elseif (is_null($ContentLength)) {
						return '<span style="color:red">Не могу получить изображение</span>';
					} else {
				 		return '<span style="color:green">'.$ContentLength.'</span>';
					}

				};
			}
		}
	}

function location($host){
$headersArray = GetHeaders($host);
		if(!isset($headersArray)){
			return '';
		}
		foreach($headersArray as $h){
			if(stripos($h, 'Location') !== false){
			$loc = 'Location: ';
			$LOC = 'LOCATION: ';
			return trim(trim($h,$loc),$LOC);
			}
		}
	}


function GetHeaders($host){
		$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2623.87 Safari/537.36";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $host);
		curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		$result = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		$headers = substr($result,0,$info['header_size']-4);
		// var_dump($headers);
		return $newheader = preg_split('#\r\n#',$headers);
		// var_dump($newheader);
	}


function GetStatus($host){
		$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2623.87 Safari/537.36";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$host);
		curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, false);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// curl_setopt(ch$temp, CURLOPT_SSLVERSION, 3);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		$page = curl_exec($ch);
		$result = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		return $result;
		// var_dump($result);
	}

?>
