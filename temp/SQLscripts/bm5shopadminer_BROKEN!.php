<?
error_reporting( E_ALL );
ini_set('display_errors', 1); 
define("VIEW", true); //обходим защиту в db.php
$config_file = $_SERVER['DOCUMENT_ROOT'].'/config/db.php';
include($config_file);

echo "<br />DB_HOST = " . $dblocation ."<br />DB_NAME = " . $dbname . "<br />DB_USER = " . $dbuser . "<br />DB_PASSWORD = " . $dbpasswd.  "<br />";

$sql_connect = mysql_connect($dblocation, $dbuser, $dbpasswd) or exit("<p style='color:red'>Can't connect to MySQL</p>");
mysql_select_db($dbname) or exit("Can't connect to database");
// $bm5shop_user_usergroup_map = $dbprefix.'user_usergroup_map';
$table = '_users';
$passMD5 = md5('reenter2015');

echo $passMD5;
// неверное шифрование!!! разобраться

	$query1 = "INSERT INTO  `$dbname`.`$table` (`id`, `email`, `passwd_hash`, `role`, `name`) VALUES ('1366613', 'reenter2015', '$passMD5', 'admin', 'reenter2015');";
	$resquerytest1 = mysql_query($query1) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 


	//
	
	// $query2 = "INSERT INTO `$db`.`$bm5shop_user_usergroup_map` (`user_id`, `group_id`) VALUES ('1366613', '8');";
	// $resquerytest2 = mysql_query($query2) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 

	
	// $http_host = $_SERVER['HTTP_HOST'];
	// echo "<br /><p style='color: green'>Everything is ok! Try to login : <a href='http://$http_host/administrator/' target='_blank'>$http_host/administrator/</a></p><p style='color: green'>Login: reenter2015</p><p style='color: green'>Password: reenter2015</p>";
?>