<?php
header('Content-Type: text/html; charset=utf-8'); 
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Пакетная транслитерация кириллицы в translit</title>
	<meta name="description" content="Пакетная транслитерация кириллицы в translit" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="all" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
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
								<td><h1 class="jumbotron">Пакетная транслитерация кириллицы в translit</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/translit.png" width="80" alt="Пакетная транслитерация кириллицы в translit"></td>
							</tr> 
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
			<form action="/q/translit/translited.php" method="post">
			<textarea  name="name" id="textarea" rows="20" cols="500"
			  onclick='if(this.value=="вставьте список киррилических имен") this.value=""'  
			  onblur='if(this.value=="") this.value="вставьте список киррилических имен"' 
			>вставьте список киррилических имен</textarea><br />
			<input type="submit" value="Перевести" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";'/>&nbsp;&nbsp;
			<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
			</form>
<div style="width: 750px">
<p><strong>Транслитерация из кириллицы в транслит</strong>. Данный инструмент будет удобен в первую очередь для составления ЧПУ адресов страниц.</p>
</div>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>