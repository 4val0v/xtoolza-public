<?
$site = trim($_GET['yml']);
if ($site == 'Введите адрес xml' || $site == null) {
    include($_SERVER['DOCUMENT_ROOT'].'/q/map_sait/feed/myowntags/empty.php');
    exit();
}

$tags = htmlentities(trim($_GET['tags']));
$getcharset = encode($site);
$original = grab($site);
$charset = $getcharset;

header("Content-Type: text/xml; charset=$charset");

// $regexp = preg_match_all('<url>.*</url>', $original, $match);

$original = preg_replace('~<url>(.*?)</url>~', '<url>$1$3'.$tags.'</url>' , $original);

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
