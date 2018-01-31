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
<?php header('Content-Type: text/html; charset=utf-8');?>
<br />
<form action="checkurls.php" method="get" name="form">
  <input type="text" name="site" placeholder="Введите адрес xml" autofocus required size="100px"><br><br>
  <input type="submit" value="Выгрузить" class="btn-success btn" id="rollover" onclick="
if (document.forms['form']['site'].value != '') {
  document.getElementById('div').style.display = 'block';
}" />
</form>

<div style="width: 750px">
	<p>Инструмент, позволяющий произвести пакетную выгрузку всех ссылок из xml фида.</p>
</div>
<br>
<br>
<div style='display:none' id="div"><img src='http://xtoolza.info/q/cms/ajax-loader.gif'>&nbsp;&nbsp;&nbsp;<span>Идёт выгрузка ссылок. Пожалуйста, подождите и не закрывайте страницу.</span></div>
<body>
</html>
