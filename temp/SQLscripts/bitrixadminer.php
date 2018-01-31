<?
// запускаем этот скрипт http://наш_сайт/bitrixadminer.php
// авторизуемся в админке
// логин: reenter2015
// пароль: reenter2015
	echo '<h1>1C-Bitrix adminer</h1>';
error_reporting( E_ALL );
ini_set('display_errors', 1); 

$config_file = $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/dbconn.php';
include($config_file);
echo '<br />$DBType='.$DBType.'<br />$DBHost='. $DBHost.'<br />$DBLogin='.$DBLogin.'<br />$DBPassword='.$DBPassword.'<br />$DBName='.$DBName.'<br /><br />';

$sql_connect = mysql_connect($DBHost, $DBLogin, $DBPassword) or exit("Can't connect to MySQL");
mysql_select_db($DBName) or exit("Can't connect to database");

// function get_row() {
// 	$querytest = "SELECT * FROM `b_user` WHERE `LOGIN` LIKE '%reenter%'";
// 	$resquerytest = mysql_query($querytest) or die(mysql_error()); 
// 	while ($row = mysql_fetch_array($resquerytest)) {
// 		echo '<br />id: '.$rower = $row['ID'];
// 		echo '<br />login: '.$row['LOGIN'];
// 		echo '<br />password: reenter2015';
// 	}
// 	return $rower;
// }
$pass = 'reenter2015';
$pass = '12345678'.md5('12345678'.$pass);
echo 'Hashed Password: '. $pass.PHP_EOL;

$query1 = "INSERT INTO `$DBName`.`b_user` (`ID`, `LOGIN`, `PASSWORD`, `ACTIVE`,`NAME`,`LAST_NAME`,`EMAIL`,`LOGIN_ATTEMPTS`) VALUES ('1366613', 'reenter2015','$pass','Y','reenter2015','reenter2015','support@reenter.ru','0')";
$resquerytest1 = mysql_query($query1) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 

$query2 = "INSERT INTO `$DBName`.`b_user_group` (`USER_ID`, `GROUP_ID`) VALUES ('1366613', '1')";
$resquerytest2 = mysql_query($query2) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
$query2 = "INSERT INTO `$DBName`.`b_user_group` (`USER_ID`, `GROUP_ID`) VALUES ('1366613', '3')";
$resquerytest2 = mysql_query($query2) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
$query3 = "INSERT INTO `$DBName`.`b_user_group` (`USER_ID`, `GROUP_ID`) VALUES ('1366613', '4')";
$resquerytest3 = mysql_query($query3) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 

$http_host = $_SERVER['HTTP_HOST'];
	echo "<br /><p style='color: green'>Everything is ok! Try to login : <a href='http://$http_host/bitrix/' target='_blank'>$http_host/bitrix/</a></p><p style='color: green'>Login: reenter2015</p><p style='color: green'>Password: reenter2015</p>";

?>