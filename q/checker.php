<html>
<head>
<title>сhecker.php</title>
</head>
<body>
<h1>functions test ver. 2.0140925</h1> <br />
<?php
echo "<!--
/*
Инструкция

1) Кладем файл checker.php в корень сайта
2) Запускаем файл по адресу http://наш_сайт/checker.php

 * Смотрим на ошибки, если есть.
 * Warning:...... означает, что какая-то используемая в checker.php функция не работает на сайте.
	* смотрим, какая функция должна быть на месте ошибки.
	* находим и комментируем соответствующие строки в checker.php
*/
-->";

header('Content-Type: text/html; charset=utf-8'); //кодировка

// .htaccess backup + create if not exist
function htaccessBK() {
	$htaccessfile = ".htaccess";
	if (!file_exists($htaccessfile)) {
		$htaccesswrite = fopen($htaccessfile, "w");
		fwrite($htaccesswrite, "#.htaccess file");
		fclose($htaccesswrite);
		echo ".htaccess created<br>";
	} else {
		echo ".htaccess already exist<br>";
	}
	copy (".htaccess", ".htaccess_checker_autobackup") or die ("Ошибка создания backup .htaccess");
}

htaccessBK(); //тут закоментировать, если не работает

// memory test
$_mainFileName = "index.php";
$_fileNameChecker = "checker.php";

function ReplaceSystemVars(){
	foreach($_SERVER as $k=>$v){
		$_SERVER[$k] = str_replace($_fileNameChecker, $_mainFileName, $_SERVER[$k]);
	}
}
ReplaceSystemVars();

echo ("memory limit: " . ini_get("memory_limit")); //memory limit in php.ini
echo "<br />Memory before Index.php (байт): " . memory_get_usage(true) . " = " . round(memory_get_usage(true)/1048576,2) . " МБ";
ob_start();
include $fileName;
$memory = memory_get_usage(true);
ob_end_clean();
echo "<br />Memory after Index.php (байт): " . $memory . " = " . round($memory/1048576,2) . " МБ" . " <br />(Свободной оперативной памяти для работы с тулзой должно быть не менее 20 МБ)<br>";

//Site directory size test

$pathsite = ($_SERVER['DOCUMENT_ROOT']);
//echo "<br />Home directory \"$pathsite\" size: ".filesize_r($pathsite)." bytes = " .(round((filesize_r($pathsite))/1048576,2)) . "Mb<br /><br />";

/*function filesize_r($pathsite){
  if(!file_exists($pathsite)) return 0;
  if(is_file($pathsite)) return filesize($pathsite);
  $ret = 0;
  foreach(glob($pathsite."/*") as $fn)
    $ret += filesize_r($fn);
  return $ret;
}*/

// Создаем папку
function FileCreateRead() {
	$structure = './test-123-folderUniquename74/';
	if (!mkdir($structure, 0777, true)) 
	echo "Cant create directory...";
	else
	chmod("./test-123-folderUniquename74", 0777); 
	//создаем файл info.php, наполняем его
	$intfile = fopen("./test-123-folderUniquename74/info.php","w+");
	$textinfile = "<?php echo \"<b>ok</b>\"; ?>";
	if (fwrite($intfile,$textinfile))
	echo "file created: ";
	else
	echo "file created: false";
	fclose($intfile);
//читаем файл
include './test-123-folderUniquename74/info.php';
}
// checker other functions
class Checker {

    var $_IO;
    var $_Http;

    function Exists($name){
        return function_exists($name);
    }

    function Start(){

        if($this->Exists('fopen') && $this->Exists('fwrite')){
            $this->Log('fopen-fwrite', 'ok');
            $this->_IO = new OldFileIO();
        } elseif($this->Exists('file_get_contents') && $this->Exists('file_put_contents')){
            $this->Log('file_get_contents-file_put_contents', 'ok');
            $this->_IO = new NewFileIO();
        }

        if($this->_IO === null){
            $this->Log('IO stack', 'FAIL');
            return;
        }


        if($this->Exists('fsockopen') && $this->Exists('fwrite')){
			$curlv = curl_version();
            $this->Log('cURL version', $curlv[version]); //curl version
            $this->Log('fsockopen-fwrite', 'ok');
            $this->_Http = new Socket();
        } elseif($this->Exists('curl_init') && $this->Exists('curl_exec')){
            $this->Log('curl_init-curl_exec', 'ok');
            $this->_Http = new Curl();
        } elseif($this->Exists('fopen') && $this->Exists('stream_context_create')){
            $this->Log('fopen-stream_context_create', 'ok');
            $this->_Http = new NetContext();
        }

        if($this->_Http === null){
            $this->Log('HTTP stack', 'FAIL');
            return;
        }

        $this->TestHtaccess();

        if($this->Exists('apache_get_version')){
            $this->Log('ServerSoftware', apache_get_version());
        }

        $this->Log('ServerSoftwareExt', $_SERVER['SERVER_SOFTWARE']);
        if($this->Exists('apache_get_modules')){
            echo "<br><pre>";
            print_r(apache_get_modules());
            echo "<br></pre>";
        }
		
		$this->ShowPhpinfo();
    }
	
	function ShowPhpinfo(){
		phpinfo();
	}
	
    function stripos($k, $s){
        $k = strtolower($k);
        $s = strtolower($s);
        return strpos($k, $s);
    }

    function TestHtaccess(){
        $firstFile = "testFirst.html";
        $secondFile = "testSecond.html";
        $htaccess = ".htaccess";

        $fistContent = "FirstPage";
        $secondContent = "RedirectPage";

        $htaccessRedirect = "RewriteEngine On" . "\n" . "RewriteRule $firstFile /$secondFile" . " [L,R=301]" . "\r";


        $this->_IO->CreateFile($firstFile, $fistContent);
        $this->_IO->CreateFile($secondFile, $secondContent);

        $this->_IO->FileStartAppend($htaccess, $htaccessRedirect);

        $headersArray = $this->_Http->GetHeaders($_SERVER['SERVER_NAME'], "/$firstFile");

        if(!isset($headersArray)){
            $this->Log('headers is', 'null');
            return;
        }
        foreach($headersArray as $h){
            if($this->stripos($h, 'Location') !== false){
                $this->Log("redirect found to ", "$h");
                return;
            }
        }
        $this->Log("redirect", "not found");
    }

    function Log($name, $rez){
        echo "<br>" . $name . ":\t" . "<b>" . $rez ."</b>";
    }


}

class Socket{
    function GetHeaders($host, $url){

        $stream = fsockopen($host, 80, $errno, $errstr, 30);
        if (!$stream) {
            echo "Ошибка сокета: $errstr ($errno)<br>\n";
        }

        $out  = "GET ". $url ." HTTP/1.0\r\n";
        $out .= "Host: " . $host;
        $out .= "\r\nConnection: close";
        $out .= "\r\n\r\n";

        fwrite($stream, $out);
        $fresponse = '';
        while (!feof($stream)) {
            $fresponse .= fgets($stream);
        }
        fclose($stream);

        $fcontent = explode("\r\n\r\n", $fresponse);
        $fhead = explode("\r\n", $fcontent[0]);
        array_shift($fcontent);
        $fcontent = join("\r\n\r\n", $fcontent);

        return $fhead;
    }
}

class Curl{
    function GetHeaders($host, $url){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://' . $host . $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        $headers = substr($result,0,$info['header_size']-4);
        return preg_split('#\r\n#',$headers);
    }
}

class NetContext{
    function GetHeaders($host, $url){
        $headers = array(
            'http'=>array(
                'method'=>"GET",
                'max_redirects' => '1',
                'ignore_errors' => '1',
            )
        );

        $context = stream_context_create($headers);
        $stream = @fopen('http://' . $host . $url, 'r', false, $context);


        $responseMeta = stream_get_meta_data($stream);
        fclose($stream);

        $responseHeaders;
        if(isset($responseMeta['wrapper_data']['headers'])){
            $responseHeaders = $responseMeta['wrapper_data']['headers'];
        } else {
            $responseHeaders = $responseMeta['wrapper_data'];
        }

        return $responseHeaders;
    }
}


class BaseIO{
	function IsFileExists($filename){
		return file_exists($filename);
	}
}

class NewFileIO extends BaseIO{
    function FileStartAppend($fileName, $fileContent){
        $oldContent = file_get_contents($fileName);
        $newContent = $fileContent . "\n" . $oldContent;
        if(file_put_contents($fileName, $newContent) === false){
            return false;
        }
        return true;
    }

    function CreateFile($fileName, $fileContent){
        if(file_put_contents($fileName, $fileContent) === false){
            return false;
        }
        return true;
    }
}

class OldFileIO extends BaseIO{
    function FileStartAppend($fileName, $fileContent){

        $handle = @fopen($fileName, "a+");
        if($handle == false){
            return false;
        }

        $oldContent = '';
        while (!feof($handle)) {
            $oldContent .= fgets($handle);
        }
        fclose($handle);

        $newContent = $fileContent . "\n" . $oldContent;

        $handle = @fopen($fileName, "w+");

        if(fwrite($handle,$newContent) === false){
            return false;
        }

        return true;
    }

    function CreateFile($fileName, $fileContent){
        $handle = @fopen($fileName, "w+");

        if(fwrite($handle,$fileContent) === false){
            return false;
        }
        return true;
    }
}

$checker = new Checker();
$checker->Start();
echo "<br>";

//чистим за собой
$path = './test-123-folderUniquename74';
unlink('./test-123-folderUniquename74/info.php');
echo "Файл info удален <br />";
rmdir('./test-123-folderUniquename74');
echo "Папка test-123-folderUniquename74 удалена<br />";
unlink('testFirst.html');
echo "Файл testFirst удален <br />";
unlink('testSecond.html');
echo "Файл testSecond удален <br />";

$row_number = 0; //Удалим 1 строку из .htaccess (rewriteengine on)
$file = file(".htaccess"); // Считываем весь файл в массив 
for($i = 0; $i < sizeof($file); $i++)
if($i == $row_number) unset($file[$i]);
$fp = fopen(".htaccess", "w");
fputs($fp, implode("", $file));
fclose($fp);
echo ".htaccess line \"RewriteEngine On\" deleted <br/>";

$row_number = 0; //Удалим 2 строку из .htaccess ещё раз - (rewriterule testFirst to testSecond)
$file = file(".htaccess"); // Считываем весь файл в массив
for($i = 0; $i < sizeof($file); $i++)
if($i == $row_number) unset($file[$i]);
$fp = fopen(".htaccess", "w");
fputs($fp, implode("", $file));
fclose($fp);
echo ".htaccess line \"RewriteRule testFirst.html /testSecond.html [L,R=301]\" deleted <br>"; 
unlink('checker.php');
echo "Файл checker.php удален <br />";
?>
</body>
</html>