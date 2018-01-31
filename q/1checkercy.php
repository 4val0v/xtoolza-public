<?php

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>PR Result</title>
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>
	
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
<body>

<?
header('Content-Type: text/html; charset=utf-8');

//данные из textarea через $_POST.
if ($_POST['textt'] != ''){
	echo "<h2>PR Checker Result:</h2> <br />";
	}
else die('Поле должно быть заполнено!');  

//вывод в таблицу	
echo "<table border=\"2\" bordercolor=\"black\"><tr><td><b>Site</b></td><td><b>CY</b></td><td><b>PR</b></td></tr>"; 
$plist = explode("\r\n",$_POST['textt']); 
foreach ($plist as $arraylist) {
	$narray = "http://".$arraylist;
	echo "<tr><td>".$narray."</td>"; 
	echo "<td>"." ". getcy($narray) . "</td><td>" . getpagerank($narray) . "</td></tr>";
	}  
echo "</table>"; 

$domain = $narray;

function getcy($narray)
{
  //считываем XML-файл с данными
  $xml = file_get_contents(
    'http://bar-navig.yandex.ru/u?ver=2&show=32&url='.$narray
  );

  //если XML файл прочитан, то возвращаем значение параметра value,
  //иначе возвращаем false - ошибка
  return $xml ? (int) substr(strstr($xml, 'value="'), 7) : false;
}

function StrToNum($Str, $Check, $Magic)
   {
   $Int32Unit = 4294967296;

   $length = strlen($Str);
   for ($i = 0; $i < $length; $i++) 
     {
     $Check *= $Magic;
     
     if ($Check >= $Int32Unit) 
       {
       $Check = ($Check - $Int32Unit * (int) ($Check / $Int32Unit));

       $Check = ($Check < -2147483648) ? ($Check + $Int32Unit) : $Check;
       }
     $Check += ord($Str{$i});
     }
   return $Check;
   }
   
function HashURL($String)
   {
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
   
function CheckHash($Hashnum)
   {
   $CheckByte = 0;
   $Flag = 0;

   $HashStr = sprintf('%u', $Hashnum) ;
   $length = strlen($HashStr);

   for ($i = $length - 1;  $i >= 0;  $i --) 
     {
     $Re = $HashStr{$i};
     if (1 === ($Flag % 2)) 
       {
       $Re += $Re;
       $Re = (int)($Re / 10) + ($Re % 10);
       }
     $CheckByte += $Re;
     $Flag ++;
     }

   $CheckByte %= 10;
   if (0 !== $CheckByte) 
     {
     $CheckByte = 10 - $CheckByte;
     if (1 === ($Flag % 2) ) 
       {
       if (1 === ($CheckByte % 2)) 
         {
         $CheckByte += 9;
         }
       $CheckByte >>= 1;
       }
     }
   return '7'.$CheckByte.$HashStr;
   }
   
function getpagerank($url) 
   {
   $fp = fsockopen("toolbarqueries.google.com", 80, $errno, $errstr, 30);
   if (!$fp) 
     {
     } 
   else 
     {
     $out = "GET /tbr?client=navclient-auto&ch=".CheckHash(HashURL($url))
     ."&features=Rank&q=info:".$url."&num=100&filter=0 HTTP/1.1\r\n";
     $out .= "Host: toolbarqueries.google.com\r\n";
     $out .= "User-Agent: Mozilla/4.0 (compatible; GoogleToolbar 2.0.114-big; Windows XP 5.1)\r\n";
     $out .= "Connection: Close\r\n\r\n";
     fwrite($fp, $out);
     while (!feof($fp)) 
       {
       $data = fgets($fp, 128);
       $pos = strpos($data, "Rank_");
       if($pos === false)
         {
             
         } 
       else
         {
         $pagerank = substr($data, $pos + 9);
         }
       }
     fclose($fp);
     }

   $pagerank = (strlen($pagerank) > 0) ? $pagerank : -1;
   $pagerank = intval($pagerank);
	if ($pagerank == -1)
		{
			$pagerank = '0';
		}
   return $pagerank;
   }

?>

<br />
<form class="btn">
<input type="button" border="0" value="Назад" onClick="history.back()">
</form>&nbsp;&nbsp;&nbsp;
<!--form class="btn"-->
<!--input type="button" border="0" value="Помощь" onclick="location.href='http://www.xtoolza.info/q/help.php'"-->
<!--/form-->
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter25643246 = new Ya.Metrika({id:25643246,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/25643246" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>