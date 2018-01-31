<?php
// ќтвечаем только на Ajax
if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {return;}

// ћожно передавать в скрипт разный action и в соответствии с ним выполн€ть разные действи€.
$action = $_POST['action'];
if (empty($action)) {return;}

$count = 50;
$step = 1;

// ѕолучаем от клиента номер итерации
$url = $_POST['url']; if (empty($url)) return;
$offset = $_POST['offset'];

// ѕровер€ем, все ли строки обработаны
$offset = $offset + $step;
if ($offset >= $count) {
  $sucsess = 1;
} else {
  $sucsess = round($offset / $count, 2);
}

// » возвращаем клиенту данные (номер итерации и сообщение об окончании работы скрипта)
$output = Array('offset' => $offset, 'sucsess' => $sucsess);
echo json_encode($output);