<?

// запускаем этот скрипт http://наш_сайт/wordpressadminer.php
// авторизуемся в админке
// логин: reenter2015
// пароль: reenter2015
	echo '<h1>Wordpress adminer</h1>';
error_reporting( E_ALL );
ini_set('display_errors', 1); 
$config_file = $_SERVER['DOCUMENT_ROOT'].'/wp-config.php';
include($config_file);
echo "<br />DB_HOST = " . DB_HOST ."<br />DB_NAME = " . DB_NAME . "<br />DB_USER = " . DB_USER . "<br />DB_PASSWORD = " . DB_PASSWORD.  "<br />table_prefix = " . $table_prefix .  "<br />";
$DB_NAME = DB_NAME;
$sql_connect = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or exit("<p style='color:red'>Can't connect to MySQL</p>");
mysql_select_db(DB_NAME) or exit("Can't connect to database");
$wp_users = $table_prefix.'users';
$wp_usermeta = $table_prefix.'usermeta';
$wp_capabilities = $table_prefix.'capabilities';
$wp_user_level = $table_prefix.'user_level';
$passMD5 = md5('reenter2015');

// echo $passMD5;
	$query1 = "INSERT INTO  `$DB_NAME`.`$wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_status`, `display_name`) VALUES ('1366613', 'reenter2015', '$passMD5', 'reenter2015', 'support@reenter.ru', '0', 'Reenter');";
	$resquerytest1 = mysql_query($query1) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
	
	$query2 = "INSERT INTO `$DB_NAME`.`$wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (NULL, '1366613', '$wp_capabilities', 'a:1:{s:13:\"administrator\"\;b:1\;}');";
	$resquerytest2 = mysql_query($query2) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
	
	$query3 = "INSERT INTO `$DB_NAME`.`$wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES (NULL, '1366613', '$wp_user_level', '10');";
	$resquerytest2 = mysql_query($query3) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
	
	$http_host = $_SERVER['HTTP_HOST'];
	echo "<br /><p style='color: green'>Everything is ok! Try to login : <a href='http://$http_host/wp-admin/' target='_blank'>$http_host/wp-admin/</a></p><p style='color: green'>Login: reenter2015</p><p style='color: green'>Password: reenter2015</p>";
?>