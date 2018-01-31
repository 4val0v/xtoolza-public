<?

$sait = "http://www.autocontrol.ru/bfa8b260-e374-47bc-be94-b7a5a6015d06/ipshow.php";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $sait);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
echo curl_exec($ch);
curl_close($ch);

?>