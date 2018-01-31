<? 

error_reporting( E_ERROR );
ini_set('display_errors', 1);
ignore_user_abort(true);
set_time_limit(0);

function scan_ftp($link, $dir) 
  { 
    GLOBAL $filename; 
    // Получаем все файлы корневого каталога 
    $file_list = ftp_rawlist($link, $dir); 
    // Выводим содержимое каталога 
    // echo "<pre>"; 
    // print_r($dir);
    // echo "<pre>";
   // print_r($file_list);
    // echo "</pre>";
    foreach($file_list as $file) 
    { 
      // Разбиваем строку по пробельным символам 
      list($acc, 
           $bloks, 
           $group, 
           $user, 
           $size, 
           $month, 
           $day, 
           $year,
          $file1) = preg_split("/[\s]+/", $file,-1, PREG_SPLIT_OFFSET_CAPTURE); 
 
       $file=substr( $file,$file1[1],strlen($file));
         // Если файл начинается с точки - игнорируем его 
      if($file=="." || $file=="..") continue; 
      // Определяем является ли объект директорией 
      if(substr($acc[0], 0, 1) == 'd') 
      { 
        // Директория 
        // echo "<br/></pre>"; 
		// echo "Directory 1: ";
        // print_r($dir);
        // echo "</pre><br/>";
		 $ftp_user="u648485351";
		$ftp_pass="VcbvcNxZ";
		$str="185.28.20.96";
		$ftp_id=ftp_connect($str,21,1); //or die("Couldn't connect");
		@ftp_login($ftp_id,$ftp_user,$ftp_pass);
		ftp_set_option($ftp_id, FTP_TIMEOUT_SEC, 1000); 
		$filetodir = $dir.'testingFile.txt';
		$fileindir = 'testingFile.txt';  
		$source_file = 'temPUNique.txt';
		if (ftp_put($ftp_id, $filetodir, $source_file, FTP_ASCII)) {
			echo "$fileindir успешно загружен на сервер в $filetodir<br />";

		} else {
		echo "Не удалось загрузить $fileindir на сервер в $filetodir<br />";
		} 
		
		ftp_close($ftp_id);
		// $intfile = fopen($directory,"w+");
		// if (fwrite($intfile,$textinfile)) {
		    // echo '<br />file created: true';
        // }
		// else {
		    // echo "<br />file created: false";
        // }
		// fclose($intfile);
		
        scan_ftp($link, $dir.$file."/"); 
      } 
      // Определяем является ли объект файлом 
      if(substr($acc, 0, 1) == '-') 
      { 
        // Файл 
        $filename[] = $file." - ".$dir.$file; 
      } 
    } 
  } 
  			if (preg_match('|.tempUniqueFile.*|ism',file_get_contents('http://supdetki.esy.es/testingFile.txt'),$res)){
				echo 'root found!';
			}
 
 $ftp_user="u648485351";
 $ftp_pass="VcbvcNxZ";
 $str="185.28.20.96";
$ftp_id=ftp_connect($str,21,1); //or die("Couldn't connect");
@ftp_login($ftp_id,$ftp_user,$ftp_pass);
ftp_set_option($ftp_id, FTP_TIMEOUT_SEC, 1000); 

$dir = "/"; 
  // Запускаем сканер 
scan_ftp($ftp_id, $dir);




?>