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
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
	<script type="text/javascript" src="scripts/shCore.js"></script>
	<script type="text/javascript" src="scripts/shBrushJScript.js"></script>
	<link type="text/css" rel="stylesheet" href="styles/shCoreMidnight.css"/>
	<script type="text/javascript">SyntaxHighlighter.all();</script>
	<script type="text/javascript" src="scripts/shAutoloader.js"></script>
	<script language="javascript" src="scripts/shBrushXml.js"></script>
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
<pre name="code" class="brush: html">
&lt;title&gt;<?php echo($_POST['title']); ?>&lt;/title&gt;
&lt;meta name="description" content="<?php echo($_POST['description']); ?>"&gt;
&lt;meta name="keywords" content="<?php echo($_POST['keywords']); ?>"&gt;
&lt;meta http-equiv="Content-Type" content="text/html"; charset="<?php echo($_POST['charset']); ?>"&gt;
<?php
$a1=$_POST['radiobut'];
if ($a1=="yes")
   {
echo('&lt;meta http-equiv="Pragma" content="no-cache"&gt;').PHP_EOL;
   }
?>
&lt;meta name="author" content="<?php echo($_POST['author']); ?>"&gt;
&lt;meta name="copyright" content="<?php echo($_POST['copyright']); ?>"&gt;
&lt;meta name="generator" content="<?php echo($_POST['generator']); ?>"&gt;
&lt;meta name="reply-to" content="<?php echo($_POST['reply-to']); ?>"&gt;
</pre>
<br><input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
