<html>
<head>
  <title>Загрузка файлов на сервер</title>
  <style type="text/css">
   .inputer {
    width: 800px; /* Ширина в пикселах */
   }
  </style>
  	<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
</head>
<body>	<div style="padding:10px 5px 2px 30px">
      <h2><p><b>Форма для загрузки файла</b></p></h2>
	  <? if(!empty($_POST['fl'])&&($_POST['fl']!=='введите путь')){
		  echo '<form action="'.$_POST['fl'].'" method="post" enctype="multipart/form-data">'.'<input type="file" name="filename"><br><input type="submit" value="Загрузить" class="btn-inverse btn" style="width: 100; height: 40"><br>';
	  } else {
		  echo '<p>Введите путь: </p><form action="'.$_POST['fl'].'" method="post" enctype="multipart/form-data">'.'<input type="text" name="fl" value="введите путь" class="inputer"><br><br><input type="submit" value="Ввести" style="width: 100; height: 40" class="btn-inverse btn"><br>';
	  }
	  ?>
      </form>
	  <i>прием файла в $_FILES["filename"]</i>
	  </div>
</body>
</html>

