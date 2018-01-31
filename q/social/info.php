<!DOCTYPE HTML>
<html>
<head>
	<title>Список заданий для покупки ссылок с соц сетей</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
</head>
<body id="linearBg1">
<table>
	<tr>
		<td><img src="http://vktarget.ru/img/logo.png" width="90" alt="Список заданий для покупки ссылок с соц сетей"></td>
		<td><h1>Список заданий для покупки ссылок с соц сетей</h1></td>
	</tr>
</table>
<a class="btn-success btn" href="http://xtoolza.info/q/social/login.php" title="откроется в этой же вкладке">Выполнить заказ</a>&nbsp;&nbsp;&nbsp;
<a class="btn-success btn" href="http://vktarget.ru/camps/" target="_blank" title="откроется в новой вкладке">перейти в vktarget</a>
<?php header('Content-Type: text/html; charset=utf-8'); 
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
?>
<a href="https://money.yandex.ru/embed/?from=sbal" title="Виджеты Яндекс.Денег" style="width: 200px; height: 100px; display: block; margin-bottom: 0.6em; background: url('https://money.yandex.ru/share-balance.xml?id=277965508&key=102694AB6D3DB88B') 0 0 no-repeat; -background: none; -filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='https://money.yandex.ru/share-balance.xml?id=277965508&key=102694AB6D3DB88B', sizingMethod = 'crop');"></a> <br />
<?php
$array=array(
	'action' => 'get_tasks', 
	'uid' => '1592602',
	'key' => 'Y8oKo67Ck',
	// 'soc_type' => 1, //позволяет отфильтровать задания по одной соц.сети.
	// 'task_type' => 1, //Число - позволяет отфильтровать задания по одному типу заданий (см http://vktarget.ru/developers/#dev?get_tasks )
	// 'substr' => 'prostitutki-murmanska.org', //Подстрока по которой искать задания, будут показано только задания содержащие эту подстроку.
	'limit' => 100 //кол-во отображаемых проектов

);

ksort($array);
$array['key']=md5(http_build_query($array));

$result_url='http://vktarget.ru/api/all.php?'.http_build_query($array);
$response=file_get_contents($result_url);
$result=json_decode($response,true);

$balance = $result[0]['balance']; 
echo "<h3>Баланс: ".$balance.' руб.</h3>';
?>
<table border="1" bordercolor="#CDC9C9">
	<tr>
		<td><b>ID заказа</b><br /><br /></td>
		<td><b>Тип заказа</b><br /><br /></td>
		<td><b>Дата создания</b><br /><br /></td>
		<td><b>Название заказа</b><br /><br /></td>
		<td><b>Статус</b><br /><br /></td>
		<td><b>Действие</b><br /><br /></td>
		<td><b>Привели</b><br /><br /></td>
	</tr>
<?

foreach ($result as $results){
	echo '<tr>';
	foreach ($results as $key => $element) {
		if (preg_match('#^type$#',$key)){
			if ($element == 11){
			echo "<td><b>Твиттер</b></td>";
			} elseif ($element == 3){
			echo "<td><b>ВКонтакте</b></td>";
			} elseif ($element == 21) {
			echo "<td><b>Facebook</b></td>";
			}
		}
		if (preg_match('#^id$#',$key)){
			echo '<td>'. $element .'</td>';
			$task_id = $element;
		}
		if (preg_match('#^task_name$#',$key)){
			echo '<td>'.$element.'</td>';
		}
		if (preg_match('#^status_name$#',$key)){
			echo '<td>'.$element.'</td>';
		}
		if (preg_match('#^date$#',$key)){
			echo '<td>'.$element.'</td>';
		}

		if (preg_match('#^status_name$#',$key,$status)){
			if (preg_match('#Пауза#',$element)){
				echo "<td><a class='btn-success btn' href='http://vktarget.ru/api/all.php?action=set_task_state&uid=1592602&task_id=" . $task_id ."&state=1&key=Y8oKo67Ck' target='_blank'>&nbsp;&nbsp;&nbsp;&nbsp;Запустить&nbsp;&nbsp;&nbsp;&nbsp;</a></td>";
			} elseif (preg_match('#Запущено#',$element)) {
				echo "<td><a class='btn-danger btn' href='http://vktarget.ru/api/all.php?action=set_task_state&uid=1592602&task_id=" . $task_id ."&state=2&key=Y8oKo67Ck' target='_blank'>&nbsp;&nbsp;&nbsp;Остановить&nbsp;&nbsp;</a></td>";
			} else echo "<td><a class='btn-inverse btn' href='#'>На модерации</a></td>";
		}
		if (preg_match('#^persons$#',$key)){
			echo '<td>'.count($element).' / 10</td>';
			// $personinfo = file_get_contents('http://vktarget.ru/api/all.php?action=get_task_users&tid='.$task_id.'&offset=0&limit=70&key='.$array['key']);
			// var_dump($personinfo);
		}
	}
	echo '</tr>';
}
	

?>
</table>
<br />
<span>Написать в техподдержку: <a href="mailto:advers@vktarget.ru">advers@vktarget.ru</a></span>
<br />
<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a><br /><br /><br /><br />
</html>

<?

//отладка
$debug =0;
if ($debug === 1){
	error_reporting( E_ALL );
	ini_set('display_errors', 1);
	echo '<b>идёт отладка: по всем вопросам к Гене Шершову</b><br /><br /><br /><pre>';
	var_dump($result);
	echo '</pre>';
} else {
	error_reporting( E_ERROR );
	ini_set('display_errors', 0);
}
?>