<? include($_SERVER['DOCUMENT_ROOT'].'/includes/html_scripts.php'); ?>
<html>
<?
ignore_user_abort(true);
set_time_limit(0);
?>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex, follow" />
	<title>Результат выгрузки ссылок из xml</title>
	<link href="/q/style.css" rel="stylesheet"/>
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://reentermanual.local/newcss4.css" rel="stylesheet"/>
</head>
<body id="linearBg1">
<?
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
?>
<div style="align:left;">
	<table>
		<tbody>
			<tr>
				<td>
					<div class="TmgWrae">
						<a href="http://reentermanual.local" rel="nofollow"><img class="image UE" src="http://reentermanual.local/q/images/logo.png" width="120px" border="0" width="120px"><img class="image Dowe" src="http://reentermanual.local/q/images/logo_new.png" width="120px" /></a>
					</div>
				</td>
				<td>
					<table>
						<tbody>
							<tr>
								<td><h1 class="jumbotron">Результат выгрузки тегов с xml</h1></td>
							</tr>
							<tr>
								<td><img src="http://reentermanual.local/q/images/url.png" width="80" alt="Результат выгрузки тегов с xml"></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<table border="1" bordercolor="#CDC9C9">
	<tr><td>URL</td>
	<?
	if ($_POST['tag'] != 'url') {
		echo '<td>Значения тега '. $_POST['tag'].'</td>';
	}
	?>
	</tr>
<?
header('Content-Type: text/html; charset=utf-8');
$contents = $_POST['site'];
$contents = str_replace(' ', '', $contents);
// var_dump($contents);
// $tag = $_POST['tag'];
// var_dump($tag);
function result($contents) {
	$tag = $_POST['tag'];
	// var_dump($tag);
	$a = getpage($contents);
	$a = str_replace("<![CDATA[","",$a);
	$a = str_replace("]]>","",$a);
	$xml=simplexml_load_file($contents) or die("Error: Cannot create object");
	echo "Feed: " . $contents . '<br />';
	echo 'Дата обновления фида: '.$xml->attributes()['date'].'<br><br>';
	$counter = 0;

// var_dump($xml);
	foreach ($xml->shop->offers->offer as $offer) {
		if ($tag != 'url'){
			echo '<tr><td>'.$offer->url.'</td>';
			$counter++;
		}
		echo '<td>'.$offer->$tag.'</td></tr>';
		$log .= $offer->url.' '.$offer->$tag.PHP_EOL;
	}
	echo 'Количество найденых URL: '.($counter);
	return $log;
	echo '</table>';

}

$loger = result($contents);
function mylog($data){
	$data = $data . PHP_EOL;
	file_put_contents('/var/www/feed/logs/tagsfeed.txt', $data);
}
mylog($loger);

//получить содержимое страницы
function getpage($contents){
	if(mb_detect_encoding($contents) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$contents=$IDN->encode($contents);
		}
	$ch = curl_init();
	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2062.124 Safari/537.36";
	curl_setopt($ch, CURLOPT_URL,$contents);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	curl_setopt($ch, CURLOPT_TIMEOUT, 45);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSLVERSION, 3);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

//проверим статусы
function proverit_dostupnost_saita($arraylist) {
	if (!preg_match('|^http:.*|i',$arraylist)){
		$arraylist = 'http://'.$arraylist;
		}
	$arraylistscheme = parse_url($arraylist);
	$url_host = $arraylistscheme['host'];
	if(mb_detect_encoding($url_host) != "ASCII"){ //если сайт в кириллице переводим в punycode
		include_once("idna_convert.class.php");
		$IDN = new idna_convert(array('idn_version' => '2008'));
		$arraylist=$IDN->encode($url_host);
	}

	$user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2062.124 Safari/537.36";
	$temp = curl_init();
	curl_setopt($temp, CURLOPT_URL,$arraylist);
	curl_setopt($temp, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($temp, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($temp, CURLOPT_VERBOSE, false);
	curl_setopt($temp, CURLOPT_TIMEOUT, 10);
	curl_setopt($temp, CURLOPT_SSL_VERIFYPEER, 0);
	// curl_setopt($temp, CURLOPT_SSLVERSION, 3);
	curl_setopt($temp, CURLOPT_FOLLOWLOCATION, 0);
	curl_setopt($temp, CURLOPT_SSL_VERIFYHOST, 0);
	$page = curl_exec($temp);
	$result = curl_getinfo($temp, CURLINFO_HTTP_CODE);
	curl_close($temp);
	return $result;
}

?>
</table>
<br /><a href="http://reentermanual.local/feed/logs/tagsfeed.txt" download>Скачать результат</a><br />
<br>
<? backbuttons(); ?>
</body>
</html>
