<!DOCTYPE html>
<html lang="en">
<head>
	<title>URL scheme</title>
	<meta name="description" content="URL scheme" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
</head>
<body id="linearBg1">

<?header('Content-Type: text/html; charset=utf-8');?>
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
								<td><h1 class="jumbotron">URL scheme</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/traffic.png" width="80" alt="URL scheme"> </td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<form action="/q/urlpath.php" method="post">
			<textarea  name="textt" id="textarea" rows="20" cols="500"
			  onclick='if(this.value=="вставьте список URL сюда") this.value=""'
			  onblur='if(this.value=="") this.value="вставьте список URL сюда"'
			>вставьте список URL сюда</textarea><br />
		<input type="submit" value="Проверить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";'/>&nbsp;&nbsp;
		<a class="btn-success btn" href="http://xtoolza.info" rel="nofollow">На главную</a>
		</form>
<table border="1" bordercolor=\"#333333\">
<?
echo "<tr><td><b>Scheme</b></td><td><b>host</b></td><td><b>path</b></td><td><b>query</b></td><td><b>fragment</b></td></tr>";
$plist = explode("\r\n",trim($_POST['textt']));
function result($plist) {
	foreach ($plist as $arraylist) {
		// var_dump($arraylist);
		$out = parse_url($arraylist);

		echo "<tr>";
		echo "<td>".$out['scheme']."</td><td>".$out['host']."</td><td>".$out['path']."</td><td>".$out['query']."</td><td>".$out['fragment']."</td></tr>";
		}
	echo "</table>";
	// return $log;
	}
result($plist);
?>
</body>
</html>

