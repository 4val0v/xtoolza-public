<?php
// Find-Date
// Created by find-xss.net
// Author Reznik Vitaly
// Version 0.1.0
// 26.04.2012

class findDate {

	var $invisibleFileNames;
	var $fileList;
	var $datesList;

	function __construct($path = "./") {
		$this->invisibleFileNames = array(".", "..");
		$this->datesList = array();
		$this->filesext = isset($_GET['files']) ? explode(",", str_replace(" ", "", $_GET['files'])) : array("php", "phtml", "php3", "pl", "py");
		$this->fileList = $this->scanDirectories($path);
	}

	function scanDirectories($rootDir, $allFiles = array()) {
		$dirContent = scandir($rootDir);
		foreach($dirContent as $key => $content) {
			$path = $rootDir.'/'.$content;
			$fileext = explode(".", $content);
			$fileext = $fileext[count($fileext)-1];
			if(!in_array($content, $this->invisibleFileNames) && (is_dir($path) || in_array($fileext, $this->filesext))) {
				$dates = date("Y/m/d", filemtime($path));
				$this->datesList[$dates] = $dates;
				$allFiles[] = new dateFiles($path, $dates);
				if(is_dir($path) && is_readable($path)) {
					$allFiles = $this->scanDirectories($path, $allFiles);
				}
			}
		}
		return $allFiles;
	}

}

class dateFiles {
	var $file;
	var $dates;
	function __construct($file, $dates) {
		$this->file = $file;
		$this->dates = $dates;
	}
}

$rootDir = isset($_GET['rootdir']) ? htmlentities($_GET['rootdir']) : dirname(__FILE__);
$findDate = new findDate($rootDir);
$dates = isset($_GET['dates']) ? htmlentities($_GET['dates']) : 'all';
$i = 1;
ksort($findDate->datesList);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
	<head>
		<title>Find - Date</title>
		<meta name="description" content="Find - Date module by http://find-xss.net" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<div align="center">
			<b>Find-Date</b>, powered by <b><a href="http://find-xss.net" >find-xss.net</a></b><br /><br />
			<b>Found files and folders with dates:</b><br />
			<form action="" method="get">
				<div style="float: left;">
					Showed: <input type="radio" name="dates" value="all" <?php echo $dates == 'all' ? "checked=''" : ''; ?> /> All
				</div>
				<?php foreach($findDate->datesList as $item): ?>
					<div style="float: left; background-color: #<?php echo $i > 0 ? "EEEEEE": "FFFFFF"; $i = 1 - $i;?>;">
						<input type="radio" name="dates" value="<?php echo $item; ?>" <?php echo $dates == $item ? "checked=''" : ''; ?> /> <?php echo $item; ?>
					</div>
				<?php endforeach; ?>
				<div style="float: left;">
					&nbsp;&nbsp;&nbsp;<input type="submit" value="Find" /><br /><br />
				</div>
				<div style="clear: left;">
					Root Directory: <input type="text" name="rootdir" value="<?php echo $rootDir; ?>" />
				</div>
				Files for scan: <input type="text" value="<?php echo isset($_GET['files']) ? htmlentities($_GET['files'], ENT_QUOTES, 'utf-8') : 'php, phtml, php3, pl, py';?>" name="files" size="80" />
			</form><br /><br />
			<table>
				<th>File name</th>
				<th>File dates</th>
				<?php foreach($findDate->fileList as $item): ?>
					<?php if($dates == $item->dates || $dates == 'all'): ?>
						<tr style="background-color: #<?php echo $i > 0 ? "DDDDDD": "EEEEEE"; $i = 1 - $i;?>;" >
							<td><?php echo htmlentities($item->file); ?></td><td align="center"><?php echo $item->dates; ?></td>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			</table><br /><br />
			Copyright © 2010-2011 XSS Scanner http://find-xss.net
		</div>
	</body>
</html>
