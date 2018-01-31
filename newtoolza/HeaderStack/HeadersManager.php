<?php


class HeadersManager {
    /**
     * @var IHeadersProvider
     */
    private $_headersProvider;

    function __construct($headersProvider){
        $this->_headersProvider = $headersProvider;
    }

    /**
     * Список манипуляций с хэдерами
     * @param string $address
     * @param Headers $headers
     */
    public function PrepareRequest($address, $headers)
    {
        $this->SetHostHeader($headers, $address);
        $this->DisableAcceptEncoding($headers);
        $this->AddRingMagicHeader($headers);
    }

    /**
     * @param Headers $headers
     * @param string $content
     */
    public function PrepareResponse($headers, $content)
    {
        $this->DeleteProtocolVersionHeader($headers);
        $this->SetContentLength($headers, strlen($content));
        $this->DeleteTransferEncoding($headers);
    }

    /**
     * Только браузерские
     * @return Headers
     */
    public function GetInputHeaders()
    {
        $headers = new Headers();
        $headers->AddHeaderModels($this->_headersProvider->GetInputHeaders());
        return $headers;
    }


    /**
     * @param Headers $headers
     */
    private function AddRingMagicHeader($headers){
        $headers->AddOrUpdate('MONITORENGINE', 'turns');
    }

    /**
     * @param Headers $headers
     */
    private function DisableAcceptEncoding($headers){
        $headers->AddOrUpdate('ACCEPT-ENCODING', 'identity');
    }

    /**
     * @param Headers $headers
     * @param string $address
     */
    private function SetHostHeader($headers, $address){
        $host = UrlHelpers::GetHost($address);
        $headers->AddOrUpdate('HOST', $host);
    }

    /**
     * @param Headers $headers
     * @param string $content
     */
    private function SetContentLength($headers, $content)
    {
        $headers->Update('Content-Length', strlen($content));
    }

    /**
     * @param Headers $headers
     */
    private function DeleteTransferEncoding($headers)
    {
        $headers->DeleteOnName('Transfer-Encoding');
    }

    /**
     * Если этого не сделать, будут на некоторых сайтах появляется 4 символа вначале контента.
     * Дело в том, в скриптах, жестко указывается отдача заголовков, используя протокол HTTP/1.1. В то время,
     * как на сервере работает связка apache + nginx. И nginx в свою очередь обращается к Apache
     * по протоколу HTTP/1.0. Apache, будучи поставлен перед необходимостью отдать ответ HTTP/1.1 на запрос в HTTP/1.0,
     * начинает отдавать все chunk'ами, добавляя в заголовок Transfer-Encoding: chunked
     * Непонятные символы — это длина чанков. nginx же такого поведения не ожидает и воспринимает их как часть ответа.
     *
     * @param Headers $headers
     */
    private function DeleteProtocolVersionHeader($headers)
    {
        $headers->DeleteOnName('HTTP/1.0 200 OK');
        $headers->DeleteOnName('HTTP/1.1 200 OK');
    }

    /**
     * Устанавливает пустой список хедеров вместо null
     * @param Headers|null $headers
     * @return Headers
     */
    public function SetEmptyHeadersIfNull($headers)
    {
        if(!VarHelper::IsSetValue($headers)){
            return new Headers();
        }
        return $headers;
    }


} 