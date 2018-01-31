<?php

/**
 * Class DOMExtension
 */
class DOMExtension extends DOMElement
{

    public function __set($name, $value) {
        if ($name != 'innerHTML') {
            return;
        }

        if ($value === '') {
            return;
        }

        for ($x=$this->childNodes->length-1; $x>=0; $x--) {
            $this->removeChild($this->childNodes->item($x));
        }

        $f = $this->ownerDocument->createDocumentFragment();

        $result = @$f->appendXML($value);
        if ($result) {
            if ($f->hasChildNodes()) $this->appendChild($f);
        } else {
            $f = new DOMDocument();
            if(function_exists('mb_convert_encoding')){
                $value = mb_convert_encoding($value, 'HTML-ENTITIES', 'UTF-8');
            }
            $result = @$f->loadHTML('<htmlfragment>'.$value.'</htmlfragment>');
            if ($result) {
                $import = $f->getElementsByTagName('htmlfragment')->item(0);
                foreach ($import->childNodes as $child) {
                    $importedNode = $this->ownerDocument->importNode($child, true);
                    $this->appendChild($importedNode);
                }
            } else {
                // now empty
            }
        }
    }

    public function __get($name)
    {
        if ($name !== 'innerHTML') {
            return null;
        }
        $inner = '';
        foreach ($this->childNodes as $child) {
            $inner .= $this->ownerDocument->saveXML($child);
        }
        return $inner;
    }

    public function __toString()
    {
        return '['.$this->tagName.']';
    }
}