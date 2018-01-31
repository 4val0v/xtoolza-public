<?

$html = '<p><img src="http://placekitten.com/200/300" alt="" width="200" height="300" /></p>';
$dom = new DOMDocument;
$dom->loadHTML($html);
$imgs = $dom->getElementsByTagName('p');
var_dump($imgs);

?>