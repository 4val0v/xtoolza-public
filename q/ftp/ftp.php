<?php
error_reporting( E_ERROR ); //отображаем только значительные ошибки
ini_set('display_errors', 0); //не показываем ошибки
header('Content-Type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);?>
<!DOCTYPE HTML>
<html>
<head>
	<title>FTP check</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex, follow" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
</head>
<body id="linearBg1">
<div style="align:left;">
	<table>
		<tbody>
			<tr>
				<td>
					<div class="TmgWrae">
						<a href="http://xtoolza.info" rel="nofollow"><img class="image UE" src="http://xtoolza.info/q/images/logo.png" width="120px" border="0" width="120px"><img class="image Dowe" src="http://xtoolza.info/q/images/logo_new.png" width="120px" /></a>
					</div>
				</td>
				<td>
					<table>
						<tbody>
							<tr>
								<td><h1 class="jumbotron">FTP checker</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/ftp/ftp.png" width="80" alt="FTP checker"></td>
							</tr> 
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div> 
<? 
echo "<table border='1'><tr><td><b>HOST</b></td><td><b>status</b></td></tr>";
$lists = explode("\r\n",$_POST['text']);
function checkftp($lists) {
	foreach ($lists as $list){
		$access = explode(' ',$list);
		// echo '<pre>';
		// var_dump($access);
		// echo '</pre>';
		$host = $access[0];
		$login = $access[1];
		$pass = $access[2];
		echo ftpcheck($host,$login,$pass);
		$log .= $list . " "  . strip_tags(ftpcheck($host,$login,$pass)) . PHP_EOL;
	}
	echo "</table>";
	return $log;
}

$loger = checkftp($lists);
function mylog($data){
    $data = $data . PHP_EOL;
    file_put_contents('ftplogss.txt', $data, FILE_APPEND);
}
mylog($loger);
	
function userErrorHandler($errno, $errmsg, $filename, $linenum, $vars){
	echo '<td>'.$errmsg.'</td>';
}
	
function ftpcheck($host,$login,$pass){
	// $old_error_handler = set_error_handler("userErrorHandler"); // устанавливаем обработчик
	$open = ftp_connect($host,"21","10");
	// $error = error_get_last(); //без обработчика - включаем тут и ниже
	// $error = $error["message"]; 
	// set_error_handler(null); // сбрасываем обработчик	
	if ($open){
		$loggedin = ftp_login($open,$login,$pass);
		if ($loggedin) {
			return "<tr><td>".$host."</td><td>success</td></tr>";	
		} else return "<tr><td>".$host."</td><td>authorization failed</td></tr>";
		$close = ftp_close($open);
		ftp_close($open); //Закрыли поток 
	} else return "<tr><td>".$host."</td><td>server error"; 
	// $error = ltrim($error,"ftp_connect():"); //добавляем error_get_last
	// $error = ltrim($error,"php_network_getaddresses: ");
	// $error = ltrim($error,"info failed:");
	// echo " ". $error;
	echo "</td></tr>";	
}
?>
<br /><br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a><br />
<? include ('../../yandex_metrika.php'); ?>
<?
//отладка
$debug =0;
if ($debug === 1){
	error_reporting( E_ALL );
	ini_set('display_errors', 1);
	echo '<b>идёт отладка</b><br /><br /><br /><pre>';
	echo '</pre>';
} else {
	error_reporting( E_ERROR );
	ini_set('display_errors', 0);
}

?>