<?php

/**
 * Interface IHttpProvider
 */
interface IHttpProvider{

    /**
     * @param string $address
     * @param string $headers через \r\n
     * @return LoopbackRawModel
     */
    function GetMethod($address, $headers);

    /**
     * @param string $address
     * @param string $headers через \r\n
     * @return LoopbackRawModel
     */
    function PostMethod($address, $headers);

    /**
     * @param string[] $headers заголовки страницы
     * @param string $content контент страницы
     */
    function ShowPage($headers, $content);
}