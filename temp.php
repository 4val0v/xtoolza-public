<?
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
function GlobRecursive($pattern, $flags) {
    $files = glob('/var/www/q/logs/*.txt', $flags);
    foreach ($files, GLOB_ONLYDIR | GLOB_MARK) as $dir) {
        if ($dir == false) {
		echo 'OK';
		} else echo 'not OK';
    }
}
GlobRecursive('*', GLOB_ONLYDIR | GLOB_MARK);
// в /папке/ проверять
?>