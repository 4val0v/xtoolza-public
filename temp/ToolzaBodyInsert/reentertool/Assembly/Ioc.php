<?php

/**
 * Не забываем что позднее статическое связываение появилось только в <5.3.0
 * Class Ioc
 */
class Ioc {
    private static $instance = null;
    private $classList = array();

    /**
     * @param $name
     * @return mixed
     * @throws Exception
     */
    public static function Get($name){
        $instance = self::GetInstance();
        if(!self::IsExist($name, $instance)){
            throw new Exception('Такой класс не забинден: ' . $name);
        }
        return $instance->classList[$name];
    }

    /**
     * Создает объект класса на основе имени
     * @param $name
     * @throws Exception
     */
    public static function Set($name){
        $instance = self::GetInstance();
        if(self::IsExist($name, $instance)){
            self::ThrowDoubleBindingException($name);
        }
        if(!class_exists($name)){
            throw new Exception('Такого класса не существует или не найден: ' . $name);
        }
        $instance->classList[$name] = new $name;
    }

    public static function SetObject($name, $object){
        $instance = self::GetInstance();
        if(self::IsExist($name, $instance)){
            self::ThrowDoubleBindingException($name);
        }
        $instance->classList[$name] = $object;
    }

    public static function RebindObject($name, $object){
        $instance = self::GetInstance();
        if(!self::IsExist($name, $instance)){
            throw new Exception('Rebind незабинденого класса: ' . $name);
        }
        $instance->classList[$name] = $object;
    }


    private static function IsExist($name, $instance){
        return array_key_exists($name, $instance->classList);
    }

    /**
     * @return Ioc|null
     */
    private static function GetInstance(){
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    //-- Section Exception

    private static function ThrowDoubleBindingException($name){
        throw new Exception('Двойной биндинг класса: ' . $name);
    }

} 