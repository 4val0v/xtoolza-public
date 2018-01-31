<?php
header('Content-Type: text/html; charset=utf-8');
echo '<h1>functions test ver 2.0140516</h1> <br />';
//comment lines, which do not works

// .htaccess backup
copy (".htaccess", ".htaccess_checker_autobackup") or die ("Ошибка создания backup .htaccess");

class Checker {

	var $_mainFileName = "index.php";

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

		if(!$this->_IO->IsFileExists($this->_mainFileName)){
			echo "<br>" . "Файл не найден: " . $this->_mainFileName;
			return;
		}
		echo "<br> memory limit: " . ini_get("memory_limit");
		echo "<br>Оперативки до Include   (байт): " . $this->CheckMemory(null);
		echo "<br>Оперативки после Include(байт): " . $this->CheckMemory($this->_mainFileName);
		echo "<br>Свободной оперативной памяти должно быть не менее 20 МБ";

    }
	
	function CheckMemory($fileName){
		if($fileName == null){
			return memory_get_usage(true);
		}
		ob_start();
		include $fileName;
		$memory = memory_get_usage(true);
		ob_end_clean();
		return $memory;
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
phpinfo();