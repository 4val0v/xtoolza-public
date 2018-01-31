<?php

/**
 * Class HttpProvider
 * Для доступа к функциям передачи контента и выполнения запросов
 */
class HttpProviderIO extends HttpProviderAbstract implements IHttpProvider {

    public function __construct($transportUtils) {
        parent::__construct($transportUtils);
    }


    /**
     * @param string RequestMethodConst $method
     * @param string $address
     * @param $headers
     * @return LoopbackRawModel
     * @throws Exception
     */
    private function SampleRequest($method, $address, $headers){
        $context = array(
            'http' => array(
                'method' => $method,
                'max_redirects' => '1',
                'ignore_errors' => '1',
                'timeout' => $this->_readTimeout,
                'header' => $headers
            )
        );
        return $this->ExecuteAndExpandToLoopbackRawModel($address, $context);
    }

    /**
     * @param string $address
     * @param string $headers через \r\n
     * @return LoopbackRawModel
     */
    public function GetMethod($address, $headers) {
        return $this->SampleRequest(RequestMethodConst::GET, $address, $headers);
    }

    /**
     * @param string $address
     * @param string $headers через \r\n
     * @return LoopbackRawModel
     */
    public function OptionMethod($address, $headers) {
        return $this->SampleRequest(RequestMethodConst::OPTIONS, $address, $headers);
    }

    /**
     * @param string $address
     * @param string $headers через \r\n
     * @return LoopbackRawModel
     */
    function PostMethod($address, $headers) {
        $postData = '';

        if ($this->IsDefaultPost()) {
            $postData = $this->_transportUtils->GetRawPostData();
        } else {

            $postWithoutMagicQuotes = $_POST;
            if (ServerHelper::IsEnableMagicQuotes()) {
                $postWithoutMagicQuotes = $this->_transportUtils->StripslashesRecur($_POST);
            }

            preg_match('/boundary=(.*)/si', $_SERVER['CONTENT_TYPE'], $match);
            $boundary = $match[1];

            $postArray = array();
            $this->_transportUtils->Rebuilder($postWithoutMagicQuotes, $postArray);
            foreach ($postArray as $k => $v) {
                $postData .= '--' . $boundary . "\r\n";
                $postData .= 'Content-Disposition: form-data; name="' . $k . "\"\r\n\r\n" . $v . "\r\n";
            }
            if (!empty($_FILES)) {
                $shifterFiles = $this->_transportUtils->ShifterFiles($_FILES);
                $this->_transportUtils->RebuilderFiles($shifterFiles, $endPathToFiles);
                foreach ($endPathToFiles as $file => $parm) {
                    $toParam = $this->_transportUtils->GetArrayFromPath($shifterFiles, $file);
                    $fileContents = file_get_contents($toParam['tmp_name']);
                    $postData .= '--' . $boundary . "\r\n";
                    $postData .= 'Content-Disposition: form-data; name="' . $file . '"; filename="' . $toParam['name'] . "\"\r\n";
                    $postData .= 'Content-Type: ' . $toParam['type'] . "\r\n\r\n";
                    $postData .= $fileContents . "\r\n";
                }
            }
            $postData .= '--' . $boundary . '--';
        }

        $context = array(
            'http' => array(
                'method' => "POST",
                'max_redirects' => '1',
                'ignore_errors' => '1',
                'timeout' => $this->_readTimeout,
                'header' => $headers,
                'content' => $postData
            )
        );

        return $this->ExecuteAndExpandToLoopbackRawModel($address, $context);
    }

    /**
     * @param $address
     * @param $context
     * @throws Exception
     * @return LoopbackRawModel|null
     */
    private function ExecuteAndExpandToLoopbackRawModel($address, $context) {
        $context = stream_context_create($context);
        $stream = @fopen($address, 'r', false, $context);
        // это тут кажется не работает (timeout во враперах точно нужны и делают тоже самое)
        stream_set_timeout($stream, $this->_readTimeout);

        // TODO: проверить что тут возращается при > 5.2.10 с ответом 4**
        if (!$stream) {
            // проверка на врапер игнор
            if (version_compare(PHP_VERSION, '5.2.10', '<')) {
                $this->CloseConnection($stream);
                // тогда возможно это страница с 4** статусом
                // вариантов нет в текущем приоритете
                header(StatusCodeConst::Status_404);
                throw new Exception('Page Not Found');
            } else {
                $this->CloseConnection($stream);
                header(StatusCodeConst::Status_504);
                throw new Exception('Read Request Timeout');
            }
        }

        $content = stream_get_contents($stream);
        $meta = stream_get_meta_data($stream);
        $this->CloseConnection($stream);

        $responseHeaders = array();
        if (isset($meta['wrapper_data']['headers'])) {
            $responseHeaders = $meta['wrapper_data']['headers'];
        } else {
            $responseHeaders = $meta['wrapper_data'];
        }
        return new LoopbackRawModel($responseHeaders, $content);
    }

    /**
     * @param resource $stream
     */
    protected function CloseConnection($stream) {
        if (version_compare(PHP_VERSION, '5.2.1', '>=')) {
            // тут нужен имено stream_ т.к. используем враперы
            // доп. коменты в сокетах
            if (function_exists('stream_socket_shutdown')) {
                @stream_socket_shutdown($stream, 2);
            }
        }
        fclose($stream);
    }
}