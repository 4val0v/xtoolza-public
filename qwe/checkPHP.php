<?
header('Content-Type: text/html; charset=utf-8');

//функция получения HTTP-заголовков 
function get_content($hostname, $path) 
{ 
	$line=""; 
//устанавливаем соединение, имя которого 
//передано в параметре $hostname 
	$fd=fsockopen($hostname, 80, $errno, $errstr, 30); 
//проверяем успешность установки соединения 
	if(!fd) echo "$errstr ($errno)<br>/>\n"; 
	else 
	{ 
//формируем HTTP-запрос для передачи его серверу 
		$headers="GET $path HTTP/1.1\r\n"; 
		$headers.="Host: $hostname\r\n"; 
		$headers.="Connection: Close\r\n\r\n"; 
//отправляем HTTP-запрос серверу 
		fwrite ($fd, $headers); 
		$end=$false; 
//получаем ответ 
		while (!$end) 
		{ 
			$line=fgets($fd, 1024); 
			if(trim($line)=="") $end=true; 
			else $out[]=$line; 
		} 
		fclose($fd); 
	} 
	return $out; 
} 
$hostname="xtoolza.info"; 
$path="/"; 
//устанавливаем большее время работы 
//скрипта- пока вся страница не загружена, 
//она не будет отображаться 
set_time_limit(180); 
function httpstatus($hostname)
{
//вызываем функцию 
$out=get_content($hostname, $path); 
//выводим содержимое массива 
return $out;
}
$httpheaders = httpstatus($hostname);
$httpexp = explode("\r\n",$httpheaders);
$count_words = preg_match_all('/php/i', $httpexp, $matches);
var_dump($httpexp);
echo "<br>php найдено в заголовках: ".$matches[1];
?>