<?
$postData = file_get_contents('php://input');
// $data = json_decode($postData,true);

$filename = '/var/xtoolza.info/temp/tempfiles/got.txt';
file_put_contents($filename, $postData);
?>
