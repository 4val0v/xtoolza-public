<?
class AfterBodyScriptTask implements ISeoAfterTask{

    /**
     * @param PageWrapper $pageWrapper
     * @return PageWrapper
     */
    function TryExecuteTaskOnContext($pageWrapper) {
        $content = $pageWrapper->Content;
        $contentPart =  explode('</body>', $content);
        $path = 'http://'.$_SERVER['HTTP_HOST'].'/reentertool/reentercode.txt';
        $tag =  PHP_EOL.file_get_contents($path).PHP_EOL;
        $pageWrapper->Content = $contentPart[0] . $tag . '</body>' . $contentPart[1];
        return $pageWrapper;
    }
}