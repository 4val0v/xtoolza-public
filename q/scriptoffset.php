<?php
// �������� ������ �� Ajax
if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {return;}

// ����� ���������� � ������ ������ action � � ������������ � ��� ��������� ������ ��������.
$action = $_POST['action'];
if (empty($action)) {return;}

$count = 50;
$step = 1;

// �������� �� ������� ����� ��������
$url = $_POST['url']; if (empty($url)) return;
$offset = $_POST['offset'];

// ���������, ��� �� ������ ����������
$offset = $offset + $step;
if ($offset >= $count) {
  $sucsess = 1;
} else {
  $sucsess = round($offset / $count, 2);
}

// � ���������� ������� ������ (����� �������� � ��������� �� ��������� ������ �������)
$output = Array('offset' => $offset, 'sucsess' => $sucsess);
echo json_encode($output);