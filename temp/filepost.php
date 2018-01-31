<html>
<body>
<h3>Проверить POST запрос на удаленный сайт</h3>
<p></p>
<form action="http://rotor.in.ua/1d0978f5ec2fa256b567d9430fea2721/test.php" method="post">

<textarea  name="textt" id="textarea" rows="2" cols="50"
  onclick='if(this.value=="введите текст для передачи через POST") this.value=""'  
  onblur='if(this.value=="") this.value="введите текст для передачи через POST"' 
>введите текст для передачи через POST</textarea><br />
<input type="submit" value="Проверить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";'/>&nbsp;&nbsp;
	 </form>
</body>
</html>

<?/*
error_reporting(E_ALL);
ini_set('display_errors', '1');
if ($_POST['textt'] != ''){
	echo 'Вы передали текст: <span style="color:red"><i>'. $_POST['textt'].'</i></span>';
		$intfile = fopen("test.db","w+");
		$textinfile = $_POST['textt'];
		if (fwrite($intfile,$textinfile)) {
		    echo '<BR><br>file <a href="http://jenskoeschastie.com/a367ca31-5e4d-40a4-b74d-ddf105fdd10f/test/test.db" target="_blank">test.db</a> создан';
        }
		else {
		    echo "<br>file created: <span style='color:red'><b>false</b></span><br>";
        }
		fclose($intfile);
	}
else die('Поле должно быть заполнено!');  
*/
?>