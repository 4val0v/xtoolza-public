<?php

/**
 * Class HttpProvider
 * Для доступа к функциям передачи контента и выполнения запросов
 */
class HttpProviderCurl extends HttpProviderAbstract implements IHttpProvider {

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
        $curl = $this->InitCurl($method, $address, $headers);
        $raw = curl_exec($curl);
        $info = curl_getinfo($curl);
        $this->CloseConnection($curl);
        return $this->ExpandToLoopbackRawModel($raw, $info);
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
     * @throws Exception
     * @return LoopbackRawModel
     */
    public function PostMethod($address, $headers) {
        $curl = $this->InitCurl(RequestMethodConst::POST, $address, $headers);

        $postData = '';

        if ($this->IsDefaultPost()) {
            $postData = $this->_transportUtils->GetRawPostData();
        } else {

            $postWithoutMagicQuotes = $_POST;
            if (ServerHelper::IsEnableMagicQuotes()) {
                $postWithoutMagicQuotes = $this->_transportUtils->StripslashesRecur($_POST);
            }

            $shifterFiles = $this->_transportUtils->ShifterFiles($_FILES);
            $this->_transportUtils->RebuilderFiles($shifterFiles, $endPathToFiles);

            $files = array();
            foreach ($endPathToFiles as $k => $v) {
                // 	$a = "{$shifterFiles[levelOne][levelTwo][0][name]}";
                $toParam = $this->_transportUtils->GetArrayFromPath($shifterFiles, $k);
                if ($toParam['error'] == 0) {
                    $files[$k] = '@' . $toParam['tmp_name'] . ';filename=' . $toParam['name'] . ';type=' . $toParam['type'];
                } else {
                    $files[$k] = '@' . dirname(__FILE__) . "/" . "cerror.txt" . ';filename=';
                }
            }

            $post = array();
            $this->_transportUtils->Rebuilder($postWithoutMagicQuotes, $post);
            $postData = array_merge($post, $files);
        }

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);

        $raw = curl_exec($curl);
        if ($raw === false) {
            $curlError = curl_error($curl);
            $this->CloseConnection($curl);
            header(StatusCodeConst::Status_504);
            throw new Exception('Curl Error: ' . $curlError);
        }
        $info = curl_getinfo($curl);
        $this->CloseConnection($curl);
        return $this->ExpandToLoopbackRawModel($raw, $info);
    }

    private function InitCurl($method, $address, $headers) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $address);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, explode("\r\n", $headers));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $this->_connectTimeout);
        // проверено, описание такое же как в сокетах на stream_set_timeout
        curl_setopt($curl, CURLOPT_TIMEOUT, $this->_readTimeout);
        if (HttpHelper::IsHttps($address)) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }
        # curl_setopt($curl, CURLOPT_FAILONERROR, 0);
        return $curl;
    }

    /**
     * @param string $raw
     * @param object $info
     * @return LoopbackRawModel
     */
    private function ExpandToLoopbackRawModel($raw, $info) {
        $headers = $this->GetHeadersFromResponse($raw, $info);
        $content = $this->GetContentFromResponse($raw, $info);
        return new LoopbackRawModel($headers, $content);
    }

    private function GetHeadersFromResponse($raw, $info) {
        $headers = substr($raw, 0, $info['header_size'] - 4);
        return preg_split('#\r\n#', $headers);
    }

    private function GetContentFromResponse($raw, $info) {
        $content = substr($raw, $info['header_size'], strlen($raw));
        return $content;
    }

    /**
     * @param resource $stream
     */
    protected function CloseConnection($stream) {
        curl_close($stream);
    }
}