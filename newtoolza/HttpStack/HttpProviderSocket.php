<?php

/**
 * Class HttpProviderSocket
 * Для доступа к функциям передачи контента и выполнения запросов
 */
class HttpProviderSocket extends HttpProviderAbstract implements IHttpProvider {


    public function __construct($transportUtils){
        parent::__construct($transportUtils);
    }

    private function DoRequest($host, $data){

        $stream = fsockopen($host, 80, $errno, $errstr, $this->_connectTimeout);
        if (!$stream) {
            throw new Exception('Socket Error: ' . $errstr ($errno));
        }
        // будет таймаут если не поступило ничего.
        // не зависит от времени считывания большого файла
        stream_set_timeout($stream, $this->_readTimeout);

        fwrite($stream, $data);
        $response = '';
        while (!feof($stream)) {
            $buffer = fgets($stream);
			$streamMeta = stream_get_meta_data($stream);
            $isTimeout = $streamMeta['timed_out'];
            if ($buffer === false && $isTimeout) {
                $this->CloseConnection($stream);
                header(HeaderConst::Status_408);
                throw new Exception('Read Request Timeout');
            }
            $response .= $buffer;
        }
        $this->CloseConnection($stream);
        return $response;
    }

    function GetMethod($address, $headers) {
        $host = UrlHelpers::GetHost($address);
        $pathWithQuery =  UrlHelpers::GetPathWithQuery($address);

        $data  = 'GET ' . $pathWithQuery . " HTTP/1.0\r\n";
        $data .= $headers;
        $data .= "\r\nConnection: close";
        $data .= "\r\n\r\n";

        return $this->ExpandToLoopbackRawModel($this->DoRequest($host, $data));
    }

    public function PostMethod($address, $headers){

        $host = UrlHelpers::GetHost($address);
        $pathWithQuery =  UrlHelpers::GetPathWithQuery($address);

        $postWithoutMagicQuotes = $_POST;
        if(get_magic_quotes_gpc()){
            $postWithoutMagicQuotes = $this->_transportUtils->StripslashesRecur($_POST);
        }

        $postData = '';

        if(ServerHelper::GetValue(ServerConst::CONTENT_TYPE) == 'application/x-www-form-urlencoded') {
            $postData = TransportUtils::HttpBuildQuery($postWithoutMagicQuotes, true);
        } else {

            preg_match('/boundary=(.*)/si', ServerHelper::GetValue(ServerConst::CONTENT_TYPE), $match);
            $boundary = $match[1];

            $postArray = array();
            $this->_transportUtils->Rebuilder($postWithoutMagicQuotes, $postArray);
            foreach ($postArray as $k => $v) {
                $postData .= '--' . $boundary . "\r\n";
                $postData .= 'Content-Disposition: form-data; name="'. $k ."\"\r\n\r\n". $v ."\r\n";
            }
            if(!empty($_FILES)){
                $shifterFiles = $this->_transportUtils->ShifterFiles($_FILES);
                $this->_transportUtils->RebuilderFiles($shifterFiles,$endPathToFiles);
                foreach($endPathToFiles as $file => $parm) {
                    $toParam = $this->_transportUtils->GetArrayFromPath($shifterFiles, $file);
                    $fileContents = empty($toParam['tmp_name'])?'':file_get_contents($toParam['tmp_name']);
                    $postData .= '--' . $boundary . "\r\n";
                    $postData .= 'Content-Disposition: form-data; name="'. $file .'"; filename="'. $toParam['name'] ."\"\r\n";
                    $postData .= 'Content-Type: ' . $toParam['type'] . "\r\n\r\n";
                    $postData .= $fileContents . "\r\n";
                }
            }
            $postData .= '--' . $boundary . '--' . "\r\n";
        }

        $out  = 'POST ' . $pathWithQuery . " HTTP/1.0\r\n";
        $out .= $headers;
        $out .= "\r\nConnection: close\r\n";
        $out .= 'Content-Length: ' . strlen($postData);
        $out .= "\r\n\r\n";
        $out .= $postData;

        return $this->ExpandToLoopbackRawModel($this->DoRequest($host, $out));
    }

    /**
     * @param string $data
     * @return LoopbackRawModel
     */
    private function ExpandToLoopbackRawModel($data){
        $content = explode("\r\n\r\n", $data);
        $headers = explode("\r\n", $content[0]);
        array_shift($content);
        $content = join("\r\n\r\n", $content);
        return new LoopbackRawModel($headers, $content);
    }

    /**
     * @param resource $stream
     */
    protected function CloseConnection($stream){
        // нужно использовать на socket_create(), но до какойто версии это помогало
        if(function_exists('socket_shutdown') && function_exists('socket_close')){
            @socket_shutdown($stream, 2);
            @socket_close($stream);
        }
        fclose($stream);
    }

}