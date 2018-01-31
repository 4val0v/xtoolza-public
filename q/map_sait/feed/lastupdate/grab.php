<?php header('Content-Type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);

function grab($contents) {
//getpage and processing
  $a = getpage($contents);
  $a = str_replace("<![CDATA[","",$a);
  $a = str_replace("]]>","",$a);
  // var_dump($a); exit();
  $xml=simplexml_load_file($contents,'SimpleXMLElement',LIBXML_PARSEHUGE|LIBXML_COMPACT);
    if (!$xml) {
      echo "Ошибка загрузки XML ";
      // debug
      // foreach(libxml_get_errors() as $error) {
      // echo "\t", $error->message;
      // echo '<br />';
      // }
    }

  $feeddate = $xml->attributes()['date'];
  // $datetemp = new DateTime($feeddate);
  // var_dump($datetemp);
  // echo date_format($feeddate, 'Y-m-d');
  // die();
  $datetime1 = date_create($feeddate);
  $today = date("Y-m-d");
  $datetime2 = date_create($today);
  $interval = date_diff($datetime1, $datetime2);
      // var_dump($interval);
  $feedage = $interval->format('%a'); //use it for color segmetation old
  return $xml->attributes()['date'];
  var_dump($feedage);
}

function getpage($contents){
  if(mb_detect_encoding($contents) != "ASCII"){ //если сайт в кириллице переводим в punycode
    include_once("idna_convert.class.php");
    $IDN = new idna_convert(array('idn_version' => '2008'));
    $contents=$IDN->encode($contents);
  }
  // var_dump($contents);
  $ch = curl_init();
  $user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36";
  curl_setopt($ch, CURLOPT_URL,$contents);
  curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_VERBOSE, false);
  curl_setopt($ch, CURLOPT_TIMEOUT, 60);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_SSLVERSION, 3);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}

?>
