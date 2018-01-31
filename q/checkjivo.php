<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Jivosite Checker</title>
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
					<a href="http://xtoolza.info" rel="nofollow"><img src="http://xtoolza.info/q/images/logo.png" width="120px"></a>
				</td>
				<td>
					<table>
						<tbody>
							<tr>
								<td><h1 class="jumbotron">Jivosite checker</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/jivo.png" width="80" alt="Jivosite checker"> </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?php header('Content-Type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);
?>
<form action="/q/checkerjivo.php" method="post">
	<textarea  name="textt" id="textarea" rows="20" cols="500"
	  onclick='if(this.value=="вставьте список целевых страниц сюда") this.value=""'
	  onblur='if(this.value=="") this.value="вставьте список целевых страниц сюда"'
	>вставьте список целевых страниц сюда</textarea><br />
	<input type="submit" value="Проверить" class="btn-success btn">&nbsp;&nbsp;
	<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
</form>
<div style="width:750px;">
	<p>Инструмент позволяет проверить установлен ли на сайте клиент jivosite</p>
</div>
<body>
</html>
