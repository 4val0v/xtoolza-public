<? header('Content-type: text/html; charset=utf-8'); 
ini_set('display_errors', E_ERROR);
error_reporting(0);
set_time_limit(0);
ignore_user_abort(true);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Пакетная транслитерация кириллицы в translit</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="index, follow" />
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
					<a href="http://xtoolza.info" rel="nofollow"><img src="http://xtoolza.info/q/images/logo.png" width="120px"></a>
				</td>
				<td>
					<table>
						<tbody>
							<tr>
								<td><h1 class="jumbotron">Пакетная транслитерация кириллицы в translit</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/translit.png" width="80" alt="Пакетная транслитерация кириллицы в translit"></td>
							</tr> 
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div> 
<?
echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>Старое имя</b></td><td><b>Новое имя</b></td></tr>"; 
$names = explode("\r\n",trim($_POST['name'])); 
translit($names);

function translit($names){
	foreach ($names as $name){
		$name = htmlspecialchars($name);
		echo '<tr>';
		echo "<td><b>".$name."</b></td>";
		echo '<td>'.translitText($name).'</td>';
		echo '</tr>';
		file_put_contents('../logs/translitlogs.txt', $name.' '.translitText($name).PHP_EOL);
		}
	}

function translitText($str) 
{
	$tr = array(
		"А"=>"a","Б"=>"b","В"=>"v","Г"=>"g",
		"Д"=>"d","Е"=>"e","Ж"=>"j","З"=>"z","И"=>"i",
		"Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n",
		"О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t",
		"У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"ts","Ч"=>"ch",
		"Ш"=>"sh","Щ"=>"sch","Ъ"=>"","Ы"=>"y","Ь"=>"",
		"Э"=>"e","Ю"=>"yu","Я"=>"ya","а"=>"a","б"=>"b",
		"в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
		"з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
		"м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
		"с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
		"ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"",
		"ы"=>"y","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya","("=>"_",")"=>"_","."=>"_","/"=>"_",","=>"_"," "=>"_"
	);
	return strtr($str,$tr);
}
?>
</table>
<br />
<br />
<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>