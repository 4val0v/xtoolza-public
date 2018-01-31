<?
header('Content-type: text/html; charset=utf-8');

function test(){
	$x = 1;
	do {
		echo $x;
	} while ($x++<10);
}

echo test();


?>