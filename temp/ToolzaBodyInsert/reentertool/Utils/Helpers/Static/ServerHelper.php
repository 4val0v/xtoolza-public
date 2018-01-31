<?php


class ServerHelper {

    /**
     * Префикс который преписывает сервер для клиентских хэдеров
     */
    const ServerClientHeaderHttpPrefix = 'HTTP_';

    public static function IsPost(){
        return StringUtils::CompareInsensitive(self::GetValue(ServerConst::REQUEST_METHOD), RequestMethodConst::POST);
    }

    public static function GetRequestMethod(){
        return StringUtils::UpAllCharacter(self::GetValue(ServerConst::REQUEST_METHOD));
    }

    /**
     * Внимание регистрозависимая
     * @param $name
     * @return string|null
     */
    public static function GetValue($name){
        if(!isset($_SERVER[$name])){
            return null;
        }
        if(VarHelper::IsSetNotValue($_SERVER[$name])){
            return null;
        }
        return $_SERVER[$name];
    }

    /**
     * Берет клиентские хэдеры которые с префиксом HTTP_
     * СервероРегистроваяНотация
     * @param string HeaderConst $header
     * @return null
     */
    public static function GetClientHeaderValue($header){
        $serverHeader = self::ServerClientHeaderHttpPrefix . str_replace('-', '_', StringUtils::UpAllCharacter($header));
        if(VarHelper::IsSetNotValue($_SERVER[$serverHeader])){
            return null;
        }
        return $_SERVER[$serverHeader];
    }

    /**
     * @return bool
     */
    public static function IsEnableMagicQuotes(){
        return get_magic_quotes_gpc();
    }

} 