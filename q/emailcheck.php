<?php

$from_url = 'http://xtoolza.info';
var_dump (extract_links($html,$from_url));

function extract_links($html, $from_url)

{

   mb_internal_encoding('utf-8');

   mb_regex_encoding('utf-8');

 

   $from_url = get_host($from_url);

   $arr = array();

   $out = array();

   $html = str_replace('&nbsp;', ' ', $html);    

   $html = mb_ereg_replace('\s+', ' ', $html, 'is');

   $html = preg_replace('#<!--.*-->#Uuis', '', $html);

   $html = preg_replace('#<script[^>]*>.*</script[^>]*>#Uuis', '', $html);

   $html = preg_replace('#<style[^>]*>.*</style[^>]*>#Uuis', '', $html);

   $html = preg_replace_callback('#<noindex[^>]*>(.*)</noindex[^>]*>#Uuis', 'extract_links_callback', $html);    

 

   if (preg_match_all('#<(a|area)(\s+?[^>]*?\s+?|\s+?)href\s*=\s*(["\'`]*)\s*?([^>\s]+)\s*\3[^>]*?(/>|>(.*?)</\1>|>)#is', $html, $arr, PREG_SET_ORDER))

    {

    foreach($arr as $one)

    {

        $this_href = trim(mb_strtolower($one[4]), ' "\'');

        if ($this_href == '') $this_href = '/';

        if (substr($this_href, 0, 11) == 'javascript:') continue;

        if (substr($this_href, 0, 7) == 'mailto:') continue;

        $this_text = '';

        if (count($one)>6) $this_text = strip_tags(str_replace('<', ' <', $one[6]));

        $this_text = trim(preg_replace('#&(\#\d+|[a-z]+);#uis', ' ', $this_text));

        $this_text = trim(preg_replace('#[\'"&<>`]+#uis', ' ', $this_text));

        $this_text = trim((str_replace('•', ' ', (strip_tags(trim($this_text))))));

        $this_text = str_replace('=', ' ', $this_text);

        $this_text = preg_replace('#\s+#uis', ' ', $this_text);

            if ($this_text=='') $this_text = 'n/t';    

        $this_nofollow = (preg_match('#rel\s*=[\s"\']*nofollow#uis', $one[0]));

        $this_noindex = (preg_match('#rel\s*=[\s"\']*noindex#uis', $one[0]));

            $this_type = (!preg_match('#^http://#is', $this_href)||preg_match('#^http://'.preg_quote($from_url, '#').'#is', $this_href)||preg_match('#^http://'.preg_quote(fix_www($from_url), '#').'#is', $this_href)) ? 'int' : 'ext';

        $out[] = array('href'=>$this_href, 'text'=>$this_text, 'nofollow'=>$this_nofollow, 'noindex'=>$this_noindex, 'type'=>$this_type);        

    }

    }

    return $out;

}

function extract_links_callback($matches)

{

    return preg_replace('# href\s*=#Uuis', ' rel="noindex" href=', $matches[1]);

}

function fix_www($host)

{

    if (substr($host, 0, 4)==='www.')

    {

        $host = preg_replace('#^www.#Uis', '', $host);

    }

    else 

    {

        $host = 'www.' . $host;

    }

    return $host;

}

function get_host($s)

{

    $s = preg_replace('#^http://#Uis', '', trim($s));

    $s = explode('/', trim($s));

    $s = trim($s[0]);

    $s = explode(':', $s);

    $s = trim($s[0]);

    return $s;

}?>