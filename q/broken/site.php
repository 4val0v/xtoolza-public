<?php

if(empty($_POST['site'])) exit('Поле "Сайт" не заполнено!');

if(!empty($_POST['site']))
  {
    $url = $_POST['site'];
    if(substr($url, 0, 7)=="http://") $url = str_replace("http://", "", $url);
    if(substr($url, 0, 4)=="www.") $url = str_replace("www.", "", $url);
    if(!preg_match("|^[0-9a-z\._-]+\.[a-z]{2,5}$|i", $url))
      exit('Поле "Сайт" должно соответствовать формату domain.ru ! Проверка кириллических доменов пока не осуществляется');
    else
      exit('c');
  }

?>