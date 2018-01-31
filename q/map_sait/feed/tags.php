<? include($_SERVER['DOCUMENT_ROOT'].'/includes/html_scripts.php'); ?>
<!DOCTYPE html>
<html>
<?
ignore_user_abort(true);
set_time_limit(0);
?>
<head>
	<title>Выгрузить содержимое произвольного тега из xml</title>
	<meta name="description" content="Выгрузить ссылки url из xml" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<link href="/q/style.css" rel="stylesheet"/>
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://reentermanual.local/newcss4.css" rel="stylesheet"/>
	<script type="text/javascript" src="http://yandex.st/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://reentermanual.local/js/totop.js"></script>
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
								<td><h1 class="jumbotron">Выгрузить содержимое произвольного тега из xml</h1></td>
							</tr>
							<tr>
								<td><img src="http://reentermanual.local/q/images/url.png" width="80" alt="Выгрузить содержимое произвольного тега из xml"></td>
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

<form action="checktags.php" method="post" name="form">
  <input type="text" name="tag" placeholder="Введите название тега, из которого надо получить содержимое БЕЗ <> и </>" autofocus required size="100px"><br><br>
  <input type="text" name="site" placeholder="Введите адрес xml" autofocus required size="100px"><br><br>
  <input type="submit" value="Выгрузить" class="btn-success btn" id="rollover" onclick="
if ((document.forms['form']['tag'].value != '')&&(document.forms['form']['site'].value != '')) {
  document.getElementById('div').style.display = 'block';
}" />
<br />
</form>

<div style="width: 750px">
<p>Инструмент, позволяющий произвести пакетную выгрузку содержимого произвольного тега из xml фида.</p>
</div>
<?backbuttons();loading();?>

<body>
</html>
