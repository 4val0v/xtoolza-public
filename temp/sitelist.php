<?
// error_reporting( E_ALL );
ini_set('display_errors', 1);
header('Content-Type: text/html; charset=utf-8');

$file = file_get_contents('sitelist.txt');
$files = explode("\r\n", $file);

foreach ($files as $fs){
	preg_match('|\Sessions(.*)\]|isU', $fs, $fa);
	// $out = (stripslashes($fa[1])).'<br>';
	$out = (stripslashes($fa[1])).'<br>';
	echo $out;
	// var_dump($out);
	// $out = explode(PHP_EOL,$out);
	// echo str_replace("<>")
}

// var_dump($list);exit;

?>