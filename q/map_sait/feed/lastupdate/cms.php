<?php
// 201.	gamburger done
header('Content-type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);
include('grab.php');

$result = grab($_POST['url']);

?>
