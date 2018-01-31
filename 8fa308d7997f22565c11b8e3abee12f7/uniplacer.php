<?php
/**
* PHP-клиент Uniplace
*
* class Uniplacer - класс для вывода ссылок на странице
*
* @version 1.0.23 от 06.08.2014
*/

#_ZIP_NAME_uniplacer.php_#  // Строчку убирать НЕЛЬЗЯ - это идентификатор файла для скрипта обновления

require_once($_SERVER['DOCUMENT_ROOT'].'/uniplacer_config.php');


define ("_DEBUG_", false); // Необходим ли вывод отладочной информации
define ("_ULINEMAXLENGTH_", 1024); // Максимальная длина строки в файле с базой ссылок (в байтах ака символах)
define ("_ULINEMINLENGTH_", 10); // Минимальная длина строки в файле с базой ссылок (в байтах ака символах)
define ("_ULINEMAXBUFFERSTRINGCOUNT_", 500); // Максимальная размер буфера перед записью(в строках)
define ("_UMAXLINKCOUNTONPAGE_", 5); // Максимальное количество ссылок на странице
define ("_UMAXLINKCOUNTONLOG_", 100); // Максимальное количество ссылок на в отдаваемом по запросу логе
define ("_UMAXLOGSIZE_", 1048576); // Максимальный размер файла-лога (в байтах)

define("_UWSUPDATEHOST_", "api.qlinx.ru"); // Сервер обновления
define("_USOCKETPORT_", 80); // Порт обращения к серверу обновлений
define("_USOCKETTIME_", 30); // Максимальное время ожидания ответа от сервера
define("_USUCCESSURL_", 'ConfirmUpdate.axd'); // URL подтверждения обновления


/**
* Функция выводит сообщение
* @param string $message Выводимое сообщение
*/
function _debugString($message){
	if(_DEBUG_) echo "<!--".$message."-->\n\r";
}

function var_dumper($data){
	ob_start();
	var_dump($data);
	$result = ob_get_contents();
	ob_get_clean();
	return $result;
}

/**
* Функция удаления сиволов окончания строки у строки
* @param string $string Строка
*/
function _qTrim($string) {
	return trim($string, "\r\n");
}

function _lsTrim($string) {
	return rtrim($string, "/? ");
}

function _getUrlHash($url, $charset) {
	if(function_exists("mb_convert_case") == true) {
		if ($charset)
		{
			return md5(mb_convert_case(_lsTrim(urldecode($url)), MB_CASE_LOWER, $charset));
		}
		else
		{
			return md5(mb_convert_case(_lsTrim(urldecode($url)), MB_CASE_LOWER, "utf-8"));
		}
	}
	else {
		return md5(strtolower(_lsTrim(urldecode($url))));
	}
}

function _cmp_hash_element($a, $b) {
    if ($a[5] === $b[5]) {
        return 0;
    }
    return ($a[5] < $b[5]) ? -1 : 1;
}

/**
 * разбиение строки на поля.
*/
function _splitOurString($str) {
	$i = 0;
	$str2 = $str;
	/// поиск буферной подстроки для замены и замена
	for( ; $i < 255; ++$i) {
		if (strpos($str, "&amp_".$i) === FALSE) {
			$str2 = str_replace("&amp;", "&amp_".$i, $str);
			break;
		}
	}
	/// разбиение
	$resultArray = explode(";", $str2);
	/// замена буферной строки обратно, заполнение недостающих полей - чтобы не было нотисов
	for($j = 0; $j < 5; ++$j) {
		if ($j < count($resultArray)) {
			$resultArray[$j] = str_replace("&amp_".$i, "&amp;", $resultArray[$j]);
		} else {
			$resultArray[$j] = '';
		}
	}
	
	return $resultArray;
}

  /*
  *   Класс Uniplacer
  *   Вывод ссылок из БД, хранение статистики просмотра страниц и вывод данных по запросу через хэндлер sync.php
  */
class Uniplacer{
	/**
	* @var UniplacerVersion Версия скрипта
	*/
	var $UniplacerVersion = "1.0.23";

	/**
	* @var UniplacerUser Пользователь
	*/
	var $UniplacerUser = "";

	/**
	* @var UniplacerMaxLinksOnPage Максимальное количество выводимых на странице ссылок
	*/
	var $UniplacerMaxLinksOnPage = "5";

	/**
	* @var UniplacerDBFileName Имя файла с БД ссылок
	*/
	var $UniplacerDBFileName = "unilinks.db";

	/**
	* @var UniplacerLogFileName Имя файла с логом статистики загрузки страниц
	*/
	var $UniplacerLogFileName = "ulog.db";

	/**
	* @var UniplacerDBPath Путь к файлу с БД ссылок
	*/
	var $UniplacerDBPath = "";

	/**
	* @var UniplacerLogPath Путь к логу статистики загрузки страниц
	*/
	var $UniplacerLogPath = "";

	/**
	* @var UniplacerDBData Массив с ссылками для текущей страницы
	*/
	var $UniplacerDBData = Array();

	/**
	* @var UniplacerCharset !!! Внимание !!! Конфигурится в uniplacer_config.php константой _UNIPLACE_CHARSET_ или при вызове конструктора.
	*/
	var $UniplacerCharset = "";

	/**
	* @var UniplacerAlreadyFind Флаг указывающий на то, что для текущей страницы ссылки найдены и больше их искать не нужно
	*/
	var $UniplacerAlreadyFind = false;

	/**
	* @var UniplacerUpdatePath Путь к папке с обновлениями
	*/
	var $UniplacerUpdatePath = "";

	/**
	* @var UniplacerBackupPath Путь к папке с резервной копией файлов посл еобновления
	*/
	var $UniplacerBackupPath = "";
	
	/**
	* @var UniplaceDefaultEncoding Кодировка в которой лежит db
	*/
	var $UniplaceDefaultEncoding = "UTF-8";

	/*
	* Конструктор
	* @param string $string Пользователь
	* @param string $charset Кодировка
	*/
	function Uniplacer($user, $charset=false) {
		$this->UniplacerUser = $user;
		if ($charset) {
			$this->UniplacerCharset = $charset;
		} else {
			$this->UniplacerCharset = defined("_UNIPLACE_CHARSET_") ? _UNIPLACE_CHARSET_ : "";
		}
		$this->UniplacerDBPath = $_SERVER["DOCUMENT_ROOT"]."/".$this->UniplacerUser."/".$this->UniplacerDBFileName;
		$this->UniplacerLogPath = $_SERVER["DOCUMENT_ROOT"]."/".$this->UniplacerUser."/".$this->UniplacerLogFileName;
		$this->UniplacerUpdatePath = $_SERVER["DOCUMENT_ROOT"]."/".$this->UniplacerUser."/update";
		$this->UniplacerBackupPath = $_SERVER["DOCUMENT_ROOT"]."/".$this->UniplacerUser."/backup";
		$this->_removeUpdateTail();
	}

	/**
	* Вывод хедера о неудачной операции
	*/
	function _returnFailHeader() {
		echo "{result:failed}\r\n";
	}

	/**
	* Вывод хедера о удачном завершении операции
	*/
	function _returnSuccessHeader() {
		echo "{result:success, version:".$this->UniplacerVersion.", platform:php}\r\n";
	}

	/**
	* Рекурсивное удаление каталога(непустое)
	* @param string $dir Удаляемая директория
	*/
	function DeleteCatalog($dir) {
		if(file_exists($dir)) {
			@chmod($dir,0777);
			if(@is_dir($dir)) {
				$handle = @opendir($dir);
				while($filename = @readdir($handle)) {
					if ($filename != "." && $filename != "..") {
						$this->DeleteCatalog($dir."/".$filename);
					}
				}
				@closedir($handle);
				@rmdir($dir);
			} else {
				@unlink($dir);
			}
		}
	}

	/**
	* Замена файлов с возможным сохранением в папку бэкапа
	* @param string $filename Имя файла
	* @param boolean $needBacup Флаг необходимости сохранения резервной копии заменяемого при обновлении файла
	*
	* @return boolean Успешность завершения операции
	*/
	function ReplaceFile($filename, $needBackup = false) {
		$from = $this->UniplacerUpdatePath."/".$filename;
		$to = $_SERVER["DOCUMENT_ROOT"]."/"._UNIPLACE_USER_."/".$filename;
		$backup = $this->UniplacerBackupPath."/".$filename;

		if (!file_exists($from)) {
			return false;
		}
		
		if (!file_exists($to)) {
			return false;
		}

		if ($needBackup) {
			if (!file_exists($this->UniplacerBackupPath)) {
				if (@mkdir($this->UniplacerBackupPath)) { 
					@chmod($this->UniplacerBackupPath, 0777); 
				} else {
					return false;
				}
			}

			if (file_exists($backup)) {
				@chmod($backup, 0777);
				@unlink($backup);
			}

			if (!@copy($to, $backup)) {
				return false;
			}
		}

		if (!@unlink($to)) {
			return false;
		}
		if (!@copy($from, $to)) {
			return false;
		}
		@chmod($to, 0777);
		if (!@unlink($from)) {
			return false;
		}

		return true;
	}

	/**
	* Удаляем "хвост" оставшийся после обновления, а именно заменяем сам скрипт Update.php (если такой есть)
	*/
	function _removeUpdateTail() {
		$opidFile = $_SERVER["DOCUMENT_ROOT"]."/"._UNIPLACE_USER_."/qlinkop.id";

		if (file_exists($opidFile)) {
			$fHandle = @fopen($opidFile, "rb");
			$OpID = @fread($fHandle, filesize($opidFile));
			@fclose($fHandle);
			@unlink($opidFile);

			//Проверим, существуте ли папка update
			if (file_exists($this->UniplacerUpdatePath)) {
				// Проверим, сколько там файлов
				$filesArray = Array();

				$handle = @opendir($this->UniplacerUpdatePath);
				while ($filename = @readdir($handle)) {
					if ($filename != "." && $filename != "..") {
						$filesArray[] = $filename;
					}
				}
				@closedir($handle);

				if ((count($filesArray) == 1) && (in_array("Update.php", $filesArray))) {
					if ($this->ReplaceFile("Update.php", true)) {
						$this->DeleteCatalog($this->UniplacerUpdatePath);
						$this->_sendUpdateResult($OpID);
					}
				}
			}
		}
	}

	/**
	*  Вызов хэндлера для сообщения об успешном обновлении скрипта
	*  @param string $OpID Идентификатор операции обновления
	*/
	function _sendUpdateResult($OpID){
		$fHandler = fsockopen(_UWSUPDATEHOST_, _USOCKETPORT_, $errno, $errstr, _USOCKETTIME_);
		if (!$fHandler) {
			return false;
		}

		$request = "GET "."/"._USUCCESSURL_."?qlid=".$this->_getCode()."&opid=".$OpID."&version=".$this->UniplacerVersion." HTTP/1.0\r\nHost: "._UWSUPDATEHOST_."\r\nUser-Agent: Uniplace PHP Client\r\n\r\n";
		@fputs($fHandler, $request);
		$response = @fgets($fHandler, 1000);

		@fclose($fHandler);
	}

	function _getCode() {
		$hash = md5($this->UniplacerUser);
		return substr($hash, 0, 8);
	}

	/**
	*  Вывод первых 8-ми смволов md5 хеша от пользователя
	*  @param boolean $noHtml Выводить чистый код без html или нет
	*/
	function GetCode($noHtml = false){
		$code = "<!--".substr($this->_getCode(), 0, 8)."-->\r\n";
		if ($noHtml) {
			return $code;
		} else {
			echo $code;
		}
	}

	/**
	* Возвращаем лог просмотров страниц
	*/
	function GetPagesLog() {
		if (file_exists($this->UniplacerLogPath)) {
			$rHandler = @fopen($this->UniplacerLogPath, "rb");
			if (!$rHandler) {
				return false;
			}
			$this->_returnSuccessHeader();
			while (($currentString = @fgets($rHandler, _ULINEMAXLENGTH_)) !== false) {
				echo $currentString;
			}
			@fclose($rHandler);
			@unlink($this->UniplacerLogPath);
		} else {
			echo $this->_returnSuccessHeader();
		}
	}

	function _log($data) {
		$fHandle = @fopen($_SERVER["DOCUMENT_ROOT"]."/".$this->UniplacerUser."/data.log", "a+");
		if (!$fHandle) {
			return false;
		}
		@fwrite($fHandle, $data);
		@fclose($fHandle);
	}

	/**
	* Вывод лога БД имеющихся ссылок
	* @param int $page Номер страницы списка ссылок    *
	*/
	function GetLinksLog($page = false) {
		if (!intval($page)) {
			$page = 0;
		}
		
		if (file_exists($this->UniplacerDBPath)) {
			$rHandler = @fopen($this->UniplacerDBPath, "rb");
			if (!$rHandler) {
				return false;
			}
			$this->_returnSuccessHeader();
			if (intval($page) && $page>0) {
				$counter = 0;
				while (($currentString = @fgets($rHandler, _ULINEMAXLENGTH_)) !== false) {
					if (
							intval($page) &&
							($counter >= ( _UMAXLINKCOUNTONLOG_ * ($page-1))) &&
							($counter < ( _UMAXLINKCOUNTONLOG_ * $page))
						) {
						$lineArray = _splitOurString($currentString);
						echo trim($lineArray[0].";".$lineArray[1].";".$lineArray[2].";".$lineArray[3].";")."\r\n";
					}
					$counter++;
				}
			} else {
				while (($currentString = @fgets($rHandler, _ULINEMAXLENGTH_)) !== false) {
					$lineArray = _splitOurString($currentString);
					echo trim($lineArray[0].";".$lineArray[1].";".$lineArray[2].";".$lineArray[3].";")."\r\n";
				}
			}

			@fclose($rHandler);
		} else {
			echo $this->_returnFailHeader();
		}
	}
	
	function _encoding($charset_from, $charset_to, $text) {
		if (empty($charset_from) || empty($charset_to) || $charset_from === $charset_to) {
			return $text;
		}
		if (function_exists('mb_convert_encoding')){
			$text_new = $this->_mb_convert_encodingInternal($charset_from, $charset_to, $text);
		} elseif (function_exists('iconv')){
			$text_new = $this->_iconvInternal($charset_from, $charset_to, $text);
		}
		if ($text_new) {
			return $text_new;
		}
	    return $text;
	}
	
	function _iconvInternal($charset_from, $charset_to, $text){
		return @iconv($charset_from, $charset_to, $text);
	}
	
	function _mb_convert_encodingInternal($charset_from, $charset_to, $text){
		return @mb_convert_encoding($text, $charset_to, $charset_from);
	}

	/**
	* Поиск позиции начала строки в файле
	* @param resource $rHandler Указатель на открытый файл
	* @param int $upTo На сколько строк вверх искать начало строки
	*
	* @return int Позиция начала строки
	*/
	function _getStartStringPosition(&$rHandler, $upTo){
		$textArray = Array();
		$nowPosition = @ftell($rHandler);
		$countStartPos = 0;
		while (($countStartPos < $upTo) && ($nowPosition >= 0)) {
			$nowPosition -= 1;

			@fseek($rHandler, $nowPosition);
			$nowSym = @fgetc($rHandler);

			if ($nowPosition < 0) {
				$nowPosition = 0;
				$countStartPos++;
				rewind($rHandler);
			}

			if ((ord($nowSym) == 10)) {
				$countStartPos++;
			}
		}

		return $nowPosition;
	}

	/**
	*  Получение массива ссылок
	*  @param int $NumOfLinks количество ссылок
	*
	*  @return string [] ссылок
	*/
	function GetLinks($NumOfLinks = false) {
		//Проверим, возможно ссылки уже были найдены
		if ($this->UniplacerAlreadyFind) {
			if (count($this->UniplacerDBData)) {
				return $this->_printTextBlock($NumOfLinks);
			} else {
				return false;
			}
		}

		$request_uri = getenv('REQUEST_URI');
		if($request_uri === "/") {
			$needUrl = $_SERVER["HTTP_HOST"];
		} else {
      $needUrl = $_SERVER["HTTP_HOST"].$request_uri;
		}

	    if(substr($needUrl,0,4) == "www."){
	      $needUrl = substr($needUrl,4,strlen($needUrl));
	    }
		$needUrl = rtrim($needUrl,"/");
		$needUrl = _lsTrim($needUrl);
		    
		$urlHash = _getUrlHash($needUrl, $this->UniplacerCharset);
		
		$totalLinks = Array();

		if (!file_exists($this->UniplacerDBPath)) {
			return false;
		}

		// Открываем базу ссылок для чтения
		$rHandler = @fopen($this->UniplacerDBPath, "rb");
		if (!$rHandler) {
			return false;
		}

		/*
		*  Применяем бинарный поиск для нахождения строки с адресом текущей страницы
		*/

		$sizeOfFile = filesize($this->UniplacerDBPath);

		$currentString = @fgets($rHandler, _ULINEMAXLENGTH_);
		$currentString = _qTrim($currentString);
		$lineArray = _splitOurString($currentString);
		if ($urlHash < $lineArray[4]) {
			return false;
		}

		@fseek($rHandler, $sizeOfFile-5);

		$lastPosition = $this->_getStartStringPosition($rHandler, 1);
		$currentString = @fgets($rHandler, _ULINEMAXLENGTH_);
		$currentString = _qTrim($currentString);
		$lineArray = _splitOurString($currentString);
		if($urlHash > $lineArray[4]) {
			return false;
		}

		$isFoundLast = false;

		@rewind($rHandler);

		$first = 0;
		$last = $sizeOfFile;
		$isFound = false;
		$counter = 0;

		$_first = 0;
		$_last = 0;

		while (($first <= $last) && !$isFound) {
			$counter++;
			$mid = floor(($last + $first)/2);
			@fseek($rHandler, $mid);
			$mid = $this->_getStartStringPosition($rHandler, 1);

			$currentString = @fgets($rHandler, _ULINEMAXLENGTH_);

			$currentString = _qTrim($currentString);

			$lineArray = _splitOurString($currentString);
			
			if ((!isset($lineArray)) || (!is_array($lineArray)) || (count($lineArray) < 5)) {
				break 1;
			}

			if ($lineArray[4] === $urlHash) {
				$isFound = true;
				$totalLinks[$lineArray[0]] = $lineArray;
			}

			$_first = $first;
			$_last = $last;

			if ($urlHash > $lineArray[4]) {
				$first = $mid;
			}
			
			if ($urlHash <= $lineArray[4]) {
				$last = $mid;
			}

			if ($first >= $last) {
				break 1;
			}
			
			if (($_first == $first) && ($_last == $last)) {
				@fseek($rHandler, $last - 5);
				$first = $this->_getStartStringPosition($rHandler, 1);
				if ($_first == $first) {
					break 1;
				}
			}
		}

		if ($isFound) {
			$currentString = @fgets($rHandler, _ULINEMAXLENGTH_);
			$currentString = _qTrim($currentString);
			$statePosition = $this->_getStartStringPosition($rHandler, 2);

			// Нашли место в базе, где хранятся ссылки
			// Передвинем позицию чтения чуть выше найденного(пока не встретим первый неравный текушему адресу страницы), чтобы прочитать все строки с необходимым адресом страницы

			// Идём вверх
			while($statePosition > 0){
				$needPosition = $this->_getStartStringPosition($rHandler, 3);
				$currentString = @fgets($rHandler, _ULINEMAXLENGTH_);
				$currentString = _qTrim($currentString);

				$lineArray = _splitOurString($currentString);
				
				if (($lineArray[4] === $urlHash) && !(isset($totalLinks[$lineArray[0]]))) {
					$totalLinks[$lineArray[0]] = $lineArray;
				}

				if (($lineArray[4] != $urlHash) || ($needPosition == 0)) {
					break 1;
				}
			}

			// Идём вниз
			while(true) {
				$currentString = @fgets($rHandler, _ULINEMAXLENGTH_);
				$currentString = _qTrim($currentString);

				$lineArray = _splitOurString($currentString);

				if (!is_array($lineArray) || (count($lineArray) < 5)) {
					break;
				}

				if (($lineArray[4] === $urlHash) && !(isset($totalLinks[$lineArray[0]]))) {
					$totalLinks[$lineArray[0]] = $lineArray;
				}

				if ($lineArray[4] != $urlHash) {
					break 1;
				}
			}
		}

		if ($isFound || $isFoundLast) {
			// Отсортируем по ID
			ksort($totalLinks);

			// Оставим столько ссылок, сколько нужно
			$tempArray = Array();
			$counter = 0;
			foreach($totalLinks as $link) {
				$counter++;
				if ($counter <= _UMAXLINKCOUNTONPAGE_) {
					$tempArray[] = $link;
				}
			}

			$this->UniplacerDBData = $tempArray;

			if ($NumOfLinks) {
				return $this->_printTextBlock($NumOfLinks);
			} else {
				return $this->_printTextBlock(_UMAXLINKCOUNTONPAGE_);
			}
		} else {
			@fclose($rHandler);
			return false;
		}
	}

	/**
	*  Вывод html-блока ссылок
	*  @param int $NumOfLinks количество выводимых ссылок
	*
	*  @return string html код ссылок
	*/
	function GetHtml($NumOfLinks = false) {
		$html = '';
		$links = $this->GetLinks($NumOfLinks);

		if ($links) {
			foreach ($links as $link) {
				$html .= $link.'<br>';
			}
		}
		return $html;
	}


	/**
	* Вывод текстового блока с ссылками
	* @param int $NumOfLinks Количество выводимых ссылок
	*/
	function _printTextBlock($NumOfLinks = false) {
		if (intval($NumOfLinks)) {
			if ($NumOfLinks > _UMAXLINKCOUNTONPAGE_) {
				$NumOfLinks = _UMAXLINKCOUNTONPAGE_;
			}
		} else {
			$NumOfLinks = _UMAXLINKCOUNTONPAGE_;
		}

		if ($NumOfLinks > count($this->UniplacerDBData)) {
			$NumOfLinks = count($this->UniplacerDBData);
		}

		$newUniplacerDBData = Array();
		$counter = 0;

		$result = Array();

		foreach ($this->UniplacerDBData as $line) {
			$counter++;
			if ($counter > $NumOfLinks) {
				$newUniplacerDBData[] = $line;
			} else {
				$linkText = $line[3];
				
				// Если необходимо перекодировать - перекодируем
				if ($this->UniplacerCharset) {
					$linkText = $this->_encoding($this->UniplaceDefaultEncoding, $this->UniplacerCharset, $linkText);
					$href = $this->_encoding($this->UniplaceDefaultEncoding, $this->UniplacerCharset, $line[2]);
				}

				$hrefString = str_replace("#a#", '<a href="'.$href.'">', $linkText);
				$hrefString = str_replace("#/a#", '</a>', $hrefString);

				$result[] = $hrefString;
			}
		}

		$this->UniplacerDBData = $newUniplacerDBData;
		$this->UniplacerAlreadyFind = true;

		return $result;
	}

	function _clearDB(){
		if(file_exists($this->UniplacerDBPath)){
			$TempUniplacerDBPath = $this->UniplacerDBPath."_tmp"; // Файл-буффер

			// Открываем буфер для записи
			$tHandler = @fopen($TempUniplacerDBPath, "w");
			if (!$tHandler) {
				return false;
			}			
			@fclose($tHandler);
			
			// Удаляем старый файл с базой
			@unlink($this->UniplacerDBPath);

			// Переименовываем файл буфер - в файл базы
			@rename($TempUniplacerDBPath, $this->UniplacerDBPath);
			// Проставляем права
			@chmod($this->UniplacerDBPath, 0777);
		}
	}


	
	
	/**
	* Запись / удаление / изменение строк в файле с БД ссылок
	* Хранятся ссылки упорядоченные по md5-хешу от адреса страницы, на котрой будет отображаться ссылка
	* @param array $linksDump - массив строк, которые будут обработаны для действия над БД ссылок
	*/
	function ProcessLinks($linksDump) {
		$linksData = Array();
		foreach ($linksDump as $linkRow) {
			if (trim($linkRow) === "") {
				continue;
			}

			$linkItems = array_map("trim", _splitOurString($linkRow));
			
			$action = $linkItems[1];

			if ($action !== "2") {
				if (isset($linkItems[2]) && (trim($linkItems[2]) !== "")) {
					$linkItems[2] = _lsTrim($linkItems[2]);
				} else {
					continue;
				}
				$linkItems[] = _getUrlHash($linkItems[2], $this->UniplacerCharset);
			} else {
				$linkItems[] = "";
			}

			$linksData[] = $linkItems;
		}
		
		if (count($linksData) == 0) { // если не пришло нормальных данных - выходим
			return false;
		}
		
		uasort($linksData, '_cmp_hash_element');

		if(file_exists($this->UniplacerDBPath)) {
			$TempUniplacerDBPath = $this->UniplacerDBPath."_tmp"; // Файл-буфер

			// Открываем буфер для записи
			$tHandler = @fopen($TempUniplacerDBPath, "w");
			if(!$tHandler) return false;

			// Открываем базу ссылок для чтения
			$rHandler = @fopen($this->UniplacerDBPath, "r");
			if(!$rHandler) return false;

			$findFlag = false; 
			$TmpDBData = ""; // Строка-буфер, собираемая перед записью в файл

			$counter = 0;
			while (!feof($rHandler)) {  // Читаем базу по строкам
				$row = trim(@fgets($rHandler));
				if($row === ''){
					break;
				}
				$rItem = _splitOurString($row);
				$counter++;

				if ($counter == _ULINEMAXBUFFERSTRINGCOUNT_) { // Если буфер достиг макимального размера
					$counter = 0;
					@fwrite($tHandler, $TmpDBData);  // Записываем данные в файл-буфер
					$TmpDBData = ""; // Очищаем буфер
				}

				$currentLine = implode(";", $rItem); // Текущая строка базы
				$currentLine .= "\r\n";

				$findFlag = false;
				
				$toAddBefore = '';
				$toAddCurrentLine = $currentLine;
				$toAddAfter = '';
				
				foreach (array_keys($linksData) as $i) {
					$linkData = $linksData[$i];
					$action = $linkData[1];

					switch($action) {
						case "0": // Добавление записи в БД-ссылок
							$hash = $linkData[5];
							$inputString = $linkData[0].";".$linkData[2].";".$linkData[3].";".$linkData[4].";".$linkData[5]."\r\n";
							if ($rItem[4] > $hash) { 
								$findFlag = true;
								$toAddBefore .= $inputString;  // Добавляем в буфер новую строку
							}

							if ($rItem[4] === $hash) { // Если строки равны - необходимо отсортировать по ID
								$findFlag = true;
								if(intval($rItem[0]) < intval($linkData[0])) { // ID текущей меньше чем новой
									$toAddAfter .= $inputString;  // Сначала добавляем новую
								} elseif (intval($rItem[0]) > intval($linkData[0])) { // ID текущей больше или равно новой
									$toAddBefore .= $inputString; // Потом новую
								}
							}
						break;

						case "1": // Изменение записи в БД-ссылок
							$inputString = $linkData[0].";".$linkData[2].";".$linkData[3].";".$linkData[4].";".$linkData[5]."\r\n";
							if (intval($rItem[0]) == intval($linkData[0])) {
								$findFlag = true; // Место для вставки нашли
								$toAddCurrentLine = $inputString; // Обновляем
							}							
						break;

						case "2": // Удаление записи из БД-ссылок
							if (intval($rItem[0]) == intval($linkData[0])) {
								$findFlag = true;
								$toAddCurrentLine = '';
							}
						break;
					}
					
					if($findFlag) { // Если новый элемент обработан, то удаляем его из списка новых и двигаемся по базе дальше
						unset($linksData[$i]);
						$findFlag = false;
					}
				}

				$TmpDBData .= $toAddBefore.$toAddCurrentLine.$toAddAfter;
				
			}

			if (count($linksData) > 0) { // если еще данные остались, то добавляем в конец базы
				foreach ($linksData as $linkData) {
					if ($linkData[1] === "0") {
						$TmpDBData .= $linkData[0].";".$linkData[2].";".$linkData[3].";".$linkData[4].";".$linkData[5]."\r\n";
					}
				}
			}

			if($counter <= _ULINEMAXBUFFERSTRINGCOUNT_){ // Елси вдруг до сохранения буфера не дошли в процессе чтения файла - сохраняем после
				@fwrite($tHandler, $TmpDBData);
				$TmpDBData = "";
			}

			// Закрыли хэндлера
			@fclose($tHandler);
			@fclose($rHandler);

			// Удаляем старый файл с базой
			@unlink($this->UniplacerDBPath);

			// Переименовываем файл буфер - в файл базы
			@rename($TempUniplacerDBPath, $this->UniplacerDBPath);
			// Проставляем права
			@chmod($this->UniplacerDBPath, 0777);

			return true;
		} else { // Файла с базой еще не существует
			$rHandler = @fopen($this->UniplacerDBPath, "w"); // Создадим
			if($rHandler){
				foreach ($linksData as $linkData) {
					if ($linkData[1] === "0") {
						@fwrite($rHandler, $linkData[0].";".$linkData[2].";".$linkData[3].";".$linkData[4].";".$linkData[5]."\r\n");
					}
				}
				@fclose($rHandler);
				return true;
			} else {
				return false;
			}
		}
	}

    /**
    *  Полное обновление базы ссылок
	*  @param array $linksDump - массив строк, которые будут обработаны
    */
	function ProcessFullDB($linksDump) {
		$linksData = Array();
		foreach ($linksDump as $linkRow) {
			if(trim($linkRow) === "") {
				continue;
			}

			$linkItems = array_map("trim", explode(";", $linkRow));

			if(isset($linkItems[2]) && trim($linkItems[2]) !== "") {
				$linkItems[2] = _lsTrim($linkItems[2]);
			} else {
				continue;
			}

			$linkItems[] = _getUrlHash($linkItems[2], $this->UniplacerCharset);
			$linksData[] = $linkItems;
		}
		
		if (count($linksData) == 0) { // если не пришло нормальных данных - выходим
			return false;
		}
		
		uasort($linksData, '_cmp_hash_element');
		
		$TempUniplacerDBPath = $this->UniplacerDBPath."_tmp"; // Файл-буфер

		// Открываем буфер для записи
		$tHandler = @fopen($TempUniplacerDBPath, "w");
		if (!$tHandler) {
			return false;
		}
		
		$counter = 0;
		$TmpDBData = "";
		foreach ($linksData as $linkData) {
			$action = $linkData[1];
			if ($action === '0') {
				$TmpDBData = $linkData[0].";".$linkData[2].";".$linkData[3].";".$linkData[4].";".$linkData[5]."\r\n";
				
				$counter++;
				if ($counter == _ULINEMAXBUFFERSTRINGCOUNT_) { 
					$counter = 0;
					@fwrite($tHandler, $TmpDBData);
					$TmpDBData = "";
				}
			}

		}

		if ($counter <= _ULINEMAXBUFFERSTRINGCOUNT_) {
			@fwrite($tHandler, $TmpDBData);
			$TmpDBData = "";
		}
		
		@fclose($tHandler);
		@unlink($this->UniplacerDBPath);
		@rename($TempUniplacerDBPath, $this->UniplacerDBPath);
		@chmod($this->UniplacerDBPath, 0777);
	}
	
}
?>