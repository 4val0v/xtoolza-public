<?php
/**
 * Удалить нафик
 *
 * @return array
 * @param int start
 * @param int skip
 */

$domains = array_map('trim', file($_DATA_PATH.'/dnames.txt'));

$start = $arguments['start'];
$skip = $arguments['skip'] ? $arguments['skip'] : 1;
$end = $arguments['end'] ? $arguments['end'] : 99999999;

$rf = fopen($_DATA_PATH.'/dnames_result' . $start . '-' . $skip . '-' . $end . '.txt', "w+");


foreach ($domains as $key => $domain) {
    if ($key > $end) { break; }
    if ($key < $start) { continue; }
    if (!(($key - $start) % $skip) || ($key == $start)) {
        $data = call('sandbox', 'check_site', $p = array('domain' => $domain));
        if ($key == $start) { fwrite($rf, "name\t" . implode("\t", array_keys($data)) . "\n"); }
        fwrite($rf, $domain . "\t" . implode("\t", $data) . "\n");    
    }
}

fclose($rf);

return true;

?>