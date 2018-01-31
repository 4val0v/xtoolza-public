<?php
// 201.	gamburger done
header('Content-type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);
include('grab.php');
function check($html) {
        $cms = array(
				"CoMagic" => array('class="comagic_phone"','//server.comagic.ru/comagic','//app.comagic.ru/static/'),
				"Zadarma Callback" => array("ZCallbackWidgetDomain  = 'ss.zadarma.com"),
				"Yandex" => array("phone ya-phone",'ya-phone'),
				"lptracker" => array("lptracker_phone"),
				"RoiStat" => array("cloud.roistat.com",'w.roistatProjectId = id')

		);
		// $logfile = 'logs/cmslogs.txt';
		
        if (empty($html)){
				$datetoday = date("Y-m-d H:m:s");
				$sname = $_POST['url'] . chr(9) .'Сайт недоступен' .chr(9). $datetoday. PHP_EOL;
				file_put_contents('logs/cmslogs.txt',$sname, LOCK_EX);
				exit('Сайт недоступен!');
				} else {
				$datetoday = date("Y-m-d H:m:s");
        foreach ($cms as $name => $rules) {
            $c = count($rules);
            for ($i = 0; $i < $c; $i++) {
                if (stripos($html, $rules[$i]) !== FALSE) {
				$nname = $_POST['url'] . chr(9) .$name .chr(9). $datetoday. PHP_EOL;
				file_put_contents('logs/cmslogs.txt',$nname, LOCK_EX);
                    exit($name);
					}
                }
			
        }
		
		$mname = $_POST['url'] . chr(9).'Не найдено' .chr(9). $datetoday. PHP_EOL;
		file_put_contents('logs/cmslogs.txt',$mname, LOCK_EX);
        exit("Не найдено"); }
}

$result = check(grab($_POST['url']));


$loger = checkcmsresult($result);
// var_dump($loger);
function mylog($data) {
    $data = $data . PHP_EOL;
    file_put_contents('logs/metrika.txt', $data);
    // var_dump (file_put_contents('/logs/cmslogs.txt', $data));
}
mylog($loger);


?>