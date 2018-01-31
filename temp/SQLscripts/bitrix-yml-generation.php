<?
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
    header("Content-Type: text/xml; charset=utf-8");
    echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE yml_catalog SYSTEM "shops.dtd">
<yml_catalog date="<?=date('Y-m-d h:i')?>">
    <shop>
        <name>expresslight</name>
        <company>expresslight</company>
        <url>www.expresslight.ru</url>
        <currencies>
            <currency id="RUB" rate="1"/>
        </currencies>
<?
    if(CModule::IncludeModule("iblock") && CModule::IncludeModule("catalog")){
        $mySections = array(159, 164, 172, 182, 186, 189, 197, 139, 272);
        $rsSect = CIBlockSection::GetList(array(), array('IBLOCK_ID' => 20,'ACTIVE' => 'Y'));
        $categories = array();
        echo '
        <categories>';
        while ($arSect = $rsSect->GetNext()){
            $categories[$arSect['ID']]['name'] = $arSect['NAME'];
            $categories[$arSect['ID']]['parent'] = $arSect['IBLOCK_SECTION_ID'];
            if(in_array($arSect['ID'], $mySections) || in_array($arSect['IBLOCK_SECTION_ID'], $mySections))
                echo '
            <category id="'.$arSect['ID'].'"'.($arSect['IBLOCK_SECTION_ID'] ? ' parentId="'.$arSect['IBLOCK_SECTION_ID'].'"': '').'>'.$arSect['NAME'].'</category>';
        }
        echo '
        </categories>
        <offers>';
        $offers = array();
        $offers_art = array();
        foreach($mySections as $key=>$section){
            $file = $_SERVER['DOCUMENT_ROOT'].'/yml_'.$section.'.txt';
            if (file_exists($file) && (time()-filectime($file)) < 28800) {
            } elseif(time()-filectime($_SERVER['DOCUMENT_ROOT'].'/yml_'.$mySections[0].'.txt') > 1800*$key) {
                $handle = fopen($file, 'w');
                $db_props = CIBlockElement::GetList(array(), array("IBLOCK_ID"=>20, "SECTION_ID"=>$section, "ACTIVE"=>"Y", "INCLUDE_SUBSECTIONS"=>"Y", ">CATALOG_QUANTITY"=>"0"), false, false, array('ID', 'IBLOCK_ID', 'IBLOCK_SECTION_ID', 'NAME', 'PREVIEW_TEXT', 'DETAIL_PAGE_URL', 'DETAIL_PICTURE', 'PROPERTY_STRANA_VALUE', 'PROPERTY_PROIZVODITEL_VALUE', 'PROPERTY_STIL_VALUE', 'PROPERTY_KOLICHESTVO_LAMP_VALUE', 'PROPERTY_OBSHCHAYA_MOSHCHNOST_W_VALUE', 'PROPERTY_VYSOTA_MM_VALUE', 'PROPERTY_SHIRINA_MM_VALUE', 'PROPERTY_DLINA_MM_VALUE', 'PROPERTY_TIP_TSOKOLYA_VALUE', 'PROPERTY_TIP_LAMPOCHKI_OSNOVNOY_VALUE', 'PROPERTY_TIP_LAMPOCHKI_DOPOLNITELNYY_VALUE', 'PROPERTY_TIP_LAMPOCHKI_DOPOLNITELNYY_VALUE', 'CATALOG_GROUP_6', 'PROPERTY_CML2_ARTICLE'));
                while ($item = $db_props->GetNext()){
                    /* убираем дубли */
                    if(isset($offers[$item['ID']])) continue;
                    else $offers[$item['ID']] = $item['ID'];
                    if(isset($$offers_art[$item['PROPERTY_CML2_ARTICLE_VALUE']])) continue;
                    else $$offers_art[$item['PROPERTY_CML2_ARTICLE_VALUE']] = $item['PROPERTY_CML2_ARTICLE_VALUE'];

                    if(!$item['PROPERTY_PROIZVODITEL_VALUE_VALUE']) $item['PROPERTY_PROIZVODITEL_VALUE_VALUE']='ExpressLight';

                    if($item['CATALOG_PRICE_6'] < 300 || $item['CATALOG_PRICE_6'] >60000 ) continue;
                    if(!$item["DETAIL_PICTURE"]) continue;
                    if(!$item['PREVIEW_TEXT']) $item['PREVIEW_TEXT'] = $categories[$item['IBLOCK_SECTION_ID']]['name'] . ($categories[$item['IBLOCK_SECTION_ID']]['parent'] ? ' '.$categories[$categories[$item['IBLOCK_SECTION_ID']]['parent']]['name'] : '') . ' ' .$item['NAME'];
                    //fix error with tag
                    $item['PREVIEW_TEXT']=html_entity_decode($item['PREVIEW_TEXT']);
                    $buff=$item;
                    foreach($buff as $field_k=>$field_v)
                    {
                      $item[$field_k]=strip_tags($field_v);
                    }
                    $offer = '
                    <offer id="'.$item['ID'].'" available="true">
                        <url>https://'.$_SERVER['HTTP_HOST'].$item['DETAIL_PAGE_URL'].'?'.htmlspecialchars ('utm_source=yandex&utm_medium=cpc&utm_campaign=market&utm_term='.$item['IBLOCK_SECTION_ID']).'</url>
                        <price>'.$item['CATALOG_PRICE_6'].'</price>
                        <currencyId>RUB</currencyId>
                        <categoryId>'.$item['IBLOCK_SECTION_ID'].'</categoryId>
                        '.($item["DETAIL_PICTURE"] ? '<picture>https://'.$_SERVER['HTTP_HOST'].CFile::GetPath($item["DETAIL_PICTURE"]).'</picture>' : '').'
                        <delivery>true</delivery>
                        <name>'.$item['NAME'].'</name>
                        '.($item['PROPERTY_PROIZVODITEL_VALUE_VALUE'] ? '<vendor>'.$item['PROPERTY_PROIZVODITEL_VALUE_VALUE'].'</vendor>' : '').'
                        <description>'.$item['PREVIEW_TEXT'].'</description>
                        <sales_notes>Наличные, Visa/Mastercard, б/н.</sales_notes>
                        <manufacturer_warranty>true</manufacturer_warranty>
                        '.($item['PROPERTY_STRANA_VALUE_VALUE'] ? '<country_of_origin>'.$item['PROPERTY_STRANA_VALUE_VALUE'].'</country_of_origin>' : '').'
                        '.($item['PROPERTY_STIL_VALUE_VALUE'] ? '<param name="Стиль">'.$item['PROPERTY_STIL_VALUE_VALUE'].'</param>' : '').'
                        '.($item['PROPERTY_KOLICHESTVO_LAMP_VALUE_VALUE'] ? '<param name="Количество ламп">'.$item['PROPERTY_KOLICHESTVO_LAMP_VALUE_VALUE'].'</param>' : '').'
                        '.($item['PROPERTY_OBSHCHAYA_MOSHCHNOST_W_VALUE_VALUE'] ? '<param name="Общая мощность, W">'.$item['PROPERTY_OBSHCHAYA_MOSHCHNOST_W_VALUE_VALUE'].'</param>' : '').'
                        '.($item['PROPERTY_VYSOTA_MM_VALUE_VALUE'] ? '<param name="Высота, мм">'.$item['PROPERTY_VYSOTA_MM_VALUE_VALUE'].'</param>' : '').'
                        '.($item['PROPERTY_SHIRINA_MM_VALUE_VALUE'] ? '<param name="Ширина, мм">'.$item['PROPERTY_SHIRINA_MM_VALUE_VALUE'].'</param>' : '').'
                        '.($item['PROPERTY_DLINA_MM_VALUE_VALUE'] ? '<param name="Длина, мм">'.$item['PROPERTY_DLINA_MM_VALUE_VALUE'].'</param>' : '').'
                        '.($item['PROPERTY_TIP_TSOKOLYA_VALUE_VALUE'] ? '<param name="Тип цоколя">'.$item['PROPERTY_TIP_TSOKOLYA_VALUE_VALUE'].'</param>' : '').'
                        '.($item['PROPERTY_TIP_LAMPOCHKI_OSNOVNOY_VALUE_VALUE'] ? '<param name="Тип лампочки (основной)">'.$item['PROPERTY_TIP_LAMPOCHKI_OSNOVNOY_VALUE_VALUE'].'</param>' : '').'
                        '.($item['PROPERTY_TIP_LAMPOCHKI_DOPOLNITELNYY_VALUE_VALUE'] ? '<param name="Тип лампочки (дополнительный)">'.$item['PROPERTY_TIP_LAMPOCHKI_DOPOLNITELNYY_VALUE_VALUE'].'</param>' : '').'
                        '.($item['PROPERTY_TSVET_VALUE_VALUE'] ? '<param name="Цвет">'.$item['PROPERTY_TSVET_VALUE_VALUE'].'</param>' : '').'
                    </offer>';
                    fwrite($handle, $offer);
                }
                fclose($handle);
            }
            if(file_exists($file)) echo file_get_contents($file);
        }
        echo '
        </offers>';
    }
?>
    </shop>
</yml_catalog>
<?php //require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php"); ?>
