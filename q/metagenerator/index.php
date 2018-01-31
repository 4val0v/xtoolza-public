<?php header('Content-Type: text/html; charset=uft-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Мета Генератор</title>
	<meta name="description" content="Мета Генератор" />
	<meta name="keywords" content="Мета Генератор" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!--link href="/q/style.css" rel="stylesheet"/-->
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
</head>
<body id="linearBg1">
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
								<td><h1 class="jumbotron">Мета генератор</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/metagen.jpg" width="75" alt="Мета генератор"> </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
	<form method="post" action="result.php" id="form">
		<table>
			<tr>
				<td><input type="text" name="title" size="50"></td><td>введите заголовок</td><br>
			</tr>
			<tr>
				<td><textarea name="description" cols="51"></textarea></td><td>введите описание страницы (description)</td>
			</tr>
			<tr>
				<td><input type="text" name="keywords" size="50"></td><td>введите ключевые слова (keywords), через запятую</td>
			</tr>
			<tr>
				<td><input type="text" name="charset" size="50"></td><td>введите кодировку</td><br>
			</tr>
			<tr>
				<td><b>Кешировать страницу?</b></td><td><input type="radio" name="radiobut" value="yes">да<input type="radio" name="radiobut" value="no">нет</td>
			</tr>
			<tr>
				<td><input type="text" name="author" size="50"></td><td>введите ваше имя (author)</td>
			</tr>
			<tr>
				<td><input type="text" name="copyright" size="50"></td><td>информация об авторских правах (copyright)</td>
			</tr>
			<tr>
				<td><input type="text" name="generator" size="50"></td><td>инструмент, при помощи которога была сделана страница (generator)</td>
			</tr>
			<tr>
				<td><input type="text" name="reply-to" size="50"></td><td>определяет адрес электронной почты для связи с разработчиком (reply-to)</td>
			</tr>
		</table>
		<table>
			<tr>
				<td><input type="submit" value="Сгенерировать" class="btn-success btn"></td>
				<td><button type="button" onclick="form.reset()">Очистить</button></td>
			</tr>
			<tr>
				<td><a class="btn-success btn" href="http://xtoolza.info">На главную</a><br><br></td>
			</tr>

		</table>
	</form>
<script>
	form.title.value = form.description.value = form.description.value = form.keywords.value = form.charset.value = form.author.value = form.copyright.value = form.generator.value = form.reply-to.value = '';
</script>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
