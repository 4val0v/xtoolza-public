<?php
// 201.	gamburger done
header('Content-type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);
include('grab.php');
function check($html) {
        $cms = array(
				"Found" => array('корзина','Корзина','интернет-магазин','Интернет-Магазин','Интернет-магазин','интернет магазин','Интернет магазин','интернет Магазин','корзине', 'ваши покупки', 'онлайн заказ','с доставкой','интернет магазине','Интернет-магазин','ИНТЕРНЕТ МАГАЗИН','ОФОРМИТЬ ЗАКАЗ','оформить заказ','товаров в сравнении','Корзина','Корзина пуста','korzina','personal/cart/','show_basket','заказать онлайн','shopping-cart','/cart','personal/order/make/','ваш заказ','Ваша корзина пуста','Корзина пуста', 'Оцените качество магазина на Яндекс.Маркете'),
        );

        if (empty($html)){
				$datetoday = date("Y-m-d H:m:s");
				$sname = $_POST['url'] . chr(9) .'Сайт недоступен' .chr(9). $datetoday. PHP_EOL;
				file_put_contents('logs/cmslogs.txt',$sname, FILE_APPEND | LOCK_EX);
				exit('Сайт недоступен!');
				} else {
				$datetoday = date("Y-m-d H:m:s");
        foreach ($cms as $name => $rules) {
            $c = count($rules);
            for ($i = 0; $i < $c; $i++) {
                if (stripos($html, $rules[$i]) !== FALSE) {
				$nname = $_POST['url'] . chr(9) .$name .chr(9). $datetoday. PHP_EOL;
				file_put_contents('logs/cmslogs.txt',$nname, FILE_APPEND | LOCK_EX);
                    exit($name);
					}
                }

        }

		$mname = $_POST['url'] . chr(9).'Not Found' .chr(9). $datetoday. PHP_EOL;
		file_put_contents('logs/cmslogs.txt',$mname, FILE_APPEND | LOCK_EX);
        exit("Not Found"); }
}

$result = check(grab($_POST['url']));


$loger = checkcmsresult($result);
// var_dump($loger);
function mylog($data) {
    $data = $data . PHP_EOL;
    file_put_contents('logs/cmslogs.txt', $data);
    // var_dump (file_put_contents('/logs/cmslogs.txt', $data));
}
mylog($loger);


?>
