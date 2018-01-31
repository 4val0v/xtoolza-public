<?php
header('Content-type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num)); ?>
<html>
<head>
	<title>Сравнить 2 массива</title>
	<meta name="description" content="Сравнить 2 массива или 2 списка, используя данный сервис проще, чем писать самостоятельно формулу в Excel или программу для сравнения массивов" />
	<meta name="keywords" content="cравнить 2 массива, сравнить 2 списка" />
	<meta charset="utf-8" />
	<meta name="robots" content="index,follow" />
	<meta name="viewport" content="width=device-width" />
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
	<?php
	$a = array('one','two',3);
	$b = array(0,1,2,3,4,5,6,7,8,9,'one');
	$c = array_intersect($a, $b);
	// echo "<pre>"; print_r($c); echo "</pre>";
	?>
	<p>Пробел - тоже символ!</p>
	<form action="/q/array/array_intersect.php" method="post">
	<table>
		<tr>
				<td>массив 1<br><textarea  name="text1" id="textarea" rows="20" cols="300" style="width:400"></textarea></td>
				<td>массив 2<br><textarea  name="text2" id="textarea" rows="20" cols="300" style="width:400"></textarea></td>
		</tr>
	</table>
	&nbsp;<input type="submit" value="Сравнить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";'/>&nbsp;&nbsp;
	</form>
	<br><br>
	<div style="width: 750px">
		<p><strong>Сравнить 2 массива</strong> или 2 списка, используя данный сервис проще, чем писать самостоятельно формулу в Excel или программу для сравнения массивов</p>
	</div>
	<br><br>
	<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
	<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
	<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
