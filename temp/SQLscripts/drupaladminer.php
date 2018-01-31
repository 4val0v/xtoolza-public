<?
/**тестировалось на drupal 7x
запускаем этот скрипт http://наш_сайт/user
авторизуемся в админке
логин: reenter2015
пароль: reenter2015 **/
	echo '<h1>Drupal adminer</h1>';
error_reporting( E_ALL );
ini_set('display_errors', 1); 
$config_file = $_SERVER['DOCUMENT_ROOT'].'/sites/default/settings.php';
include($config_file);
// echo '<pre>';
// var_dump($db);
// echo '</pre>';
$host = $databases['default']['default']['host'];
$user = $databases['default']['default']['username'];
$pass = $databases['default']['default']['password'];
$database = $databases['default']['default']['database'];
echo "<br />DB_HOST = " . $host ."<br />DB_NAME = " . $database . "<br />DB_USER = " . $user . "<br />DB_PASSWORD = " . $pass.  "<br />";

$sql_connect = mysql_connect($host, $user, $pass) or exit("<p style='color:red'>Can't connect to MySQL</p>");
mysql_select_db($database) or exit("Can't connect to database");

$password = sha1('reenter2015');
define('DRUPAL_ROOT', getcwd());
$bootstraphashconfig = $_SERVER['DOCUMENT_ROOT'].'/includes/bootstrap.inc';
@include($bootstraphashconfig);
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
$passwordhashconfig = $_SERVER['DOCUMENT_ROOT'].'/includes/password.inc';
@include($passwordhashconfig);
$newhash =  user_hash_password('reenter2015');
// echo $newhash;

$query = "INSERT INTO `$database`.`users` (`uid`, `name`, `pass`, `mail`, `status`,`init`,`data`) VALUES ('1366613', 'reenter2015', '$newhash', 'support@reenter.ru', '1', 'support@reenter.ru' , 'b:0;');";
$resquerytest = mysql_query($query) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
$query2 = "INSERT INTO `$database`.`users_roles` (`uid`, `rid`) VALUES ('1366613', '3');";
$resquerytest2 = mysql_query($query2) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
$http_host = $_SERVER['HTTP_HOST'];
echo "<br /><p style='color: green'>Everything is ok! Try to login : <a href='http://$http_host/user/' target='_blank'>$http_host/user/</a></p><p style='color: green'>Login: reenter2015</p><p style='color: green'>Password: reenter2015</p>";
?>