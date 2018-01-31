<?
header('Content-Type: text/html; charset=utf-8');
set_time_limit(0);
require_once("/home/b/b10xwru/xtoolza.info/public_html/q/whois.php");
?>
<html>
<head>
<title>скрипт проверки занятости домена</title>
</head>
<body>
<form method="post">
Домен: <input type="text" name="domain"><br>
<input type="checkbox" name="TLD[]" value=".ru" id="l1"><label for="l1">.RU</label><br>
<input type="checkbox" name="TLD[]" value=".info" id="l2"><label for="l2">.INFO</label><br>
<input type="checkbox" name="TLD[]" value=".org" id="l3"><label for="l3">.ORG</label><br>
<input type="checkbox" name="TLD[]" value=".com" id="l4"><label for="l4">.COM</label><br>
<input type="submit" value="Проверить">
</form>
<hr>
<?
if(isset($_GET["domain"]) && strlen($_GET["domain"])>0)
{
 $target=$_GET["domain"];
 $whois=new whois();
 $whois->zonelookup($target);
 if($whois->ERROR==0)
 {
  if(is_array($whois->RAWINFO) && count($whois->RAWINFO)>7 && $whois->FOUND==1)
  {
   echo("<center><h3 style=\"margin-bottom: 8px; color:red;\">К сожалению, домен <b>".$target."</b> уже <b>занят</b>!</h3>Попробуйте подобрать другой домен</center>");
   echo("<p><b>".$target."</b><br>IP: ".$whois->IP."</p><pre>");
   foreach($whois->RAWINFO AS $str)
   {
    echo($str."\n<br>");
   }
   echo("</pre>");
   echo("<p>DNS INFO:</p><pre>");
   foreach($whois->DNSINFO AS $str)
   {
    echo($str."\n<br>");
   }
   echo("</pre>");
  }else
   {
    echo("<center><h4 style=\"margin-bottom:5px\">Домен <b>".$target." свободен</b> и Вы можете его зарегистрировать!</h4></center><center><a href=\"http://reg.domain4ik.net/\">Зарегистрировать домен <b>".$target."</b> прямо сейчас »</a><br><br>Поторопитесь, а то этот домен может занять кто-нибудь другой :)</center>");
   }
 }else
  {
   echo("<p>Requirest is fail</p>");
  }
}
?>