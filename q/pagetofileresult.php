<?
header('Content-Type: text/html; charset=utf-8');
ignore_user_abort(true);
set_time_limit(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Скачать страницы</title>
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
								<td><h1 class="jumbotron">Скачать страницы</h1></td>
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
<?
echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>URL</b></td><td><b>Download txt</b></td><td><b>Download html</b></td></tr>";
$plist = explode("\r\n",$_POST['textt']);

function result($plist){
	foreach ($plist as $arraylist) {
		$arraylist = preg_replace('~^(http://)|(https://)~i', '', $arraylist, 1); //отрезаем http или https, чтобы не выводить страницу на экран
		// var_dump($arraylist);
		echo "<tr><td>".'<a href="http://'. $arraylist . '" target="_blank" >'.$arraylist.'</a>'. "</td>";
		echo '<td>';vWritePageToFile($arraylist,$sTxtfile);echo '</td><td>';vWritePageToHtml($arraylist,$sHtmlfile);echo'</td>';
		// var_dump($sTxtfile);
		}
	echo "</table>";
}
result($plist);

function vWritePageToFile( $arraylist, $sTxtfile ) {
	$sTxtfile = 'logs/pages/'.$arraylist.'.txt';
	$sh = curl_init( $arraylist );
	$hFile = FOpen( $sTxtfile, 'w' );
	curl_setopt( $sh, CURLOPT_FILE, $hFile );
	curl_setopt( $sh, CURLOPT_HEADER, 0 );
	curl_setopt($sh, CURLOPT_FOLLOWLOCATION, true);
	curl_exec  ( $sh );
	$sAverageSpeedDownload = curl_getInfo( $sh, CURLINFO_SPEED_DOWNLOAD );
	$sAverageSpeedUpload   = curl_getInfo( $sh, CURLINFO_SPEED_UPLOAD );
	// echo '<pre>';
	// echo 'Average speed download == ' . $sAverageSpeedDownload . '<br>';
	// echo 'Average Speed upload    == ' . $sAverageSpeedUpload   . '<br>';
	// echo '<br>';
	$aCURLinfo = curl_getInfo($sh);
	// print_r( $aCURLinfo );
	// echo '</pre>';
	curl_close($sh);
	FClose ($hFile);
	echo '<a href="http://xtoolza.info/q/'.$sTxtfile.'" download>Скачать .txt</a>';
}
function vWritePageToHtml( $arraylist, $sHtmlfile ) {
	$sHtmlfile = 'logs/pages/'.$arraylist.'.html';
	$sh = curl_init( $arraylist );
	$hFile = FOpen( $sHtmlfile, 'w' );
	curl_setopt( $sh, CURLOPT_FILE, $hFile );
	curl_setopt( $sh, CURLOPT_HEADER, 0 );
	curl_setopt($sh, CURLOPT_FOLLOWLOCATION, true);
	curl_exec  ( $sh );
	$sAverageSpeedDownload = curl_getInfo( $sh, CURLINFO_SPEED_DOWNLOAD );
	$sAverageSpeedUpload   = curl_getInfo( $sh, CURLINFO_SPEED_UPLOAD );
	// echo '<pre>';
	// echo 'Average speed download == ' . $sAverageSpeedDownload . '<br>';
	// echo 'Average Speed upload    == ' . $sAverageSpeedUpload   . '<br>';
	// echo '<br>';
	$aCURLinfo = curl_getInfo($sh);
	// print_r( $aCURLinfo );
	// echo '</pre>';
	curl_close($sh);
	FClose ($hFile);
	echo '<a href="http://xtoolza.info/q/'.$sHtmlfile.'" download>Скачать .html</a>';
}

?>
<br />
<form class="btn">
<input type="button" border="0" value="Назад" onClick="history.back()">
</form>&nbsp;&nbsp;&nbsp;

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
	(w[c] = w[c] || []).push(function() {
		try {
			w.yaCounter25643246 = new Ya.Metrika({id:25643246,
					webvisor:true,
					clickmap:true,
					trackLinks:true,
					accurateTrackBounce:true});
		} catch(e) { }
	});

	var n = d.getElementsByTagName("script")[0],
		s = d.createElement("script"),
		f = function () { n.parentNode.insertBefore(s, n); };
	s.type = "text/javascript";
	s.async = true;
	s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

	if (w.opera == "[object Opera]") {
		d.addEventListener("DOMContentLoaded", f, false);
	} else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/25643246" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
