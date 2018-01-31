<?php
class sdo_keywords
{
// минимальное слово
var $word_length_min=3;
// количество ключевых слов
var $words_count=10;
// true - возвращает готовый мета тег, иначе будет массив
var $meta=false;

function keywords($_text)
{
$search=array ("'е'",
"'<script[^>]*?>.*?</script>'si", // Вырезается javascript
"'<[\/\!]*?[^<>]*?>'si", // Вырезаются HTML теги
"'([\r\n])[\s]+'", // Вырезается пустое пространство
// Замещаются HTML элементы
"'&quot;'i", "'&amp;'i","'&lt;'i","'&gt;'i","'&nbsp;'i",
"'&iexcl;'i","'&cent;'i","'&pound;'i","'&copy;'i","'&#(\d+);'e");
$replace=array('е',' ',' ',"\\1 ",'" ',' ',' ',' ',' ',
chr(161),chr(162),chr(163),chr(169),"chr(\\1)");
// избавляемся в тексте от всякой HTML фигни
$text=preg_replace($search,$replace,$_text);
// по каким то причинам жопы в preg_match_all приходится извращаться с кодировкой
// отбираем из текст слова (из кодирвоки cp1251)
preg_match_all("#(\w+)#si",iconv('UTF-8','cp1251',$text),$words_all);
// массив стоп слов, которые включать по любасу не нужно
$words_stop=array('','как','для','что','или','это','этих','всех','вас',
'они','оно','еще','когда','где','эта','лишь','уже','вам','нет','если','надо','все',
'так','его','чем','при','даже','мне','есть','раз','два','аля','нас','тем','через','многие','многое');
$kk=array(); $cc=array(); $ii=0;// временные переменные
$words_count=sizeof($words_all[0]);// узнаем общее количество слов в тексте
for($it=0;$it<$words_count;$it++)// пройтись по всем словам
{ // преобразуем все к маленькому регистру, ибо поисковые системы все равно регистры не отличают
	$val_win=strtolower($words_all[0][$it]);
	$len=strlen($val_win);// определяем длину слова
	// если слово меньше минимума, то не включаем в список подсчета
	if ($len<$this->word_length_min) { continue; }
	$val_utf=iconv('cp1251','UTF-8',$val_win);// конвертируем обратно в utf
	// если слово является стоп словом, то не включаем в нужный список
	if (array_search($val_utf,$words_stop)) { continue; }
	$id=array_search($val_utf,$kk);// проверка на наличие слова уже в списке
	if ($id>0)// если в списке уже есть, то
	{ $cc[$id]++;// увеличиваем количество
	}
	else// если нет в списке
	{ $kk[$ii]=$val_utf;// записываем слово
		$cc[$ii]=1;// кол-во в тексте
		$ii++;
	}
}
// преобразуем весь результат к единому массиву
$c=sizeof($kk); for($it=0;$it<$c;$it++) { $ww[$kk[$it]]=$cc[$it]; }
arsort($ww);// сортируем массив по кол-ву слов
$keywords=array();
$it=0;
foreach ($ww as $val=>$key)
{ if ($it>=$this->words_count) { break; }
	$keywords[$it]=$val;
	$it++;
}
if ($this->meta)
{ $c=sizeof($keywords);
	$r='<meta name="keywords" content="';
	for($it=0;$it<$c;$it++)
	{ if (($it+1)==$c) { $r.=$keywords[$it]; } else { $r.=$keywords[$it].', '; }
	}
	$r.='" />';
}
else
{ $r=$keywords;
}
return $r;
}// /keywords
}// /sdo_keywords

$words=new sdo_keywords();
$words->meta=true;
echo $words->keywords($text);
?>