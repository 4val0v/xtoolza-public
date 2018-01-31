<?php
header('Content-type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);
include('grab.php');

$result = GetStatus($_POST['url'])[0];
$result = trim($result,"HTTP/1.1");
$result = trim($result,"HTTP/1.0");
$result = trim($result, " ");
echo $result;

// var_dump($result);
if ($result != '200 OK') {
  if (location($_POST['url'])){
  // var_dump(location($_POST['url']));
  echo ': Location: '.location($_POST['url']);
  }
}

?>
