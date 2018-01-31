<?php
header('Content-type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);
include('grab.php');
function check($html) {
  $cms = array(
  "(V1) google tag files" => array('google_tag_files'),
  "(V2) reenter files" => array('reenter_files'),
  "(V3X) CDN" => array('cdn.reenter.ru')
  );
// $logfile = 'logs/cmslogs.txt';
  if (empty($html)){
    $datetoday = date("Y-m-d H:m:s");
    $sname = $_POST['url'] . chr(9) .'Сайт недоступен' .chr(9). $datetoday. PHP_EOL;
    // file_put_contents('logs/cmslogs.txt',$sname, LOCK_EX);
    exit('Сайт недоступен!');
  } else {
    $datetoday = date("Y-m-d H:m:s");
    foreach ($cms as $name => $rules) {
      $c = count($rules);
      for ($i = 0; $i < $c; $i++) {
        if (stripos($html, $rules[$i]) !== FALSE) {
          $nname = $_POST['url'] . chr(9) .$name .chr(9). $datetoday. PHP_EOL;
       // file_put_contents('logs/cmslogs.txt',$nname, LOCK_EX);
            exit($name);
        }
      }
    }
    $mname = $_POST['url'] . chr(9).'Не найдено' .chr(9). $datetoday. PHP_EOL;
    // file_put_contents('logs/cmslogs.txt',$mname, LOCK_EX);
    exit("Не найдено");
  }
}

$result = check(grab($_POST['url']));
$loger = checkcmsresult($result);
// var_dump($loger);
function mylog($data) {
  $data = $data . PHP_EOL;
  // file_put_contents('logs/metrika.txt', $data);
  // var_dump (file_put_contents('/logs/cmslogs.txt', $data));
}
mylog($loger);
?>
