<!DOCTYPE HTML>
<html>
<?
Header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); //Дата в прошлом  
Header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1  
Header("Pragma: no-cache"); // HTTP/1.1  
Header("Last-Modified: ".gmdate("D, d M Y H:i:s")."GMT"); 
// error_reporting( E_ALL );
// ini_set('display_errors', 1);
ignore_user_abort(true);
set_time_limit(0);
?>
<head>
	<title>Создать карту сайта из списка URL</title>
	<meta name="description" content="Инструмент позволяет создать карту сайта из заданного списка URL" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="index, follow" />
	<link href="/q/style.css" rel="stylesheet"/>
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
</head>
<body id="linearBg1">

<?header('Content-Type: text/html; charset=utf-8');?>
<div style="align:left;">
	<table>
		<tbody>
			<tr>
				<td>
					<a href="http://xtoolza.info" rel="nofollow"><img src="http://xtoolza.info/q/images/logo.png" width="120px"></a>
				</td>
				<td>
					<table>
						<tbody>
							<tr>
								<td><h1 class="jumbotron">Создать карту сайта из списка URL</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/sitemapcreate.png" width="80" alt="стоит ли на сайте toolza"></td>
							</tr> 
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<form action="generate.php" method="post" enctype="multipart/form-data">
    <input type="file" name="filename"><br> 
    <input type="submit" value="Загрузить"><br>
</form>

<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a><br><br>

<? include ('../../../yandex_metrika.php'); ?>
</body>
</html>