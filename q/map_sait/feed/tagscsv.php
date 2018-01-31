<!DOCTYPE html>
<html>
<?
ignore_user_abort(true);
set_time_limit(0);
?>
<head>
	<title>Выгрузить содержимое произвольного тега из CSV</title>
	<meta name="description" content="Выгрузить содержимое произвольного тега из CSV" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>
	<link href="http://reentermanual.local/newcss4.css" rel="stylesheet"/>
	<script type="text/javascript" src="http://yandex.st/jquery/1.7.1/jquery.min.js"></script>
</head>
<body id="linearBg1">

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
								<td><h1 class="jumbotron">Выгрузить содержимое произвольного тега из CSV</h1></td>
							</tr>
							<tr>
								<td><img src="http://reentermanual.local/q/images/url.png" width="80" alt="Выгрузить содержимое произвольного тега из CSV"></td>
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
<form action="checktagscsv.php" method="get" name="form" enctype="multipart/form-data">
  <input type="text" name="tag" placeholder="Введите ID тега" autofocus required size="100px"><br><br>
  <input type="text" name="site" placeholder="Введите адрес csv" autofocus required size="100px"><br><br>
  <input type="submit" value="Выгрузить" class="btn-success btn" id="rollover" onclick="
if ((document.forms['form']['tag'].value != '')&&(document.forms['form']['site'].value != '')) {
  document.getElementById('div').style.display = 'block';
}" />
<br />
</form>
<div style="width: 750px">
<p>Инструмент, позволяющий произвести пакетную выгрузку содержимого произвольного тега из xml фида.</p>
</div>
<p style="font-weight:bold"><span style="color:red">Доступные теги:<br></span>0 - ID,<br>1 - Item title,<br>2 - Image URL,<br> 3 - Destination URL,<br> 4 - Item Description,<br> 5 - Price, <br> 6 - Sale Price</p>
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://reentermanual.local">На главную</a>
<div style='display:none' id="div"><img src='http://reentermanual.local/q/ajax-loader.gif'>&nbsp;&nbsp;&nbsp;<span>Идёт выгрузка. Пожалуйста, подождите и не закрывайте страницу.</span></div>
<body>
</html>
