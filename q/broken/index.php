<!DOCTYPE HTML>
<? header('Content-type: text/html; charset=utf-8');
$num=mt_rand(2000,10000);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="robots" content="all">
	<title>Поиск внешних и битых ссылок</title>
	<meta name="description" content="Пакетная проверка внешних и битых ссылок на сайте. С помощью этого инструмента вы можете найти и проверить внешние и битые ссылки на сайте онлайн">
	<meta name="keywords" content="найти внешние ссылки, проверить внешние ссылки, найти битые ссылки, поиск битых ссылок">
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<script src="jquery.js" type="text/javascript"></script>
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
	<script src="light.js" type="text/javascript"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
					function PushTheButton(TEvent) {
							if (TEvent.keyCode == 13) {
									if (document.getElementById('broken_site').focused)
											build_map();
							}
					}
					$(document).bind('keyup', PushTheButton);
			});
	</script>
</head>
<body onload="$('#broken_site').focus()" id="linearBg1">
<table id="tablespecial">
	<tr>
		<td style="vertical-align:top;">
			<div id="broken_map">
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
												<td><h1 class="jumbotron">Поиск внешних и битых ссылок</h1></td>
											</tr>
											<tr>
												<td><img src="http://xtoolza.info/q/images/links.png" width="80" alt="Поиск внешних и битых ссылок"> </td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<p>Введите адрес сайта:</p>
				<br>
				<input id='broken_site' type='text' name='broken_site' maxlength='100' style='width:250px' onfocus="this.focused=true;" onblur="this.focused=false;"><br><br>
				<input class="btn-success btn" type='button' value='Построить' onClick='build_map();'>
				<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a><br /><br />
				<span style="size:1px">* в зависимости от объема сайта процедура может занять некоторое время.</span><br />
				<br><br>
				<div style='display:none' id="div"><img src='http://xtoolza.info/q/cms/ajax-loader.gif' alt="Loading...">&nbsp;&nbsp;&nbsp;<span>Идёт проверка. Пожалуйста, подождите и не закрывайте страницу.</span></div>
				<div style="width:750px">
					<p><strong>Внешние ссылки</strong> - это ссылки, которые ведут с вашего сайта на какой-то другой. Такие ссылки лучше закрывать от поисковых роботов с помощью специального атрибута rel="nofollow" <br><i>(напр.: &lt;a href="site.ru" rel="nofollow"&gt;ссылка&lt;/a&gt;)</i>.<br>
					<strong>Битые ссылки</strong> - это ссылки, которые ведут на несуществующую страницу. Такая страница может быть как рамках вашего сайта, так и внешнего. Такие ссылки очень опасны, так как переходя по таким ссылкам, пользователь маловероятно вернется обратно на ваш сайт, а скорее уйдёт обратно в поиск.</p>
					<p>Данный инструмент позволяет выгрузить все внешние ссылки, а также битые ссылки с сайта.</p>
				</div><br>
				<div id='show_map' style='display :none;'></div>
			</div>
		</td>
	</tr>
</table>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
