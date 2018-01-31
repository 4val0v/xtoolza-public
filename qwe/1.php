<?
header('Content-Type: text/html; charset=utf-8');
$file ='http://dimitraki.info/33465.html';
$content = file($file);
$text = implode("\n\r", $content);
iconv("UTF-8","windows-1251", $text);
preg_match_all('/<a href="http(.*)"/isU',$text,$result);//http для наглядности нужно-можно убрать
 
echo "<h4>Все внешнии ссылки со страницы $file </h4>";
$nr=1;
foreach($result[1] as $item)
    {
        echo "$nr ----http".$item."<br>";//http для наглядности нужно-можно убрать
        $nr++;
    }