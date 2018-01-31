<?

// запускаем этот скрипт http://наш_сайт/sputnikadminer.php
// авторизуемся в админке
// логин: reenter2015
// пароль: reenter2015
	echo '<h1>Sputnik cms adminer</h1>';
error_reporting( E_ALL );
ini_set('display_errors', 1); 
$config_file = $_SERVER['DOCUMENT_ROOT'].'/custom/config.php';
include($config_file);
// echo '<pre>';
// var_dump($db);
// echo '</pre>';
$host = $CONFIG['db_host'];
$user = $CONFIG['db_user'];
$pass = $CONFIG['db_pass'];
$database = $CONFIG['db_base'];
echo "<br />DB_HOST = " . $host ."<br />DB_NAME = " . $database . "<br />DB_USER = " . $user . "<br />DB_PASSWORD = " . $pass.  "<br />";
$sql_connect = mysql_connect($host, $user, $pass) or exit("<p style='color:red'>Can't connect to MySQL</p>");
mysql_select_db($database) or exit("Can't connect to database");
$passMD5 = sha1('reenter2015');
$query2 = "INSERT INTO `$database`.`accounts` (`id`, `key`, `type`, `state`, `login`, `password`, `email`) VALUES ('1366613', 'admin_5tbprvp1fqp3tgb1opq9jk03k7', 'admin', 'active', 'reenter2015', '$passMD5' , 'support@reenter.ru');";
$resquerytest2 = mysql_query($query2) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
$http_host = $_SERVER['HTTP_HOST'];
echo "<br /><p style='color: green'>Everything is ok! Try to login : <a href='http://$http_host/admin/' target='_blank'>$http_host/admin/</a></p><p style='color: green'>Login: reenter2015</p><p style='color: green'>Password: reenter2015</p>";
?>