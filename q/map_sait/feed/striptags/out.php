<?
session_start();
ignore_user_abort(true);
set_time_limit(0);
ini_set('memory_limit', '-1');

define(debug, 1);
define(message, 0);
if (debug == 1) {
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  if (message == 1){
    echo '<pre>
    Идёт отладка!
    Проверка может работать некорректно!
  </pre>';
  }
}


$site = trim($_GET['yml']);
// var_dump($site); die();
if ($site == 'Введите адрес xml' || $site == null) {
    include($_SERVER['DOCUMENT_ROOT'].'/q/map_sait/feed/myowntags/empty.php');
    exit();
}

$getcharset = encode($site);
$original = grab($site);
$charset = $getcharset;

header("Content-Type: text/xml; charset=$charset");

// $regexp = preg_match_all('<url>.*</url>', $original, $match);
// $original = preg_replace('|^<description>(.*)</description>$|isU', strip_tags('$1'), $original);

$original = preg_replace_callback('|(<description>)(.+)(</description>)|iU', function($matches){
    return '<description>'.strip_tags($matches[0]).'</description>';
},$original);
$original = preg_replace_callback('|(<name>)(.+)(</name>)|iU', function($matches){
    return '<name>'.strip_tags($matches[0]).'</name>';
},$original);
$original = preg_replace_callback('|(<vendor>)(.+)(</vendor>)|iU', function($matches){
    return '<vendor>'.strip_tags($matches[0]).'</vendor>';
},$original);
$original = preg_replace_callback('|(<model>)(.+)(</model>)|iU', function($matches){
    return '<model>'.strip_tags($matches[0]).'</model>';
},$original);

echo $original;

function grab($site) {
    $site = trim($site);
    $ch = curl_init();
    $user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2272.118 Safari/537.36";
    curl_setopt($ch, CURLOPT_URL, $site);
    curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    $data = curl_exec($ch);
    curl_close($ch);
    if ($data)
        return $data;
    else
        return FALSE;
}

function getpage($adres){
    if (!preg_match('|^http:.*|i',$adres)){
        $adres = 'http://'.$adres;
    }
    $adres = punycode($adres);
    $user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2062.124 Safari/537.36";
    $temp = curl_init();
    curl_setopt($temp, CURLOPT_URL,$adres);
    curl_setopt($temp, CURLOPT_USERAGENT, $user_agent);
    curl_setopt($temp, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($temp, CURLOPT_VERBOSE, false);
    curl_setopt($temp, CURLOPT_TIMEOUT, 5);
    curl_setopt($temp, CURLOPT_SSL_VERIFYPEER, false);
    // curl_setopt($temp, CURLOPT_SSLVERSION, 3);
    curl_setopt($temp, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($temp, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($temp, CURLOPT_HEADER, 1);
    $page = curl_exec($temp);
    curl_close($temp);
    return $page;
}

function punycode($adres){
    $arraylistscheme = parse_url($adres);
    $url_host = $arraylistscheme['host'];
    if(mb_detect_encoding($url_host) != "ASCII"){ #canbe mistake
        include_once("../../idna_convert.class.php");
        $IDN = new idna_convert(array('idn_version' => '2008'));
        $adres=$IDN->encode($adres);
    }
    return $adres;
}

function encode($arraylist) {
    $arraylist = punycode($arraylist);
    $rz = getpage($arraylist);
    if (preg_match('~(charset=(.*?)\r\n)||(encoding=(.*?)\r\n)~i',$rz, $matched)){
        return $matched[1];
    }
    else return 'UTF-8';
}
?>
