<?php

/**
 * Class HeadProcessor
 * Манипулирут данными которые в <head>
 */
class HeadProcessor {

    public function AddOrReplaceMetaHead($pattern, $newData, $buffer){
        $attrHead = '';
        if(preg_match('#<\s*head(.*?)>#si', $buffer, $matches)){
            $attrHead = $matches[1];
        }
        $buffer = preg_replace($pattern, '', $buffer);
        $newHead = '<head'. $attrHead . '>' . $newData;
        $buffer = preg_replace('#<\s*head.*?>(.*?)<\s*/\s*head\s*>#si', $newHead . '$1</head>', $buffer, 1, $counter);
        if ($counter === 0) {
            $buffer = $newHead . '</head>' . $buffer;
        }
        return $buffer;
    }

} 