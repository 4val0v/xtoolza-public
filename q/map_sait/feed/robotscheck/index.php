<!DOCTYPE html>
<html>
<?
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
  <title>Результат аудита YML фида</title>
  <link href="http://xtoolza.info/q/style.css" rel="stylesheet"/>
  <link rel='stylesheet' href='nprogress.css'/>
  <link href="http://xtoolza.info/q/css.css" rel="stylesheet"/>
  <style>
    abbr {
      border-bottom: 1px dashed red !important;
      color: #000080;
    }
  </style>
</head>
<body>
<h4>Develope mode</h4>
<?
  $PCREpattern = '/\r\n|\r|\n/u';
  function offers(){
      $counstr=5;
      $fileurls=file('/var/www/feed/logs/feedavailable.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      $filepics=file('/var/www/feed/logs/feedpictureavailable.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      shuffle($fileurls);
      shuffle($filepics);
      for($i=0;$i<$counstr;$i++){
        $fileurl = trim($fileurls[$i]).PHP_EOL;
        $picurl = trim($filepics[$i]).PHP_EOL;
        return $urllist = array($fileurl,$picurl);
      }
    }

    $f = fopen('/var/www/feed/logs/feedavailable.txt', 'r+');
    for ($i=0; $i < 1; $i++) {
      $url = fgets($f);
    }
    $p = fopen('/var/www/feed/logs/feedpictureavailable.txt', "r+");
    for ($i=0; $i < 1; $i++) {
      $pictureurl = fgets($f);
    }

    $hostname = parse_url($url);
    $robotstxt = $hostname['scheme'].'://'.$hostname['host'].'/robots.txt';

    $root=$hostname['host'];
    $path = $hostname['path'];
    $res=file_get_contents($robotstxt);

      ?>
  <h3>robots.txt:</h3>
  <textarea>
<?
echo $res;
?>
  </textarea>
  <?

$r=$root; // домен для проверки
// читаю и разбираю robots.txt
$curl = curl_init($r.'/robots.txt');
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1 ); // следовать любому "Location: " header
curl_setopt($curl, CURLOPT_TIMEOUT, 20);  // максимальное время в секундах, для работы CURL-функций.
$res = curl_exec($curl);
if (!curl_error($curl)){
  $out = preg_match_all("/^\s*Disallow:(.*)/i", $res, $matches);
  var_dump($matches);
  // var_dump($out);
  // print_r($matches);
  $robots=$matches[1];
  // print_r($robots);
  // echo "<h3>Страницы, запрещенные к индексации в Robots.txt</h3>";
  // foreach($robots as $item) echo "<br>\n".$item;
}
curl_close($curl);

foreach ($robots as $rule) {
  var_dump($rule);
  if (preg_match('/.$path./imU', $rule)){
  echo 'YES<br>';
  } else echo 'NO<br>';
}



if( in_array($path, $robots) || in_array(dirname($path).'/', $robots)) {
  echo $path . 'запрещен';
} else echo $path . 'разрешен';



$newurllist = offers();


  echo '<table>';
// echo  '<tr><td>URL</td><td>Доступность для Google</td></tr>';
foreach ($newurllist as $url) {
  // if (robots_allowed($robotstxt, $url, "Googlebot")) {
    echo '<tr><td>'.$url.'</td></tr>';
  // }else{
    // echo '<tr><td>'.$url.'</td>'.'<td> запрещен</td></tr>';
  // }
}
  echo '</table>';

// use Bee4\RobotsTxt\ContentFactory;
// use Bee4\RobotsTxt\Parser;
require_once ($_SERVER['DOCUMENT_ROOT'].'/feed/parser/src/ContentFactory.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/feed/parser/src/Parser.php');

// $r = new RobotsTxtParser(file_get_contents('http://xtoolza.info/robots.txt'));


// Extract content from URL
$content = ContentFactory::build("http://xtoolza.info/robots.txt");
var_dump($content);


?>

?>























</body>
</html>
