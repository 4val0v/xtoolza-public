<?php

/**
 * Class Activator
 */
class Activator {

    public static function CreateInstance($name, $postfix){
        $fullName = StringUtils::UpEveryFirstCharacter($name) . $postfix;
        if(!class_exists($fullName)){
            throw new Exception('Активатор не может проинициализировать: ' . $fullName);
        }
        return new $fullName;
    }

    /**
     * @param string[] $nameList
     * @param $postfix
     * @return array
     */
    public static function CreateInstances($nameList, $postfix){
        $instanceList = array();
        foreach($nameList as $name){
            $instanceList[] = self::CreateInstance($name, $postfix);
        }
        return $instanceList;
    }
} 