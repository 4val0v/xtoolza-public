<?php
header('Content-Type: text/html; charset=utf-8');
$filename=$_SERVER['DOCUMENT_ROOT'].'/sitemap.xml';

// читаем файл

$html=@file_get_contents($filename);

if(strlen($html)<300)die('Нет файла карты сайта '.$filename);

$dom = new DOMDocument('1.0', 'UTF-8');  

@$dom->loadXML($html);

if(!$dom)die('Файл карты сайта '.$filename.' испорчен, - сформируйте карту сайта!');

$root=$dom->documentElement;

$nodelist=$root->childNodes;    //список узлов 1-го уровня

foreach ($nodelist as $child) {

    if ($child->nodeType==XML_ELEMENT_NODE){

        $loc=$lastmod=false;

    foreach ($child->childNodes as $child2)

        if ($child2->nodeType==XML_ELEMENT_NODE){

            if ($child2->nodeName=='loc')$loc=$child2->nodeValue;

            elseif ($child2->nodeName=='lastmod')$lastmod=$child2;

        }

    if(!$loc || !$lastmod)continue;

    echo 'Страница <b>'.$loc.'</b> прошлое изменение '.$lastmod->nodeValue."<br>\n";

    //$root->removeChild($child); // удалить страницу из sitemap

    }    

}

?>