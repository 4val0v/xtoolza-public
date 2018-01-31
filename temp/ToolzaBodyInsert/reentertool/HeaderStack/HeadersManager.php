<?php

/**
 * Class HeadersManager
 * Технические манипуляции с хэдерами
 */
class HeadersManager {
    /**
     * @var IHeadersProvider
     */
    private $_headersProvider;

    function __construct($headersProvider) {
        $this->_headersProvider = $headersProvider;
    }

    /**
     * Список манипуляций с хэдерами
     * @param string $address
     * @param Headers $headers
     */
    public function PrepareRequest($address, $headers) {
        $this->SetHostHeader($headers, $address);
        $this->DisableAcceptEncoding($headers);
        $this->AddRingMagicHeader($headers);
        $this->DeleteProxyInformation($headers);
    }

    /**
     * @param Headers $headers
     * @param string $content
     */
    public function PrepareResponse($headers, $content) {
        $this->SetContentLength($headers, $content);
        $this->DeleteTransferEncoding($headers);
        $this->AddCorsAllowDomain($headers);
        $this->AddLastModified($headers);
    }

    /**
     * Только браузерские
     * @return Headers
     */
    public function GetInputHeaders() {
        return $this->_headersProvider->GetInputHeaders();
    }

    /**
     * @param Headers $headers
     */
    private function AddRingMagicHeader($headers) {
        $headers->AddOrUpdate('MONITORENGINE', 'turns');
    }

    /**
     * @param Headers $headers
     */
    private function DisableAcceptEncoding($headers) {
        $headers->AddOrUpdate(HeaderConst::AcceptEncoding, 'identity');
    }

    /**
     * @param Headers $headers
     * @param string $address
     */
    private function SetHostHeader($headers, $address) {
        $host = UrlHelpers::GetHost($address);
        $headers->AddOrUpdate(HeaderConst::Host, $host);
    }

    /**
     * @param Headers $headers
     * @param string $content
     */
    private function SetContentLength($headers, $content) {
        $headers->Update(HeaderConst::ContentLength, strlen($content));
    }

    /**
     * @param Headers $headers
     */
    private function DeleteTransferEncoding($headers) {
        $headers->DeleteOnName(HeaderConst::TransferEncoding);
    }

    /**
     * Добавляем разрешенный домен для Cross-Origin Resource Sharing
     * @param Headers $headers
     */
    private function AddCorsAllowDomain($headers) {
        $domain = UrlHelpers::WithHttp(ConfigsLazy::GetInstance()->domainPromotion);
        $headers->AddOrUpdate(HeaderConst::AccessControlAllowOrigin, $domain);
    }

    /**
     * @param Headers $headers
     */
    private function DeleteProxyInformation($headers) {
        $headers->DeleteOnName(HeaderConst::Via);
    }

    /**
     * @param Headers $headers
     */
    private function AddLastModified($headers) {
        $hour= rand(1, 6);
        $date = gmdate('D, d M Y H:i:s \G\M\T', time() - $hour * 3600);
        $headers->AddOrUpdate(HeaderConst::LastModified, $date);
    }
} 