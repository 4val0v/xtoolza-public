<?php

/**
 * Не используем в основе headerModel чтобы воспользоваться динамическими плюшками языка
 * Class Headers
 */
class Headers{
    /**
     * @var array
     */
    private $_headers = array();

    public function AddHeader($name, $value){
        $this->AddRebuildToValueArray($name, $value);
    }

    /**
     * @param HeaderModel[] $headersModel
     */
    public function AddHeaderModels($headersModel){
        if($headersModel == null || !is_array($headersModel)){
            return;
        }

        foreach($headersModel as $headerModel){
            $this->AddRebuildToValueArray($headerModel->_name, $headerModel->_value);
        }
    }

    /**
     * Обновляет только если есть с таким именем
     * @param string $name
     * @param string $value
     */
    public function Update($name, $value){
        if($this->Exist($name)){
            $this->_headers[$name] = $value;
        }
    }

    /**
     * Удаляет если есть с таким именем и вставляет новый
     * @param string $name
     * @param string $value
     */
    public function AddOrUpdate($name, $value){
        $this->DeleteOnName($name);
        $this->AddHeader($name, $value);
    }

    /**
     * Если уже есть имя, преобраует в массив занчений
     * @param $name
     * @param $value
     */
    private function AddRebuildToValueArray($name, $value){
        if($this->IsNull($name)){
            return;
        }
        if($this->Exist($name)){
            $tempVar = $this->_headers[$name];
            $this->_headers[$name] = array($tempVar, $value);
        } else {
            $this->_headers[$name] = $value;
        }
    }

    public function GetValue($name){
        if($this->Exist($name)){
            return $this->_headers[$name];
        }
        return null;
    }

    private function IsNull($name){
        return empty($name);
    }

    /**
     * @param $name
     * @return bool
     */
    public function Exist($name){
        return isset($this->_headers[$name]);
    }

    /**
     * @param string $name
     */
    public function DeleteOnName($name){
        if($this->Exist($name)){
            unset($this->_headers[$name]);
        }
    }

    /**
     * @return Array
     */
    public function GetHeaders(){
        return $this->_headers;
    }

    /**
     * @param Array $headersArray
     * @param null $pref
     * @return array|null
     */
    private function thisGetLineArrayHeaders($headersArray, $pref = null){
        $headersArrayLine = array();
        foreach($headersArray as $k => $v){
            if(is_array($v)){
                $headersArrayLine = array_merge($headersArrayLine, $this->thisGetLineArrayHeaders($v, $k));
                continue;
            }
            if(StringUtils::StartWith($k, 'HTTP/1')){
                $headersArrayLine[] = $k;
                continue;
            }
            $headersArrayLine[] = ($pref===null?$k:$pref) . ': ' . $v;
        }

        if(!$this->thisHasHeaders($headersArrayLine)){
            return null;
        }
        return $headersArrayLine;
    }


    public function AddHeadersFromLineArray($headersLineArray){
        foreach($headersLineArray as $line){
            $keyValue = explode(':', $line);
            if(StringUtils::StartWith($keyValue[0], 'HTTP/1')){
                $this->AddHeader(trim($keyValue[0]), '');
                continue;
            }
            $this->AddHeader(trim($keyValue[0]), trim(join(':', array_slice($keyValue, 1))));
        }
    }

    /**
     * Выдает массив хедеров
     * @return string[]|null
     */
    public function GetLineArrayHeaders(){
        return $this->thisGetLineArrayHeaders($this->GetHeaders());
    }

    /**
     * Выдает строку хедеров с заданным разделителем
     * @param string $glue
     * @return string
     */
    public function JoinHeaders($glue = "\r\n"){
        $lineArrayHeaders = $this->thisGetLineArrayHeaders($this->GetHeaders());
        return join($glue, $lineArrayHeaders);
    }

    /**
     * @return bool
     */
    public function HasHeaders(){
        return $this->thisHasHeaders($this->_headers);
    }

    /**
     * @param array $headerArray
     * @return bool
     */
    private function thisHasHeaders($headerArray){
        return count($headerArray) > 0;
    }

    /**
     * Найден ли элемент из массива
     * @param string[] $array
     * @return bool
     */
    public function ExistKeyIn($array)
    {
        foreach($array as $val){
            if($this->Exist($val)){
                return true;
            }
        }
        return false;
    }

    /**
     * Возвращает первый найденный элемент из входящего массива
     * @param string[] $array
     * @return string|null
     */
    public function GetFirstExistIn($array)
    {
        foreach($array as $val){
            if($this->Exist($val)){
                return $val;
            }
        }
        return null;
    }

    /**
     * Хотел назвать Switch, но нельзя
     * @param string $currentKey
     * @param string $newKey
     * @param string $newValue
     */
    public function SwitchOnKey($currentKey, $newKey, $newValue)
    {
        if($this->Exist($currentKey)){
            $this->DeleteOnName($currentKey);
            $this->AddHeader($newKey, $newValue);
        }
    }


}