<?php

/**
 * Class Activator
 */
class Activator {

    /**
     * @param string $name
     * @return object class
     * @throws Exception
     */
    public static function CreateInstance($name){
        $fullName = StringUtils::UpEveryFirstCharacter($name);
        return self::Create($fullName);
    }

    /**
     * @param string $name
     * @param string $postfix
     * @return object class
     * @throws Exception
     */
    public static function CreateInstanceWithPostfix($name, $postfix){
        $fullName = StringUtils::UpEveryFirstCharacter($name) . $postfix;
        return self::Create($fullName);
    }

    /**
     * @param string[] $nameList
     * @param string $postfix
     * @return object[] class
     */
    public static function CreateInstancesWithPostfix($nameList, $postfix){
        $instanceList = array();
        foreach($nameList as $name){
            $instanceList[] = self::CreateInstanceWithPostfix($name, $postfix);
        }
        return $instanceList;
    }

    /**
     * @param string $fullName
     * @return object
     * @throws Exception
     */
    private static function Create($fullName){
        if(!class_exists($fullName)){
            throw new Exception('Активатор не может проинициализировать: ' . $fullName);
        }
        return new $fullName;
    }
} 