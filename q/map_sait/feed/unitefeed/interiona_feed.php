<?
ignore_user_abort(false);
set_time_limit(0);

$debug = 1;
if ($debug == 1) {
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	$message = 1;
	if ($message == 0){
		echo '<pre>
		Идёт отладка!
		Проверка может работать некорректно!
	</pre>';
	}
}

header("Content-Type: text/xml");

$feed1 = 'http://interiona.ru/textil/yandexmarket/90887bea-e071-43c9-a7cf-32c4725abc03.xml';
$feed2 = 'http://interiona.ru/yandexmarket/445a843c-88d6-45da-a1d2-a6c67b0506a3.xml';

//тащим построчно список категорий из фида 1
function catstake1(){
	$feed1 = 'http://interiona.ru/textil/yandexmarket/90887bea-e071-43c9-a7cf-32c4725abc03.xml';
	$fp1 = fopen($feed1, "r");
	$do_record = false;
	$res = "";
	if ($fp1) {
		while (!feof($fp1)) {
			$content1 = fgets($fp1);
			if (strpos($content1,'<categories>') > -1) {
				$do_record = true;
				continue;
			} else if (strpos($content1,'</categories>') > -1) {
				$do_record = false;
				break;
			}
			if ($do_record) {
				$res .= $content1;
			}
		}
	}
	return $res;
}


//тащим построчно список категорий из фида 2
function catstake2(){
	$feed2 = 'http://interiona.ru/yandexmarket/445a843c-88d6-45da-a1d2-a6c67b0506a3.xml';
	$fp2 = fopen($feed2, "r");
	$do_record2 = false;
	$re2s = "";
	if ($fp2) {
		while (!feof($fp2)) {
			$content2 = fgets($fp2);
			if (strpos($content2,'<categories>') > -1) {
				$do_record2 = true;
				continue;
			} else if (strpos($content2,'</categories>') > -1) {
				$do_record2 = false;
				break;
			}
			if ($do_record2) {
				$res2 .= $content2;
			}
		}
	}
	return $res2;
}


//тащим все офферы из фида 1
function offerstake1(){
	$feed1 = 'http://interiona.ru/textil/yandexmarket/90887bea-e071-43c9-a7cf-32c4725abc03.xml';
	$fp3 = fopen($feed1, "r");
	$do_record3 = false;
	$res3 = "";
	if ($fp3) {
		while (!feof($fp3)) {
			$content3 = fgets($fp3);
			if (strpos($content3,'<offers>') > -1) {
				$do_record3 = true;
				continue;
			} else if (strpos($content3,'</offers>') > -1) {
				$do_record3 = false;
				break;
			}
			if ($do_record3) {
				$res3 .= $content3;
			}
		}
	}
	return $res3;
}


//тащим все офферы из фида 2
function offerstake2(){
	$feed2 = 'http://interiona.ru/yandexmarket/445a843c-88d6-45da-a1d2-a6c67b0506a3.xml';
	$fp2 = fopen($feed2, "r");
	$do_record2 = false;
	$res2 = "";
	if ($fp2) {
		while (!feof($fp2)) {
			$content2 = fgets($fp2);
			if (strpos($content2,'<offers>') > -1) {
				$do_record2 = true;
				continue;
			} else if (strpos($content2,'</offers>') > -1) {
				$do_record2 = false;
				break;
			}
			if ($do_record2) {
				$res2 .= $content2;
			}
		}
	}
	return $res2;
}

echo '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
echo '<!DOCTYPE yml_catalog SYSTEM "shops.dtd">'.PHP_EOL;
echo '<yml_catalog date="'.date("Y-m-d H:i:s").'">'.PHP_EOL;
echo '<shop>'.PHP_EOL;
echo '<name>Интериона</name>'.PHP_EOL;
echo '<company>Интериона</company>'.PHP_EOL;
echo '<url>http://interiona.ru/textil/</url>'.PHP_EOL;
echo '<phone>+7 (495) 662-5846</phone>'.PHP_EOL;
echo '<platform>Reenter</platform>'.PHP_EOL;
echo '<version>1.0</version>'.PHP_EOL;
echo '<currencies>'.PHP_EOL;
echo '<currency id="RUB" rate="1.0000"/>'.PHP_EOL;
echo '</currencies>'.PHP_EOL;
echo '<categories>'.PHP_EOL;
echo catstake1();
echo catstake2();
echo '</categories>'.PHP_EOL;
echo '<offers>'.PHP_EOL;
echo offerstake2();
echo offerstake1();
echo '</offers>'.PHP_EOL;
echo '</shop>'.PHP_EOL;
echo '</yml_catalog>';

?>