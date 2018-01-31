<?php header('Content-Type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Сохранить страницы в файл</title>
	<meta name="description" content="Инструмент, позволяющий массово и пакетно скачать и сохранить исходный код страниц в txt и html файлы" />
	<meta name='robots' content='all' />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<link href="/q/style.css" rel="stylesheet"/>
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
								<td><h1 class="jumbotron">Сохранить страницы в файл</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/save.png" width="80" alt="Сохранить страницы в файл"> </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<form action="/q/pagetofileresult.php" method="post">
	<textarea  name="textt" id="textarea" rows="20" cols="500"
	  onclick='if(this.value=="вставьте список целевых страниц сюда") this.value=""'
	  onblur='if(this.value=="") this.value="вставьте список целевых страниц сюда"'
	>вставьте список целевых страниц сюда</textarea><br />
	<input type="submit" value="Проверить" class="btn-success btn">&nbsp;&nbsp;
	<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
</form>
<? include ($_SERVER["DOCUMENT_ROOT"].'/yandex_metrika.php'); ?>
<body>
</html>
