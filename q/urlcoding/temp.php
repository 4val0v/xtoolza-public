<?
function globrecurs(){
	foreach (glob("/var/xtoolza.info/q/logs/*.txt") as $filename) {
		if ($filename == false) {
		echo ' is false';
		} else echo 'array';
	}
}
globrecurse();
?>