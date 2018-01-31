<?php
header('Content-type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);
include('grab.php');
function check($html) {
        $cms = array(
				"Найдено" => array('GoogleAnalyticsObject','//www.google-analytics.com/analytics.js',"ga('send', 'pageview');","ga.type = 'text/javascript'")
		);
		// $logfile = 'logs/contextlogs.txt';
		
        if (empty($html)){
				$datetoday = date("Y-m-d H:m:s");
				$sname = $_POST['url'] . chr(9) .'Сайт недоступен' .chr(9). $datetoday. PHP_EOL;
				file_put_contents('logs/analytics.txt',$sname, FILE_APPEND);
				exit('Сайт недоступен!');
				} else {
				$datetoday = date("Y-m-d H:m:s");
        foreach ($cms as $name => $rules) {
            $c = count($rules);
            for ($i = 0; $i < $c; $i++) {
                if (stripos($html, $rules[$i]) !== FALSE) {
				$nname = $_POST['url'] . chr(9) .$name .chr(9). $datetoday. PHP_EOL;
				file_put_contents('logs/analytics.txt',$nname, FILE_APPEND);
                    exit($name);
					}
                }
			
        }
		
		$mname = $_POST['url'] . chr(9).'Не найдено' .chr(9). $datetoday. PHP_EOL;
		file_put_contents('logs/analytics.txt',$mname, FILE_APPEND);
        exit("Не найдено"); }
}

$result = check(grab($_POST['url']));


$loger = checkcmsresult($result);
// var_dump($loger);
function mylog($data) {
    $data = $data . PHP_EOL;
    file_put_contents('logs/analytics.txt', $data, FILE_APPEND);
    // var_dump (file_put_contents('/logs/contextlogs.txt', $data));
}
mylog($loger);


?>