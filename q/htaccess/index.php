<?php
header('Content-type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num)); ?>
<html>
<head>
<title>Редиректы для .htaccess</title>
	<meta name="description" content="Здесь вы можете найти наиболее универсальные правила для настройки зеркал сайта, закрытия дублей страниц и другие настройки .htaccess">
	<meta name="keywords" content="настроить зеркала, настроить редиректы, убрать Index.php, с www на без www, добавить слеш к конце">
	<meta charset="utf-8" />
	<meta name="robots" content="index,follow">
	<meta name="viewport" content="width=device-width" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="/newcss4.css" rel="stylesheet"/>
	<script type="text/javascript">
		function toggle_show(id) {
			document.getElementById(id).style.display = document.getElementById(id).style.display == 'none' ? 'block' : 'none';
		}
	</script>
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
								<td><h1 class="jumbotron">Редиректы для .htaccess</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/htaccess.png" width="80" alt="Редиректы для .htaccess">
								 </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<br><br>
<table>
<tr>
	<td style="vertical-align:top;">
		<input type="submit" value="с www на без www" class="btn-danger btn" id="rollover" onClick="toggle_show('с www на без www')" /><br />
		<input type="submit" value="с www на без www кириллические URL" class="btn-danger btn" id="rollover" onClick="toggle_show('с www на без www кириллические URL')" /><br />
		<input type="submit" value="с без www на c www" class="btn-primary btn" id="rollover" onClick="toggle_show('с без www на c www')" /><br />
		<input type="submit" value="с без www на c www кириллические URL" class="btn-primary btn" id="rollover" onClick="toggle_show('с без www на c www кириллические URL')" /><br />
		<input type="submit" value="с без слеша на слеш" class="btn-success btn" id="rollover" onClick="toggle_show('с без слеша на слеш')" /><br />
		<input type="submit" value="со слеша на без слеша" class="btn-success btn" id="rollover" onClick="toggle_show('со слеша на без слеша')" /><br />
		<input type="submit" value="Добавить завершающий слэш" class="btn-warning btn" id="rollover" onClick="toggle_show('Добавить завершающий слэш')" /><br />
		<input type="submit" value="Убрать завершающий слеш" class="btn-warning btn" id="rollover" onClick="toggle_show('Убрать завершающий слеш')" /><br />
		<input type="submit" value="убрать расширение файлов" class="btn-info btn" id="rollover" onClick="toggle_show('убрать расширение файлов')" /><br />
		<input type="submit" value="Убрать внутренние /index.php" class="btn-inverse btn" id="rollover" onClick="toggle_show('Убрать внутренние /index.php')" /><br />
		<input type="submit" value="Убрать index для главной" class="btn-inverse btn" id="rollover" onClick="toggle_show('Убрать index для главной')" /><br />
		<input type="submit" value="Убрать расширение html" class="btn-inverse btn" id="rollover" onClick="toggle_show('Убрать расширение html')" /><br />
		<input type="submit" value="Верхний регистр в нижний" class="btn-primary btn" id="rollover" onClick="toggle_show('Верхний регистр в нижний')" /><br />
		<input type="submit" value="Запрет для плохих ботов" class="btn-danger btn" id="rollover" onClick="toggle_show('Запрет для плохих ботов')" /><br />
		<input type="submit" value="PHP настройка зеркал" class="btn-info btn" id="rollover" onClick="toggle_show('PHP_mirror')" /><br />
		<input type="submit" value="nginx с www на без www" class="btn-success btn" id="rollover" onClick="toggle_show('nginxtonowww')" /><br />
		<input type="submit" value="nginx с без www на www" class="btn-success btn" id="rollover" onClick="toggle_show('nginxtowww')" /><br />
		<input type="submit" value="IIS c www на без www" class="btn-primary btn" id="rollover" onClick="toggle_show('iistonowww')" /><br />
		<input type="submit" value="IIS с без www на www" class="btn-primary btn" id="rollover" onClick="toggle_show('iistowww')" /><br />
	</td>
	<td>
		<div style='display:none' id="Добавить завершающий слэш" class="toggle">
		<span>Добавить завершающий слэш</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/addslash.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="с без www на c www" class="toggle">
		<span>с без www на c www</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/nowwwtowww.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="Убрать завершающий слеш" class="toggle">
		<span>Убрать завершающий слеш</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/killhtmlslash.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="с без www на c www кириллические URL">
		<span>с без www на c www кириллические URL</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/nowwwtowwwcyrillic.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="убрать расширение файлов">
		<span>убрать расширение файлов (заменить .html на своё)</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/extensionkill.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="Убрать внутренние /index.php">
		<span>Убрать внутренние /index.php (html, htm)</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/internalindexkill.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="Убрать index для главной">
		<span>Убрать index для главной</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/domainindexkill.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="Убрать расширение html">
		<span>Убрать расширение html</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/tonoextension.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="Верхний регистр в нижний">
		<span>Верхний регистр в нижний</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/uptolowcase.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="Запрет для плохих ботов">
		<span>Запрет для плохих ботов (продолжите список, если знаете их имена)</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/badbotdeny.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="ImageCMS">
		<span>ImageCMS</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/image.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="с без слеша на слеш">
		<span>с без слеша на слеш</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/noslashtoslash.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="UMICMS">
		<span>UMI CMS</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/umicms.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="HostCMS">
		<span>HostCMS</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/hostcms.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="с www на без www">
		<span>с www на без www</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/www-nowww.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="Joomla">
		<span>Joomla</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/joomla.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="Wordpress">
		<span>Wordpress</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/wordpress.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="с www на без www кириллические URL">
		<span>с www на без www для кириллических URL</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/www-nowwwcyrillic.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="MODx">
		<span>MODx</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/modx.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="со слеша на без слеша">
		<span>со слеша на без слеша</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/slashtonoslash.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="Opencart">
		<span>Opencart</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/opencart.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="PHP_mirror">
		<span>PHP настройка зеркал</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/php_mirror_rewrite.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea></div>
		<div style='display:none' id="nginxtonowww">
		<span>nginx c www на без www</span><br>
		<span>для настройки требутся SSH доступы.</span><br>
		<span>Прописывается в конфиге nginx. После записи требуется перезапуск nginx: service nginx restart</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/nginxtonowww.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="nginxtowww">
		<span>nginx c без www на www</span><br>
		<span>для настройки требутся SSH доступы.</span><br>
		<span>Прописывается в конфиге nginx. После записи требуется перезапуск nginx: service nginx restart</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/nginxtowww.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="iistonowww">
		<span>IIS c www на без www</span><br>
		<span>Настройки производятся в файле web.config</span><br>
		<span>Должен быть включен модуль URL Rewrite (http://www.iis.net/learn/extensions/url-rewrite-module/using-the-url-rewrite-module)</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/iistonowww.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="iistowww">
		<span>IIS c без www на www</span><br>
		<span>Настройки производятся в файле web.config</span><br>
		<span>Должен быть включен модуль URL Rewrite (http://www.iis.net/learn/extensions/url-rewrite-module/using-the-url-rewrite-module)</span><br>
		<textarea rows="20" cols="500"><?php
		$read = file_get_contents("http://xtoolza.info/q/htaccess/iistowww.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
	</td>
</tr>
</table>
<br><br>
<a href="http://xtoolza.info/q/htaccess/mirror.zip" download>Скачать автонастройщик зеркал</a>
<br><br>
<div style="width: 750px">
	<p><strong>.htaccess</strong> - специальный служебный файл веб-сервера Apache. Он необходим для управления конфигурацией сервера. Он позволяет сделать редиректы с одних адресов на другие; открыть или закрыть доступ к просмотру каталогов; использовать собственные страницы ошибок (401,403,404,500); управлять и перенаправлять роботов; сделать настройки для переноса сайта на новый домен и многое другое.</p>
	<p>Здесь вы можете найти наиболее универсальные правила для настройки зеркал сайта, закрытия дублей страниц и другие настройки .htaccess</p>
	<p>Также предоставлены настройки зеркал с помощью PHP, а также для nginx и IIS</p>
</div>
<br><br>
<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
