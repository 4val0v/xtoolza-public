<html>
<head>
  <title>Загрузка файлов на сервер</title>
</head>
<body>
      <h2><p><b> Форма для загрузки файлов </b></p></h2>

<?
$data = '$PROP["resume"] = Array (
    "n0" => Array(
        "VALUE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . "/upload/tmp/"" . $filename)
     )
);';



file_put_contents('/var/www/upload/tmp/temp.php', $data);

?>

</body>
</html>
