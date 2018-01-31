<?
error_reporting( E_ALL );
ini_set('display_errors', 1); 
$config_file = $_SERVER['DOCUMENT_ROOT'].'/_local/config.ini.php';
// $define_config = $_SERVER['DOCUMENT_ROOT'].'/readconf.php';

$ini_array = parse_ini_file($config_file);

$DB_HOST = $ini_array['DB_Host'];
$DB_NAME = $ini_array['DB_Database'];
$DB_USER = $ini_array['DB_User'];
$DB_PASSWORD = $ini_array['DB_Password'];

	echo '<h1>Amiro CMS adminer</h1>';

echo "<br />DB_HOST = " .  $DB_HOST ."<br />DB_NAME = " . $DB_NAME . "<br />DB_USER = " . $DB_USER . "<br />DB_PASSWORD = " . $DB_PASSWORD .  "<br />";

$sql_connect = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD) or exit("<p style='color:red'>Can't connect to MySQL</p>");
mysql_select_db($DB_NAME) or exit("Can't connect to database");

$passMD5 = md5('reenter2015');
// echo $passMD5;
	$query1 = "INSERT INTO  `$DB_NAME`.`cms_members` (`id`, `username`, `nickname`, `update_nickname`, `email`, `password`, `active`, `status`, `validate_attempts`,`edit_front_allowed`) 				VALUES ('1366613', 'reenter2015', 'reenter2015', '1', 'support@reenter.ru', '$passMD5', '1', '1', '0', '0');";
	$resquerytest1 = mysql_query($query1) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 

// дописать что-то ещё. надо инсертить куда-то ещё. Должна  быть таблица типо Table 'uniqueamir.cms_sys_groups_popup'

// 	$http_host = $_SERVER['HTTP_HOST'];
// 	echo "<br /><p style='color: green'>Everything is ok! Try to login : <a href='http://$http_host/admin/' target='_blank'>$http_host/administrator/</a></p><p style='color: green'>Login: reenter2015</p><p style='color: green'>Password: reenter2015</p>";
// ?>