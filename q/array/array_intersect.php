<?php
header('Content-type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num)); ?>
<html>
<head>
	<title>Сравнить 2 массива</title>
	<meta charset="utf-8" />
	<meta name="robots" content="noindex,nofollow">
	<meta name="viewport" content="width=device-width" />
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/newcss4.css" rel="stylesheet"/>
</head>
<body id="linearBg1">
	<div style="align:left;">
		<table>
			<tbody>
				<tr>
					<td>
						<div class="TmgWrae">
							<a href="http://xtoolza.info" rel="nofollow"><img class="image UE" src="http://xtoolza.info/q/images/logo.png" width="120px" border="0" width="120px"><img class="image Dowe" src="http://xtoolza.info/q/images/logo_new.png" width="120px" /></a>
						</div>
					</td>
					<td>
						<table>
							<tbody>
								<tr>
									<td><h1 class="jumbotron">Сравнить 2 массива</h1></td>
								</tr>
								<tr>
									<td><img src="http://xtoolza.info/q/images/array.png" width="80" alt="Сравнить 2 массива"> </td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
<?
$list1 = explode("\r\n",$_POST['text1']);
$list2  =explode("\r\n",$_POST['text2']);
// var_dump($list1);
// var_dump($list2);
$result = array_intersect($list1, $list2);
$result2 = array_diff($list1, $list2);
$result3 = array_diff($list2, $list1);
?>

<?
echo "<table><tr><td style='vertical-align: top;'><b>Схождения (что есть в обоих массивах):</b><br />";
echo $separated = implode('<br>',$result);
echo "</td><td style='vertical-align: top;'><b>Расхождения (чего нет в 1 массиве):</b><br />";
echo $separated2 = implode('<br>',$result2);
echo "</td><td style='vertical-align: top;'><b>Расхождения (чего нет во 2 массиве):</b><br />";
echo $separated3 = implode('<br>',$result3);
echo "</td></tr></table>";
?>
<br><br><br><br><br>
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
