<?php

/**
 * Class TdkManager
 */
class TdkManager {
    /**
     * Добавляет или заменяет tdk тэги
     * @param $buffer
     * @return string
     */
    public function AddOrReplaceTags($buffer){
        $tdk = ConfigsLazy::GetInstance()->tdk;
        $charset = ConfigsLazy::GetInstance()->encoding;

        if(empty($charset)){
            $charset = 'UTF-8';
        }

        if ($charset != 'UTF-8') {
            $tdk->title = iconv('UTF-8', $charset, $tdk->title);
            $tdk->keywords = iconv('UTF-8', $charset, $tdk->keywords);
            $tdk->description = iconv('UTF-8', $charset, $tdk->description);
        }

        $attrHead = '';
        if(preg_match('#<\s*head(.*?)>#si', $buffer, $matches)){
            $attrHead = $matches[1];
        }

        $newHead = '<head'. $attrHead . '>';
        if (!empty($tdk->title)) {
            $newHead = $newHead . '<title>' . $tdk->title . '</title>';
            $buffer = preg_replace('#<\s*title.*?>[^<]*<\s*/\s*title\s*>#si', '', $buffer);
        }
        if (!empty($tdk->description)) {
            $newHead = $newHead . '<meta name="description" content="' . $tdk->description. '"/>';
            $buffer = preg_replace('#<\s*meta\s*name\s*=\s*["\']description["\'].*?/?\s*>#si', '', $buffer);
        }
        if (!empty($tdk->keywords)) {
            $newHead = $newHead . '<meta name="keywords" content="' . $tdk->keywords . '"/>';
            $buffer = preg_replace('#<\s*meta\s*name\s*=\s*["\']keywords["\'].*?/?\s*>#si', '', $buffer);
        }
        $buffer = preg_replace('#<\s*head.*?>(.*?)<\s*/\s*head\s*>#si', $newHead . '$1</head>', $buffer, 1, $counter);
        if ($counter === 0) {
            $buffer = $newHead . '</head>' . $buffer;
        }
        return $buffer;
    }
} 