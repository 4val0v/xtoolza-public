<?

// запускаем этот скрипт http://наш_сайт/wordpressadminer.php
// авторизуемся в админке
// логин: reenter2015
// пароль: reenter2015
	echo '<h1>Webasyst adminer</h1>';
error_reporting( E_ALL );
ini_set('display_errors', 1); 
$config_file = $_SERVER['DOCUMENT_ROOT'].'/wa-config/db.php';
$db = include($config_file);
// echo '<pre>';
// var_dump($db);
// echo '</pre>';
$host = $db['default']['host'];
$user = $db['default']['user'];
$pass = $db['default']['password'];
$database = $db['default']['database'];
echo "<br />DB_HOST = " . $host ."<br />DB_NAME = " . $database . "<br />DB_USER = " . $user . "<br />DB_PASSWORD = " . $pass.  "<br />";
$sql_connect = mysql_connect($host, $user, $pass) or exit("<p style='color:red'>Can't connect to MySQL</p>");
mysql_select_db($database) or exit("Can't connect to database");
$passMD5 = md5('reenter2015');
$query2 = "INSERT INTO `$database`.`wa_contact_rights` (`group_id`, `app_id`, `name`, `value`) VALUES ('-1366613', 'webasyst', 'backend', '1');";
$resquerytest2 = mysql_query($query2) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
$http_host = $_SERVER['HTTP_HOST'];
echo "<br /><p style='color: green'>Everything is ok! Try to login : <a href='http://$http_host/webasyst/' target='_blank'>$http_host/webasyst//</a></p><p style='color: green'>Login: reenter2015</p><p style='color: green'>Password: reenter2015</p>";
?>