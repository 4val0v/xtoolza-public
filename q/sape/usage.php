<!DOCTYPE HTML>
<html>
<head>
	<title>Sape Info</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
</head>
<body id="linearBg1">
<table>
	<tr>
		<td><img src="http://xtoolza.info/q/sape/logo.png" width="100" alt="Sape Info"></td>
		<td><h1 style="margin-left:20px">Sape Info</h1></td>
	</tr>
</table>

<?php
/*
 * Пример использования класса SapeClientEasy (в консоли)
 */

require('Sape.php');
//создаем объект, в который передаем данные для авторизации и полный путь к временному файлу для cookies
$sape = new SapeClientEasy('ifuptimusproject', 'Jgnbu8d9', '/var/xtoolza.info/q/sape/cookie.txt');
//получаем баланс и выводим пользователю
$sapeinfo = $sape->get_user();
$sapeprojects = $sape->get_projects(show_deleted);
echo '<h3>Логин : '.$sapeinfo['login'].'</h3>';
echo "\r\n <h3>Баланс : {$sape->balance()}  RUB</h3>\r\n";
// echo "<br> :".$sapeprojects." </h3>\r\n";



?>



<?

//отладка
$debug =0;
if ($debug === 1){
	error_reporting( E_ALL );
	ini_set('display_errors', 1);
	echo '<b>идёт отладка: по всем вопросам к Гене Шершову</b><br /><br /><br /><pre>';
	var_dump($sape->get_projects(true));
	echo '</pre>';
} else {
	error_reporting( E_ERROR );
	ini_set('display_errors', 0);
}
?>
</body>
</html>
