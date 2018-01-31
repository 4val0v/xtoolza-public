<?php
header('Content-type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);
include('grab.php');
function check($html) {
        $cms = array(
				"Adlabs" => array('"src","http://c.luxup.ru/t/lb"'),
				"etarg.ru" => array("<script type='text/javascript' src='http://tech"),
				"DirectAdvert" => array('text/javascript" src="http://code.directadvert.ru/show.cgi'),
				"TeaserNet" => array('text/javascript" src="http://adbmi.com/','teasernet_blockid =','teasernet_padid = '),
				"Yandex Direct" => array('<!-- Яндекс.Директ -->','yandex_direct_type','yandex_direct_links_underline','Ya.Direct.insertInto','src="//an.yandex.ru/system/context.js'),
				"Google AdSence" => array('google_ad_client = ','googlesyndication.com/pagead/show_ads.js','adsbygoogle = window.adsbygoogle'),
				"Begun" => array('http://autocontext.begun.ru/autocontext.js','var begun_auto_colors','http://autocontext.begun.ru/autocontext2.js','var begun_auto_pad','http://autocontext.begun.ru/acp/begun_tpl','http://autocontext.begun.ru/acp/begun_utils','http://autocontext.begun.ru/acp/begun_scripts')
        );
		// $logfile = 'logs/contextlogs.txt';
		
        if (empty($html)){
				$datetoday = date("Y-m-d H:m:s");
				$sname = $_POST['url'] . chr(9) .'Сайт недоступен' .chr(9). $datetoday. PHP_EOL;
				file_put_contents('logs/contextlogs.txt',$sname);
				exit('Сайт недоступен!');
				} else {
				$datetoday = date("Y-m-d H:m:s");
        foreach ($cms as $name => $rules) {
            $c = count($rules);
            for ($i = 0; $i < $c; $i++) {
                if (stripos($html, $rules[$i]) !== FALSE) {
				$nname = $_POST['url'] . chr(9) .$name .chr(9). $datetoday. PHP_EOL;
				file_put_contents('logs/contextlogs.txt',$nname);
                    exit($name);
					}
                }
			
        }
		
		$mname = $_POST['url'] . chr(9).'Не найдено' .chr(9). $datetoday. PHP_EOL;
		file_put_contents('logs/contextlogs.txt',$mname);
        exit("Не найдено"); }
}

$result = check(grab($_POST['url']));


$loger = checkcmsresult($result);
// var_dump($loger);
function mylog($data) {
    $data = $data . PHP_EOL;
    file_put_contents('logs/contextlogs.txt', $data);
    // var_dump (file_put_contents('/logs/contextlogs.txt', $data));
}
mylog($loger);


?>