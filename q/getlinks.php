<?
function getlinks($oneurl){
	$url = 'http://xtoolza.info';
	$content = file_get_contents($url);
	$dom = new DOMDocument; 
	$dom->loadHTML($content); 

	$links = $dom->getElementsByTagName('a');
	foreach ($links as $link) { 
		echo $link->getAttribute('href'),'<br>'; 
	} 
}

$f = 'http://xtoolza.info';

echo getlinks($f);

echo "<br><br><br>";

$a = file_get_contents('http://xtoolza.info');
//$html = "<a href='http://xtoolza.info/agfsag'> xtoolza </a>";	
$dom = new DOMDocument; 
$dom->loadHTML($a); 
$books = $dom->getElementsByTagName('a');
foreach ($books as $book) { 
	echo $book->getAttribute('href'), PHP_EOL; 
	} 


?>