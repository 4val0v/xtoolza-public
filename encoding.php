<?php
    // ���������, ������� ����� ���������
$path = "http://hellsing.su";

    // ���������� �����-������ � �������
$agent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru-RU; rv:1.7.12) Gecko/20050919 Firefox/1.0.7" ;
$header [] = "Accept: text/html;q=0.9, text/plain;q=0.8, image/png, */*;q=0.5";
$header [] = "Accept_charset: windows-1251, utf-8, utf-16;q=0.6, *;q=0.1";
$header [] = "Accept_encoding: identity";
$header [] = "Accept_language: ru-ru,ru;q=0.5";
$header [] = "Connection: close";
$header [] = "Cache-Control: no-store, no-cache, must-revalidate";
$header [] = "Keep_alive: 300";
$header [] = "Expires: Thu, 01 Jan 1970 00:00:01 GMT";

    // ������� ��������� ������ �� ��������
function return_data($path){
$page = "";
$arr = explode ("\r\n\r\n", $path);
$heder = $arr[0];
while ( list ($key, $val) = @each ($arr)){
if ($key=='0'){ continue; }
$page .= $val."\n";
}
return array ($heder,$page); 
}

    // ������� ����������� CURL
function ext_dll($path){
$bibl_ext = dirname ($_SERVER['SCRIPT_FILENAME'])."/extensions/php_".$path.".dll";
if (! @extension_loaded ($path) and is_file ($bibl_ext)){ @dl ("php_".$path.".dll");}
if (! @extension_loaded ($path)){ return false;} 
return true;
}
$Curl_return = ext_dll('curl');

    // �������, ������������ �����
function output_r ($path){
global $header,$agent;
$arr = @parse_url ($path);
$host = $arr['host'];
if (! empty ($arr['path'])) $page = $arr['path'];
if (! empty ($arr['query'])) $query = $arr['query'];
if ($query!=''){$page.='?'.$query;}
if ($page==''){$page='/';}
$fp = @fsockopen ($host, 80, &$errno, &$errstr, 30);
if (!$fp){ return ''; }
$request = "GET $page HTTP/1.0\r\n";
$request .= "Host: $host\r\n";
while ( list ($key, $val) = @each ($header)){ $request .= $val."\r\n";}
$request .= "Referer: http://www.".$host."/\r\n";
$request .= "User-Agent: ".$agent."\r\n";
$request .= "\r\n";
fwrite ($fp,$request);
while ($line = fgets ($fp, 1024)){ $out .= $line; } 
return return_data($out);
}

    // �������, ������������ CURL
function CurlPage ( $path ) {
global $agent,$header;
$arr = @parse_url ($path);
$ch = @curl_init ( $path );
@curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , 1 );
@curl_setopt ( $ch , CURLOPT_VERBOSE , 1 ); 
@curl_setopt ( $ch , CURLOPT_HEADER , 1 );
@curl_setopt ( $ch , CURLOPT_USERAGENT , $agent );
@curl_setopt ( $ch , CURLOPT_REFERER , "http://www.".$arr['host']."/" );
@curl_setopt ( $ch , CURLOPT_HTTPHEADER , $header );
@curl_setopt ( $ch , CURLOPT_FOLLOWLOCATION , 1 );
@curl_setopt ( $ch , CURLOPT_SSL_VERIFYPEER, 0 );
@curl_setopt ( $ch , CURLOPT_SSL_VERIFYHOST, 0 );
$tmp = @curl_exec ( $ch );
@curl_close ( $ch ); 
if ($tmp==''){ $tmp = output_r ($path); }
return return_data($tmp);
}

    // �������� ��� �������
if ($Curl_return=='true'){ $array = CurlPage ( $path ); }
else { $array = output_r ( $path ); }

    // $array[0] - ��� ����� ��������
$heder = $array[0];
    // $array[1] - ��� ���� ��������
$page = $array[1];

    // ����� ��������� �� ������
if ( preg_match ("~charset=([-\w\d]+)~i",$heder,$arrr)){ $charset_heder = trim ($arrr[1]); }
    // ����� ��������� �� ��������
if ( preg_match ("~<meta[ \r\n\t]{1}[?>]*charset[?=]*=".
"([? \"'>\r\n\t#]+)[ '\"\n\r\t]*[?>]*>~is", $page, $arrr)){ $charset_page = trim ($arrr[1]); }

    // ���� ��� ��������� � ��������, ��������� � �� ������
if ($charset_page == ''){$charset = $charset_heder;}
else {$charset = $charset_page;}

    // ������� �������� �� utf8 � win
function utf8_win($s) {return strtr ($s, array ("\xD0\xB0"=>"�", "\xD0\x90"=>"�", "\xD0\xB1"=>"�", "\xD0\x91"=>"�", "\xD0\xB2"=>"�", "\xD0\x92"=>"�", "\xD0\xB3"=>"�", "\xD0\x93"=>"�", "\xD0\xB4"=>"�", "\xD0\x94"=>"�", "\xD0\xB5"=>"�", "\xD0\x95"=>"�", "\xD1\x91"=>"�", "\xD0\x81"=>"�", "\xD0\xB6"=>"�", "\xD0\x96"=>"�", "\xD0\xB7"=>"�", "\xD0\x97"=>"�", "\xD0\xB8"=>"�", "\xD0\x98"=>"�", "\xD0\xB9"=>"�", "\xD0\x99"=>"�", "\xD0\xBA"=>"�", "\xD0\x9A"=>"�", "\xD0\xBB"=>"�", "\xD0\x9B"=>"�", "\xD0\xBC"=>"�", "\xD0\x9C"=>"�", "\xD0\xBD"=>"�", "\xD0\x9D"=>"�", "\xD0\xBE"=>"�", "\xD0\x9E"=>"�", "\xD0\xBF"=>"�", "\xD0\x9F"=>"�", "\xD1\x80"=>"�", "\xD0\xA0"=>"�", "\xD1\x81"=>"�", "\xD0\xA1"=>"�", "\xD1\x82"=>"�", "\xD0\xA2"=>"�", "\xD1\x83"=>"�", "\xD0\xA3"=>"�", "\xD1\x84"=>"�", "\xD0\xA4"=>"�", "\xD1\x85"=>"�", "\xD0\xA5"=>"�", "\xD1\x86"=>"�", "\xD0\xA6"=>"�", "\xD1\x87"=>"�", "\xD0\xA7"=>"�", "\xD1\x88"=>"�", "\xD0\xA8"=>"�", "\xD1\x89"=>"�", "\xD0\xA9"=>"�", "\xD1\x8A"=>"�", "\xD0\xAA"=>"�", "\xD1\x8B"=>"�", "\xD0\xAB"=>"�", "\xD1\x8C"=>"�", "\xD0\xAC"=>"�", "\xD1\x8D"=>"�", "\xD0\xAD"=>"�", "\xD1\x8E"=>"�", "\xD0\xAE"=>"�", "\xD1\x8F"=>"�", "\xD0\xAF"=>"�"));}
    // ������� �������� �� ibm855 � win
function ibm855_win($s){return strtr ($s, array ("\xA1"=>"�", "\xA0"=>"�", "\xA3"=>"�", "\xA2"=>"�", "\xEC"=>"�", "\xEB"=>"�", "\xAd"=>"�", "\xAC"=>"�", "\xA7"=>"�", "\xA6"=>"�", "\xA9"=>"�", "\xa8"=>"�", "\x85"=>"�", "\x84"=>"�", "\xEA"=>"�", "\xE9"=>"�", "\xF4"=>"�", "\xF3"=>"�", "\xb8"=>"�", "\xB7"=>"�", "\xBE"=>"�", "\xBD"=>"�", "\xC7"=>"�", "\xC6"=>"�", "\xD1"=>"�", "\xD0"=>"�", "\xD3"=>"�", "\xD2"=>"�", "\xD5"=>"�", "\xD4"=>"�", "\xD7"=>"�", "\xD6"=>"�", "\xDD"=>"�", "\xD8"=>"�", "\xE2"=>"�", "\xE1"=>"�", "\xE4"=>"�", "\xE3"=>"�", "\xE6"=>"�", "\xE5"=>"�", "\xE8"=>"�", "\xE7"=>"�", "\xAA"=>"�", "\xAB"=>"�", "\xB6"=>"�", "\xB5"=>"�", "\xA5"=>"�", "\xA4"=>"�", "\xFC"=>"�", "\xFB"=>"�", "\xFA"=>"�", "\xF9"=>"�", "\xF6"=>"�", "\xF5"=>"�", "\x9f"=>"�", "\x9E"=>"�", "\xF2"=>"�", "\xF1"=>"�", "\xEE"=>"�", "\xED"=>"�", "\xF8"=>"�", "\xF7"=>"�", "\x9d"=>"�", "\x9C"=>"�", "\xE0"=>"�", "\xDE"=>"�"));}

    // ������� �������� �������� � ��������� windows-1251
function replace_page ($charset, $path){
if ( preg_match ("~windows-1251~i", $charset)){return $path;}
elseif ( preg_match ("~(koi8|iso-ir-111)~i", $charset)){return convert_cyr_string($path,'k','w');}
elseif ( preg_match ("~iso-8859-5~i", $charset)) {return convert_cyr_string($path,'i','w');}
elseif ( preg_match ("~ibm866~i", $charset)) {return convert_cyr_string($path,'a','w');}
elseif ( preg_match ("~x-mac-(cyrillic|ukrainian)~i", $charset)){return convert_cyr_string($path,'m','w');}
elseif ( preg_match ("~ibm855~i", $charset)) {return ibm855_win($path);}
elseif ( preg_match ("~utf-8~i", $charset)) {return utf8_win($path);}
return false;
}

    // �������� �������� � ��������� windows-1251
$page = replace_page ($charset, $page);

    // ���� ������ ���� ��������� ����� ������ <body></body>
if ( preg_match ("~<body[?>]*>(.+)</body~is", $page, $array)){ 
    // �������� ���� ��������
print "<html><head>
<base href=\"".$path."\">
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\">
<title>��������� ��������</title>
</head>
<body>
";

    // �������� ��������� ��������� � ���������������� ���� HTML ���������
print $charset."<br>\n".$array[1];

    // �������� ��� ��������
print "</body></html>";
}
?>