<!DOCTYPE html>
<html>
<?php header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
?>
<head>
	<title>Инструмент сетевых запросов</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
</head>
<?php
if(phpversion() >= "4.2.0"){
	extract($_POST);
	extract($_GET);
	extract($_SERVER);
	extract($_ENV);
}
?>
<body id="linearBg1">
<div style="text-align:center;">
<div style="align:left;">
	<table>
		<tbody>
			<tr>
				<td>
					<a href="http://xtoolza.info" rel="nofollow"><img src="http://xtoolza.info/q/images/logo.png" width="120px"></a>
				</td>
				<td>
					<table>
						<tbody>
							<tr>
								<td><h1 class="jumbotron">Инструмент сетевых запросов</h1></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<center>
<form method="post">
<table width="60%" border="0" cellspacing="0" cellpadding="1">
	<tr bgcolor="#0000B3">
		<td width="50%" bgcolor="#0000B3"><font size="2" color="#FFFFFF"><b>Host Information</b></font></td>
		<td bgcolor="#0000B3"><font size="2" color="#FFFFFF"><b>Host Connectivity</b></font></td>
	</tr>
	<tr valign="top" bgcolor="#FFFFBF">
		<td>
		<p><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
			<input type="radio" name="queryType" value="lookup"> Resolve/Reverse Lookup<br>
			<input type="radio" name="queryType" value="dig"> Get DNS Records<br>
			<input type="radio" name="queryType" value="wwwhois"> Whois (Web)<br>
			<input type="radio" name="queryType" value="arin"> Whois (IP owner)</font></p>
		</td>
		<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
			<input type="radio" name="queryType" value="checkp"> Check port:
			<input type="text" name="portNum" size="5" maxlength="5" value="80">
			<br>
			<input type="radio" name="queryType" value="p"> Ping host<br>
			<input type="radio" name="queryType" value="tr"> Traceroute to host<br>
			<input type="radio" name="queryType" value="all" checked> Всё</font>
		</td>
	</tr>
</table>
<table width="60%" border="0" cellspacing="0" cellpadding="1">
	<tr bgcolor="#0000B3">
		<td colspan="2">
			<div style="text-align:center;">
				<input type="text" name="target" value="Укажите домен или IP-адрес" onFocus="if(this.defaultValue==this.value)this.value=''">
				<input type="submit" name="Submit" value="Показать">
			</div>
		</td>
	</tr>
</table>
</form>
</center>
</div>
<input style="color: #fff; text-shadow: 0 -1px 0 rgba(0,0,0,.25); background-color: #5bb75b; background-image: linear-gradient(to bottom,#62c462,#51a351); background-repeat: repeat-x; border-color: rgba(0,0,0,.1)" type="button" border="0" value="Назад" onClick="history.back()">
<a href="http://xtoolza.info" style="color: #fff; text-shadow: 0 -1px 0 rgba(0,0,0,.25); background-color: #5bb75b; background-image: linear-gradient(to bottom,#62c462,#51a351); background-repeat: repeat-x; border-color: rgba(0,0,0,.1)">На главную</a>
<?
#Global kludge for new gethostbyaddr() behavior in PHP 4.1x
$ntarget = "";
function mmessage($msg){
	echo "<font face=\"verdana,arial\" size=2>$msg</font>";
}
function lookup($target){
	global $ntarget;
	$msg = $target." resolved to ";
	if( preg_match("/[a-zA-Z]/", $target) )  $ntarget = gethostbyname($target);
	else                              $ntarget = gethostbyaddr($target);
	$msg .= $ntarget;
	mmessage($msg);
}
function dig($target){
	global $ntarget;
	mmessage("<p><b>DNS Query Results:</b><blockquote>");
	#$target = gethostbyaddr($target);
	#if (! preg_match("/[a-zA-Z]/", ($target = gethostbyaddr($target))) )
	if( (!preg_match("/[a-zA-Z]/", $target) && (!preg_match("/[a-zA-Z]/", $ntarget))))
		$msg .= "Can't do a DNS query without a hostname.";
	else{
		if(!preg_match("/[a-zA-Z]/", $target)) $target = $ntarget;
		if (! $msg .= trim(nl2br(`dig any '$target'`))) #bugfix
		$msg .= "The <i>dig</i> command is not working on your system.";
	}
	#TODO: Clean up output, remove ;;'s and DiG headers
	$msg .= "</blockquote></p>";
	mmessage($msg);
}
function wwwhois($target){
	global $ntarget;
	$server = "whois.crsnic.net";
	mmessage("<p><b>WWWhois Results:</b><blockquote>");
	#Определяю WHOIS server
	if((preg_match("\.com\$|\.net\$|\.edu\$", $target)) || (preg_match("\.com\$|\.net\$|\.edu\$", $ntarget)))
		$server = "whois.crsnic.net";
	else if((preg_match("\.info\$", $target)) || (preg_match("\.info\$", $ntarget)))
		$server = "whois.afilias.net";
	else if((preg_match("\.org\$", $target)) || (preg_match("\.org\$", $ntarget)))
		$server = "whois.corenic.net";
	else if((preg_match("\.name\$", $target)) || (preg_match("\.name\$", $ntarget)))
		$server = "whois.nic.name";
	else if((preg_match("\.biz\$", $target)) || (preg_match("\.biz\$", $ntarget)))
		$server = "whois.nic.biz";
	else if((preg_match("\.us\$", $target)) || (preg_match("\.us\$", $ntarget)))
		$server = "whois.nic.us";
	else if((preg_match("\.cc\$", $target)) || (preg_match("\.cc\$", $ntarget)))
		$server = "whois.enicregistrar.com";
	else if((preg_match("\.ws\$", $target)) || (preg_match("\.ws\$", $ntarget)))
		$server = "whois.nic.ws";
	else if((preg_match("\.ru\$", $target)) || (preg_match("\.ru\$", $ntarget)))
		$server = "whois.ripn.ru";
	else{
		$msg .= "поддержка только следующих доменных зон: .ru .com, .net, .org, .edu, .info, .name, .us, .cc, .ws,  .biz.</blockquote>";
		mmessage($msg);
		return;
	}
	mmessage("Connecting to $server...<br><br>");
	if (! $sock = @fsockopen($server, 43, $num, $error, 10)){
		unset($sock);
		$msg .= "Timed-out connecting to $server (port 43)";
	}
	else{
		fputs($sock, "$target\n");
		while (!feof($sock))
		$buffer .= fgets($sock, 10240);
	}
	@fclose($sock);
	if(! preg_match("Whois Server:", $buffer)){
		if(preg_match("no match", $buffer))
			mmessage("NOT FOUND: No match for $target<br>");
		else
			mmessage("Ambiguous query, multiple matches for $target:<br>");
		}
	else{
		$buffer = explode("\n", $buffer);
		for ($i=0; $i<sizeof($buffer); $i++){
		if (preg_match("Whois Server:", $buffer[$i]))
			$buffer = $buffer[$i];
		}
		$nextServer = substr($buffer, 17, (strlen($buffer)-17));
		$nextServer = str_replace("1:Whois Server:", "", trim(rtrim($nextServer)));
		$buffer = "";
		mmessage("Deferred to specific whois server: $nextServer...<br><br>");
		if(! $sock = @fsockopen($nextServer, 43, $num, $error, 10)){
			unset($sock);
		   $msg .= "Timed-out connecting to $nextServer (port 43)";
		}
		else{
			fputs($sock, "$target\n");
			while (!feof($sock))
			$buffer .= fgets($sock, 10240);
			@fclose($sock);
		}
	}
	$msg .= nl2br($buffer);
	$msg .= "</blockquote></p>";
	mmessage($msg);
}
function arin($target){
	$server = "whois.arin.net";
	mmessage("<p><b>IP Whois Results:</b><blockquote>");
	if (!$target = gethostbyname($target))
	$msg .= "Can't IP Whois without an IP address.";
	else{
		mmessage("Connecting to $server...<br><br>");
		if (! $sock = @fsockopen($server, 43, $num, $error, 20)){
			unset($sock);
			$msg .= "Timed-out connecting to $server (port 43)";
		}
		else{
			fputs($sock, "$target\n");
			while (!feof($sock))
				$buffer .= fgets($sock, 10240);
			@fclose($sock);
		}
		if (preg_match("RIPE.NET", $buffer))
			$nextServer = "whois.ripe.net";
		else if (preg_match("whois.apnic.net", $buffer))
			$nextServer = "whois.apnic.net";
		else if (preg_match("nic.ad.jp", $buffer)){
			$nextServer = "whois.nic.ad.jp";
			#/e suppresses Japanese character output from JPNIC
			$extra = "/e";
			}
		else if (preg_match("whois.registro.br", $buffer))
			$nextServer = "whois.registro.br";
		if($nextServer){
		 $buffer = "";
		 mmessage("Deferred to specific whois server: $nextServer...
	<div id='r7'>
	</div>
	<br><br>");
		 if(! $sock = @fsockopen($nextServer, 43, $num, $error, 10)){
		   unset($sock);
		   $msg .= "Timed-out connecting to $nextServer (port 43)";
		   }
		 else{
		   fputs($sock, "$target$extra\n");
		   while (!feof($sock))
			 $buffer .= fgets($sock, 10240);
		   @fclose($sock);
		   }
		 }
	  $buffer = str_replace(" ", "&nbsp;", $buffer);
	  $msg .= nl2br($buffer);
	  }
	$msg .= "</blockquote></p>";
	mmessage($msg);
}
function checkp($target,$portNum){
mmessage("<p><b>Checking Port $portNum</b>...<blockquote>");
if (! $sock = @fsockopen($target, $portNum, $num, $error, 5))
  $msg .= "Port $portNum does not appear to be open.";
else{
  $msg .= "Port $portNum is open and accepting connections.";
  @fclose($sock);
  }
$msg .= "</blockquote></p>";
mmessage($msg);
}
function p($target){
mmessage("<p><b>Ping Results:</b><blockquote>");
if (! $msg .= trim(nl2br(`ping -c5 '$target'`))) #bugfix
  $msg .= "Ping не удался. Возможно конечный хост недоступен";
$msg .= "</blockquote></p>";
mmessage($msg);
}
function tr($target){
mmessage("<p><b>Результаты Трасировки:</b><blockquote>");
if (! $msg .= trim(nl2br(`/usr/sbin/traceroute '$target'`))) #bugfix
  $msg .= "Трасировка не удалась. Возможно конечный хост недоступен.";
$msg .= "</blockquote></p>";
mmessage($msg);
}
#If the form has been posted, process the query, otherwise there's
#nothing to do yet
if(!$queryType) exit;
#Make sure the target appears valid
if( (!$target) || (!preg_match("/^[\w\d\.\-]+\.[\w\d]{1,4}$/i",$target)) ){ #bugfix
  mmessage("Ошибка: Неверно указан домен или IP.");
  exit;
  }
#Figure out which tasks to perform, and do them
if( ($queryType=="all") || ($queryType=="lookup") )    lookup($target);
if( ($queryType=="all") || ($queryType=="dig") )    dig($target);
if( ($queryType=="all") || ($queryType=="wwwhois") )    wwwhois($target);
if( ($queryType=="all") || ($queryType=="arin") )    arin($target);
if( ($queryType=="all") || ($queryType=="checkp") )    checkp($target,$portNum);
if( ($queryType=="all") || ($queryType=="p") )        p($target);
if( ($queryType=="all") || ($queryType=="tr") )        tr($target);
?>
<input style="color: #fff; text-shadow: 0 -1px 0 rgba(0,0,0,.25); background-color: #5bb75b; background-image: linear-gradient(to bottom,#62c462,#51a351); background-repeat: repeat-x; border-color: rgba(0,0,0,.1)" type="button" border="0" value="Назад" onClick="history.back()">&nbsp;&nbsp;&nbsp;
</body>
</html>
