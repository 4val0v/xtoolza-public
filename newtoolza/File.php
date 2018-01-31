<?php

/**
 * Class FileProvider
 * TODO: разобраться с кривыми ретурнами. Использовать полные пути define('ROOT_PATH'
 */
class File{

    private static $_navigatorDirNames = array('.','..');

    public static function Write($filename, $content){
        $result = @file_put_contents($filename, $content);
        if($result !== false){
            return true;
        } else {
            return false;
        }
    }

    public static function Append($filename, $content){
        $result = @file_put_contents($filename, $content, FILE_APPEND);
        if($result !== false){
            return true;
        } else {
            return false;
        }
    }

    public static function ReadAllText($filename){
        $content = @file_get_contents($filename);
        if($content !== false){
            return $content;
        } else {
            return false;
        }
    }

    public static function ReadAllLinesToArray($filename){
        $contentArr = file($filename,FILE_IGNORE_NEW_LINES);
        if(count($contentArr) == 0){
            return null;
        }
        return $contentArr;
    }

    public static function IsFileExists($filename){
        return file_exists($filename);
    }

    public static function IsDirExists($path){
        return self::IsFileExists($path);
    }

    /**
     * @param $path
     * @return resource or false
     */
    public static function Fopen($path){
        return @fopen($path, "rb");
    }

    public static function IsWritable($filename){
        return is_writable($filename);
    }

    public static function Chmod($filename, $permission){
        return chmod($filename,$permission);
    }

    public static function FindFiles($curDir, $findFileName){
        $result = array();

        $files = scandir($curDir);
        foreach($files as $file){
            if(in_array($file, self::$_navigatorDirNames)) {continue;}

            if(is_dir($curDir . $file)){
                $result = array_merge($result, self::FindFiles($curDir . $file . DS, $findFileName));
            }

            if($file === $findFileName){
                $result[] = $curDir . $file;
            }
        }
        return $result;
    }

    public static function Copy($filename, $filenameNew){
        if(!self::IsFileExists($filename)){
            return false;
        }
        return copy($filename, $filenameNew);
    }

    public static function GetFilesFromDir($dirPath){
        if(!self::IsDirExists($dirPath)){
            return null;
        }
        return array_diff(scandir($dirPath), self::$_navigatorDirNames);
    }

    public static function Create($path, $name) {
        $handle = fopen($path . $name, 'a');
        if($handle === false){
            return false;
        }
        fclose($handle);
        return true;
    }


}


?>