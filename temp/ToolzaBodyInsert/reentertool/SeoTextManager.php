<?php

class SeoTextManager {

    private $_defaultEncoding = 'UTF-8';

    /**
     * Удаляем Bom и добавляем xmlEncoding, то происходят чудеса с кодировками в Dom парсере
     * @param $content
     * @param $textsConfig
     * @return string
     */
    public function ReplaceTexts($content, $textsConfig) {

        $content = $this->RemoveBom($content);

        $patternHtmlTag = '#(?<=-->)\s*(<\s*html.*?>)#i';
        $patternHtmlTagWithoutSwitch = '#(<\s*html.*?>)#i';
        $htmlTagSave = '';

        if (preg_match($patternHtmlTag, $content, $matches)) {
            $htmlTagSave = $matches[1];
            $content = preg_replace($patternHtmlTag, '<html>', $content, 1, $count);
        } else if (preg_match($patternHtmlTagWithoutSwitch, $content, $matches)) {
            $htmlTagSave = $matches[1];
            $content = preg_replace($patternHtmlTagWithoutSwitch, '<html>', $content, 1, $count);
        }

        $encoding = VarHelper::IsSetValue(ConfigsLazy::GetInstance()->encoding) ? ConfigsLazy::GetInstance()->encoding : $this->_defaultEncoding;


        $dom = new DOMDocument();
        $dom->registerNodeClass('DOMElement', 'DOMExtension');
        $dom->loadHTML('<?xml encoding="' . $encoding . '"><meta http-equiv="Content-Type" content="text/html; charset=' . $encoding . '">' . $content);
        $xpath = new DOMXPath($dom);

        foreach ($textsConfig as $textConfig) {

            $findNode = $xpath->query($textConfig->xpath)->item(0);
            if ($findNode == null) {
                continue;
            }

            $findNode->innerHTML = $textConfig->text;

//            $newTextBlock = $dom->createDocumentFragment();
//            $newTextBlock->appendXML($textConfig->text);
//
//            $clearFindNode = $findNode->cloneNode();
//            $clearFindNode->appendChild($newTextBlock);
//
//            $findNode->parentNode->replaceChild($clearFindNode,$findNode);

        }
        $content = $dom->saveHTML();
        if (VarHelper::IsSetValue($htmlTagSave)) {
            $content = preg_replace('#<html>#i', $htmlTagSave, $content, 1);
        }
        return $content;
    }

    private function RemoveBom($content) {
        if (ord($content[0]) == 239 && ord($content[1]) == 187 && ord($content[2]) == 191) {
            return substr($content, 3);
        }
        return $content;
    }

}