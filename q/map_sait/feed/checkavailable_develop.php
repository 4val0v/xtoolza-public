<!DOCTYPE html>
<html>
<?
session_start();
ignore_user_abort(true);
set_time_limit(0);
define(debug, 1);
define(message, 0);
define(ALL_ERRORS, 0);
if (debug == 1) {
  ini_set('display_errors', 1);
  if (ALL_ERRORS == 1) {
    error_reporting(E_ALL);
  } else error_reporting(E_WARNING);
  if (message == 1){
    echo '<pre style="border:3px;color:red;font-weight:bold;font-size:20px;">
    Идут технические работы!!!
    Проверка может работать некорректно!!!
    По всем вопросам писать на gennadiy.shershov@ingate.ru
  </pre>';
  }
}
?>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <meta name="robots" content="noindex, nofollow" />
  <title>Результат аудита YML фида</title>
  <link href="http://xtoolza.info/q/style.css" rel="stylesheet"/>
  <link href="http://xtoolza.info/q/css.css" rel="stylesheet"/>
  <link rel="stylesheet" href="../style.css" type="text/css"  />
  <!-- <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
  <script type="text/javascript" src="tocsv.js"></script>
  <script type="text/javascript" src="dropdownlist.js"></script>
  <script type="text/javascript" src="preloader.js"></script>
  <style>
    h1, p, span, b, td {font-family: "Roboto","PT Sans","sans-serif";}
    abbr {border-bottom: 1px dashed red !important; color: #000080;position: relative;cursor:help;}
    abbr:hover::after{content:attr(data-title);position: absolute;width: 200px;left: 100%;display: block;padding:1em;background:#333333;border-radius: 20px;color:white;cursor:help;}
    .top_header {background-color: #61C6EC; margin-top: -20px; margin-left: -20px; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; width: 100%; position: absolute;}
  </style>
</head>
<body id="linearBg1">
<div class="top_header">
  <table>
    <tbody>
      <tr>
        <td>
          <div class="TmgWrae">
            <a href="http://reentermanual.local/"><img src="http://reentermanual.local/reenterlogo.png" width="115px;"></a>
          </div>
        </td>
        <td>
          <table>
            <tbody>
              <tr>
                <td><h1 class="jumbotron" style="font-size:30px">Результат аудита YML фида</h1></td>
                <td><span style="padding-left:150px;""><a style="color:#000000" href="../feedback/" target="_blank">Обратная связь</a></span></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<div id="preloader" style="position: fixed;top:185px; width:100%">
  <left>
    <img src="44.gif"><span> Считаю элементы! Пожалуйста, подожди... </span>
  </left>
</div>
<br><br>
<table border="1" bordercolor="#CDC9C9" style="position: absolute;top: 465px;" id="totaltable">
<?
libxml_use_internal_errors(true);

$contents = trim($_GET['site']);
if ($contents == 'Введите адрес xml' || $contents == null) {
  echo '<h1>Вы не ввели адрес фида</h1>';
  echo '
<form action="checkavailable.php" method="get" name="form">
  <input type="text" name="site" placeholder="Введите адрес xml" autofocus required size="100px" id="enter"><br><br>
  <input type="submit" value="Проверить" class="btn-success btn" id="rollover" onclick="
if (document.forms[\'form\'][\'site\'].value != \'\') {
  document.getElementById(\'div\').style.display = \'block\';
}" />
<br /><br />
</form>';
  exit();
}

echo "<tr><td><b>Фид</b>: <a href='$contents' target='_blank'>". $contents . "</a></td></tr>";
header('Content-Type: text/html; charset=utf-8');

function result($contents) {
//counters
  $counter_true =
  $counter_false =
  $counter_id_true =
  $counter_id_false =
  $counter_price_true =
  $counter_price_false =
  $counter_name_true =
  $counter_name_false =
  $counter_picture_true =
  $counter_picture_false =
  $counter_categoryId_false =
  $counter_categoryId_true = 0;
//getpage and processing
  $fp = fopen($contents,'r');
  for ($i=0; $i < 5; $i++) {
    $ymlfivestrings = htmlspecialchars(fgets($fp));
    if (stripos($ymlfivestrings, 'base.google.com')) {
      echo '<h3 style="color:red">Дружище, ты что? <br><a href='.$contents.' target="_blank">ЭТО</a> же Google Feed! Нужен YML!</h3>';
      echo '<div class="area">⚠ achtung ⚠</div>';
      echo '<style>@import url(http://fonts.googleapis.com/css?family=Open+Sans);

body{background: #D7DEF0; font-family: "Open Sans",Impact;}
.area{text-align:center;font-size:6.5em;color:#fff;letter-spacing: -7px;font-weight:700;text-transform:uppercase;animation:blur 3.25s ease-out infinite;
  text-shadow:0px 0px 5px #fff,
      0px 0px 7px #fff;
}

@keyframes blur{
  from{
      text-shadow:0px 0px 10px #000000,
      0px 0px 10px #B60300,
      0px 0px 25px #B60300,
      0px 0px 25px #B60300,
      0px 0px 25px #B60300,
      0px 0px 25px #B60300,
      0px 0px 25px #B60300,
      0px 0px 25px #B60300,
      0px 0px 50px #B60300,
      0px 0px 50px #B60300,
      0px 0px 50px #000000,
      0px 0px 150px #000000,
      0px 10px 100px #000000,
      0px 10px 100px #000000,
      0px 10px 100px #000000,
      0px 10px 100px #000000,
      0px -10px 100px #000000,
      0px -10px 100px #000000;}
}
</style>';
?>
<br /><br /><br /><br />
<form action="checkavailable.php" method="get">
  <input type="text" name="site" value="Введите адрес yml" onclick='if(this.value=="Введите адрес yml") this.value=""' onBlur='if(this.value=="") this.value="Введите адрес yml"' size="50px"><br><br>
  <input type="submit" value="Проверить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";' /><br /><br />
</form>
      <input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://reentermanual.local" rel="nofollow">На главную</a>
      <?
      die();
    }
  }
  $a = getpage($contents);
  $a = str_replace("<![CDATA[","",$a);
  $a = str_replace("]]>","",$a);
  // var_dump($a); exit();
  /*for 5.6 version SSL bug error */
  $contextOptions = array(
    "ssl" => array(
      "verify_peer"      => false,
      "verify_peer_name" => false,
      ),
    );


  $xml=simplexml_load_file($contents,'SimpleXMLElement',LIBXML_PARSEHUGE|LIBXML_COMPACT|LIBXML_NOCDATA);
    if (!$xml) {
      echo "Ошибка загрузки XML: <br />";
      foreach(libxml_get_errors() as $error) {
      echo "\t", $error->message;
      echo '<br />';
      }
      ?>
<br /><br /><br /><br />
<form action="checkavailable.php" method="get">
  <input type="text" name="site" value="Введите адрес yml" onclick='if(this.value=="Введите адрес yml") this.value=""' onBlur='if(this.value=="") this.value="Введите адрес yml"' size="50px"><br><br>
  <input type="submit" value="Проверить" class="btn-success btn" id="rollover" onclick='document.getElementById("div").style.display = "block";' /><br /><br />
</form>
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://reentermanual.local" rel="nofollow">На главную</a>
      <?
    }


  $feeddate = $xml->attributes()['date'];
  // $datetemp = new DateTime($feeddate);
  // var_dump($datetemp);
  // echo date_format($feeddate, 'Y-m-d');
  // die();
  $datetime1 = date_create($feeddate);
  $today = date("Y-m-d");
  $datetime2 = date_create($today);
  $interval = date_diff($datetime1, $datetime2);
      // var_dump($interval);
  $feedage = $interval->format('%a');

  global $siteurl;
  $siteurl = $xml->shop->url;

  echo '<tr><td><b><abbr data-title="Информация по дате последней генерации фида из тега catalog date">Дата обновления фида</abbr>:</b> '.$xml->attributes()['date'];
  if ($feedage > 30) {
    echo ' (возраст: <span style="color:red;font-weight:bold;"><abbr data-title="Если возраст фида больше 30 дней, есть вероятность того, что фид неактуален" style="color:red">'.$feedage.' дней</abbr></span>)';
  } else echo ' (возраст: <span style="color:green;font-weight:bold;">'.$feedage.' дней</span>)';
  echo '</td></tr>';

  echo '<tr><td><b><abbr data-title="Адрес страницы карточки товара">URL</abbr></b></td><td><b><abbr data-title="Значение атрибута available тега offer - показывает доступность товара. True или False">Статус</abbr></b></td><td><b><abbr data-title="Уникальный в рамках фида идентификатор товара">ID</abbr></b></td><td><b><abbr data-title="информация о стоимости товара из тега price">Цена</abbr></b></td><td><b><abbr data-title="Указанная валюта товара">Валюта</abbr></b></td><td><b><abbr data-title="Название товара">Name or Vendor/Model</abbr></b></td><td><abbr data-title="Товары без картинок"><b>Без картинок</b></abbr></td></tr>';
  foreach ($xml->shop->offers->offer as $offer) {
    echo '<tr><td><a style="text-overflow:ellipsis" href="'.$offer->url.'" target="_blank">'.shortener($offer->url).'</a></td>';

    if ($offer->attributes()['available']=='true'){
      echo '<td>'.$offer->attributes()['available'].'</td>';
      $counter_true++;
    } else {
      echo '<td><abbr data-title="Значение говорит о том, что товар недоступен. Проверьте действительно ли это так, перейдя на страницу товара."><b style="color:red">'.$offer->attributes()['available'].'</b></abbr></td>';
      $counter_false++;
    }

    if ((trim($offer->attributes()['id']) != null)||(trim(!empty($offer->attributes()['id'])))||(trim(!isset($offer->attributes()['id'])))){
      $counter_id_true++;
      echo '<td>'.$offer->attributes()['id'].'</td>';
    } else {
      $counter_id_false++;
      echo '<td><b style="color:red"><abbr data-title="Пустое значение" style="color:red;">NULL</abbr></b></td>';
    }

    if ((!$offer->price) or ($offer->price == "0")){
      $counter_price_false++;
      echo '<td><b style="color:red">0</b></td>';
    } elseif ($offer->price == "") {
      $counter_price_false++;
      echo '<td><b style="color:red"><abbr data-title="Пустое значение" style="color:red;">NULL</abbr></b></td>';
    } else {
      echo '<td>'.$offer->price.'</td>';
      $counter_price_true++;
    }
    if (trim($offer->currencyId)) {
      echo '<td>'.$offer->currencyId.'</td>';
    } else {
      echo '<td><b style="color:red"><abbr data-title="Пустое значение" style="color:red;">NULL</abbr></b></td>';
    }


    if (trim($offer->name)) {
      echo '<td>'.trim($offer->name).'</td>';
    } elseif ((($offer->name = null) && ($offer->vendor = null) && ($offer->model = null))||(($offer->name == '') && ($offer->vendor == '') && ($offer->model == ''))) {
      echo '<td><b style="color:red"><abbr data-title="Пустое значение" style="color:red;">NAME NOT FOUND</abbr></b></td>';
    } else
      echo '<td>'.trim($offer->vendor).' '.trim($offer->model).'</td>';
    if (!(($offer->name != null) && ($offer->vendor != null) && ($offer->model != null))) {
      $counter_name_false++;
      echo '<td><b style="color:red"><abbr data-title="Пустое значение" style="color:red;">NAME NOT FOUND</abbr></b></td>';
    } else {
      $counter_name_true++;
    }

    // echo '<td>'.$offer->picture.'</td>';
    if (!trim($offer->picture) != null){
      $counter_picture_false++;
      echo '<td><b style="color:red"><abbr data-title="Пустое значение" style="color:red;">Не найдено</abbr></b></td></tr>';
    } else {
      $counter_picture_true++;
      echo '</tr>';
    }

    if (!$offer->categoryId){
      $counter_categoryId_false++;
    } else {
      $counter_categoryId_true++;
    }

    $log .= $offer->url.PHP_EOL;

  }
  $xml=simplexml_load_file($contents);
  if (!$xml) {
    echo "Ошибка загрузки XML: <br />";
    foreach(libxml_get_errors() as $error) {
      echo "\t", $error->message;
      echo '<br />';
    }
  }
  if(($xml->shop->categories->category != null)){
    $category = 1;
    // var_dump($category);
  } else $category = 0;
  ?>
  <tr><td>
  <br />
  <br />
  <br />
</td></tr>
  </table>
  <br>

  <?
  echo '<table border="1" bordercolor="#CDC9C9" style="position: absolute;top:200px; width:100%">';
  echo '<tr>
  <td><b><abbr data-title="значение тега &lt;offer&gt;. Может быть true(товар в наличии) или false(товара в наличии нет).  Например, &lt;offer id=&quot;5&quot; available=&quot;true&quot;&gt;">Available:</abbr></b></td>
  <td><b><abbr data-title="значение тега &lt;offer&gt;. Должно иметь числовое значение. Означает ID товара. Например, &lt;offer id=&quot;5&quot; available=&quot;true&quot;&gt;.">Значения ID:</abbr></b></td>
  <td><b><abbr data-title="значение тега &lt;price&gt;. Должно иметь числовое значение. Означает цену товара. Например, &lt;price&gt;950&lt;/price&gt;.">Значения PRICE</abbr></b></td>
  <td><b><abbr data-title="значение тега &lt;name&gt;. Должно быть заполнено название товара. Например, &lt;name&gt;Красные бумажки формата A4&lt;/name&gt;.">Значения NAME</abbr>/<abbr data-title="альтернатива тегу &lt;name&gt;. Содержит название производителя. А Model - сам товар. Используется, если нет NAME. Складывается VENDOR+MODEL. Например, &lt;vendor&gt;Бумажки Incorporated&lt;/vendor&gt;&lt;model&gt;Красные штуковины&lt;/model&gt;.">VENDOR/MODEL</abbr></b></td>
  <td><b>Значения <abbr data-title="значение тега &lt;picture&gt;. Содержит url изображения товара. Например, &lt;picture&gt;http://teestore.ru/wp-content/uploads/2015/11/Christmas-Walker-L-510x600.jpg&lt;/picture&gt;</span>.">PICTURE</abbr></b></td></tr>';
    echo '<tr>';

      //выводим значения offer available
    echo '<td>';
      echo $truecount ='<span style="color:green;">TRUE</span>: '.$counter_true.' ('. round(($counter_true * 100) / ($counter_true + $counter_false),0).'%)'.'<br>';
      $truecount ='TRUE: '.$counter_true.PHP_EOL;
      echo $falsecount ='<span style="color:red;">FALSE</span>: '.$counter_false.' ('. round(($counter_false * 100) / ($counter_true + $counter_false),0).'%)'.'<br>';
      $falsecount ='FALSE: '.$counter_false. PHP_EOL;
      echo $totalcount = 'всего значений: '.($counter_true+$counter_false).' (100%)<br>';
      $totalcount = 'всего значений: '.($counter_true+$counter_false).PHP_EOL;
    echo '</td>';

      //выводим значения offer id
    echo '<td>';
      echo $truecountid ='<span style="color:green;">найденных ID</span>: '.$counter_id_true.' ('. round(($counter_id_true * 100) / ($counter_id_true + $counter_id_false),0).'%)'.'<br>';
      $truecountid ='найденных ID: '.$counter_id_true.PHP_EOL;
      echo $falsecountid ='<span style="color:red;">отсутствующих ID</span>: '.$counter_id_false.' ('. round(($counter_id_false * 100) / ($counter_id_true + $counter_id_false),0).'%)'.'<br>';
      $falsecountid ='отсутствующих ID: '.$counter_id_false. PHP_EOL;
      echo $totalcountid = 'всего значений: '.($counter_id_true+$counter_id_false).' (100%)<br>';
      $totalcountid = 'всего значений: '.($counter_id_true+$counter_id_false).PHP_EOL;
    echo '</td>';

      //выводим значения price
    echo '<td>';
      echo $truecountprice ='<span style="color:green;">найденных PRICE</span>: '.$counter_price_true.' ('. round(($counter_price_true * 100) / ($counter_price_true + $counter_price_false),0).'%)'.'<br>';
      $truecountprice ='найденных PRICE: '.$counter_price_true.PHP_EOL;
      echo $falsecountprice ='<span style="color:red;">отсутствующих PRICE</span>: '.$counter_price_false.' ('. round(($counter_price_false * 100) / ($counter_price_true + $counter_price_false),0).'%)'.'<br>';
      $falsecountprice ='отсутствующих PRICE: '.$counter_price_false. PHP_EOL;
      echo $totalcountprice = 'всего значений: '.($counter_price_true+$counter_price_false).' (100%)<br>';
      $totalcountprice = 'всего значений: '.($counter_price_true+$counter_price_false).PHP_EOL;
    echo '</td>';
      //выводим значения name
    echo '<td>';
      echo $truecountname ='<span style="color:green;">найденных NAME</span>: '.$counter_name_true.' ('. round(($counter_name_true * 100) / ($counter_name_true + $counter_name_false),0).'%)'.'<br>';
      $truecountname ='найденных NAME: '.$counter_name_true.PHP_EOL;
      echo $falsecountname ='<span style="color:red;">отсутствующих NAME</span>: '.$counter_name_false.' ('. round(($counter_name_false * 100) / ($counter_name_true + $counter_name_false),0).'%)'.'<br>';
      $falsecountname ='отсутствующих NAME: '.$counter_name_false. PHP_EOL;
      echo $totalcountname = 'всего значений: '.($counter_name_true+$counter_name_false).' (100%)<br>';
      $totalcountname = 'всего значений: '.($counter_name_true+$counter_name_false).PHP_EOL;
    echo '</td>';
      //выводим значения picture
    echo '<td>';
      echo $truecountpicture ='<span style="color:green;">найденных PICTURE</span>: '.$counter_picture_true.' ('. round(($counter_picture_true * 100) / ($counter_picture_true + $counter_picture_false),0).'%)'.'<br>';
      $truecountpicture ='найденных PICTURE: '.$counter_picture_true.PHP_EOL;
      echo $falsecountpicture ='<span style="color:red;">отсутствующих PICTURE</span>: '.$counter_picture_false.' ('. round(($counter_picture_false * 100) / ($counter_picture_true + $counter_picture_false),0).'%)'.'<br>';
      $falsecountpicture ='отсутствующих PICTURE: '.$counter_picture_false. PHP_EOL;
      echo $totalcountpicture = 'всего значений: '.($counter_picture_true+$counter_picture_false).' (100%)<br>';
      $totalcountpicture = 'всего значений: '.($counter_picture_true+$counter_picture_false).PHP_EOL;
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<tr><td><b>Значения <abbr data-title="значение тега &lt;categoryId&gt;. Содержит ID категории, к которой относится товар. Например, &lt;categoryId&gt;6&lt;/categoryId&gt;.">categoryId</abbr></b></td></tr>';
    echo '<td>';
    echo $truecountcategoryId ='<span style="color:green;">найденных categoryId</span>: '.$counter_categoryId_true.' ('. round(($counter_categoryId_true * 100) / ($counter_categoryId_true + $counter_categoryId_false),0).'%)'.'<br>';
    $truecountcategoryId ='найденных categoryId: '.$counter_categoryId_true.PHP_EOL;
    echo $falsecountcategoryId ='<span style="color:red;">отсутствующих categoryId</span>: '.$counter_categoryId_false.' ('. round(($counter_categoryId_false * 100) / ($counter_categoryId_true + $counter_categoryId_false),0).'%)'.'<br>';
    $falsecountcategoryId ='отсутствующих categoryId: '.$counter_categoryId_false. PHP_EOL;
    echo $totalcountcategoryId = 'всего значений: '.($counter_categoryId_true+$counter_categoryId_false).' (100%)<br>';
    $totalcountcategoryId = 'всего значений: '.($counter_categoryId_true+$counter_categoryId_false).PHP_EOL;
    echo '</td>';
    echo '
    <td><a class="btn-warning btn" href="checkstatus/index.php" target="_blank" style="padding-top:3px;padding-bottom:5px;">Проверить статус-коды URL</a></td>
    <td><a class="btn-success btn" href="checkpicturestatus/index.php" target="_blank">Проверить статус-коды PICTURE</a></td>
    <td><a class="btn-info btn" href="reentercheck2/" target="_blank">Проверить наличие скрипта ReEnter </a></td><td>';
    include('include_cms_check.php');
    robotscheck();

    echo '</tr>';
    $totaloffers = ($counter_true+$counter_false);
    $lastoffers = ($totaloffers-$counter_false-$counter_id_false-$counter_name_false-$counter_price_false-$counter_picture_false-$counter_categoryId_false);
    $counterfalse = max($counter_false, $counter_id_false, $counter_name_false, $counter_price_false, $counter_picture_false, $counter_categoryId_false);
    $percentoftrue = round((($counterfalse/$totaloffers)*100),2);
    // echo $lastoffers;
    function lastoffers($percentoftrue){
      // var_dump($percentoftrue);
      if ($percentoftrue > 80){
        echo '<span style="color:red;font-size:20px;font-weight:bold;"><b>'.$percentoftrue.'%</b></span>';
      } elseif ($percentoftrue > 50 And $percentoftrue <= 80) {
        echo '<span style="color:#FF7638;font-size:20px;font-weight:bold;"><b>'.$percentoftrue.'%</b></span>';
      } elseif ($percentoftrue > 30 And $percentoftrue <= 50) {
        echo '<span style="color:#282323;font-size:20px;font-weight:bold;"><b>'.$percentoftrue.'%</b></span>';
      }else echo '<span style="color:green;font-size:20px;font-weight:bold;">'.$percentoftrue.'%</span>';
      // var_dump($percentoftrue);
    }

    echo '
    <tr>
    <td border="1" style="border: 5px solid #E41325;"><span style="font-size:20px;font-weight:bold;">Итого в фид <u><abbr data-title="Это означает, что эти товары не будут рекламироваться в Google AdWords">НЕ попадет</abbr></u><br> ';
    // var_dump($category);
    if ($category == 1){
      echo $counterfalse;
    } else echo '<span style="font-size:20px;font-weight:bold;color:red"><b>'.$totaloffers.'</b></span>';

    echo ' из '.$totaloffers.' товаров (</span>';
    if ($category == 1){
    lastoffers($percentoftrue);
    } else echo '<span style="color:red;font-size:20px;font-weight:bold;"><b>0%: нет тегов &lt;categories&gt;&lt;/categories&gt;</b>';
    echo'<span style="font-size:20px;font-weight:bold;">)</span></td>';
    echo '<td><a class="btn-primary btn" href="checkpicturesize/" target="_blank">Проверка размеров изображений</a></td>';
    echo '<td><a class="btn-danger btn" href="https://webmaster.yandex.ru/tools/robotstxt/" target="_blank">Ya.Webmaster проверить robots.txt</a></td>';
    echo '<td><a class="btn-primary btn" href="https://www.google.com/webmasters/tools/home?hl=ru&pli=1" target="_blank" style="padding:3px 41px 5px 41px;">Google Search Console</a></td>';
    echo '<td><a class="btn-success btn" href="http://reentermanual.local/feed/csvresult.csv" download style="padding:3px 41px 5px 41px;">Скачать сводный CSV</a></td>';
  echo '</td></tr>';
  echo '</table>';
  return $log;
}

function resultpicture($contents) {
  $a = getpage($contents);
  // var_dump($a); exit;
  $a = str_replace("<![CDATA[","",$a);
  $a = str_replace("]]>","",$a);
  $xml=simplexml_load_file($contents);
    if (!$xml) {
      echo "Ошибка загрузки XML: <br/>";
      foreach(libxml_get_errors() as $error) {
      echo "\t", $error->message;
      echo '<br />';
      }
    }
    foreach ($xml->shop->offers->offer as $offer) {
      $logpicture .= $offer->picture.PHP_EOL;
      // var_dump($logpicture);
    }
  return $logpicture;
}

$logerpicture = resultpicture($contents);
//var_dump($logerpicture);
function mylogpicture($info){
  $info = $info . PHP_EOL;
  file_put_contents('/var/www/feed/logs/feedpictureavailable.txt', $info);
}
mylogpicture($logerpicture);

$loger = result($contents);
// var_dump($loger);
function mylog($data){
  $data = $data . PHP_EOL;
  file_put_contents('/var/www/feed/logs/feedavailable.txt', $data);
}
mylog($loger);

//получить содержимое страницы
function getpage($contents){
  if(mb_detect_encoding($contents) != "ASCII"){ //если сайт в кириллице переводим в punycode
    include_once("idna_convert.class.php");
    $IDN = new idna_convert(array('idn_version' => '2008'));
    $contents=$IDN->encode($contents);
  }
  // var_dump($contents);
  $ch = curl_init();
  $user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2785.116 Safari/537.36";
  curl_setopt($ch, CURLOPT_URL,$contents);
  curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_VERBOSE, false);
  curl_setopt($ch, CURLOPT_TIMEOUT, 60);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_SSLVERSION, 4);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}

//проверим статусы
function http_status_code($arraylist) {
  // do not sure need these three strings or not?
  // if (!preg_match('|^http:.*|i',$arraylist)){
  //   $arraylist = 'http://'.$arraylist;
  // }
  $arraylisthost = parse_url($arraylist);
  $url_host = $arraylisthost['host'];
  if(mb_detect_encoding($url_host) != "ASCII"){ //если сайт в кириллице переводим в punycode
    include_once("idna_convert.class.php");
    $IDN = new idna_convert(array('idn_version' => '2008'));
    $arraylist=$IDN->encode($url_host);
  }

  $user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2785.116 Safari/537.36";
  $temp = curl_init();
  curl_setopt($temp, CURLOPT_URL,$arraylist);
  curl_setopt($temp, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($temp, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($temp, CURLOPT_VERBOSE, false);
  curl_setopt($temp, CURLOPT_TIMEOUT, 45);
  curl_setopt($temp, CURLOPT_SSLVERSION, 4);
  curl_setopt($temp, CURLOPT_FOLLOWLOCATION, false);
  curl_setopt($temp, CURLOPT_AUTOREFERER, true);
  curl_setopt($temp, CURLOPT_HEADER, true);
  curl_setopt($temp, CURLOPT_MAXREDIRS, 10);
  curl_setopt($temp, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($temp, CURLOPT_SSL_VERIFYPEER, false);
  $page = curl_exec($temp);
  // print curl_error($temp);
  preg_match_all('/^Location:(.*)$/mi', $page, $matches);
  $match = $matches[1];
  $status = curl_getinfo($temp, CURLINFO_HTTP_CODE);
  // var_dump($status);
  if ($status == '301'|| $status == '302') {
    return $out = http_status_code_after($match);
  } else {
  curl_close($temp);
  return $status;
  }
}

function http_status_code_after($match) {
  $match = trim($match[0]);
  if(mb_detect_encoding($match) != "ASCII"){ //если сайт в кириллице переводим в punycode
    include_once("idna_convert.class.php");
    $IDN = new idna_convert(array('idn_version' => '2008'));
    $match=$IDN->encode($match);
  }

  $user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2785.116 Safari/537.36";
  $ch = curl_init();
  // curl_setopt($ch, CURLINFO_HEADER_OUT, true);
  curl_setopt($ch, CURLOPT_URL,$match);
  curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  // curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_VERBOSE, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_FAILONERROR, 0);
  $page = curl_exec($ch);
  $result = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
  return $result;
}

function getpagecontent($arraylist) {
  if (!preg_match('|^http:.*|i',$arraylist)){
    $arraylist = 'http://'.$arraylist;
  }
  $arraylistscheme = parse_url($arraylist);
  $url_host = $arraylistscheme['host'];
  if(mb_detect_encoding($url_host) != "ASCII"){ //если сайт в кириллице переводим в punycode
    include_once("idna_convert.class.php");
    $IDN = new idna_convert(array('idn_version' => '2008'));
    $arraylist=$IDN->encode($url_host);
  }

  $user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2785.116 Safari/537.36";
  $temp = curl_init();
  curl_setopt($temp, CURLOPT_URL,$arraylist);
  curl_setopt($temp, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($temp, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($temp, CURLOPT_VERBOSE, true);
  curl_setopt($temp, CURLOPT_TIMEOUT, 45);
  curl_setopt($temp, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($temp, CURLOPT_SSLVERSION, 4);
  curl_setopt($temp, CURLOPT_FOLLOWLOCATION, false);
  curl_setopt($temp, CURLOPT_HEADER, true);
  curl_setopt($temp, CURLOPT_MAXREDIRS, 10);
  curl_setopt($temp, CURLOPT_SSL_VERIFYHOST, 0);
  $page = curl_exec($temp);
  preg_match_all('/^Location:(.*)$/mi', $page, $matches);
  $match = $matches[1];
  // var_dump($match);
  $status = curl_getinfo($temp, CURLINFO_HTTP_CODE);
  if ($status == '301'|| $status == '302') {
    return $out = getpagecontent_after($match);
  } else {
  curl_close($temp);
  return $page;
  }
}

function getpagecontent_after($match) {
  $match = trim($match[0]);
  if(mb_detect_encoding($match) != "ASCII"){ //если сайт в кириллице переводим в punycode
    include_once("idna_convert.class.php");
    $IDN = new idna_convert(array('idn_version' => '2008'));
    $match=$IDN->encode($match);
  }

  $user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2785.116 Safari/537.36";
  $ch = curl_init();
  // curl_setopt($ch, CURLINFO_HEADER_OUT, true);
  curl_setopt($ch, CURLOPT_URL,$match);
  curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  // curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_VERBOSE, 1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_FAILONERROR, 0);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}

function shortener($in){
  if (strlen($in)>90) {
    return substr($in,0,90)."...";
  } else return $in;
}

cmscheck(); merchcheck();

define(version, 1.61205);
  echo '<p style="position:fixed;top:10px;right:25px;"><a href="#open" onclick="show(\'hidden_2\',200,30)"> version '. version.'</a></p>';
  echo '<div id="hidden_2" style="display:none;height:200px;width:350px;background-color:#f0f0f0;position:fixed;top:45px;right:25px;">
  <p>
    <br><b>1.61205</b>
    <br> Проверка CMS, файла для мерча, robots.txt теперь проходит по тегу URL из фида;
    <br> Добавлена кнопка "требования к сайтам";
    <br> Добавлено проверка трафика и тематики;
    <br> При нажатии на ссылку robots.txt выводится фрейм с содержимым файла;
    <br> bug fix of http_status_code check;
    <br> слишком длинные URL теперь обрезаются;
    <br><b>1.61202</b>
    <br> Обновлено визуальное отображение всплывающих подсказок;
    <br><b>1.61128</b>
    <br> Проверка статус кодов страниц теперь выводит последний URL перехода;
    <br> Если статус-код 200 - не выводим Location;
    <br> В проверке статус-кодов изображений выводится само изображение;
    <br><b>1.61124</b>
    <br> добавлено выделение красным ошибок в сводной таблице;
    <br> добавлены всплывающие подсказки;
    <br> добавлена выгрузка сводной таблицы в csv;
    <br> изменен стиль отображения результатов (меньшие шрифты);
    <br> улучшено определение ряда CMS;
    <br> добавлено отображение версионности;
    <br> добавлена информация об отсутствующих картинках;
    <br> добавлен preloader;
  </p>
</div>';
?>
<script>$(function (){ $('[data-toggle="tooltip"]').tooltip() })</script>
</body>
</html>
