<?
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
// $login = isset($_GET['login']) ? $_GET['login'] : null;
// $password = isset($_GET['password']) ? $_GET['password'] : null;
// if($login == 'uptimus' && $password == 'Fatlhjy15'){
// 	$browser = get_browser(null, true); 
// 	$log .= date("j-m-y G:i:s").'	'.$_SERVER["REMOTE_ADDR"].'	'.$_SERVER["HTTP_USER_AGENT"].'	'.$browser['parent'].'	'.$browser['platform'].PHP_EOL;
// 	// file_put_contents('access_log.txt', $log, FILE_APPEND);
// }else{
// 	header("HTTP/1.1 403 Forbidden");
// 	exit ('Bad login or password');
// }
//отладка
$debug =0;
if ($debug === 1){
	error_reporting( E_ALL );
	ini_set('display_errors', 1);
	echo '<pre>идёт отладка: по всем вопросам к Гене Шершову<br />';
	echo 'http://vktarget.ru/developers/#dev?new_task';
	echo '</pre>';
} else {
	error_reporting( E_ERROR );
	ini_set('display_errors', 0);
}

$name = $_POST['name'];
$text = $_POST['textt'];
$tw = $_POST['tw'];
$twtext = $_POST['twtext'];
$fb = $_POST['fb'];
$fbtext = $_POST['fbtext'];

$arraynew_taskvk = array(
	'action'=>'new_task',
	'key' => 'Y8oKo67Ck',
	'limiter'=>10,
	'min_fr'=>100,
	'status'=>1,
	'task_name'=>$name,
	'text'=>$text,
	'type'=>3,
	'uid' => '1592602'
);
$arraynew_tasktw = array(
	'action'=>'new_task',
	'key' => 'Y8oKo67Ck',
	'limiter'=>10,	
	'min_fr'=>100,
	'status'=>1,
	'task_name'=>$tw,
	'text'=>$twtext,
	'type'=>11,
	'uid' => '1592602'
);
$arraynew_taskfb = array(
	'action'=>'new_task',
	'key' => 'Y8oKo67Ck',
	'limiter'=>10,	
	'min_fr'=>100,
	'status'=>1,
	'task_name'=>$fb,
	'text'=>$fbtext,
	'type'=>21,
	'uid' => '1592602'
);

$key = md5(http_build_query($arraynew_taskvk));
$arraynew_taskvk['key']=$key;
$vkrequest=http_build_query($arraynew_taskvk);
$key2 = md5(http_build_query($arraynew_tasktw));
$arraynew_tasktw['key']=$key2;
$twrequest=http_build_query($arraynew_tasktw);
$key3 = md5(http_build_query($arraynew_taskfb));
$arraynew_taskfb['key']=$key3;
$fbrequest=http_build_query($arraynew_taskfb);

if($_SERVER['REQUEST_METHOD'] == "POST"){
	if (!empty($name)&&!empty($text)){
		$logs .= date("j-m-y G:i:s").'	'.'VK'.'	'.$name.'	'.$text.'	'.$browser['parent'].$_SERVER["REMOTE_ADDR"].'	'.$browser['platform'].PHP_EOL;
		// file_put_contents('create_log.txt', $logs, FILE_APPEND);
		header("Location: http://vktarget.ru/api/all.php?".$vkrequest);
		exit();
		}
		if (!empty($tw)&&!empty($twtext)){
		$logs .= date("j-m-y G:i:s").'	'.'twitter'.'	'.$tw.'	'.$twtext.'	'.$browser['parent'].$_SERVER["REMOTE_ADDR"].'	'.$browser['platform'].PHP_EOL;
		// file_put_contents('create_log.txt', $logs, FILE_APPEND);
		header("Location: http://vktarget.ru/api/all.php?".$twrequest);
		exit();
		}
		if (!empty($fb)&&!empty($fbtext)){
		$logs .= date("j-m-y G:i:s").'	'.'facebook'.'	'.$fb.'	'.$fbtext.'	'.$browser['parent'].$_SERVER["REMOTE_ADDR"].'	'.$browser['platform'].PHP_EOL;
		// file_put_contents('create_log.txt', $logs, FILE_APPEND);
		header("Location: http://vktarget.ru/api/all.php?".$fbrequest);
		exit();
		}	
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Выполнить vktarget</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex, nofollow" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/q/social/count.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
	<script type="text/javascript">
		function toggle_show(id) {
			document.getElementById(id).style.display = document.getElementById(id).style.display == 'none' ? 'block' : 'none';
		}
	</script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script src="http://xtoolza.info/q/social/count.js"></script>
</head>
<body id="linearBg1">
<div id="loader" style="position: fixed; background-color: white; width: 100%; height: 100%; top: 0px; left: 0px; opacity: 0.7; display: none">
<img src="/Content/images/loader.gif" alt="Загрузка..." style="position: fixed; width: 128px; height: 128px; left:50%; top:50%; margin: -64px 0 0 -64px" />
</div>
<table style="width: 100%;">
	<tr>
		<td><img src="http://vktarget.ru/img/logo.png" width="90" alt="Выполнить vktarget"></td>
		<td align="left"><h1>Выполнить ссылки из соц. сетей</h1></td>
		<td align="right">
		<?
		$array=array(
			'action' => 'get_tasks', 
			'uid' => '1592602', 
			'key' => 'Y8oKo67Ck' 
		);
		ksort($array);
		$array['key']=md5(http_build_query($array));
		// var_dump($array['key']);
		$result_url='http://vktarget.ru/api/all.php?'.http_build_query($array);
		$response=file_get_contents($result_url);
		$result=json_decode($response,true);
		$balance = $result[0]['balance']; 
		echo "<h3>Баланс: ".$balance.' руб.</h3>';?>
		<?php header('Content-Type: text/html; charset=utf-8');?>
		</td>
		</tr>
</table>

<br />
<a class="btn-info btn" href="http://xtoolza.info/q/social/info.php" title="откроется в этой же вкладке">Статусы заказов</a>
<input type="submit" value="Требования" class="btn-warning btn" id="rollover" onClick="toggle_show('rules')" title="откроется ниже"/><br /><br />
<div style='display:none' id="rules">
	<ul>
		<li>Количество знаков для твиттер должно быть не менее 70 и не более 100</li>
		<li>Количество знаков для вконтакте должно быть не менее 100</li>
		<li>Обязательно наличие ссылки на рекламируемый сайт в абсолютном виде</li>
		<li>Название рекламной кампании должно быть в формате site.ru(12345), где 12345 - номер заказа</li>
		<li>Прочие требования описанные в инструкции на диске L</li>
		<li>При появлении любых ошибок сообщить Шершову (можно на <a href="mailto:gennadiy.shershov@ingate.ru">почту</a> с тектом/описанием ошибки, можно <a href="http://octopus-youtrack.ru/youtrack/rest/agile/UP_HELP-4/sprint/Unscheduled" target="_blank">багом в youtrack</a>) и <a href="http://vktarget.ru/creation/" target="_blank">выполнить вручную в vktarget.ru</a></li>
	</ul>
</div>
<table>
	<tr>
		<td>
		<p>Выполнить <b>VK</b></p><br />
		<form action="" method="post">
			<input type="text" name="name" value="Введи название кампании" onclick='if(this.value=="Введи название кампании") this.value=""' onBlur='if(this.value=="") this.value="Введи название кампании"'><br>
			<textarea  name="textt" id="textarea" rows="20" cols="400"
			  onclick='if(this.value=="напиши текст поста") this.value=""'  
			  onblur='if(this.value=="") this.value="напиши текст поста"' 
			>напиши текст поста</textarea><br />

			<input type="submit" value="отправить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";'/>&nbsp;&nbsp;
		</form>
		<p>Верным ответом должно быть что-то типо: {"id":845167,"response":1} - главное статус <b>1</b></p>
		</td>
		<td>
		<br>
		<p style="float:left;">Выполнить <b>Twitter</b></p>
		<div id="count">100</div>
			<div id="barbox">
				<div id="bar"></div>
			</div>
		<br /><br />
		<form action="" method="post">

			<input type="text" name="tw" value="Введи название кампании" onclick='if(this.value=="Введи название кампании") this.value=""' onBlur='if(this.value=="") this.value="Введи название кампании"'><br>
			<textarea name="twtext" id="areatw" rows="20" cols="400"
			  onclick='if(this.value=="напиши текст поста") this.value=""'  
			  onblur='if(this.value=="") this.value="напиши текст поста"' 
			>напиши текст поста</textarea><br />

			<input type="submit" value="отправить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";'/>&nbsp;&nbsp;
		</form>

		<p>Верным ответом должно быть что-то типо: {"id":845168,"response":1,"text":"\u0412\u0430\u0448\u0435 \u0437\u0430\u0434\......  - главное статус <b>1</b></p>
		</td>
		</tr>
		<tr>
		<td>
		<p style="float:left;">Выполнить <b>Facebook</b></p>
		<br /><br />
		<form action="" method="post">

			<input type="text" name="fb" value="Введи название кампании" onclick='if(this.value=="Введи название кампании") this.value=""' onBlur='if(this.value=="") this.value="Введи название кампании"'><br>
			<textarea name="fbtext" id="areafb" rows="20" cols="400"
			  onclick='if(this.value=="напиши текст поста") this.value=""'  
			  onblur='if(this.value=="") this.value="напиши текст поста"' 
			>напиши текст поста</textarea><br />

			<input type="submit" value="отправить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";'/>&nbsp;&nbsp;
		</form>

		<p>Верным ответом должно быть что-то типо: {"id":1089441,"response":1}  - главное статус <b>1</b></p>
		</td>
		</tr>
</table>
<a class="btn-success btn" href="http://xtoolza.info" title="откроется в этой же вкладке">На главную</a>

</body>
</html>