<?php
class sdo_keywords
{
// ����������� �����
var $word_length_min=3;
// ���������� �������� ����
var $words_count=10;
// true - ���������� ������� ���� ���, ����� ����� ������
var $meta=false;

function keywords($_text)
{
$search=array ("'�'",
"'<script[^>]*?>.*?</script>'si", // ���������� javascript
"'<[\/\!]*?[^<>]*?>'si", // ���������� HTML ����
"'([\r\n])[\s]+'", // ���������� ������ ������������
// ���������� HTML ��������
"'&quot;'i", "'&amp;'i","'&lt;'i","'&gt;'i","'&nbsp;'i",
"'&iexcl;'i","'&cent;'i","'&pound;'i","'&copy;'i","'&#(\d+);'e");
$replace=array('�',' ',' ',"\\1 ",'" ',' ',' ',' ',' ',
chr(161),chr(162),chr(163),chr(169),"chr(\\1)");
// ����������� � ������ �� ������ HTML �����
$text=preg_replace($search,$replace,$_text);
// �� ����� �� �������� ���� � preg_match_all ���������� ����������� � ����������
// �������� �� ����� ����� (�� ��������� cp1251)
preg_match_all("#(\w+)#si",iconv('UTF-8','cp1251',$text),$words_all);
// ������ ���� ����, ������� �������� �� ������ �� �����
$words_stop=array('','���','���','���','���','���','����','����','���',
'���','���','���','�����','���','���','����','���','���','���','����','����','���',
'���','���','���','���','����','���','����','���','���','���','���','���','�����','������','������');
$kk=array(); $cc=array(); $ii=0;// ��������� ����������
$words_count=sizeof($words_all[0]);// ������ ����� ���������� ���� � ������
for($it=0;$it<$words_count;$it++)// �������� �� ���� ������
{ // ����������� ��� � ���������� ��������, ��� ��������� ������� ��� ����� �������� �� ��������
	$val_win=strtolower($words_all[0][$it]);
	$len=strlen($val_win);// ���������� ����� �����
	// ���� ����� ������ ��������, �� �� �������� � ������ ��������
	if ($len<$this->word_length_min) { continue; }
	$val_utf=iconv('cp1251','UTF-8',$val_win);// ������������ ������� � utf
	// ���� ����� �������� ���� ������, �� �� �������� � ������ ������
	if (array_search($val_utf,$words_stop)) { continue; }
	$id=array_search($val_utf,$kk);// �������� �� ������� ����� ��� � ������
	if ($id>0)// ���� � ������ ��� ����, ��
	{ $cc[$id]++;// ����������� ����������
	}
	else// ���� ��� � ������
	{ $kk[$ii]=$val_utf;// ���������� �����
		$cc[$ii]=1;// ���-�� � ������
		$ii++;
	}
}
// ����������� ���� ��������� � ������� �������
$c=sizeof($kk); for($it=0;$it<$c;$it++) { $ww[$kk[$it]]=$cc[$it]; }
arsort($ww);// ��������� ������ �� ���-�� ����
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