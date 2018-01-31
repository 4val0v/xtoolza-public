<?php
// Find-Port
// Created by find-xss.net
// Author Reznik Vitaly
// Version 0.1.0
// 16.09.2011

	$ports = array("21" => "FTP", "22" => "SSH", "23" => "Telnet", "25" => "SMTP", "80" => "HTTP");
	$i = 1;
	$host = $_SERVER['SERVER_ADDR']; // Could be changed manualy

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
	<head>
		<title>Find - Port</title>
		<meta name="description" content="Find - Port module by http://find-xss.net" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<div align="center">
			<b>Find-Port</b>, powered by <b><a href="http://find-xss.net" >find-xss.net</a></b><br /><br />
			<b>Scanned ports from 1 to 65536, found:</b><br /><br />
			<table width="300px">
				<th>Port</th>
				<th>Service</th>
				<?php for($p = 1; $p < 65536; $p++): ?>
					<?php if(@fsockopen($host, $p, $errno, $errstr, 5)): ?>
						<tr style="background-color: #<?php echo $i > 0 ? "DDDDDD": "EEEEEE"; $i = 1 - $i;?>" >
							<td>
								<?php echo $p; ?>
							</td>
							<td>
								<?php if(isset($ports[$p])) : ?>
									<?php echo $ports[$p]; ?>
								<?php else: ?>
									<?php echo "Unknown"; ?>
								<?php endif; ?>
							</td>
						</tr>
					<?php endif; ?>
				<?php endfor; ?>
			</table>
			<br /><br />
			Copyright © 2010-2011 XSS Scanner http://find-xss.net
		</div>
	</body>
</html>
