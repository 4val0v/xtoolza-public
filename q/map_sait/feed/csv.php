<!DOCTYPE html>
<html>
<?
ignore_user_abort(true);
set_time_limit(0);
?>
<head>
	<title>Выгрузить ссылки url из xml</title>
	<meta name="description" content="Выгрузить ссылки url из xml" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <link href="/q/style.css" rel="stylesheet"/>
  <script src="/q/modernize.js"></script>
  <script src="/q/seotext.js"></script>
  <link href="/q/css.css" rel="stylesheet"/>
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
								<td><h1 class="jumbotron">Выгрузить ссылки url из xml</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/url.png" width="80" alt="Выгрузить ссылки со страницы"></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?php header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num)); ?>
<br />
<form action="checkcsv.php" method="get" name="form">
  <input type="text" name="site" placeholder="Введите адрес csv" autofocus required size="100px" id="enter"><br><br>
  <input type="submit" value="Выгрузить" class="btn-success btn" id="rollover" onclick="
if (document.forms['form']['site'].value != '') {
  document.getElementById('div').style.display = 'block';
}" />
<br /><br />
</form>
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>

<div style="width: 750px">
	<p>Инструмент, позволяющий произвести пакетную выгрузку всех ссылок из xml фида.</p>
	<a href="http://xtoolza.infofeed//tags.php">Выгрузить содержимое произвольных тегов из xml</a>
</div><br>
<br>
<br>
<div style='display:none' id="div">
	<img src='http://xtoolza.info/q/cms/ajax-loader.gif'>&nbsp;&nbsp;&nbsp;<span>Идёт выгрузка ссылок. Пожалуйста, подождите и не закрывайте страницу.</span>
</div>
<body>
</html>
