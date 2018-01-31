<?php
header('Content-type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);
include('grab.php');

$result = length($_POST['url']);
// var_dump($result);
echo $result;

// var_dump($result);
// if (location($_POST['url'])){
// 	echo ': Location: '.location($_POST['url']);
// }
?>