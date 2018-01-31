<!DOCTYPE HTML>
<? header('Content-type: text/html; charset=utf-8');
ini_set('display_errors', 0);
error_reporting(0);
set_time_limit(0);
ignore_user_abort(true);
?>
<html>
<head>
	<title>Карта сайта сгенерирована</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex, follow" />
	<link href="/q/style.css" rel="stylesheet"/>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/css/colorchange.css" rel="stylesheet"/>
</head>
<body id="linearBg1">
<table>
	<tbody>
		<tr>
			<td>
				<div class="TmgWrae">
					<a href="http://xtoolza.info" rel="nofollow"><img class="image UE" src="http://xtoolza.info/q/images/logo.png" width="120px" border="0" width="120px"><img class="image Dowe" src="http://xtoolza.info/q/images/logo_new.png" width="120px" /></a>
				</div>
			</td>
			<td>
				<table>
					<tbody>
						<tr>
							<td><h1 class="jumbotron">Карта сайта сгенерирована</h1></td>
						</tr>
						<tr>
							<td><img src="http://xtoolza.info/q/images/sitemapcreate.png" width="80" alt="создать карту сайта">
							 </td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
<?

function converttopuny($host) {
	$idn = new idna_convert(array('idn_version'=>2008));
	$host=isset($host) ? stripslashes($host) : '';
	$host=(stripos($host, 'xn--')!==false) ? $idn->decode($host) : $idn->encode($host);
	return $host;
	}

$host= trim($_GET['site']); // Хост сайта

if (preg_match("/[а-я]/i", $host)) {
	require'idna_convert.class.php';
	$host = converttopuny($host);
}

function processing_url($url)
{
    if(strcasecmp(substr($url,0,7), 'http://') == 0) $url = substr($url, 7);
    if(strcasecmp(substr($url,0,4), 'www.') == 0) $url = substr($url, 4);
    $url_len = strlen($url)-1;
    if(strcasecmp(substr($url, $url_len), '/') == 0) $url = substr($url, 0, $url_len);
    return $url;
}

$host = processing_url($host);
// var_dump($host);

$scheme='http://'; // http или https?
$urls=array(); // Здесь будут храниться собранные ссылки
$content=NULL; // Рабочая переменная
// Здесь ссылки, которые не должны попасть в sitemap.xml
$nofollow=array('/go.php','/search/','/404/');
// Первой ссылкой будет главная страница сайта, ставим ей 0, т.к. она ещё не проверена
$urls[$scheme.$host]='0';
// Разрешённые расширения файлов, чтобы не вносить в карту сайта ссылки на медиа файлы. Также разрешены страницы без разрешения, у меня таких страниц подавляющее большинство.
$extensions[]='php';$extensions[]='aspx';$extensions[]='htm';$extensions[]='html';$extensions[]='asp';$extensions[]='cgi';$extensions[]='pl';$extensions[]='aspx';
// Корневая директория сайта, значение можно взять из $_SERVER['DOCUMENT_ROOT'].'/';
$engine_root=$_SERVER['DOCUMENT_ROOT'].'/q/map_sait/result/';

// Функция для сбора ссылок
/**
 * @param $page
 * @param $host
 * @param $scheme
 * @param $nofollow
 * @param $extensions
 * @param $urls
 * @return bool
 */
function sitemap_geturls($page,&$host,&$scheme,&$nofollow,&$extensions,&$urls)
{
	//Возможно уже проверяли эту страницу
	if($urls[$page]==1){continue;}
	//Получаем содержимое ссылки. если недоступна, то заканчиваем работу функции и удаляем эту страницу из списка
	$content=file_get_contents($page);if(!$content){unset($urls[$page]);return false;}
	//Отмечаем ссылку как проверенную (мы на ней побывали)
	$urls[$page]=1;
	//Проверяем не стоит ли запрещающий индексировать ссылки на этой странице мета-тег с nofollow|noindex|none
	if(preg_match('/<[Mm][Ee][Tt][Aa].*[Nn][Aa][Mm][Ee]=.?("|\'|).*[Rr][Oo][Bb][Oo][Tt][Ss].*?("|\'|).*?[Cc][Oo][Nn][Tt][Ee][Nn][Tt]=.*?("|\'|).*([Nn][Oo][Ff][Oo][Ll][Ll][Oo][Ww]|[Nn][Oo][Ii][Nn][Dd][Ee][Xx]|[Nn][Oo][Nn][Ee]).*?("|\'|).*>/',$content)){$content=NULL;}
    //Собираем все ссылки со страницы во временный массив, с помощью регулярного выражения.
	preg_match_all("/<[Aa][\s]{1}[^>]*[Hh][Rr][Ee][Ff][^=]*=[ '\"\s]*([^ \"'>\s#]+)[^>]*>/",$content,$tmp);$content=NULL;
	// var_dump($tmp);
	//Добавляем в массив links все ссылки не имеющие аттрибут nofollow
	foreach($tmp[0] as $k => $v){if(!preg_match('/<.*[Rr][Ee][Ll]=.?("|\'|).*[Nn][Oo][Ff][Oo][Ll][Ll][Oo][Ww].*?("|\'|).*/',$v)){$links[$k]=$tmp[1][$k];}}
	unset($tmp);
    //Обрабатываем полученные ссылки, отбрасываем "плохие", а потом и с них собираем...
	for ($i = 0; $i < count($links); $i++)
	{
		//Если слишком много ссылок в массиве, то пора прекращать нашу деятельность (читай спецификацию)
		if(count($urls)>1000){return false;}
		//Если не установлена схема и хост ссылки, то подставляем наш хост
		if(!strstr($links[$i],$scheme.$host)){$links[$i]=$scheme.$host.$links[$i];}
		// var_dump($scheme);
		//Убираем якори у ссылок
		$links[$i]=preg_replace("/#.*/X", "",$links[$i]);
		// if (!strpos("/", $links[$i],0)) {
		// 	$links[$i] = "/".$links[$i];
		// 	var_dump($links);
		// }
        //Узнаём информацию о ссылке
		$urlinfo=@parse_url($links[$i]);
        // echo '<pre>'; //для проверки схемы.
        // var_dump($urlinfo);
        // echo '</pre>';
        if(!isset($urlinfo['path'])){
            $urlinfo['path']=NULL;
        }
		//Если хост совсем не наш, ссылка на главную, на почту или мы её уже обрабатывали - то заканчиваем работу с этой ссылкой
		if((isset($urlinfo['host']) AND $urlinfo['host']!=$host) OR $urlinfo['path']=='/' OR isset($urls[$links[$i]]) OR strstr($links[$i],'@')){continue;}
		//Если ссылка в нашем запрещающем списке, то также прекращаем с ней работать
		$nofoll=0;if($nofollow!=NULL){foreach($nofollow as $of){if(strstr($links[$i],$of)){$nofoll=1;break;}}}if($nofoll==1){continue;}
		//Если задано расширение ссылки и оно не разрешёно, то ссылка не проходит
		$ext=end(explode('.',$urlinfo['path']));
		// var_dump($ext);
		$noext=0;if($ext!='' AND strstr($urlinfo['path'],'.') AND count($extensions)!=0){$noext=1;foreach($extensions as $of){if($ext==$of){$noext=0;continue;}}}if($noext==1){continue;}
		//Заносим ссылку в массив и отмечаем непроверенной (с неё мы ещё не забирали другие ссылки)
		$urls[$links[$i]]=0;
		//Проверяем ссылки с этой страницы
		sitemap_geturls($links[$i],$host,$scheme,$nofollow,$extensions,$urls);
	}
	return true;
}

// (START!) Первоначальный старт функции для проверки главной страницы и последующих
sitemap_geturls($scheme.$host,$host,$scheme,$nofollow,$extensions,$urls);

// Когда все ссылки собраны, то обрабатываем их и записываем в файлы sitemap.xml и sitemap.txt (должны быть права на запись)
$sitemapXML='<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
	<!--created by xtoolza.info -->		';
$sitemapTXT=NULL;

// Добавляем каждую ссылку
$datetoday = date("Y-m-d");
foreach($urls as $k => $v){
    $sitemapXML.="\r\n<url>\r\n<loc>{$k}</loc>\r\n<lastmod>$datetoday</lastmod>\r\n<changefreq>weekly</changefreq>\r\n<priority>1.00</priority>\r\n</url>";
    $sitemapTXT.="\r\n".$k;
}

//Окончание для файла sitemap.xml
$sitemapXML.="\r\n</urlset>";

//Некоторые символы, а также кириллица - должны быть в правильной кодировке/виде (по спецификации)
$sitemapXML=trim(strtr($sitemapXML,array('%2F'=>'/','%3A'=>':','%3F'=>'?','%3D'=>'=','%26'=>'&','%27'=>"'",'%22'=>'"','%3E'=>'>','%3C'=>'<','%23'=>'#','&'=>'&')));
$sitemapTXT=trim(strtr($sitemapTXT,array('%2F'=>'/','%3A'=>':','%3F'=>'?','%3D'=>'=','%26'=>'&','%27'=>"'",'%22'=>'"','%3E'=>'>','%3C'=>'<','%23'=>'#','&'=>'&')));

//Запись в файл
$fp=fopen($engine_root.'sitemap.txt','w+');if(!fwrite($fp,$sitemapTXT)){echo '<b><span style="color:red">Ошибка записи! Проверьте, правильно ли введен адрес сайта</span></b><br />';}fclose($fp);
$fp=fopen($engine_root.'sitemap.xml','w+');if(!fwrite($fp,$sitemapXML)){echo '<b><span style="color:red">Ошибка записи! Проверьте, правильно ли введен адрес сайта</span></b><br />';}fclose($fp);

echo "<b>Найдено: " .'<a href="http://xtoolza.info/q/map_sait/pagelist.php">'.count($urls)."</a> страниц</b>";

?>

<br /><h3><a href="http://xtoolza.info/q/map_sait/result/sitemap.xml" download>Скачать sitemap.xml &nbsp;<img src="http://xtoolza.info/q/images/arrow_curved_blue.png" width="70px"></a></h3>
<h5><a href="http://xtoolza.info/q/map_sait/result/sitemap.txt" download>Скачать список найденных страниц</a></h5><br />

<textarea rows="20" cols="500"><?php
$read = file_get_contents("http://xtoolza.info/q/map_sait/result/sitemap.xml");
echo iconv("UTF-8", "Windows-1251", $read);
?>
</textarea>
<br />
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>
<? include ('../../yandex_metrika.php'); ?>
</body>
</html>
