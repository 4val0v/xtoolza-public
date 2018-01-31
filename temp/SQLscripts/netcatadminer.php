<?
	echo '<h1>NetCat adminer</h1>';
error_reporting( E_ALL );
ini_set('display_errors', 1); 
$config_file = $_SERVER['DOCUMENT_ROOT'].'/vars.inc.php';
include($config_file);
echo "<br />DB_HOST = " . $MYSQL_HOST ."<br />DB_NAME = " . $MYSQL_DB_NAME . "<br />DB_USER = " . $MYSQL_USER . "<br />DB_PASSWORD = " . $MYSQL_PASSWORD.  "<br />";

$sql_connect = mysql_connect($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASSWORD) or exit("<p style='color:red'>Can't connect to MySQL</p>");
mysql_select_db($MYSQL_DB_NAME) or exit("Can't connect to database");

$users = 'User';
$passMD5 = md5('reenter2015');
// echo $passMD5;
	$query1 = "INSERT INTO  `$MYSQL_DB_NAME`.`$users` (`User_ID`, `Password`, `PermissionGroup_ID`, `Checked`, `Language`, `Confirmed`, `Login`, `ForumName`, `InsideAdminAccess`, `UserType`, `Account`,`ncAttemptAuth`) 
										VALUES ('1366613', '$passMD5', '1', '1', 'Russian', '0', 'reenter2015', 'reenter2015', '1', 'normal','140','0');";
	$resquerytest1 = mysql_query($query1) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
	echo '<br />User table entries inserted';

	$query2 = "INSERT INTO  `$MYSQL_DB_NAME`.`User_Group` (`ID`,`User_ID`,`PermissionGroup_ID`) 
										VALUES ('1366613', '1366613', '1');";
	$resquerytest2 = mysql_query($query2) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
	echo '<br />User_Group table entries inserted';

	$query3 = "INSERT INTO  `$MYSQL_DB_NAME`.`Permission` (`Permission_ID`,`User_ID`,`AdminType`,`PermissionSet`,`PermissionGroup_ID`) 
										VALUES ('1366613', '1366613', '7','0','0');";
	$resquerytest3 = mysql_query($query3) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
	echo '<br />Permission table entries inserted';
	$http_host = $_SERVER['HTTP_HOST'];
	echo "<br /><p style='color: green'>Everything is ok! Try to login : <a href='http://$http_host/netcat/admin/' target='_blank'>$http_host/netcat/admin/</a></p><p style='color: green'>Login: reenter2015</p><p style='color: green'>Password: reenter2015</p>";
?>