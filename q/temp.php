<?php
header('Content-Type: text/html; charset=utf-8');
$loadLimit = 5; // Значение load average, больше которого выполняться не нужно

$uptime = exec('uptime');

echo $uptime;

if(preg_match('!load average: ([\d\.]+), [\d\.]+, [\d\.]+!si', $uptime, $cpu)) {

    if((float)str_replace(',', '.', $cpu[1]) > $loadLimit) {

        echo '<h4>Высокая нагрузка сервера!</h4>';

        die('Высокая нагрузка сервера');

    }else

        echo '<h4>Низкая нагрузка сервера!</h4>';

}else echo '

<div id=\'r7\'>

</div>

<h4>Не определил нагрузку сервера!</h4>';

//дальше делаем то,что хотелсь бы

?>