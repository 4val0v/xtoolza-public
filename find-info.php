<?php
// Find-Info
// Created by find-xss.net
// Author Reznik Vitaly
// Version 0.1.0
// 15.06.2011

class findInfo {

	var $invisibleFileNames;
	var $fileList;
	var $permissionsList;

	function __construct($path = "./") {
		$this->invisibleFileNames = array(".", "..");
		$this->permissionsList = array();
		$this->fileList = $this->scanDirectories($path);
	}

	function scanDirectories($rootDir, $allFiles = array()) {
		$dirContent = scandir($rootDir);
		foreach($dirContent as $key => $content) {
			$path = $rootDir.'/'.$content;
			if(!in_array($content, $this->invisibleFileNames)) {
				$permissions = substr(sprintf('%o', fileperms($path)), -4);
				$this->permissionsList[$permissions] = $permissions;
				$allFiles[] = new infoFiles($path, $permissions);
				if(is_dir($path) && is_readable($path)) {
					$allFiles = $this->scanDirectories($path, $allFiles);
				}
			}
		}
		return $allFiles;
	}
}

class infoFiles {
	var $file;
	var $permissions;
	function __construct($file, $permissions) {
		$this->file = $file;
		$this->permissions = $permissions;
	}
}

$rootDir = isset($_GET['rootdir']) ? htmlentities($_GET['rootdir']) : dirname(__FILE__);
$findInfo = new findInfo($rootDir);
$permissions = isset($_GET['permissions']) ? intval($_GET['permissions']) : 'all';
$i = 1;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
	<head>
		<title>Find - Info</title>
		<meta name="description" content="Find - Info module by http://find-xss.net" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<div align="center">
			<b>Find-Info</b>, powered by <b><a href="http://find-xss.net" >find-xss.net</a></b><br /><br />
			<b>Found files and folders with permissions:</b><br />
			<form action="" method="get">
				Showed: <input type="radio" name="permissions" value="all" <?php echo $permissions == 'all' ? "checked=''" : ''; ?> /> All
				<?php foreach($findInfo->permissionsList as $item): ?>
					<input type="radio" name="permissions" value="<?php echo $item; ?>" <?php echo $permissions == $item ? "checked=''" : ''; ?> /> <?php echo $item; ?>
				<?php endforeach; ?>
				<input type="submit" value="Find" /><br /><br />
				Root Directory: <input type="text" name="rootdir" value="<?php echo $rootDir; ?>" />
			</form><br /><br />
			<table>
				<th>File name</th>
				<th>File permissions</th>
				<?php foreach($findInfo->fileList as $item): ?>
					<?php if($permissions == $item->permissions || $permissions == 'all'): ?>
						<tr style="background-color: #<?php echo $i > 0 ? "DDDDDD": "EEEEEE"; $i = 1 - $i;?>" >
							<td><?php echo htmlentities($item->file); ?></td><td align="center"><?php echo $item->permissions; ?></td>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			</table><br /><br />
			Copyright © 2010-2011 XSS Scanner http://find-xss.net
		</div>
	</body>
</html>
