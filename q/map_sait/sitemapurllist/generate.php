<!DOCTYPE HTML>
<html>
<?
Header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); //Дата в прошлом  
Header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1  
Header("Pragma: no-cache"); // HTTP/1.1  
Header("Last-Modified: ".gmdate("D, d M Y H:i:s")."GMT"); 
// error_reporting( E_ALL );
// ini_set('display_errors', 1);
ignore_user_abort(true);
set_time_limit(0);
?>
<head>
	<title>Создать карту сайта из списка URL</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex, follow" />
	<link href="/q/style.css" rel="stylesheet"/>
	<script src="/q/modernize.js"></script>
	<script src="/q/seotext.js"></script>
	<link href="/q/css.css" rel="stylesheet"/>
	<link href="http://xtoolza.info/newcss4.css" rel="stylesheet"/>
</head>
<body id="linearBg1">

<?header('Content-Type: text/html; charset=utf-8');?>
<div style="align:left;">
	<table>
		<tbody>
			<tr>
				<td>
					<a href="http://xtoolza.info" rel="nofollow"><img src="http://xtoolza.info/q/images/logo.png" width="120px"></a>
				</td>
				<td>
					<table>
						<tbody>
							<tr>
								<td><h1 class="jumbotron">Создать карту сайта из списка URL</h1></td>
							</tr>
							<tr>
								<td><img src="http://xtoolza.info/q/images/sitemapcreate.png" width="80" alt="стоит ли на сайте toolza"></td>
							</tr> 
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<?

if($_FILES["filename"]["size"] > 1024*3*1024)
   {
     echo ("Размер файла превышает три мегабайта");
     exit;
   }
   // Проверяем загружен ли файл
   if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
   {
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную
	 $file = $_FILES["filename"]["tmp_name"];
	 $urls = file($file);
     // move_uploaded_file($_FILES["filename"]["tmp_name"], "/path/to/file/".$_FILES["filename"]["name"]);
   } else {
      echo("Ошибка загрузки файла");
   }


// $urls = file('spisok_stranic.txt');
// echo '<pre>';
// var_dump($urls);
// echo '</pre>';
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
foreach($urls as $k){
	$k = rtrim(rtrim($k,"\n"),"\r");
    $sitemapXML.="\r\n<url><loc>$k</loc><lastmod>$datetoday</lastmod><changefreq>weekly</changefreq><priority>1.00</priority></url>";
    $sitemapTXT.="\r\n".$k;
}
 
//Окончание для файла sitemap.xml
$sitemapXML.="\r\n</urlset>";

//Некоторые символы, а также кириллица - должны быть в правильной кодировке/виде (по спецификации)
$sitemapXML=trim(strtr($sitemapXML,array('%2F'=>'/','%3A'=>':','%3F'=>'?','%3D'=>'=','%26'=>'&','%27'=>"'",'%22'=>'"','%3E'=>'>','%3C'=>'<','%23'=>'#','&'=>'&')));

//Запись в файл
$fp=fopen('sitemap.xml','w+');
	if(!fwrite($fp,$sitemapXML)){
		echo '<b><span style="color:red">Write Error! Check sitemap.xml file rights (755+ required)</span></b><br />';
		}
fclose($fp);

echo "<b>Found: " .count($urls)." pages</b>";
?>
<br />
<br />
<div style='display:block'>
		<textarea rows="15" cols="400"><?php 
		$read = file_get_contents("http://xtoolza.info/q/map_sait/sitemapurllist/sitemap.xml");  
		echo $read;
		?> 
		</textarea>
</div>
<br />
<a class="btn-primary btn" href="http://xtoolza.info/q/map_sait/sitemapurllist/sitemap.xml" download>Скачать</a>
<br><br>
<input class="btn-success btn" type="button" border="0" value="Назад" onClick="history.back()">
<a class="btn-success btn" href="http://xtoolza.info">На главную</a><br><br>
<? include ('../../../yandex_metrika.php'); ?>
</body>
</html>