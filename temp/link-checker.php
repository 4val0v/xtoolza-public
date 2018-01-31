<?php

//Код писал не программист, а я - поэтому не ржать! )))
//yanus.pro

$user="";//имя юзера Яндекс-XML или прокси
$user_key="";//ключ юзера Яндекс-XML или прокси


setlocale(LC_ALL, "ru_RU.UTF-8");
echo '<html>
<head><meta http-equiv="content-type" content="text/html; charset=utf-8" /></head>
<body>';


if( ($_SERVER['REQUEST_METHOD'])=='GET')
{
echo '<form action="link-checker.php" name="myform" method="post">
Список запросов для проверки:<br/>
<textarea name="zaprosy" cols="100" rows="20" >  </textarea><br>

<br><br><input name="Submit" type=submit value="проверить"></form>';
}
else
{
$key_start = explode("\n", $_POST['zaprosy']);
echo "<table>";
foreach ($key_start as $key_start)
{

if (strlen($key_start)>0)
{
$key_start=trim($key_start);
$key=$key_start." << error";
$key=str_replace(" ","%20",$key);
$key=str_replace(":","%3A",$key);
$key=str_replace("\\","%2F",$key);

$key_start=str_replace(" ","%20",$key_start);


$zapros="http://seozoo.ru/xmlsearch?user=".$user."&key=".$user_key."=".$key."&lr=39&l10n=ru&sortby=rlv&filter=strict&groupby=attr%3Dd.mode%3Ddeep.groups-on-page%3D100.docs-in-group%3D1";
//$zapros="http://xmlsearch.yandex.ru/xmlsearch?user=".$user."&key=".$user_key."=".$key."&lr=39&l10n=ru&sortby=rlv&filter=strict&groupby=attr%3Dd.mode%3Ddeep.groups-on-page%3D100.docs-in-group%3D1";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, trim($zapros));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$html=curl_exec($ch);
curl_close($ch);

$html=str_replace('</group>','</group>`',$html);
preg_match_all('/<group>[^`]*<url>([^`]*)<\/url>[^`]*<title>([^`<>а-яА-Я]*)<\/title>[^`]*<headline>([^`а-яА-Я]*)<\/headline>[^`]*<_PassagesType>1[^`]*<\/group>/u',$html,$group);

if(count ($group[1])>0)
	{
	$zapros="http://seozoo.ru/xmlsearch?user=".$user."&key=".$user_key."=".$key_start."%20url%3A".$group[1][0]."&lr=213&l10n=ru&sortby=rlv&filter=strict&groupby=attr%3Dd.mode%3Ddeep.groups-on-page%3D100.docs-in-group%3D1";
	//$zapros="http://xmlsearch.yandex.ru/xmlsearch?user=".$user."&key=".$user_key."=".$key_start."%20url%3A".$group[1][0]."&lr=213&l10n=ru&sortby=rlv&filter=strict&groupby=attr%3Dd.mode%3Ddeep.groups-on-page%3D100.docs-in-group%3D1";
	$ch1 = curl_init();
	curl_setopt($ch1, CURLOPT_URL, trim($zapros));
	curl_setopt($ch1, CURLOPT_HEADER, 0);
	curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
	$html1=curl_exec($ch1);
	//echo $http_code = curl_getinfo($ch1, CURLINFO_HTTP_CODE);
	curl_close($ch1);

	if(preg_match_all('/error code="15"/ui',$html1,$group1))
		{
		$link="http://yandex.ru/yandsearch?text=".$key_start."%20url%3A".$group[1][0]."&lr=213";
		$key_start=str_replace("%20"," ",$key_start);
		echo "<tr><td>".$key_start."</td><td>cсылки НЕ работают</td><td><a href='".$link."' target='_blank'>проверка</a></td></tr>";
		}
		else
		{
		$link="http://yandex.ru/yandsearch?text=".$key_start."%20url%3A".$group[1][0]."&lr=213";
		$key_start=str_replace("%20"," ",$key_start);
		echo "<tr><td>".$key_start."</td><td>cсылки работают</td><td><a href='".$link."' target='_blank'>проверка</a><br/></td></tr>";
		}
		
	}
	else
	{
	$key_start=str_replace("%20"," ",$key_start);
	echo "<tr><td>".$key_start."</td><td>Не удалось проверить</td></td><td></tr>";
	}
	


}
}

echo "</table>";
}
echo '</body></html>';