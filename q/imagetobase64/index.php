<?
header('Content-Type: text/html; charset=utf-8');
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()-$num));
$num=mt_rand(2000,10000);
ignore_user_abort(true);
set_time_limit(0);
$debug = 1;
function debugger(){
  $debug = 0;
  if($debug === 1) {
      header("Content-Type: text/html; charset=utf-8");
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
  }else{
      error_reporting( 0 );
  }
}
debugger();
?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Конвертировать изображение в base64</title>
  <meta name="description" content="Бесплатный онлайн конвертер изображений JPG, PNG, GIF, BMP и SVG в base64. Для встраивания в html-код или CSS">
  <meta name="keywords" content="Конвертировать изображение в base64, image to base64 online">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="robots" content="all" />
  <link href="/q/style.css" rel="stylesheet"/>
  <link href="/q/css.css" rel="stylesheet"/>
  <link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
  <link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
  <link rel="apple-touch-icon" href="http://xtoolza.info/favicon.png" />
  <style>
    input[type="file"]{
      display: none;
    }
    .fileupload {
      border: 1px solid #ccc;
      display: inline-block;
      padding: 6px 12px;
      cursor: pointer;
      color: white;
      background-color: darkslategray;
    }
    .sendupload {
      border: 1px solid #ccc;
      display: inline-block;
      padding: 6px 12px;
      cursor: pointer;
      color: black;
      background-color: darkgrey;
    }
  </style>
</head>
<body onload="$('#site_list').focus()" id="linearBg1">
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
                <td><h1 class="jumbotron">Конвертировать изображение в base64</h1></td>
              </tr>
              <tr>
                <td><img src="http://xtoolza.info/q/images/base_64.png" width="80" alt="Конвертировать изображение в base64">             </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<p style="color:red;font-weight:500;">Максимальный размер: 1024 KB <br>Формат: JPG, PNG, GIF, BMP or SVG.</p>
<form action="/q/imagetobase64/index.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="MAX_FILE_SIZE" value="1250000">
  <label for="fileupload" class="fileupload">Выберите изображение</label>
  <input type="file" name="fileupload" id="fileupload" accept="image/jpg,image/gif,image/jpeg,image/bmp,image/png,image/svg" value="Выберите изображение" class="fileupload">
  <input type="submit" name="Конвертировать" value="Конвертировать" class="sendupload">
</form>

<?
$uploaddir = '/var/xtoolza.info/q/imagetobase64/images/';
$uploadfile = $uploaddir.basename($_FILES['fileupload']['name']);
$imgpath = "/q/imagetobase64/images/".basename($_FILES['fileupload']['name']);
// $imgfullpath = "http://xtoolza.info/q/imagetobase64/images/".basename($_FILES['fileupload']['name']);

if (!empty($_FILES)) {
  if (move_uploaded_file($_FILES['fileupload']['tmp_name'], $uploadfile)) {
    echo '<span style="color:#27813A">Изображение успешно загружено</span><br>';
    echo '<img src="'.$imgpath.'" style="width:100%;max-width:100px;max-height:100px;">';
    echo '<p>Имя файла: '. $_FILES['fileupload']['name'].'</p>';
    echo '<p>Расширение: '.$_FILES['fileupload']['type'].'</p>';
    $size = $_FILES['fileupload']['size'];
    echo '<p>Размер: '. round((filesize($uploadfile)/1024),2).'КБ </p>';
    echo '<p>Размеры: '. getimagesize($uploadfile)[0] .'x'.getimagesize($uploadfile)[1] .'px</p>';
    $data = file_get_contents($uploadfile);
    $type = pathinfo($uploadfile, PATHINFO_EXTENSION);
    echo '<p>Код для тегов img:</p><table><tr><td>
    <textarea rows="10" cols="300">'.
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data).
    '</textarea></td><td><img src="data:image/'.$type.';base64,'.base64_encode($data).'" style="width:100%;max-width:100px;max-height:100px;"></td></tr></table>'.
    '<p>Код для CSS:</p><table><tr><td>'.
    '<textarea rows="10" cols="300">';
    echo $base64 = "url(data:image/" . $type . ';base64,' . base64_encode($data).')';
    echo '</textarea></td><td><span style="background:url(data:image/'. $type .';base64,' . base64_encode($data).'); width:100%;max-width:100px;max-height:100px;"></span></td></tr></table>';
  } else {
    echo '<span style="color:#B61900">Не удалось загрузить изображение</span><br>';
  }
}
?>
<br>
<p>Конвертировать изображение из jpeg, bmp, gif, svg, png в base64. Этот инструмент позволяет создать короткие ссылки для вставки в код сайта.</p>
<br>
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
<br>
<br>
</body>
</html>
