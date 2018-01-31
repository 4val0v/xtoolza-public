<html>
<head>
<title>Colored Text</title>
	<meta charset="utf-8" />
	<meta name="robots" content="index,follow">
	<meta name="viewport" content="width=device-width" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="/newcss4.css" rel="stylesheet"/>
</head>
<body id="linearBg1">
<h1 class='jumbotron'>Разукрасить текст</h1>
<script type="text/javascript" src="http://xtoolza.info/q/uni/color.js"></script>
<br>
<span id="result" style="background-color: white;"></span><br /><br />
<form name="color_form" action="javascript:char_random()">
<textarea name="string" rows="20" cols="500"
	  onclick='if(this.value=="Ваш текст, который нужно разукрасить") this.value=""'  
	  onblur='if(this.value=="") this.value="Ваш текст, который нужно разукрасить"' 
	>Ваш текст, который нужно разукрасить</textarea>
<br>
<table>
	<tr>
		<td>
	<select name="whois_rand">
		<option value="">Разукрасить буквы</option>
		<option value=" ">Разукрасить слова</option>
	</select>
		</td>
		<td>
			<input type="submit" value="Поехали" class="btn-primary btn" style="margin-top:-10px;">
		</td>
	</tr>
</table>
<br><br>
<p>html-код:</p>
<textarea name="res_code" rows="4" cols="55"></textarea>
</form><br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>