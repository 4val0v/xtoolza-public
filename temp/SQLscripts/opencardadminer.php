<?
	echo '<h1>OpenCart adminer</h1>';
error_reporting( E_ALL );
ini_set('display_errors', 1); 

$config_file = $_SERVER['DOCUMENT_ROOT'].'/config.php';
include($config_file);
echo '<br />$DBType='.DB_DRIVER.'<br />$DBHost='. DB_HOSTNAME.'<br />$DBLogin='.DB_USERNAME.'<br />$DBPassword='.DB_PASSWORD.'<br />$DBName='.DB_DATABASE.'<br />
$DBPrefix='.DB_PREFIX.'<br />';
$DB_DATABASE = DB_DATABASE;
$DBPrefix = 'DB_PREFIX';

$sql_connect = mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD) or exit("<p style='color:red'>Can't connect to MySQL</p>");
mysql_select_db(DB_DATABASE) or exit("Can't connect to database");
$oc_users = $DBPrefix.'users';
$oc_usermeta = $DBPrefix.'usermeta';
$oc_capabilities = $DBPrefix.'capabilities';
$oc_user_level = $DBPrefix.'user_level';
$pwd  = 'reenter2015'; // change to your password

function rand_func($len, $range){
    $pwd = ""; $size =  count($range)-1;
    for($i=1; $i<=$len; $i++){
        $pwd .= $range[mt_rand(0, $size)];
    }
    return $pwd;
}
$alphnum = array_merge( range('A', 'Z'), range('a', 'z'), range(0, 9));
$salt = rand_func(9, $alphnum);
$hash = SHA1($salt . SHA1($salt . SHA1($pwd)));
// echo $pwd,";",$hash,";",$salt;

$query1 = "INSERT INTO `$DB_DATABASE`.`oc_user` (`user_id`, `user_group_id`, `username`, `password`,`salt`,`firstname`,`lastname`,`email`,`status`) 
										VALUES ('1366613', '1','reenter2015','$hash','$salt','reenter2015','reenter2015','support@reenter.ru','1')";
$resquerytest1 = mysql_query($query1) or die("<br /><p style='color: red'>Error: ".mysql_error()."</p>"); 
echo "<br />database values successfull inserted to $DB_DATABASE oc_user table" ;


	$http_host = $_SERVER['HTTP_HOST'];
	echo "<br /><p style='color: green'>Everything is ok! Try to login : <a href='http://$http_host/admin/' target='_blank'>$http_host/admin/</a></p><p style='color: green'>Login: reenter2015</p><p style='color: green'>Password: reenter2015</p>";
?>