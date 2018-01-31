<?php
  $otstup=35;
  // $otstup - задает отступ, в прелелах которого
  // в картинку впишем процентное значение
  $string=$pr."%";
  // $string - содержит значение процентов плюс знак процента
  $im=imageCreate($pr*2+$otstup,15);
  // Здесь создаем идентификатор, при помощи 
  // которого мы будем работать с картинкой
  $fon=imageColorAllocate($im,220,20,60);
  $fon1=imageColorAllocate($im,255,20,147);
  // Задаем цвет фона
  $col_b=imageColorAllocate($im,0,0,0);
  // Задаем цвет обводки
  $shrift=imageColorAllocate($im,255,255,255);
  // Цвет вывода процентного значения
  imageFill($im,2,2,$fon);
  // Заполнили наш прямоугольник основным фоном
  $x1=0;$x2=$pr*2+$otstup-1;
  $y1=0;$y2=14;
  // Формирование улов для обводки контуром
  imageLine($im,$x1,$y1,$x2,$y1,$col_b);
  imageLine($im,$x2,$y1,$x2,$y2,$col_b);
  imageLine($im,$x2,$y2,$x1,$y2,$col_b);
  imageLine($im,$x1,$y1,$x1,$y2,$col_b);
  imageLine($im,$x1+$otstup,$y1,$x1+$otstup,$y2,$col_b);
  // Создание контура и разделяющей полосы
  if($pr!=0) imageFill($im,$otstup+1,2,$fon1);
  // Если значение процента не равно 0, то заполняем 
  // правую часть цветом $fon1
  imageString($im,3,5,1,$string,$shrift);
  // Пишем в правую часть картинки процентное значение
  header("Content-type: image/png");
  imagePng($im);
  imageDestroy($im);
  // Здесь производим вывод полученной картинки в 
  // стандартный поток вывода и уничтожаем идентификатор
?>