<?php
// admin password
$admin_password="admin"; // change this to your password
///////////////////////  don't edit under here
/// words variables
$how_many="How many answers ?";
$write_question="Write down the poll's <b>question</b> :";
$write_answers="Write down your poll's <b>answers</b> :";
$choose="Choose what you want to do";
$modify="Modify";
$create="Create";
$submit="Submit";
$save="Save";
$login="Login";
if(!isset($mode)){$mode="login";}
switch($mode){
case("login"):
echo"<table cellspacing=\"0\" cellpadding=\"5\" border=\"0\" width=\"100%\">";
echo"<tr>";
echo"<td align=\"center\">";
echo"<br><br><br><font face=\"Verdana,Arial\" size=\"2\" color=\"#000000\">$login</font>";
echo"</td>";
echo"</tr>";
echo"</table>";
echo"<table cellspacing=\"0\" cellpadding=\"5\" border=\"0\" width=\"100%\">";
echo"<tr>";

echo"<td width=\"30%\" height=\"100\"></td>";

echo"<td align=\"center\">";
echo"<form action=\"admin.php?mode=choose\" method=\"post\">";
echo"<input type=\"password\" name=\"password\" size=\"15\">";
echo"<input type=\"submit\" value=\" $login \">";
echo"</form>";
echo"</td>";

echo"<td width=\"30%\"></td>";

echo"</tr>";
echo"</table>";
break;

case("choose"):
if($password==$admin_password){}else{header("Location: admin.php?mode=login");exit;}
echo"<table cellspacing=\"0\" cellpadding=\"5\" border=\"0\" width=\"100%\">";
echo"<tr>";
echo"<td align=\"center\">";
echo"<br><br><br><font face=\"Verdana,Arial\" size=\"2\" color=\"#000000\">$choose</font>";
echo"</td>";
echo"</tr>";
echo"</table>";
echo"<table cellspacing=\"0\" cellpadding=\"5\" border=\"0\" width=\"100%\">";
echo"<tr>";

echo"<td width=\"30%\" height=\"100\"></td>";

echo"<td align=\"center\">";
echo"<form action=\"admin.php?mode=configure\" method=\"post\">";
echo"<input type=\"hidden\" name=\"password\" value=\"$password\">";
echo"<input type=\"submit\" value=\" $create \">";
echo"</form>";
echo"</td>";

echo"<td align=\"center\">";
echo"<form action=\"admin.php?mode=modify\" method=\"post\">";
echo"<input type=\"hidden\" name=\"password\" value=\"$password\">";
echo"<input type=\"submit\" value=\" $modify \">";
echo"</form>";
echo"</td>";

echo"<td width=\"30%\"></td>";

echo"</tr>";
echo"</table>";
break;

case("configure"):
if($password==$admin_password){}else{header("Location: admin.php?mode=login");exit;}
echo"<table cellspacing=\"0\" cellpadding=\"5\" border=\"0\" width=\"100%\">";
echo"<tr>";
echo"<td align=\"center\">";
echo"<br><br><br><font face=\"Verdana,Arial\" size=\"2\" color=\"#000000\">$how_many</font>";
echo"</td>";
echo"</tr>";
echo"</table>";
echo"<table cellspacing=\"0\" cellpadding=\"5\" border=\"0\" width=\"100%\">";
echo"<form action=\"admin.php?mode=create\" method=\"post\">";
echo"<input type=\"hidden\" name=\"password\" value=\"$password\">";
echo"<tr>";
echo"<td align=\"center\">";
echo"<input type=\"text\" size=\"10\" name=\"number\">";
echo"</td>";
echo"</tr>";
echo"<tr>";
echo"<td align=\"center\">";
echo"<input type=\"submit\" value=\" $submit \">";
echo"</td>";
echo"</form>";
echo"</tr>";
echo"</table>";
break;

case("create"):
if($password==$admin_password){}else{header("Location: admin.php?mode=login");exit;}
echo"<form action=\"admin.php?mode=create_confirm&number=$number\" method=\"post\">";
echo"<input type=\"hidden\" name=\"password\" value=\"$password\">";
echo"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">";
echo"<tr>";
echo"<td align=\"center\">";
echo"<font face=\"Verdana,Arial\" size=\"2\" color=\"#000000\">$write_question</font><br><input type=\"text\" size=\"70\" name=\"question\">";
echo"</td>";
echo"</tr>";
echo"</table>";

echo"<table cellspacing=\"0\" cellpadding=\"5\" border=\"0\" width=\"100%\">";
echo"<tr>";
echo"<td align=\"center\">";
echo"<font face=\"Verdana,Arial\" size=\"2\" color=\"#000000\">$write_answers</font>";
echo"</td>";
echo"</tr>";
echo"</table>";

echo"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">";
for($i=1;$i<=$number;$i++){
 echo"<tr>";
 echo"<td align=\"center\">";
 echo"<font face=\"Verdana,Arial\" size=\"2\" color=\"#000000\"><b>$i</b> :</font> <input type=\"text\" size=\"50\" name=\"selection[$i]\">";
 echo"</td>";
 echo"</tr>";
}
echo"<tr>";
 echo"<td align=\"center\">";
echo"<br><input type=\"submit\" value=\"-------- $submit --------\">";
echo"</td>";
 echo"</tr>";
echo"</table>";
echo"</form>";
break;

case("create_confirm"):
if($password==$admin_password){}else{header("Location: admin.php?mode=login");exit;}
$file_to_write=array();
$question=stripslashes($question);
$file_to_write[]="$question";
for($i=1;$i<=$number;$i++){
$answer=stripslashes($selection[$i]);
$file_to_write[]="$answer|0";
}
$file=implode("\n",$file_to_write);
$new_file = fopen ("poll.txt", "w");
fputs($new_file,$file);
fclose($new_file);
$ip_file = fopen ("ip.txt", "w");
fputs($ip_file,"");
fclose($ip_file);
header("Location: poll.php");
break;

case("modify"):
if($password==$admin_password){}else{header("Location: admin.php?mode=login");exit;}
$file_options=fopen("poll.txt","r");
$options=fread($file_options,filesize("poll.txt"));
fclose($file_options);
$options=explode("\n",$options);
$count=count($options);
$number=$count-1;
echo"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">";
echo"<tr>";
echo"<td align=\"center\">";
echo"<br><font face=\"Verdana,Arial\" size=\"2\" color=\"#000000\">$modify</font>";
echo"</td>";
echo"</tr>";
echo"</table>";

echo"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">";
echo"<form action=\"admin.php?mode=create_confirm&number=$number\" method=\"post\">";
echo"<input type=\"hidden\" name=\"password\" value=\"$password\">";
while (list($chiave,$valore)= each($options)){
 if($chiave=="0"){
 echo"<tr>";
 echo"<td align=\"center\">";
 echo"<input type=\"text\" size=\"50\" name=\"question\" value=\"$valore\">";
 echo"</td>";
 echo"</tr>";
 }
 else{
 $options_values=explode("|",$valore);
 $option=$options_values[0];
 echo"<tr>";
 echo"<td align=\"center\">";
 echo"<font face=\"Verdana,Arial\" size=\"2\" color=\"#000000\"><b>$chiave</b> :</font> <input type=\"text\" size=\"50\" name=\"selection[$chiave]\"  value=\"$option\">";
 echo"</td>";
 echo"</tr>";
 }
}
echo"<tr>";
echo"<td align=\"center\">";
echo"<input type=\"submit\" value=\" $save \">";
echo"</td>";
echo"</tr>";
echo"</form>";
echo"</table>";
break;
}
?>