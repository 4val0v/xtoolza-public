<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="ru">
<head>
<title>whois</title>
</head>
<body>
<h1>whois</h1>
 <form method="post">
 <input type="text" name="ip2" size="35">
 <input type="submit" value="Введите IP-адрес" value="<?= htmlspecialchars($_REQUEST['ip2']); ?>">
 </form>
<?php

function whois($ip2){
 error_reporting(0);
 $url = 'whois.arin.net';
 function whois0($url,$ip2)
 {
  $sock = fsockopen($url, 43, $errno, $errstr);
  if (!$sock) exit("$errno($errstr)");
  else
  {
    fputs ($sock, $ip2."\r\n");
    $text = "";
    while (!feof($sock))
    {
      $text .= fgets ($sock, 128)."<br>";
    }
    fclose ($sock);
    $pattern = "|ReferralServer: whois://([^\n<:]+)|i";
    preg_match($pattern, $text, $out);
    if(!empty($out[1])) $rez = whois0($out[1], $ip2);
    else $rez = $text;
    $rez = eregi_replace( '(.*)<br>inetnum', 'inetnum',$rez);
    $rez = eregi_replace( '<br>% Information related(.*)', '<br>',$rez);
    return $rez;
  }
 }
 $param1 = 'country:(.*)';
 $param2 = '<br>(.*)';
 $str0 = whois0($url,$ip2);
 $str1 = eregi_replace( '(.*)country:', '',$str0);
 $str1 = eregi_replace( '<br>(.*)', '',$str1);
 $res5 = eregi_replace( ' ', '',$str1);
 $res5 = strtolower($res5);
 if(!($res5 ==''))
 $res = '<img src="flags/' .$res5 .'.gif"><br><br>' .$str0;
 return $res;
}

if(!empty($_POST['ip2'])) echo whois($_POST['ip2']);

?>
</body>
</html>
