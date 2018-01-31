<!DOCTYPE html>
<html>
<?
session_start();
ignore_user_abort(true);
set_time_limit(0);

define(debug, 1);
define(message, 0);
if (debug == 1) {
  ini_set('display_errors', 1);
  error_reporting(E_WARNING);
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
  <link href="/q/style.css" rel="stylesheet"/>
<!--  <script src="/q/modernize.js"></script>
  <script src="/q/seotext.js"></script> -->
  <link href="/q/css.css" rel="stylesheet"/>
</head>
<body id="linearBg1">
<div style="align:left; background-color: #61C6EC">
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
                <td><h1 class="jumbotron" style="font-size:25px">Результат аудита YML фида 2</h1></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<br><br>
<?
$contents = trim($_GET['site']);
$a = getpage($contents);
$a = str_replace("<![CDATA[","",$a);
$a = str_replace("]]>","",$a);

function xmlentities($string) {
  return str_replace(array("&", "<", ">", "\"", "'"),
      array("&amp;", "&lt;", "&gt;", "&quot;", "&apos;"), $string);
}

$elements   = null;  // просто имя текущей ноды
$offer = null; // собирает один элемент offer

// Вызывается, когда встречается открывающий тег.
// если это offer - создаем массив под него
function startElements($parser, $name, $attrs) {
  global $offer, $elements;
  if ($name == 'OFFER') {
    $offer = array();
  }
  $elements = $name;
}

echo 'URL | NAME | PRICE';
// Вызывается, когда тег закрывается
// если это тег offer - печатаем содержимое и вычищаем
function endElements($parser, $name) {
  global $offer, $elements;
  if(!empty($name)) {
      if ($name == 'OFFER') {
      echo '<p>'.$offer[URL].'&nbsp; | ';
      echo $offer[NAME].'&nbsp; | ';
      echo $offer[PRICE].'</p>';
      $offer = null;
      }
  $elements = null;
  }
}

// Вызывается для текста, заполняем массив
function characterData($parser, $data) {
  global $offer, $elements;
  if(!empty($data)) {
      if ($elements == 'NAME' || $elements == 'PRICE' || $elements == 'URL') {
        $offer[$elements] .= $data;
      }
  }
}

// подготавливаем парсер
$parser = xml_parser_create();

xml_set_element_handler($parser, "startElements", "endElements");
xml_set_character_data_handler($parser, "characterData");

// открываем файл
if (!($handle = fopen($contents, "r"))) {
   die("could not open XML input");
}

while($data = fread($handle, 4096)) {  // читаем по кусочкам
  // var_dump($data);
  xml_parse($parser, $data);  // и стравливаем парсеру
}

xml_parser_free($parser); // почистим за собой.

?>




<?
//получить содержимое страницы
function getpage($contents){
  if(mb_detect_encoding($contents) != "ASCII"){ //если сайт в кириллице переводим в punycode
    include_once("idna_convert.class.php");
    $IDN = new idna_convert(array('idn_version' => '2008'));
    $contents=$IDN->encode($contents);
    }
  // var_dump($contents);
  $ch = curl_init();
  $user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2062.124 Safari/537.36";
  curl_setopt($ch, CURLOPT_URL,$contents);
  curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_VERBOSE, false);
  curl_setopt($ch, CURLOPT_TIMEOUT, 60);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_SSLVERSION, 3);
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

  $user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2062.124 Safari/537.36";
  $temp = curl_init();
  curl_setopt($temp, CURLOPT_URL,$arraylist);
  curl_setopt($temp, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($temp, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($temp, CURLOPT_VERBOSE, true);
  curl_setopt($temp, CURLOPT_TIMEOUT, 45);
  curl_setopt($temp, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($temp, CURLOPT_SSLVERSION, 3);
  curl_setopt($temp, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($temp, CURLOPT_HEADER, false);
  curl_setopt($temp, CURLOPT_MAXREDIRS, 10);
  curl_setopt($temp, CURLOPT_SSL_VERIFYHOST, 0);
  $page = curl_exec($temp);

  $result = curl_getinfo($temp, CURLINFO_HTTP_CODE);
  $arraylistnew = curl_getinfo($temp, CURLINFO_EFFECTIVE_URL);
  if ($result > 300) {
    // var_dump($arraylistnew);
    $out = http_status_code_after($newarraylist);
  } else
  curl_close($temp);
  return $result;
}

function http_status_code_after($newarraylist) {
  if (!preg_match('|^http:.*|i',$newarraylist)){
    $newarraylist = 'http://'.$newarraylist;
    }
  $arraylistscheme = parse_url($newarraylist);
  $url_host = $arraylistscheme['host'];
  if(mb_detect_encoding($url_host) != "ASCII"){ //если сайт в кириллице переводим в punycode
    include_once("idna_convert.class.php");
    $IDN = new idna_convert(array('idn_version' => '2008'));
    $newarraylist=$IDN->encode($url_host);
    }

  $user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2062.124 Safari/537.36";
  $temp = curl_init();
  curl_setopt($temp, CURLOPT_URL,$newarraylist);
  curl_setopt($temp, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($temp, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($temp, CURLOPT_VERBOSE, true);
  curl_setopt($temp, CURLOPT_TIMEOUT, 45);
  curl_setopt($temp, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($temp, CURLOPT_SSLVERSION, 3);
  curl_setopt($temp, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($temp, CURLOPT_HEADER, false);
  curl_setopt($temp, CURLOPT_MAXREDIRS, 10);
  curl_setopt($temp, CURLOPT_SSL_VERIFYHOST, 0);
  $page = curl_exec($temp);
  $result = curl_getinfo($temp, CURLINFO_HTTP_CODE);
  curl_close($temp);
  return $result;
}



?>
</body>
</html>
