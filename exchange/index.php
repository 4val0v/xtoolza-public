<?php 
$cont = file_get_contents('http://zenrus.ru/js/currents.js');
if(preg_match_all("/[\d-\.]+/", $cont, $arr, PREG_PATTERN_ORDER)) {
		echo '<br>1$ = '.$arr[0][0].' р.';
		echo '<br>1&#128; = '.$arr[0][1].' р.';
		echo '<br>1 барр. = '.$arr[0][2].' р.';
}
?>