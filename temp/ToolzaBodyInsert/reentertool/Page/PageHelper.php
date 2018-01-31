<?php

class PageHelper {
    private static $_httpPrefix = 'HTTP/';

    /**
     * Конвертит LoopbackRawModel в PageWrapper
     * @param LoopbackRawModel $loopbackRawModel
     * @return PageWrapper
     */
    public static function ParseToPageWrapper($loopbackRawModel){
        if(VarHelper::IsSetNotValue($loopbackRawModel)){
            throw new InvalidArgumentException('Пытаемся распарсить null');
        }
        $pageWrapper = new PageWrapper();

        foreach($loopbackRawModel->Headers as $header){
            if(StringUtils::StartWith($header, self::$_httpPrefix)){
                $pageWrapper->Status->SetStatus($header);
            }else{
                $pageWrapper->Headers->AddHeaderLine($header);
            }
        }

        $pageWrapper->Content = $loopbackRawModel->Content;
        return $pageWrapper;
    }
} 