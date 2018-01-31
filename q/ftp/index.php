<?php header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>FTP checker</title>
	<meta name="description" content="FTP checker" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<script type="text/javascript" src="http://yandex.st/jquery/1.7.1/jquery.min.js"></script>
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
								<td><h1 class="jumbotron">FTP checker</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/ftp/ftp.png" width="80" alt="FTP checker"> </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<table>
	<tr>
		<td>
		<form action="/q/ftp/ftp.php" method="post">
			<textarea  name="text" id="textarea" rows="20" cols="500"
			  onclick='if(this.value=="вставьте сюда доступы - разделитель пробел") this.value=""'
			  onblur='if(this.value=="") this.value="вставьте сюда доступы - разделитель пробел"'
			>вставьте сюда доступы - разделитель пробел</textarea><br />
			<input type="submit" value="Проверить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";'/>&nbsp;&nbsp;
			<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
		</form>
	 	</td>
	</tr>
</table>
<div style='display:none' id="div"><img src='http://xtoolza.info/q/images/300.GIF' alt="Loading..."><span style="padding-left:25px;">FTP проверяются. Пожалуйста, подождите и не закрывайте страницу.</span></div>
	<p><b>Проверить валидность доступов FTP</b></p>
	<p>Доступы должны быть введены через пробел (ftp.site.ru login password). Каждые новые доступы с новой строки.</p>
<? include ('../../yandex_metrika.php'); ?>
<!--noindex--><p><a href="http://xtoolza.info/q/checktoolza/" rel="nofollow">стоит ли на сайте тулза</a></p><!--/noindex-->
</body>
</html>
