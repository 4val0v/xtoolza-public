<html>
<p>
	<?php
    $array_new = array();
    array_push($array_new,'тортилия','кунжутный');
sort($array_new);
$max = count ($array_new) - 1;
$winner = $array_new[rand(0, $max)];
echo 'Winner is: '. (strtoupper($winner));
	?>
</p>
</html>



<?
function func($arg){
	$result=0;
	for ($i=0; $i < $arg ; $i++) { 
		$result = $result + $i;
	}
	return $result;
}
echo func(5);
?>
