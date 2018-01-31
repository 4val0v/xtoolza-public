<?php
	/**
	 * Main page
	 */
	header('Content-Type: text/html; charset=windows-1251');
	require_once(dirname(__FILE__) . "/include/common.php");
	set_time_limit(0);
	$proxy_use = 0;
	function read_proxy($seek) {
		$handle = fopen(dirname(__FILE__) . "/" . PROXY_LIST, "r");
		$i=0;
		while (!feof($handle)) {
			$proxy = fgets($handle);
			if($i == $seek){
				break;
			}
			$i++;
		}
		fclose($handle);
		if($i!=$seek) {
			file_put_contents(dirname(__FILE__) . "/result/proxyseek.loc", "0");
			$handle = fopen(dirname(__FILE__) . "/" . PROXY_LIST, "r");
			$proxy = fgets($handle);
			fclose($handle);
		}
		return $proxy;
	}
     function parse_keys_yandex($keyword, $need=1000)
     {
     		global $proxy_use;
          $parsing_url = 'http://wordstat.yandex.ru/advq?checkboxes=&key=&pg={pg}&regions=&rpt=ppc&shw=1&text={keyword}&tm=';
     
          for ($start=0; $start < 3000; $start += 50)
          {
               $action = str_replace('{keyword}', urlencode($keyword), $parsing_url);
               if ($start == 0) $pg=0;
               else $pg = $start.'-'.$pg;
               $action = str_replace('{pg}', $pg, $action);
               /**
                * read proxy line where we stop last search
                */
               if(is_readable(dirname(__FILE__) . "/result/proxyseek.loc")){
               	$seek = file_get_contents(dirname(__FILE__) . "/result/proxyseek.loc");
                if(!is_numeric($seek)){
                	file_put_contents(dirname(__FILE__) . "/result/proxyseek.loc", "0");
                	$seek = 0;
                }
               } else {
               	 file_put_contents(dirname(__FILE__) . "/result/proxyseek.loc", "0");
               	 $seek = 0;
               }
               /**
                * select needed proxy
                */
               $proxy = read_proxy($seek);
               if($proxy_use>REQUEST_PER_PROXY) {
               	$seek++;
               	file_put_contents(dirname(__FILE__) . "/result/proxyseek.loc", $seek);
               	$proxy = read_proxy($seek);
               	$proxy_use = 0;
               }
               $f_not_get = true;
               while ($f_not_get){
	               $ch = curl_init();
				   curl_setopt($ch, CURLOPT_PROXY, $proxy);
				   curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	               curl_setopt($ch, CURLOPT_URL, $action);
	               curl_setopt($ch, CURLOPT_HEADER, 0);
	               curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	               $content = curl_exec($ch);
				   if(curl_errno($ch)!=0) {
				   	$seek++;
				   	@file_put_contents(dirname(__FILE__) . "/result/proxyseek.loc", $seek);
               		$proxy = read_proxy($seek);
               		$proxy_use = 0;
				   } else {
				   	$f_not_get = false;
				   }
	               curl_close($ch);
	               $proxy_use++;
               }
               preg_match_all("/<td><a href=\".*\">(.*)<\/a><\/td>.*<td align=\"right\">(.*)<\/td>/isU", $content, $matches, PREG_PATTERN_ORDER); 
               for($i=0; $i < count($matches[1]); $i++)
               {
                    $key = $matches[1][$i];
                    $count = $matches[2][$i];
                         
                    $found[] = $key;
                    if (count($found) >= $need) break 2;
               }
          }
               
          $found = array_unique($found);
          
          return $found;          
     }
    $error = '';
    $link = '';
    if(isset($_GET['phrase'])&&isset($_GET['count'])&&!is_numeric($_GET['count'])) {
    	$error = "¬ведите верное количество результатов";
    	$smarty->assign('phrase', $_GET['phrase']);
    	$smarty->assign('count', $_GET['count']);
    }
    if(isset($_GET['phrase'])&&isset($_GET['count'])&&is_numeric($_GET['count'])) {
    	$result = parse_keys_yandex($_GET['phrase'], $_GET['count']);	
    	$smarty->assign('phrase', $_GET['phrase']);
    	$smarty->assign('count', $_GET['count']);
    	$gettimeofday = gettimeofday();
    	$file_name = sha1( ($gettimeofday["sec"] + $gettimeofday["usec"]));
    	$handle = fopen(dirname(__FILE__)  . "/result/" . $file_name . ".csv", 'a');
    	$content = "'".$_GET['phrase']."'\n";
    	$db->execute("SET CHARACTER_SET_RESULTS=cp1251");
   		$res = $db->execute("SELECT `word` FROM `exempts`");
   		if(mysql_num_rows($res)>0){
	   		while($row = mysql_fetch_assoc($res)) {
	   			$bad_words[] = $row['word'];
	   		}
   		}
    	if(is_array($result)) {
	    	foreach ($result as $key => $value) {
	    		$f = true;
	    		if(isset($bad_words)) {
		    		foreach ($bad_words as $ind => $word) {
			    		if(preg_match("(\040" . $word . "\040|^" . $word . "\040|^" . $word . "$|\040" . $word . "$)",$value, $arr)) {
			    			$f = false;
			    			break;
			    		}
		    		}
	    		}
	    		if($f) {
					$content .= "'" . $value . "'\n";
	    		}
	    	}
    	}
    	fwrite($handle, $content);
    	fclose($handle);
    	$link = "http://" . $_SERVER['SERVER_NAME'] . "/parser/result/" . $file_name . ".csv";
    }
    $smarty->assign('error', $error);
    $smarty->assign('link', $link);
 	$smarty->display('index.tpl');
?>