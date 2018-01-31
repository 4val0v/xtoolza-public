<!DOCTYPE html>
<html>
<head>
	<title>Proxy 3</title>
	<meta name="description" content="Proxy 3" />
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
								<td><h1 class="jumbotron">Proxy 3</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/proxy3.png" width="80" alt="Proxy 3"> </td>
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
<form action="result.php" method="get">
<input type="text" name="site" value="Введите адрес страницы" onclick='if(this.value=="Введите адрес страницы") this.value=""' onBlur='if(this.value=="") this.value="Введите адрес страницы"'><br><br>
<input type="submit" value="Открыть" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";' /><br /><br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
</form>
<div style="width: 750px">
<p>Прокси-сервер 3</p>
</div>


<div style='display:none' id="div"><img src='http://xtoolza.info/q/cms/ajax-loader.gif'>&nbsp;&nbsp;&nbsp;<span>Загрузка</span></div>

<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
<body>
</html>
