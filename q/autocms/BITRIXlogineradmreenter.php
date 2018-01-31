<?
error_reporting( E_ALL );
ini_set('display_errors', 1); 

$config_file = $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/dbconn.php';
include($config_file);
echo '<br />$DBType='.$DBType.'<br />$DBHost='. $DBHost.'<br />$DBLogin='.$DBLogin.'<br />$DBPassword='.$DBPassword.'<br />$DBName='.$DBName.'<br /><br />';

$sql_connect = mysql_connect($DBHost, $DBLogin, $DBPassword) or exit("Can't connect to MySQL");
mysql_select_db($DBName) or exit("Can't connect to database");

function get_row() {
	$querytest = "SELECT * FROM `b_user` WHERE `LOGIN` LIKE '%reenter%'";
	$resquerytest = mysql_query($querytest) or die(mysql_error()); 
	while ($row = mysql_fetch_array($resquerytest)) {
		echo '<br />id: '.$rower = $row['ID'];
		echo '<br />login: '.$row['LOGIN'];
		echo '<br />password: Fatlhjy15';
	}
	return $rower;
}
$rower = get_row();
$query1 = "INSERT INTO `$DBName`.`b_user_group` (`USER_ID`, `GROUP_ID`) VALUES ('$rower', '1')";
$resquerytest1 = mysql_query($query1) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
$query2 = "INSERT INTO `$DBName`.`b_user_access` VALUES ('$rower', 'group','G1')";
$resquerytest2 = mysql_query($query2) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
$query3 = "INSERT INTO `$DBName`.`b_user_access` VALUES ('$rower', 'group','G2')";
$resquerytest3 = mysql_query($query3) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
$query4 = "INSERT INTO `$DBName`.`b_user_access` VALUES ('$rower', 'group','G3')";
$resquerytest4 = mysql_query($query4) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
$query5 = "INSERT INTO `$DBName`.`b_user_access` VALUES ('$rower', 'group','G4')";
$resquerytest5 = mysql_query($query5) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
$query6 = "INSERT INTO `$DBName`.`b_user_access` VALUES ('$rower', 'user','U1')";
$resquerytest6 = mysql_query($query6) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
$http_host = $_SERVER['HTTP_HOST'];
echo "<br /><p style='color: green'>Everything is ok! Try to log in: <a href='http://$http_host/bitrix/' target='_blank'>$http_host/bitrix/</a></p>";

// $salt = substr($newuser['PASSWORD'],0,)

// $query_admin_make = "INSERT INTO `$DBName`.`b_user_group` (`USER_ID`, `GROUP_ID`, `DATE_ACTIVE_FROM`, `DATE_ACTIVE_TO`) VALUES ('1260', '1', NULL, NULL);"
// INSERT INTO `texnotoys`.`b_user_group` (`USER_ID`, `GROUP_ID`, `DATE_ACTIVE_FROM`, `DATE_ACTIVE_TO`) VALUES ('1260', '1', NULL, NULL); //1260 - userid
// INSERT INTO `texnotoys`.`b_user_access` VALUES ('1260', 'group', 'G1'); //1260 - userid
// INSERT INTO `texnotoys`.`b_user_access` VALUES ('1260', 'group', 'G2'); //1260 - userid
// INSERT INTO `texnotoys`.`b_user_access` VALUES ('1260', 'group', 'G3'); //1260 - userid
// INSERT INTO `texnotoys`.`b_user_access` VALUES ('1260', 'group', 'G4'); //1260 - userid
// INSERT INTO `texnotoys`.`b_user_access` VALUES ('1260', 'user', 'U1'); //1260 - userid


?>