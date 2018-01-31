<?php

/**
 * Class Headers
 * Используется серверная case sensitivity (UP)
 */
class Headers {
    /**
     * @var array
     */
    private $_headers = array();
    private $_keyValueSeparator = ': ';

    /**
     * @param string HeaderConst $name
     * @param string $value
     */
    public function AddHeader($name, $value) {
        $name = $this->ToServerCase($name);
        $this->AddRebuildToValueArray($name, $value);
    }

    /**
     * @param string $nameValue вида "Key: value"
     */
    public function AddHeaderLine($nameValue) {
        $headerParts = explode($this->_keyValueSeparator, $nameValue);
        $this->AddHeader($this->ToServerCase($headerParts[0]), $headerParts[1]);
    }

    /**
     * Добавляет или заменяет хэдер
     * @param string $name
     * @param string $value
     */
    public function AddOrUpdate($name, $value) {
        $name = $this->ToServerCase($name);
        $this->DeleteOnName($name);
        $this->AddHeader($name, $value);
    }

    /**
     * @param string $name
     */
    public function DeleteOnName($name) {
        $name = $this->ToServerCase($name);
        if ($this->Exist($name)) {
            unset($this->_headers[$name]);
        }
    }

    /**
     * @param $name
     * @return bool
     */
    public function Exist($name) {
        $name = $this->ToServerCase($name);
        return isset($this->_headers[$name]);
    }

    /**
     * Выдает строку хедеров с заданным разделителем
     * @param string $glue
     * @return string|null
     */
    public function GetJoinHeaders($glue = "\r\n") {
        $lineArrayHeaders = $this->GetLineArrayHeaders();
        if (VarHelper::IsSetNotValue($lineArrayHeaders)) {
            return null;
        }
        return join($glue, $lineArrayHeaders);
    }

    /**
     * Выдает массив хедеров
     * @return string[]|null
     */
    public function GetLineArrayHeaders() {
        return $this->ToLineArrayHeaders($this->_headers);
    }

    /***
     * @param string $name
     * @return string|string[]|null
     */
    public function GetValue($name) {
        $name = $this->ToServerCase($name);
        if ($this->Exist($name)) {
            return $this->_headers[$name];
        }
        return null;
    }

    /**
     * @return bool
     */
    public function HasHeaders() {
        return !ArrayHelper::IsNullOrEmpty($this->_headers);
    }

    /**
     * Обновляет только если есть с таким именем
     * @param string $name
     * @param string $value
     */
    public function Update($name, $value) {
        $name = $this->ToServerCase($name);
        if ($this->Exist($name)) {
            $this->_headers[$name] = $value;
        }
    }

    /**
     * Склеивает два объекта типа Headers
     * @param Headers $headers
     * @return void
     */
    public function MergeWith($headers) {
        if (!$headers instanceof Headers) {
            throw new InvalidArgumentException('Аргумент не является типом Headers');
        }
        $this->_headers = array_merge_recursive($this->_headers, $headers->_headers);
    }

    // ---------------------- private ---------------------- //

    private function ToServerCase($name){
        return StringUtils::UpAllCharacter($name);
    }

    /**
     * Если уже есть имя, преобраует в массив значений
     * @param $name
     * @param $value
     */
    private function AddRebuildToValueArray($name, $value) {
        if (VarHelper::IsSetNotValue($name)) {
            throw new InvalidArgumentException('Ключ не может быть пустым');
        }
        if ($this->Exist($name)) {
            $tempVars = $this->GetValue($name);
            if (is_array($tempVars)) {
                $tempVars[] = $value;
                $this->_headers[$name] = $tempVars;
            } else {
                $this->_headers[$name] = array($tempVars, $value);
            }
        } else {
            $this->_headers[$name] = $value;
        }
    }

    /**
     * @param Headers ->_headers $headersArray
     * @param null $pref оставляйте null, для рекурсии
     * @return string[]|null
     */
    private function ToLineArrayHeaders($headersArray, $pref = null) {
        $headersArrayLine = array();
        foreach ($headersArray as $k => $v) {
            if (is_array($v)) {
                $headersArrayLine = array_merge($headersArrayLine, $this->ToLineArrayHeaders($v, $k));
                continue;
            }
            $headersArrayLine[] = ($pref === null ? $k : $pref) . ': ' . $v;
        }
        if (ArrayHelper::IsNullOrEmpty($headersArrayLine)) {
            return null;
        }
        return $headersArrayLine;
    }


    /**
     * Найден ли элемент из массива
     * @param string[] $array
     * @return bool
     */
    public function ExistKeyIn($array) {
        foreach ($array as $val) {
            if ($this->Exist($val)) {
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
    public function GetFirstExistIn($array) {
        foreach ($array as $val) {
            if ($this->Exist($val)) {
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
    public function SwitchOnKey($currentKey, $newKey, $newValue) {
        if ($this->Exist($currentKey)) {
            $this->DeleteOnName($currentKey);
            $this->AddHeader($newKey, $newValue);
        }
    }


}