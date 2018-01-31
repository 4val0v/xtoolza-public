<!DOCTYPE html>
<html>
<head>
<title>mirrors creator</title>
<meta name="robots" content="noindex,nofollow" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width" />
<link href="http://xtoolza.info/q/style.css" rel="stylesheet"/>
<script src="http://xtoolza.info/q/modernize.js"></script>
<script src="http://xtoolza.info/q/seotext.js"></script>
<link href="http://xtoolza.info/q/css.css" rel="stylesheet"/>
<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
</head>
<body>
<?

	// error_reporting( E_ALL ); //отображаем только значительные ошибки
	// ini_set('display_errors', 1); //не показываем ошибки
echo '<!--version 09072015-->';
if(function_exists('apache_get_version')){
			echo 'ServerSoftware: '. apache_get_version().'<br />';
		}

		if (preg_match('/Apache/i',$_SERVER['SERVER_SOFTWARE'])) {
			echo 'ServerSoftwareExt: '.'<span style="color:green">'.$_SERVER['SERVER_SOFTWARE'].'</span><br /><br />';
			} elseif (preg_match('/nginx/i',$_SERVER['SERVER_SOFTWARE'])) {
			echo 'ServerSoftwareExt: '. '<span style="color:#5900B3">'.$_SERVER['SERVER_SOFTWARE'].'&nbsp;(need ssh to redirect)</span><br /><br />';exit;
			} elseif (preg_match('/litespeed/i',$_SERVER['SERVER_SOFTWARE'])) {
			echo 'ServerSoftwareExt: '. '<span style="color:#5900B3">'.$_SERVER['SERVER_SOFTWARE'].'&nbsp;(need installed rewrite module to redirect)</span><br /><br />';exit;
			} else {
			echo 'ServerSoftwareExt: ', '<span style="color:red">'.$_SERVER['SERVER_SOFTWARE'].'</span>'; exit;
			}

?>


<p>Choose mirror:</p>
<form method="post">
<input type="submit" class="btn-danger btn" value="with WWW" border="0" name="www"/><br />
<input type="submit" class="btn-success btn" value=" no WWW " border="0"  name="nowww"/>
</form>
<?php
$file = file_get_contents($_SERVER['DOCUMENT_ROOT']."/.htaccess"); 
$htaccessfile = '.htaccess';
$htcontent = file_get_contents($htaccessfile);
$htbackfile = ".htaccess_mirrors_autobackup";
if($action = $_POST['nowww']){
	filesBK();
	$file = file_get_contents($_SERVER['DOCUMENT_ROOT']."/.htaccess"); 
	if (preg_match('|.*mirrors|ism',$file)){        //только, если в .htaccess найдено mirrors
	
		$row_number = 0; //Удалим 1 строку из .htaccess (mirrors)
		$file = file($_SERVER['DOCUMENT_ROOT']."/.htaccess"); // Считываем весь файл в массив 
		for($i = 0; $i < sizeof($file); $i++)
		if($i == $row_number) unset($file[$i]);
		$fp = fopen($_SERVER['DOCUMENT_ROOT']."/.htaccess", "w");
		fputs($fp, implode("", $file));
		fclose($fp);
		echo '<!--1-->';
		
		$row_number = 0; //Удалим 2 строку из .htaccess ещё раз - (RewriteEngine On) 
		$file = file($_SERVER['DOCUMENT_ROOT']."/.htaccess"); // Считываем весь файл в массив
		for($i = 0; $i < sizeof($file); $i++)
		if($i == $row_number) unset($file[$i]);
		$fp = fopen($_SERVER['DOCUMENT_ROOT']."/.htaccess", "w");
		fputs($fp, implode("", $file));
		fclose($fp);
		echo '<!--2-->';
		
		$row_number = 0; //Удалим 3 строку из .htaccess ещё раз - (RewriteCond %{HTTP_HOST} ^www\.(.*) [NC]) 
		$file = file($_SERVER['DOCUMENT_ROOT']."/.htaccess"); // Считываем весь файл в массив
		for($i = 0; $i < sizeof($file); $i++)
		if($i == $row_number) unset($file[$i]);
		$fp = fopen($_SERVER['DOCUMENT_ROOT']."/.htaccess", "w");
		fputs($fp, implode("", $file));
		fclose($fp);
		echo '<!--3-->';
		
		$row_number = 0; //Удалим 4 строку из .htaccess ещё раз - (RewriteRule ^(.*) http://www.%1/$1 [R=301,NE,L]) 
		$file = file($_SERVER['DOCUMENT_ROOT']."/.htaccess"); // Считываем весь файл в массив
		for($i = 0; $i < sizeof($file); $i++)
		if($i == $row_number) unset($file[$i]);
		$fp = fopen($_SERVER['DOCUMENT_ROOT']."/.htaccess", "w");
		fputs($fp, implode("", $file));
		fclose($fp);
		echo '<!--4-->';
	}
		
	$add_str="#mirrors"."\n"."RewriteEngine On" . "\n" . "RewriteCond %{HTTP_HOST} ^www\.(.*) [NC]" ."\n". "RewriteRule ^(.*)$ http://%1/$1 [R=301,L] " . "\r";
	file_put_contents($htaccessfile,$add_str."\n".file_get_contents($htaccessfile));
	echo '<b>Mirrors set to no www</b>';
}
if($action = $_POST['www']){
	filesBK();
	$file = file_get_contents($_SERVER['DOCUMENT_ROOT']."/.htaccess"); 
	if (preg_match('|.*mirrors|ism',$file)){        //только, если в .htaccess найдено mirrors
	
		$row_number = 0; //Удалим 1 строку из .htaccess (mirrors)
		$file = file($_SERVER['DOCUMENT_ROOT']."/.htaccess"); // Считываем весь файл в массив 
		for($i = 0; $i < sizeof($file); $i++)
		if($i == $row_number) unset($file[$i]);
		$fp = fopen($_SERVER['DOCUMENT_ROOT']."/.htaccess", "w");
		fputs($fp, implode("", $file));
		fclose($fp);
		echo '<!--1-->';
		
		$row_number = 0; //Удалим 2 строку из .htaccess ещё раз - (RewriteEngine On) 
		$file = file($_SERVER['DOCUMENT_ROOT']."/.htaccess"); // Считываем весь файл в массив
		for($i = 0; $i < sizeof($file); $i++)
		if($i == $row_number) unset($file[$i]);
		$fp = fopen($_SERVER['DOCUMENT_ROOT']."/.htaccess", "w");
		fputs($fp, implode("", $file));
		fclose($fp);
		echo '<!--2-->';
		
		$row_number = 0; //Удалим 3 строку из .htaccess ещё раз - (RewriteCond %{HTTP_HOST} ^www\.(.*) [NC]) 
		$file = file($_SERVER['DOCUMENT_ROOT']."/.htaccess"); // Считываем весь файл в массив
		for($i = 0; $i < sizeof($file); $i++)
		if($i == $row_number) unset($file[$i]);
		$fp = fopen($_SERVER['DOCUMENT_ROOT']."/.htaccess", "w");
		fputs($fp, implode("", $file));
		fclose($fp);
		echo '<!--3-->';
		
		$row_number = 0; //Удалим 4 строку из .htaccess ещё раз - (RewriteRule ^(.*) http://www.%1/$1 [R=301,NE,L]) 
		$file = file($_SERVER['DOCUMENT_ROOT']."/.htaccess"); // Считываем весь файл в массив
		for($i = 0; $i < sizeof($file); $i++)
		if($i == $row_number) unset($file[$i]);
		$fp = fopen($_SERVER['DOCUMENT_ROOT']."/.htaccess", "w");
		fputs($fp, implode("", $file));
		fclose($fp);
		echo '<!--4-->';
	}
	
	$add_str="#mirrors"."\n"."RewriteEngine On" . "\n" . "RewriteCond %{HTTP_HOST} ^(?!www\.)(.*) [NC]" ."\n". "RewriteRule ^(.*) http://www.%1/$1 [R=301,NE,L]" . "\r";
	file_put_contents($htaccessfile,$add_str."\n".file_get_contents($htaccessfile));
	echo '<b>Mirrors set to www</b>';
		

}
function filesBK() {
	echo '<b>BackUps:</b><br>';
	echo '<ul>';
	$htaccessfile = '.htaccess';
	$htcontent = file_get_contents($htaccessfile);
	$htbackfile = ".htaccess_mirrors_autobackup";

	if (!file_exists($htaccessfile)) {
		$htaccesswrite = fopen($htaccessfile, "w");
		fwrite($htaccesswrite, "#.htaccess file");
		fclose($htaccesswrite);
		echo "<li>.htaccess created</li>";
	} else {
		echo "<li>.htaccess already exist</li>";
	}
	
	if (file_exists('.htaccess')) {
		$htaccessfile = '.htaccess';
		$htcontent = file_get_contents($htaccessfile);
		$htbackfile = ".htaccess_mirrors_autobackup";
		if (file_put_contents($htbackfile, $htcontent)) {
			echo '<li>.htaccess backup created</li>';
			} else die ('<li style="color:red"><b>cant create .htaccess backup</b></li>');
		}
		else echo ('<li style="color:#993300">file .htaccess is not exist</li>');

	echo '</ul>';
}

function GetHeaders ($url){
	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36";
	$handler = curl_init();
	curl_setopt($handler, CURLOPT_URL, $url);
	curl_setopt($handler, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($handler, CURLOPT_VERBOSE, false);
	curl_setopt($handler, CURLOPT_NOBODY,true);
	curl_setopt($handler, CURLOPT_HEADER,true);
	$headers = curl_exec($handler);
	return $headers;
	var_dump($headers);
	curl_close($handler);
}


?>
<br />
<br />
<a class="btn-success btn" href='http://<?php echo $_SERVER['HTTP_HOST'];?>' target="_blank">Go to site</a>
<br />
<br />
<br />
<form method="post">
<input type="submit" class="btn-danger btn" value="Delete file from server" border="0" name="del"/><br />
</form>
<?
if($action = $_POST['del']){
	if(unlink($_SERVER['DOCUMENT_ROOT'].'/mirror.php')){
		echo '<div id="container"></div>';
		echo '<br><br><p style="font-size: 20px; color: green">File mirror.php deleted</p>';?>
		<body onLoad="tiktak();">
			<div>
				<?echo "<meta http-equiv='Refresh' content='10; URL=/'>";?>
			<script language="JavaScript" type="text/javascript">
						// значение начальной секунды
						var second=10;
						function tiktak()
						{
						 if(second<=9){second="0" + second;}
						 if(document.getElementById){timer.innerHTML=second;}
						 if(second==00){return false;}
						 second--;
						 setTimeout("tiktak()", 1000);
						}
			</script>
			You will be redirected to main page throught <span id="timer"></span> seconds.
			<br><span><a href="http://<?echo $_SERVER['HTTP_HOST'];?>">Redirect now</a>></span>
			</div>
		</body><?
		}else echo '<br><br><p style="font-size: 20px; color: red">Cant delete file. Do it manually</p>';
}
?>
</body>
<html>