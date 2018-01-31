<!DOCTYPE html>
<html>
<?
// header('Location: http://xtoolza.info/q/map_sait/feed/xmltocsv.php');
session_start();
ignore_user_abort(true);
set_time_limit(0);

define(debug, 0);
define(message, 0);
if (debug == 1) {
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
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
  <title>Convert YML to CSV feed</title>
  <link href="/q/style.css" rel="stylesheet"/>
  <link rel='stylesheet' href='nprogress.css'/>
  <link href="/q/css.css" rel="stylesheet"/>
</head>
<body id="linearBg1">
<script src='nprogress.js'></script>
<div style="align:left; background-color: #61C6EC">
  <table>
    <tbody>
      <tr>
        <td>
          <div class="TmgWrae">
            <a href="http://xtoolza.info/">xToolza</a>
          </div>
        </td>
        <td>
          <table>
            <tbody>
              <tr>
                <td><h1 class="jumbotron" style="font-size:25px">Convert YML to CSV feed</h1></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<br><br>
<form action="xmltocsv.php" method="get" name="form">
  <input type="text" name="site" placeholder="Введите адрес xml" autofocus required size="100px"><br><br>
  <input type="submit" value="Конвертировать" class="btn-success btn" id="rollover" onclick="
if (document.forms['form']['site'].value != '') {
  document.getElementById('div').style.display = 'block';
}" />
<br /><br />
</form>


<?php
function crop_str($string, $limit){
  if (strlen($string) >= $limit ) {
    $substring_limited = substr($string,0, $limit);
    return substr($substring_limited, 0, strrpos($substring_limited, ' ' ));
  } else {
  //Если количество символов строки меньше чем задано, то просто возращаем оригинал
  return $string;
  }
}

  $contents = trim($_GET['site']);
  $cat = array();
  $xml = new XMLReader();
  $xml->open($contents);

  while($xml->read() && $xml->name !== 'category');
    while($xml->name === 'category'){
      $node = new SimpleXMLElement($xml->readOuterXML());
      $id = +$xml->getAttribute("id");
      $name = ''. $node;

      $cat[$id] = $name;

    $xml->next('category');
    }
  $xml->close();

//////////////////////////////

  $xml = new XMLReader();
  $xml->open($contents);

  $allparams = array();
  $idparams = array();
  while($xml->read() && $xml->name !== 'offer');
    while($xml->name === 'offer'){
      $node = new SimpleXMLElement($xml->readOuterXML());
      $id = +$xml->getAttribute("id");

      foreach ($node->param as $param){
        $name = ''. $param['name'];
        $value = ''. $param;
        $allparams[] = ''. $param['name'];
        $idparams[$id][$name] = $value;
      }
    $xml->next('offer');
    }
  $xml->close();

  $allparams = array_unique($allparams);
  sort($allparams);

//////////////////////////////

  $xml = new XMLReader();
  $xml->open($contents);
  $flag = true;
  while($xml->read() && $xml->name !== 'offer');
    while($xml->name === 'offer'){
      $node = new SimpleXMLElement($xml->readOuterXML());
// var_dump($node);
      $id = $xml->getAttribute("id");
      $available = $xml->getAttribute("available");
      $url = $node->url;
      $name = $node->name;
      $price = $node->price;
      $oldprice = $node->oldprice;
      $currencyId = $node->currencyId;
      $delivery = $node->delivery;
      $local_delivery_cost = $node->local_delivery_cost;
      $typePrefix = $node->typePrefix;
      $vendor = $node->vendor;
      $vendorCode = $node->vendorCode;
      $model = $node->model;
      $description = $node->description;
      $cpa = $node->cpa;
      $weight = $node->weight;
      $pickup = $node->pickup;
      $c = +$node->categoryId;
      $category = $cat[$c];
      $picture = $node->picture;

      if($flag){
        $str = 'ID,Item title,Image URL,Final URL,Item Description,Price,Sale Price';
        // $j = count($allparams);
        // while($j-- > 0){
        //   $str .= '"'. $allparams[$j] .'";';
        // }
        $str .= PHP_EOL;
        $str = mb_convert_encoding ($str ,"Windows-1251" , "UTF-8" );
        $hostname = parse_url($contents);
        // var_dump($hostname);
        $csvfile = $hostname['host'].'_feed.csv';
        $fullpathcsv = '/var/xtoolza.infofeed//csv/'.$csvfile;
          $path = fopen($fullpathcsv, "a+");
          fwrite($path, $str);
          fclose($path);
          $flag = false;
      }

      $str = strip_tags($id) .',';
      $str .= str_replace(",","",strip_tags($name)) .',';
      $str .= strip_tags($picture) .',';
      $str .= strip_tags($url) .',';
      $str .= str_replace(",","",strip_tags(substr($description,0,200))) .',';
      $str .= strip_tags($price) .' '.$currencyId;
      // $str .= strip_tags($oldprice) .' '.$currencyId;
      $str .= PHP_EOL;
      // var_dump($str);
      ///////just original////////
      // $str = '"'. $id .'";';
      // $str .= '"'. $available .'";';
      // $str .= '"'. $url .'";';
      // $str .= '"'. $price .'";';
      // $str .= '"'. $currencyId .'";';
      // $str .= '"'. $delivery .'";';
      // $str .= '"'. $local_delivery_cost .'";';
      // $str .= '"'. $typePrefix .'";';
      // $str .= '"'. $vendor .'";';
      // $str .= '"'. $vendorCode .'";';
      // $str .= '"'. $model .'";';
      // $str .= '"'. $description .'";';
      // $str .= '"'. $cpa .'";';
      // $str .= '"'. $weight .'";';
      // $str .= '"'. $picture .'";';
      // $str .= '"'. $pickup .'";';
      // $str .= '"'. $category .'";';
      // $str .= $params;
      // $str .= PHP_EOL;

      $str = mb_convert_encoding ($str ,"Windows-1251" , "UTF-8" );
      // var_dump($str);
      $hostname = parse_url($contents);
      // var_dump($hostname);
      $csvfile = $hostname['host'].'_feed.csv';
      $fullpathcsv = '/var/xtoolza.infofeed//csv/'.$csvfile;
      if ($xml->getAttribute("available") !== 'false') {
        $path = fopen($fullpathcsv, "a+");
        fwrite($path, $str);
        fclose($path);
        // file_put_contents($fullpathcsv, FILE_APPEND);
      }
    $xml->next('offer');
    }
  $xml->close();

gc_enable();
?>
<h4>Загруженные файлы: </h4>
<?
$dir = '/var/xtoolza.infofeed//csv/';
$f = scandir($dir);
  echo '<table><tr><td>CSV фид</td><td>Действие</td></tr>';
foreach ($f as $file) {
  if(preg_match('/\.(htaccess)|index\.php|^\.$|^\.\.$/', $file)){
    echo "";
  } else {
    echo '<tr><td><a href="http://xtoolza.infofeed//csv/'.$file.'" download>'. $file . '</a></td>';
    $fileName = $dir.$file;
    $self = $_SERVER["PHP_SELF"];
    $var = '<td><a href='.$self.'?del=true&fileName='.$fileName.' onclick="if(confirm(\'Вы действительно хотите удалить файл?\'));"> Удалить</a></td></tr>';
    echo $var. '<br>';
    if(true == $_GET['del'])
    {
        unlink($_GET['fileName']);
        header('location: http://xtoolza.infofeed//xmltocsv.php');
    }
  }
}
  echo '</table>';
?>
