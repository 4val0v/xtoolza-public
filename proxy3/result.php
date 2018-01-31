<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="noindex, follow" />
    <title>Proxy 3</title>
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
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
								<td><h1 class="jumbotron">Proxy 3 (используется IP владельца)</h1></td>
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
<center>
<?
header('Content-Type: text/html; charset=utf-8');
$get = $_GET['site'];
$get = str_replace('http://','',$get);
$contents = 'http://'.$get;
?>
<form action="result.php" method="get">
<input type="text" name="site" value="Введите адрес страницы" onclick='if(this.value=="Введите адрес страницы") this.value=""' onBlur='if(this.value=="") this.value="Введите адрес страницы"' style="height:30px; width:600px"><input type="submit" value="Открыть" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";' style="margin-top:-9px;"/><br /><br />

</form>
<div style='transform-origin: 0 0; transform: scale(0.9); margin-left: 80px;'>
<iframe src="<?echo $contents;?>" sandbox="allow-scripts" width="100%" height="100%" align="center"></iframe>
</div>
</center>
<br>
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
<? include ('../../../yandex_metrika.php'); ?>
</body>
</html>
