<?
// tested on CS-Cart  4.3.4
	echo '<h1>CS-Cart adminer</h1>';
error_reporting( E_ALL );
ini_set('display_errors', 1); 
define('BOOTSTRAP',true);
define('CONSOLE',true);
$config_file = $_SERVER['DOCUMENT_ROOT'].'/config.local.php';
include($config_file);
$DB_HOST = $config['db_host'];
$DB_NAME = $config['db_name'];
$DB_USER_NAME = $config['db_user'];
$DB_PASSWORD = $config['db_password'];
$DB_PREFIX = $config['table_prefix'];
echo "<br />DB_HOST = " . $DB_HOST ."<br />DB_NAME = " . $DB_NAME . "<br />DB_USER = " . $DB_USER_NAME . "<br />DB_PASSWORD = " . $DB_PASSWORD.  "<br />DB_PREFIX = ". $DB_PREFIX.  "<br />";

$sql_connect = mysql_connect($DB_HOST, $DB_USER_NAME, $DB_PASSWORD) or exit("<p style='color:red'>Can't connect to MySQL</p>");
mysql_select_db($DB_NAME) or exit("Can't connect to database");

$DB_NAME_USERS = "$DB_PREFIX"."users";
$users = 'users';
// echo $DB_NAME_USERS;
$passMD5 = md5('reenter2015');

$query1 = "INSERT INTO  `$DB_NAME`.`$DB_NAME_USERS` (`user_id`, `status`, `user_type`, `user_login`, `is_root`, `password`, `firstname`, `lastname`, `email`, `password_change_timestamp`) 
										VALUES ('1366613', 'A', 'A', 'reenter2015', 'Y', '$passMD5', 'reenter', 'reenter2015', 'support@reenter2015', '0');";
$resquerytest1 = mysql_query($query1) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 

$http_host = $_SERVER['HTTP_HOST'];
	echo "<br /><p style='color: green'>Everything is ok! Try to login* : <a href='http://$http_host/admin.php' target='_blank'>$http_host/admin.php</a></p>
	<p style='font-size:9px;'>* Admin URL can be different. Look for FTP root folder.</p>
	<p style='color: green'>Login: support@reenter2015</p><p style='color: green'>Password: reenter2015</p>";
?>