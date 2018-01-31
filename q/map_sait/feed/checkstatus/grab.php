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

	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36";
	$temp = curl_init();
	curl_setopt($temp, CURLOPT_URL,$site);
	curl_setopt($temp, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($temp, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($temp, CURLOPT_VERBOSE, false);
	curl_setopt($temp, CURLOPT_TIMEOUT, 10);
	curl_setopt($temp, CURLOPT_SSL_VERIFYPEER, false);
	// curl_setopt($temp, CURLOPT_SSLVERSION, 3);
	curl_setopt($temp, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($temp, CURLOPT_SSL_VERIFYHOST, 2);
	$page = curl_exec($temp);
	$result = curl_getinfo($temp, CURLINFO_HTTP_CODE);
	// var_dump($result);
	curl_close($temp);
	return $result;
}

function location($host){
	$headersArray = GetHeaders($host);
	if(!isset($headersArray)){
		return '';
	}
	foreach($headersArray as $h){
		$h = strtolower($h);
		if(stripos($h, 'location') !== false){
			return substr($h,9);
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
		$info = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
		$result = curl_exec($ch);
		// var_dump(curl_getinfo($ch,CURLINFO_EFFECTIVE_URL));
		// var_dump($info);
		echo ' '. curl_getinfo($ch,CURLINFO_EFFECTIVE_URL);
		curl_close($ch);

		$headers = substr($result,0,$info['header_size']-4);

}

function GetStatus($host){
		$ch = curl_init();
		$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2623.87 Safari/537.36";
		curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
		curl_setopt($ch, CURLOPT_URL, $host);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		$result = curl_exec($ch);
		$info = curl_getinfo($ch);
		// $info = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
		curl_close($ch);

		$headers = substr($result,0,$info['header_size']-4);
		return $newheader = preg_split('#\r\n#',$headers);
				// var_dump($newheader);
}
?>
