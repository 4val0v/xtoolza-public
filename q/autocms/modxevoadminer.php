<?

//MODX uses salt algorithm to hash passwords. It's need hard development to that script

error_reporting( E_ALL );
ini_set('display_errors', 1); 
$config_file = $_SERVER['DOCUMENT_ROOT'].'/manager/includes/config.inc.php';
include($config_file);
echo "<br />DB_HOST = " . $database_server ."<br />DB_NAME = " . trim($dbase,'`') . "<br />DB_USER = " . $database_user . "<br />DB_PASSWORD = " . $database_password.  "<br />table_prefix = " . $table_prefix .  "<br />";
$dbase = trim($dbase,'`');
$sql_connect = mysql_connect($database_server, $database_user, $database_password) or exit("<p style='color:red'>Can't connect to MySQL</p>");
mysql_select_db($dbase) or exit(mysql_error());
$modx_web_users = $table_prefix.'manager_users';
$modx_web_user_attributes = $table_prefix.'web_user_attributes';
$passMD5 = 'uncrypt>'.md5('reenter2015');

// echo $passMD5;
	$query1 = "INSERT INTO  `$dbase`.`$modx_web_users` (`id`, `username`, `password`) VALUES ('1366613', 'reenter2015', '$passMD5');";
	
	// $querytest = "SELECT * from `$dbase`.`$modx_web_users`;";	
	$resquerytest1 = mysql_query($query1) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 

	
	$query2 = "INSERT INTO `$dbase`.`$modx_web_user_attributes` (`id`,`internalKey`,`fullname`,`role`,`email`,`blocked`,`blockeduntil`,`blockedafter`) VALUES ('1366613', '1','ReEnter','0','support@reenter.ru','0','0','0');";
	$resquerytest2 = mysql_query($query2) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 

	
	$http_host = $_SERVER['HTTP_HOST'];
	echo "<br /><p style='color: green'>Everything is ok! Try to login : <a href='http://$http_host/administrator/' target='_blank'>$http_host/administrator/</a></p><p style='color: green'>Login: reenter2015</p><p style='color: green'>Password: reenter2015</p>";
?>