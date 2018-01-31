<?php

/**
 * Class MetaManager
 */
class MetaManager {

    public function DeleteMetaOnName($name, $content) {
        $pattern = '#<meta\s*name\s*=\s*["\']' . $name . '["\'].*?/?>#si';
        return RegExer::PregReplace($pattern, '', $content);
    }

} 