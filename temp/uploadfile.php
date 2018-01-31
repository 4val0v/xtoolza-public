<html>
<head>
  <title>Загрузка файлов на сервер</title>
  <style type="text/css">
   .inputer {
    width: 500px; /* Ширина в пикселах */
   }
  </style>
</head>
<body>
      <h2><p><b>Форма для загрузки файла</b></p></h2>
	  <p>Введите путь:</p>
	  <? if(!empty($_POST['fl'])){
		  echo '<form action="'.$_POST['fl'].'" method="post" enctype="multipart/form-data">'.'<input type="file" name="filename"><br><input type="submit" value="Загрузить"><br>';
	  } else {
		  echo '<form action="'.$_POST['fl'].'" method="post" enctype="multipart/form-data">'.'<input type="text" name="fl" value="введите путь" class="inputer"><br><input type="submit" value="Ввести"><br>';
	  }
	  ?>
      </form>
</body>
</html>


