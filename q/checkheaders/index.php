<?php header('Content-Type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Получить статус коды страниц</title>
	<meta name="description" content="Инструмент пакетной проверки HTTP статус кодов страниц сайта. Проверить статус-код целевой страницы онлайн.">
	<meta name="keywords" content="проверить статус код, узнать статус страницы, проверить HTTP-код">
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
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
								<td><h1 class="jumbotron">Получить статус коды страниц</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/statuscode.png" width="80" alt="Получить статус коды страниц"> </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<form action="index.php" method="POST">
	<textarea name='url'></textarea>
	<button type="submit">Send</button>
</form>
<?php
	if(!empty($_POST["url"])){
		$url = $_POST['url'];
		$links = explode("\r\n",$url);
		$count = count($links);
		for ($i =0; $count > $i; $i++)
		{
			$url = $links[$i];
			$head = get_headers($url);
			$code = $head[0];
			echo "$url $code";
			echo "<br>";
		}
				}
?>


<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
