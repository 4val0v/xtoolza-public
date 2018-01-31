<?php
header('Content-type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);

define(debug, 0);
define(message, 0);
if (debug == 1) {
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  if (message == 1){
    echo '<pre style="border:3px;color:red;font-weight:bold;font-size:20px;">
    Идут технические работы!!!
    Проверка может работать некорректно!!!
    По всем вопросам писать на gennadiy.shershov@ingate.ru
  </pre>';
  }
}

include('grab.php');

$result = grab($_POST['url']);

?>
