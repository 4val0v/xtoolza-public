<?php

class PageStatus {
    /**
     * @var string HttpVersionConst
     */
    public $Version;
    /**
     * @var int
     */
    public $StatusCode;
    /**
     * @var string
     */
    public $Name;

    /**
     * Возвращает полное имя Version StatusCode Name
     * @return string HttpVersionConst
     */
    public function GetStatus(){
        return $this->Version . ' ' . $this->StatusCode . ' ' . $this->Name;
    }

    /**
     * @param string StatusCodeConst $statusCodeConst
     * @throws Exception
     */
    public function SetStatus($statusCodeConst){
        if(VarHelper::IsSetNotValue($statusCodeConst)){
            throw new InvalidArgumentException('Аргумент не может быть NullOrEmpty');
        }
        $partsStatus = explode(' ', $statusCodeConst, 3);
        if(count($partsStatus) != 3 ){
            throw new Exception('Должно получится 3 значения');
        }
        $this->Version = $partsStatus[0];
        $this->StatusCode = $partsStatus[1];
        $this->Name = $partsStatus[2];
    }

    /**
     * @return bool
     */
    public function HasStatus(){
        return !VarHelper::IsSetNotValueOrEmpty($this->GetStatus());
    }
} 