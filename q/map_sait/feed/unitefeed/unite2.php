<?
 
### 440hz zone ###
 
### TOOLS ###
 
function GetXMLFirstVal($r,$t) {
        if(preg_match_all('/<('.$t.')>(.*)<\/\\1>/Usi',$r,$o)) return $o[2][0];
        return false;
}
 
function GetXMLAllVal($r,$t) {
        if(preg_match_all('/<('.$t.')>(.*)<\/\\1>/Usi',$r,$o)) return $o[2];
        return array();
}
 
### TOOLS ###
 
// RSS потоки
// ТОЛЬКО ссылки БЕЗ параметров!
// get.rss?a=b непокатит. тогда нужно юзать CURL
 
$RSSS = array();
$RSSS[] = 'http://news.yandex.ru/computers.rss';
$RSSS[] = 'http://news.yandex.ru/security.rss';
$RSSS[] = 'http://news.yandex.ru/internet.rss';
 
// перебираем потоки
foreach($RSSS AS $RSS) {
 
    print("\n$RSS");
 
    // получаем контент
    $XML = file_get_contents($RSS);
 
    if($XML) {
 
        // получаеми список всех ITEM
        $ITEMS = GetXMLAllVal($XML,'item');
 
        // перебираем ITEM
        foreach($ITEMS AS $ITEM) {
 
            // получаем данные
            $TITLE = GetXMLFirstVal($ITEM,'title');
            $LINK  = GetXMLFirstVal($ITEM,'link');
            $DESC  = GetXMLFirstVal($ITEM,'description');
            $DATE  = GetXMLFirstVal($ITEM,'pubDate');
            $CAT   = GetXMLFirstVal($ITEM,'category');
 
            // ver 2.0
            if(!$DATE) {
                $DATE = GetXMLFirstVal($ITEM,'dc:date');
            }
 
            // конвертим дату в unixtime
            if($DATE) $DATE = strtotime($DATE);
            else      $DATE = time();
 
            // преобразуем спецсимволы
            $TITLE = html_entity_decode($TITLE,ENT_QUOTES);
            $DESC  = html_entity_decode($DESC,ENT_QUOTES);
            $CAT   = html_entity_decode($CAT,ENT_QUOTES);
 
            print("\n     [".date('d.m.Y H:i',$DATE)."] - [$TITLE]");
        }
    }
}
 
// что б в шелле строку переводило ...
print("\n");
 
?>