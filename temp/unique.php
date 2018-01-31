<?php  
/** 
 * Скрипт проверки уникальности. 
 *  
 * Разбивает введённый в него текст на куски по 10 слов, создаёт из них 10-словные запросы 
 * для Yandex и Google, разбирает выдачу и формирует отчёт о частоте упоминания комбинаций 
 * слов в интернете. 
 * Перед началом использования этого скрипта рекомендуется ознакомиться с правилами Яндекса. 
 * Автор скрипта не несёт ответственности за любой ущерб причинённый его неправильным использованием.  
 *  
 * @see http://rules.yandex.ru/termsofuse.xml 
 * @author agronom 
 * @version $Id$ 
 *  
 */ 
ob_start(); 
?> 
<html> 
<head> 
<title>Проверка уникальности текста</title> 
<meta http-equiv="content-type" content="text/html; charset=windows-1251"> 
</head> 
<body> 
<h1>Проверка уникальности текста в интернете.</h1> 
<form method="post"> 
<b>Текст для проверки </b> 
<small>(Скопируйте сюда текст веб-страницы)</small><b>:</b><br> 
<textarea name="query" cols="80" rows="5"></textarea><br> 
<input type="submit" value="Проверить"> 
</form> 
<?php 
/** 
 * Выбирает доменное имя 
 * @param $a 
 */ 
function    handle_info($a){ 
        $a = explode("\n", trim(strip_tags($a))); 
        $a = preg_replace("/^(www\.)?([\w\-\.]+):?([\d]+)?\/?([\s\S]*)?/i", "$2", strtolower($a[0])); 
        return $a; 
} 

/** 
 * Получает информацию о выдаче яндекса по запросу 
 *  
 * @param string $query текст запроса без URL кодирования 
 * @return array $a 
 *         $a[0][1] - число найденных страниц 
 *         $a[0][2] - число найденных сайтов 
 *         $a[1]    - массив найденных доменов 
 */ 
function top_10($query) { 
    $url = "http://yandex.ru/yandsearch?text=".urlencode($query); 
    $txt = file_get_contents($url); 
    //echo "Ответ Яндекса"; 
    //echo nl2br(htmlspecialchars(print_r($txt, true))); 
    $brief = get_brief($txt); 
    if (!is_array($brief)) { 
        return false; 
    } 
    // Получаем список сайтов yandex top 10 
    preg_match("/\<ol[\s\S]*?\>[\s\S]*?\<\/ol[\s\S]*?\>/", $txt, $results); 
    // Из списка ссылок делаем массив 
    preg_match_all("/\<li[\s\S]*?\>[\s\S]*?\<div class=\"info\">([\s\S]*?)\<\/div\>[\s\S]*?\<\/li[\s\S]*?\>/", $results[0], $results); 
    $results[1] = array_map("handle_info", $results[1]); 
    return array($brief, $results[1]); 
} 
/** 
 * Получает информацию о выдаче Google по запросу 
 *  
 * @param string $query текст запроса без URL кодирования 
 * @return array 
 */ 
function top_10_g($query) { 
    $url = "http://www.google.com/search?hl=ru&q=".urlencode($query); 
    $txt = file_get_contents($url); 
    $brief = get_brief_g($txt); 
    if (!is_array($brief)) { 
        return false; 
    } 
    return array($brief, false); 
} 
/** 
 * Получает краткую информацию о числе результатов поиска в Yandex 
 *  
 * @param string $text текст страницы 
 * @return array $a  $a[1] - число страниц, $a[2] - число сайтов 
 */ 
function    get_brief($text){ 
    preg_match("/\<title\>[\s\S]+?:[\s\S]+?(\d+)[\s\S]+?\<\/title\>/i", $text, $ref); 
    $ref[1] = (@$ref[1]) ? $ref[1] : 0 ; 
    return $ref; 
} 
/** 
 * Получает краткую информацию о числе результатов поиска в Google 
 *  
 * @param string $text текст страницы 
 * @return array $a  $a[1] - число страниц 
 */ 
function    get_brief_g($text){ 
    $exp = "/\<div id=ssb\>\<div id=prs>\<b\>[\s\S]*?\<\/b\>\<\/div>\<p\>[\s\S]*?\<b\>[\d]*?\<\/b\> - \<b\>[\d]*?\<\/b\>[\s\S]*?\<b\>([\d\s]*?)\<\/b\>[\s\S]*?\<\/p\><\/div\>/i"; 
    if (!preg_match($exp, $text, $ref)) { 
        return false; 
    } 
    $ref[1] = (isset($ref[1]))?(int)str_replace("&nbsp;", "", $ref[1]):0; 
    return $ref; 
} 

if (isset($_POST['query'])) { 
    $log = array(); 
    $log['query'] = $_POST['query']; 
    $queries = (get_magic_quotes_gpc())?stripslashes($_POST['query']):$_POST['query']; 
    $queries = preg_replace("/[?!\(\)'\",]/", "", $queries); 
    $queries = preg_replace("/[- ]{2}/", " ", $queries); 
    $queries = preg_replace("/ +/", " ", $queries); 
    $queries = str_replace(".", "\n", $queries); 
    $queries = explode("\n", trim($queries));    // Разбиваем на предложения 
    ?> 
    <h2>Яндекс</h2> 
    <table border="1"> 
        <tr><td>Страниц</td><td>Запрос</td></tr> 
    <?php 
    foreach ($queries as $q) { 
        if (strlen($q) > 30) { 
            $q   = preg_replace("/(([\S]+?[\s]+){3,9}[\S]+)[\s\S]*/", "$1", $q); 
            $top = @top_10("\"".trim($q)."\""); 
            $log["yandex"][] = array($top[0][1], $q); 
            ?><tr><td><span title="<?php echo implode("\r\n", $top[1]); ?>"><?php echo $top[0][1]; ?></span></td><td><a href="http://www.yandex.ru/yandsearch?text=<?php echo urlencode("\"$q\""); ?>" target="_blank"><?php echo $q; ?></a></td></tr><?php 
        } 
    } 
    ?></table> 
    <h2>Google</h2> 
    <table border="1"> 
        <tr><td>Сайтов</td><td>Запрос</td></tr> 
    <?php 
    foreach ($queries as $q) { 
        if (strlen($q) > 30) { 
            $q   = preg_replace("/(([\S]+?[\s]+){3,9}[\S]+)[\s\S]*/", "$1", $q); 
            $top = @top_10_g("\"".trim($q)."\""); 
            $log["google"][] = array(@$top[0][1], $q); 
            ?><tr><td><?php echo (is_int(@$top[0][1]))? $top[0][1] : "N/A"; ?></td><td><a href="http://www.google.com/search?hl=ru&q=<?php echo urlencode("\"$q\""); ?>" target="_blank"><?php echo $q; ?></a></td></tr><?php 
        } 
    } 
    ?></table><?php 
} 
?> 