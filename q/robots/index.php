<?php
header('Content-type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num)); ?>
<html>
<head>
<title>Правильные robots.txt для CMS</title>
	<meta name="description" content="robots.txt – это текстовый файл, который лежит в корне сайта. В файле содержатся различные инструкции для поисковых и не только роботов. Посмотреть стандартные настройки для CMS для роботс можно на этой странице" />
	<meta name="keywords" content="robots.txt для joomla, robots.txt для wordpress, robots.txt для bitrix, robots.txt для drupal, robots.txt для webasyst, robots.txt для DLE, robots.txt для ucoz" />
	<meta charset="utf-8" />
	<meta name="robots" content="index,follow">
	<meta name="viewport" content="width=device-width" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="/newcss4.css" rel="stylesheet"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript">
		function toggle_show(id) {
			var toggleElements = document.querySelectorAll(".toggle");
			var toogledElement = document.querySelector("#" + id);
			for(var i = 0; i< toggleElements.length; i++) {
			toggleElements[i].style.display = "none";// скрываем все
			}
			toogledElement .style.display = toogledElement .style.display == 'none' ? 'block' : 'none';// работаем с нужным блоком
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
								<td><h1 class="jumbotron">Правильные robots.txt для CMS</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/robots_txt.png" width="80" alt="Правильные robots.txt для CMS">
								 </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<table>
<tr>
	<td style="vertical-align:top;">
		<table class="total">
			<tr>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('Amiro')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/amiro.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>Amiro</b></span>
					</div>
				</td>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('Bitrix')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/bitrix.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>Bitrix</b></span>
					</div>
				</td>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('DLE')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/dle.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>DLE</b></span>
					</div>
				</td>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('Drupal')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/drupal.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>Drupal</b></span>
					</div>
				</td>
			</tr>
			<tr>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('InstantCMS')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/instantcms.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>InstantCMS</b></span>
					</div>
				</td>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('ImageCMS')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/imagecms.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>ImageCMS</b></span>
					</div>
				</td>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('HostCMS')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/hostcms.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>HostCMS</b></span>
					</div>
				</td>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('Joomla')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/joomla.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>Joomla</b></span>
					</div>
				</td>
			</tr>
			<tr>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('LiveStreet')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/livestreet.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>LiveStreet</b></span>
					</div>
				</td>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('Magento')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/magneto.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>Magento</b></span>
					</div>
				</td>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('MODx')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/modx.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>MODx</b></span>
					</div>
				</td>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('NetCat')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/netcat.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>NetCat</b></span>
					</div>
				</td>
			</tr>
			<tr>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('Opencart')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/opencart.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>Opencart</b></span>
					</div>
				</td>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('PHPShop')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/phpshop.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>PHPShop</b></span>
					</div>
				</td>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('Simpla')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/simplacms.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>Simpla</b></span>
					</div>
				</td>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('Typo3')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/typo3.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>Typo3</b></span>
					</div>
				</td>
			</tr>
			<tr>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('UMICMS')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/umicms.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>UMI CMS</b></span>
					</div>
				</td>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('UCOZ')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/ucoz.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>UCOZ</b></span>
					</div>
				</td>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('WebAsyst')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/webasyst.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>WebAsyst</b></span>
					</div>
				</td>
				<td style="padding-bottom:50px; padding: 10px;">
					<div onClick="toggle_show('Wordpress')" style="text-align: center;">
						<img src="http://xtoolza.info/q/robots/images/wordpress.png" width="45px" style='cursor: pointer;'>
						<br/><span style='cursor: pointer;'><b>Wordpress</b></span>
					</div>
				</td>
			</tr>
		</table>
	</td>
	<td>
		<div style='display:none' id="LiveStreet" class="toggle">
		<span>LiveStreet</span><br>
		<textarea rows="18" cols="450" id="d_clip_button"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/livestreet.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="Simpla" class="toggle">
		<span>Simpla</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/simpla.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="InstantCMS" class="toggle">
		<span>InstantCMS</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/instantcms.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="Typo3" class="toggle">
		<span>Typo3</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/typo3.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="UCOZ" class="toggle">
		<span>UCOZ</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/ucoz.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="WebAsyst" class="toggle">
		<span>WebAsyst Shop-Script</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/webasyst.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="PHPShop" class="toggle">
		<span>PHPShop</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/phpshop.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="NetCat" class="toggle">
		<span>NetCat</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/netcat.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="Magento" class="toggle">
		<span>Magento</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/magento.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="ImageCMS" class="toggle">
		<span>ImageCMS</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/image.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="DLE" class="toggle">
		<span>DLE (Data life Engine)</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/dle.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="UMICMS" class="toggle">
		<span>UMI CMS</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/umicms.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="HostCMS" class="toggle">
		<span>HostCMS</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/hostcms.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="Amiro" class="toggle">
		<span>Amiro CMS</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/amiro.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="Joomla" class="toggle">
		<span>Joomla</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/joomla.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="Wordpress" class="toggle">
		<span>Wordpress</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/wordpress.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea></div>
		<div style='display:none' id="Bitrix" class="toggle">
		<span>Bitrix</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/bitrix.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea></div>
		<div style='display:none' id="MODx" class="toggle">
		<span>MODx</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/modx.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea></div>
		<div style='display:none' id="Drupal" class="toggle">
		<span>Drupal</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/drupal.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
		<div style='display:none' id="Opencart" class="toggle">
		<span>Opencart</span><br>
		<textarea rows="18" cols="450"><?php
		$read = file_get_contents("http://xtoolza.info/q/robots/opencart.txt");
		echo iconv("UTF-8", "Windows-1251", $read);
		?>
		</textarea>
		</div>
	</td>
</tr>
</table>
<br><br>
<div style="width: 750px">
	<p>Файл <strong>robots.txt</strong> – это текстовый файл, который лежит в корне сайта. В файле содержатся различные инструкции для поисковых и не только роботов. Они могут запрещать к индексации некоторые разделы, категории, каталоги или страницы сайта; показать поисковым роботам, какое зеркало сайта является главным; указать путь к карте сайта; задать желательный интервал для робота между скачиванием документов, страниц с сервера сайта и т.д.</p>
	<p>Здесь мы можете посмотреть стандартные и <strong>правильные robots.txt</strong> для представленного списка популярных CMS.</p>
</div>
<br><br>
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
