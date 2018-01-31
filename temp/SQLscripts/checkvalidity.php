<?php
function start(){
  session_start();
  ignore_user_abort(true);
  set_time_limit(0);
  define(debug, 0); //change to 1 here to turn on debug mode
  define(ALL_ERRORS, 1);
  if (debug == 1) {
    ini_set('display_errors', 1);
    if (ALL_ERRORS == 1) {
      error_reporting(E_ALL);
      // phpinfo();
    }
  }
}
start();

define('DATE',date('Y-m-d H:i:s'));
define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('ROBOTS_FILE', DIR_ROOT.'/robots.txt');
define('ROBOTS_LINK', 'http://'.$_SERVER['HTTP_HOST'].'/robots.txt');
define('ROBOTS_BK_DIR', DIR_ROOT.'/seo_backups');
// var_dump(ROBOTS_BK_DIR);
define('ROBOTS_BK_LINK', 'http://'.$_SERVER['HTTP_HOST'].ROBOTS_BK_DIR.'/robots_bk.txt');
define('ROBOTS_BK_FILE', ROBOTS_BK_DIR.'/robots_bk.txt');
define('INDEX_FILE', ROBOTS_BK_DIR.'/index.html');
define('SETTINGS_FILE', ROBOTS_BK_DIR.'/settings.txt');
$reciever_email = file(SETTINGS_FILE);
chmod(DIR_ROOT.'/checkvalidity.php', 0777);

?>
<html>
<head>
  <style>
  .diff td{
    vertical-align : top;
    white-space    : pre;
    white-space    : pre-wrap;
    font-family    : monospace;
  }
  .diffDeleted {background-color:#F05133;}
  .diffInserted {background-color:#17A05D;}
  del {background-color:#F05133;}
  ins {background-color:#17A05D;}
  .red {color: red;} .green{color: green;}
  </style>
  </head>
<body>
<h1>Robots.txt difference</h1>
<sub><i>How it works?</i><br>By clicking ReNew robots.txt BACKUP button - script create 'seo_backups' folder <br> in site's root folder and putting there robots_bk.txt backup file, contain current version of original file. If you need to use CRONJOB task, <br> you can use services like <a href="http://webcron.org" target="_blank">webcron.org</a> or <a href="http://cron-job.org" target="_blank">cron-job.org</a> services. There is also if you have full access to your server - you can modify crontab application.<br> After all of that script compares two versions of robots.txt file. If there is some difference - it will send notification email to reciever.</sub><br><br>

<form method="post">
  <input type="text" placeholder="Enter email for notify"  name="settings">
  <input type="submit" class="btn-success btn" value="Save"/><br />
</form>

<form method="post">
  <input type="submit" class="btn-success btn" value="ReNew robots.txt BACKUP" border="0" name="insert"/><br />
</form>
<?
echo '<sup><ul>';
if($action = isset($_POST['insert'])){
  if (!file_exists(ROBOTS_BK_DIR)) {
    mkdir(ROBOTS_BK_DIR, 0777, true);
    chmod(ROBOTS_BK_DIR, 0777);

    $index_content = '<h1>Hello, world</h1>';
    $fpindex = fopen(INDEX_FILE, "w");
    fwrite($fpindex, $index_content);
    chmod(INDEX_FILE, 0777);
    fclose($fpindex);

    echo '<li><span class="green">seo_backups dir created</span></li>';
  } else echo '<li>seo_backups dir already exist</li>';
  $content = file_get_contents(ROBOTS_LINK);
  $fp = fopen(ROBOTS_BK_FILE, "w");
  if (fwrite($fp, $content)){
    chmod(ROBOTS_BK_FILE, 0777);
    echo '<li><span class="green">backup created in /seo_backups/robots_bk.txt</span></li>';
  } else echo '<span class="red"><li>can\'t create backup file. Turn on debug mode</li></span>';
  fclose($fp);
}
  echo '</ul></sup>';
// include the Diff class

if($action = isset($_POST['settings'])){
 if (!file_exists(ROBOTS_BK_DIR)) {
    mkdir(ROBOTS_BK_DIR, 0777, true);
    chmod(ROBOTS_BK_DIR, 0777);
  }

  $index_content = '<h1>Hello, world</h1>';
  $fpindex = fopen(INDEX_FILE, "w");
  fwrite($fpindex, $index_content);
  chmod(INDEX_FILE, 0777);
  fclose($fpindex);

$fp = fopen(SETTINGS_FILE, "w");
    $emailaddress =  trim($_POST['settings']);
    if (fwrite($fp, $emailaddress)){
      $reciever_email = file(SETTINGS_FILE);
      chmod(SETTINGS_FILE, 0777);
      echo '<span class="green">email address updated to <i>'.$reciever_email[0].'</i></span>';
    } else echo '<span class="red"><li>can\'t create update email address</span>';
    fclose($fp);
}

// A class containing functions for computing diffs and formatting the output.
class Diff{

  // define the constants
  const UNMODIFIED = 0;
  const DELETED    = 1;
  const INSERTED   = 2;

  /* Returns the diff for two strings. The return value is an array, each of
   * whose values is an array containing two values: a line (or character, if
   * $compareCharacters is true), and one of the constants DIFF::UNMODIFIED (the
   * line or character is in both strings), DIFF::DELETED (the line or character
   * is only in the first string), and DIFF::INSERTED (the line or character is
   * only in the second string). The parameters are:
   *
   * $string1           - the first string
   * $string2           - the second string
   * $compareCharacters - true to compare characters, and false to compare
   *                      lines; this optional parameter defaults to false
   */
  public static function compare(
      $string1, $string2, $compareCharacters = false){

    // initialise the sequences and comparison start and end positions
    $start = 0;
    if ($compareCharacters){
      $sequence1 = $string1;
      $sequence2 = $string2;
      $end1 = strlen($string1) - 1;
      $end2 = strlen($string2) - 1;
    }else{
      $sequence1 = preg_split('/\R/', $string1);
      $sequence2 = preg_split('/\R/', $string2);
      $end1 = count($sequence1) - 1;
      $end2 = count($sequence2) - 1;
    }

    // skip any common prefix
    while ($start <= $end1 && $start <= $end2
        && $sequence1[$start] == $sequence2[$start]){
      $start ++;
    }

    // skip any common suffix
    while ($end1 >= $start && $end2 >= $start
        && $sequence1[$end1] == $sequence2[$end2]){
      $end1 --;
      $end2 --;
    }

    // compute the table of longest common subsequence lengths
    $table = self::computeTable($sequence1, $sequence2, $start, $end1, $end2);

    // generate the partial diff
    $partialDiff =
        self::generatePartialDiff($table, $sequence1, $sequence2, $start);

    // generate the full diff
    $diff = array();
    for ($index = 0; $index < $start; $index ++){
      $diff[] = array($sequence1[$index], self::UNMODIFIED);
    }
    while (count($partialDiff) > 0) $diff[] = array_pop($partialDiff);
    for ($index = $end1 + 1;
        $index < ($compareCharacters ? strlen($sequence1) : count($sequence1));
        $index ++){
      $diff[] = array($sequence1[$index], self::UNMODIFIED);
    }

    // return the diff
    return $diff;
    // $content = file_get_contents(ROBOTS_LINK);
    // $fp = fopen(ROBOTS_BK_FILE, "w");
    // fwrite($fp, $diff);
    // fclose($fp);
  }

  /* Returns the diff for two files. The parameters are:
   *
   * $file1             - the path to the first file
   * $file2             - the path to the second file
   * $compareCharacters - true to compare characters, and false to compare
   *                      lines; this optional parameter defaults to false
   */
  public static function compareFiles(
      $file1, $file2, $compareCharacters = false){

    // return the diff of the files
    return self::compare(
        file_get_contents($file1),
        file_get_contents($file2),
        $compareCharacters);

  }

  /* Returns the table of longest common subsequence lengths for the specified
   * sequences. The parameters are:
   *
   * $sequence1 - the first sequence
   * $sequence2 - the second sequence
   * $start     - the starting index
   * $end1      - the ending index for the first sequence
   * $end2      - the ending index for the second sequence
   */
  private static function computeTable(
      $sequence1, $sequence2, $start, $end1, $end2){

    // determine the lengths to be compared
    $length1 = $end1 - $start + 1;
    $length2 = $end2 - $start + 1;

    // initialise the table
    $table = array(array_fill(0, $length2 + 1, 0));

    // loop over the rows
    for ($index1 = 1; $index1 <= $length1; $index1 ++){

      // create the new row
      $table[$index1] = array(0);

      // loop over the columns
      for ($index2 = 1; $index2 <= $length2; $index2 ++){

        // store the longest common subsequence length
        if ($sequence1[$index1 + $start - 1]
            == $sequence2[$index2 + $start - 1]){
          $table[$index1][$index2] = $table[$index1 - 1][$index2 - 1] + 1;
        }else{
          $table[$index1][$index2] =
              max($table[$index1 - 1][$index2], $table[$index1][$index2 - 1]);
        }

      }
    }

    // return the table
    return $table;

  }

  /* Returns the partial diff for the specificed sequences, in reverse order.
   * The parameters are:
   *
   * $table     - the table returned by the computeTable function
   * $sequence1 - the first sequence
   * $sequence2 - the second sequence
   * $start     - the starting index
   */
  private static function generatePartialDiff(
      $table, $sequence1, $sequence2, $start){

    //  initialise the diff
    $diff = array();

    // initialise the indices
    $index1 = count($table) - 1;
    $index2 = count($table[0]) - 1;

    // loop until there are no items remaining in either sequence
    while ($index1 > 0 || $index2 > 0){

      // check what has happened to the items at these indices
      if ($index1 > 0 && $index2 > 0
          && $sequence1[$index1 + $start - 1]
              == $sequence2[$index2 + $start - 1]){

        // update the diff and the indices
        $diff[] = array($sequence1[$index1 + $start - 1], self::UNMODIFIED);
        $index1 --;
        $index2 --;

      }elseif ($index2 > 0
          && $table[$index1][$index2] == $table[$index1][$index2 - 1]){

        // update the diff and the indices
        $diff[] = array($sequence2[$index2 + $start - 1], self::INSERTED);
        $index2 --;

      }else{

        // update the diff and the indices
        $diff[] = array($sequence1[$index1 + $start - 1], self::DELETED);
        $index1 --;

      }

    }

    // return the diff
    return $diff;
  }

  /* Returns a diff as a string, where unmodified lines are prefixed by '  ',
   * deletions are prefixed by '- ', and insertions are prefixed by '+ '. The
   * parameters are:
   *
   * $diff      - the diff array
   * $separator - the separator between lines; this optional parameter defaults
   *              to "\n"
   */
  public static function toString($diff, $separator = "\r\n"){

    // initialise the string
    $string = '';

    // loop over the lines in the diff
    foreach ($diff as $line){

      // extend the string with the line
      switch ($line[1]){
        case self::UNMODIFIED : $string .= '  ' . $line[0];break;
        case self::DELETED    : $string .= '- ' . $line[0];break;
        case self::INSERTED   : $string .= '+ ' . $line[0];break;
      }

      // extend the string with the separator
      $string .= $separator;

    }

    // return the string
    return $string;
  }

  /* Returns a diff as an HTML string, where unmodified lines are contained
   * within 'span' elements, deletions are contained within 'del' elements, and
   * insertions are contained within 'ins' elements. The parameters are:
   *
   * $diff      - the diff array
   * $separator - the separator between lines; this optional parameter defaults
   *              to '<br>'
   */
  public static function toHTML($diff, $separator = '<br>'){

    // initialise the HTML
    $html = '';

    // loop over the lines in the diff
    foreach ($diff as $line){
      // extend the HTML with the line
      switch ($line[1]){
        case self::UNMODIFIED : $element = 'span'; break;
        case self::DELETED    : $element = 'del';  break;
        case self::INSERTED   : $element = 'ins';  break;
      }
      $html .=
          '<' . $element . '>'
          . htmlspecialchars($line[0])
          . '</' . $element . '>';

      // extend the HTML with the separator
      $html .= $separator;

    }
    // return the HTML
    return $html;

  }

  /* Returns a diff as an HTML table. The parameters are:
   *
   * $diff        - the diff array
   * $indentation - indentation to add to every line of the generated HTML; this
   *                optional parameter defaults to ''
   * $separator   - the separator between lines; this optional parameter
   *                defaults to '<br>'
   */
  public static function toTable($diff, $indentation = '', $separator = '<br>'){
    if (file_exists(ROBOTS_FILE)) {
        $lastmodifyORIGINAL = date ("d-n-Y H:i:s", filemtime(ROBOTS_FILE));
    }
    if (file_exists(ROBOTS_BK_FILE)) {
        $lastmodifyBK = date ("d-n-Y H:i:s", filemtime(ROBOTS_BK_FILE));
    }
    // initialise the HTML
    $html = $indentation . "<table class=\"diff\">\n<tr><td><b>Current Robots ($lastmodifyORIGINAL)</b></td><td><b>BackUped Robots ($lastmodifyBK)</b></td></tr>";

    // loop over the lines in the diff
    $index = 0;
    while ($index < count($diff)){

      // determine the line type
      switch ($diff[$index][1]){

        // display the content on the left and right
        case self::UNMODIFIED:
          $leftCell =
              self::getCellContent(
                  $diff, $indentation, $separator, $index, self::UNMODIFIED);
          $rightCell = $leftCell;
          break;

        // display the deleted on the left and inserted content on the right
        case self::DELETED:
          $leftCell =
              self::getCellContent(
                  $diff, $indentation, $separator, $index, self::DELETED);
          $rightCell =
              self::getCellContent(
                  $diff, $indentation, $separator, $index, self::INSERTED);
          break;

        // display the inserted content on the right
        case self::INSERTED:
          $leftCell = '';
          $rightCell =
              self::getCellContent(
                  $diff, $indentation, $separator, $index, self::INSERTED);
          break;

      }

      // extend the HTML with the new row
      $html .=
          $indentation
          . "  <tr>\n"
          . $indentation
          . '    <td class="diff'
          . ($leftCell == $rightCell
              ? 'Unmodified'
              : ($leftCell == '' ? 'Blank' : 'Deleted'))
          . '">'
          . $leftCell
          . "</td>\n"
          . $indentation
          . '    <td class="diff'
          . ($leftCell == $rightCell
              ? 'Unmodified'
              : ($rightCell == '' ? 'Blank' : 'Inserted'))
          . '">'
          . $rightCell
          . "</td>\n"
          . $indentation
          . "  </tr>\n";

    }

    // return the HTML
    return $outhtml = $html . $indentation . "</table>\n";
  }

  /* Returns the content of the cell, for use in the toTable function. The
   * parameters are:
   *
   * $diff        - the diff array
   * $indentation - indentation to add to every line of the generated HTML
   * $separator   - the separator between lines
   * $index       - the current index, passes by reference
   * $type        - the type of line
   */
  private static function getCellContent(
      $diff, $indentation, $separator, &$index, $type){

    // initialise the HTML
    $html = '';

    // loop over the matching lines, adding them to the HTML
    while ($index < count($diff) && $diff[$index][1] == $type){
      $html .=
          '<span>'
          . htmlspecialchars($diff[$index][0])
          . '</span>'
          . $separator;
      $index ++;
    }

    // return the HTML
    return $html;

  }

}

// compare two files line by line
$diff = Diff::compareFiles(ROBOTS_LINK, ROBOTS_BK_FILE);
echo $tableDiff = Diff::toTable(Diff::compareFiles(ROBOTS_LINK, ROBOTS_BK_FILE));
// echo $htmlDiff = Diff::toHTML(Diff::compareFiles(ROBOTS_LINK, ROBOTS_BK_FILE));
$StringDiff = Diff::toString(Diff::compareFiles(ROBOTS_LINK, ROBOTS_BK_FILE));

// var_dump($diff);
// echo '<pre>';
// print_r($diff);
// echo '</pre>';
// compare two files character by character
// $diff = Diff::compareFiles('old.bin', 'new.bin', true);
$arrayvalues = array();
foreach ($diff as $line){
  // extend the HTML with the line
  if(($line[1]==1)||($line[1]==2)){
    array_push($arrayvalues,'1');
    // var_dump($arrayvalues);
    $message = true;
  }
  // else echo 0;
  // $message = false;
}

// var_dump($message);
if(isset($message) == true){
  $headers = 'From: checkvalidity@checker.com'."\r\n".'Reply-To: no-reply@test.com'."\r\n";
  $headers .= 'Content-Type: text/html; charset=UTF-8'."\r\n";
  $emailText = "Found changes in: <pre>".$StringDiff."</pre>\n\r More information at: <a href='http://". $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."'>".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."</a>\n\r";
  mail($reciever_email[0], $_SERVER['HTTP_HOST'].': Found dismatch in robots', $emailText,$headers);
} else echo "<h3>Changes not found</h3>";
?>
<br><br><br>
<form method="post">
  <input type="submit" class="btn-danger btn" value="Delete file from server" border="0" name="del"/><br />
</form>
<?
if($action = isset($_POST['del'])){
  if(unlink($_SERVER['DOCUMENT_ROOT'].'/checkvalidity.php')){
      echo '<div id="container"></div>';
      echo '<br><br><p style="font-size: 20px; color: green">File checkvalidity.php deleted</p>';
      ?>
      <body onLoad="tiktak();">
      <div>
        <?echo "<meta http-equiv='Refresh' content='10; URL=/'>";?>
        <script language="JavaScript" type="text/javascript">
            // значение начальной секунды
            var second=10;
            function tiktak()
            {
              if(second<=9){second="0" + second;}
              if(document.getElementById){timer.innerHTML=second;}
              if(second==00){return false;}
              second--;
              setTimeout("tiktak()", 1000);
            }
          </script>
          You will be redirected to main page throught <span id="timer"></span> seconds.
          <br><span><a href="http://<?echo $_SERVER['HTTP_HOST'];?>">Redirect now</a></span>
        </div>
      </body>
      <?
    }
    else echo '<br><br><p style="font-size: 20px; color: red">Cant delete file. Do it manually</p>';
  }
  ?>
</body>
</html>
