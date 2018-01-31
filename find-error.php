<?php
// Find-Error
// Created by find-xss.net
// Author Reznik Vitaly
// Version 0.1.0
// 14.11.2011

class findError {

	var $invisibleFileNames;
	var $fileList;

	function __construct($path = "./") {
		$this->invisibleFileNames = array(".", "..", "find-error.php");
		$this->fileList = $this->scanDirectories($path);
	}

	function scanDirectories($rootDir, $allFiles = array()) {
		$dirContent = scandir($rootDir);
		foreach($dirContent as $key => $content) {
			$path = $rootDir.'/'.$content;
			if(!in_array($content, $this->invisibleFileNames)) {
				if(substr($content, -4) == '.php' || is_dir($path)) $allFiles[] = $path;
				if(is_dir($path) && is_readable($path)) {
					$allFiles = $this->scanDirectories($path, $allFiles);
				}
			}
		}
		return $allFiles;
	}
}

$rootDir = isset($_GET['rootdir']) ? htmlentities($_GET['rootdir']) : dirname(__FILE__);
$findError = new findError($rootDir);
$i = 1;

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
	<head>
		<title>Find - Error</title>
		<meta name="description" content="Find - Info module by http://find-xss.net" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<div align="center">
			<b>Find-Error</b>, powered by <b><a href="http://find-xss.net" >find-xss.net</a></b><br /><br />
			<b>Found errors:</b><br /><br />
			<table>
				<th>File name</th>
				<th>Error</th>
				<?php $found = false; foreach($findError->fileList as $item):
					if(is_readable($item)):
						$contents = file_get_contents($item);
						ob_start();
							$error = !eval('if(0) {?>' . $contents . '?><?php } ?>');
							$output = ob_get_contents();
						ob_end_clean();
						if($error && !empty($output)): $found = true;?>
							<tr style="background-color: #<?php echo $i > 0 ? "DDDDDD": "EEEEEE"; $i = 1 - $i;?>" >
								<td><?php echo htmlentities($item, ENT_QUOTES, "UTF-8"); ?></td>
								<td align="center">
									<?php
										$output = preg_replace("/in ".str_replace("/", "\\/", preg_quote(dirname(__FILE__)))."\/find\-error\.php\([0-9]+\) : eval\(\)\'d code/", "", $output);
										echo htmlentities($output, ENT_QUOTES, "UTF-8");
									?>
								</td>
							</tr>
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</table>
			<br /><?php if(!$found) echo "Errors Not Found";?><br /><br />
			Copyright © 2010-2011 XSS Scanner http://find-xss.net
		</div>
	</body>
</html>
