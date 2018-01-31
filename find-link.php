<?php
// Find-Link
// Created by find-xss.net
// Author Reznik Vitaly
// Version 0.3.1
// 02.01.2012

class findLink {

	var $invisibleFileNames;
	var $fileList;

	function __construct($path = "./") {
		$this->invisibleFileNames = array(".", "..");
		$this->filesext = array("php", "js", "html", "htm", "phtml", "inc", "module", "tpl");
		$this->fileList = $this->scanDirectories($path);
	}

	function scanDirectories($rootDir, $allFiles = array()) {
		$dirContent = scandir($rootDir);
		foreach($dirContent as $key => $content) {
			$path = $rootDir.'/'.$content;
			$fileext = explode(".", $content);
			$fileext = $fileext[count($fileext)-1];
			if(!in_array($content, $this->invisibleFileNames) && (is_dir($path) || in_array($fileext, $this->filesext))) {
				$allFiles[] = $path;
				if(is_dir($path) && is_readable($path)) {
					$allFiles = $this->scanDirectories($path, $allFiles);
				}
			}
		}
		return $allFiles;
	}
}

$rootDir = isset($_GET['rootdir']) ? htmlentities($_GET['rootdir']) : dirname(__FILE__);
$findLink = new findLink($rootDir);
$i = 1;

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
	<head>
		<title>Find - Link</title>
		<meta name="description" content="Find - Info module by http://find-xss.net" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<div align="center">
			<b>Find-Link</b>, powered by <b><a href="http://find-xss.net" >find-xss.net</a></b><br /><br />
			<b>Found external links:</b><br /><br />
			<table>
				<th>File name</th>
				<th>External link</th>
				<?php $found = false; foreach($findLink->fileList as $item):
					if(is_readable($item)):
						$contents = file_get_contents($item);
						if(strpos($contents, "http") !== false):
							$lines = file($item);
							$vars = array();
							foreach($lines as $line) {
								if(strpos($contents, "http") !== false && strpos($contents, $_SERVER['HTTP_HOST']) === false && preg_match("/\\\$([a-zA-Z0-9_\-\>\[\]\"\']+) *\.?=.*?(http[s]?:\/\/)".(!empty($vars) ? "|(\\\$(".implode("|", $vars)."))" : '')."/", $line, $match)) {
									$vars[] = preg_quote($match[1]);
								}
							}
							if(strpos($contents, $_SERVER['HTTP_HOST']) === false && preg_match_all("/<a.*?href=[\'\"]?((http[s]?:\/\/.*?)".(!empty($vars) ? "|(.*?\\\$(".implode("|", $vars).").*?)" : '').")<\/a>/", $contents, $match)):
								foreach($match[0] as $code): $found = true; ?>
									<tr style="background-color: #<?php echo $i > 0 ? "DDDDDD": "EEEEEE"; $i = 1 - $i;?>" >
										<td><?php echo htmlentities($item); ?></td><td align="center"><?php echo htmlentities($code); ?></td>
									</tr>
								<?php endforeach;?>
							<?php endif; ?>
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</table>
			<br /><?php if(!$found) echo "Not Found";?><br /><br />
			Copyright © 2010-2011 XSS Scanner http://find-xss.net
		</div>
	</body>
</html>
