<?php
class scrape {
	private $ch;
	private $dom="";
	private $full="";
	function __construct() {
		$this->ch = curl_init();
		@curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
		@curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 1);
		@curl_setopt($this->ch, CURLOPT_MAXREDIRS, 10);
		@curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0);
		@curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 0);
		@curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 30);
		@curl_setopt($this->ch, CURLOPT_TIMEOUT, 30);
		@curl_setopt($this->ch, CURLOPT_HEADER, 0);
		@curl_setopt($this->ch, CURLOPT_COOKIESESSION, TRUE);
		@curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 1);
		@curl_setopt($this->ch, CURLOPT_HTTPHEADER,array ('User-Agent: Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.0.4) Gecko Galeon/2.0.6 (Debian 2.0.6-2+b1)','Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8','Accept-Language: en','Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7','Keep-Alive: 300','Connection: keep-alive'));
	}
	public function abc($keyword){
		error_log("KEYWORD $keyword");
		$all="";
		$l="abcdefghijklmnopqrstuvwxyz0123456789";
		$letras=str_split($l);
		$result=array();
		//print_r($letras);
		//exit;
		//$this->googler($keyword);
		//$this->yahoor($keyword);
		//$this->youtuber($keyword);
		foreach($letras as $p){
			//$url="http://www.google.com/complete/search?hl=en&client=serp&pq=Geodatsource&q=".urlencode($keyword." ".$p)."&cp=16";
			$url="http://completion.amazon.com/search/complete?method=completion&q=".urlencode($keyword." ".$p)."&search-alias=aps&client=amazon-search-ui&mkt=1";
			@curl_setopt($this->ch, CURLOPT_URL, "$url");
			$html = curl_exec($this->ch);
			$pattern = strtolower('["'.$keyword.' '.$p.'",[');
			$html = str_replace(array($pattern),array(""),$html);
			$html1 = substr($html,(strpos($html,']')));
			$html = str_replace(array($html1),array(""),$html);
			$html = str_replace(array('","'),array('}]*[{'),$html);
			$html = str_replace(array('"'),array(''),$html);
			$htmlArray = explode('}]*[{',$html);
			
			foreach($htmlArray as $key => $value){
				if($value!=''){
					$result['Amazon'][] = $value;
				}
			}
			
			
			$url="http://www.google.com/complete/search?hl=en&client=serp&pq=Geodatsource&q=".urlencode($keyword." ".$p)."&cp=16";
			curl_setopt($this->ch, CURLOPT_URL, "$url");
			$html = curl_exec($this->ch);
			if(preg_match("/\[\[.*\]\]/ismU",$html,$match)){
				//echo "Google\n";
				$cadena=preg_replace("/\\\\u[0-9A-F]+b?/","",$match[0]);
				$cadena=preg_replace("/\\\\\/b/","",$cadena);
				if(preg_match_all("/\[\"([^\"]+)\"/ismU",$cadena,$match)){
					foreach($match[1] as $item){
						$result['Google'][] = $item;
					}
				}
			}
			
			$url="http://sugg.search.yahoo.com/gossip-us-fp/?nresults=10&queryfirst=2&output=yjsonp&version=&command=".urlencode($keyword." ".$p);
			curl_setopt($this->ch, CURLOPT_URL, "$url");
			$html = curl_exec($this->ch);
			if(preg_match("/\[\[.*\]\]/ismU",$html,$match)){
				//echo "Yahoo\n";
				$cadena=$match[0];
				if(preg_match_all("/\[\"([^\"]+)\"/ismU",$cadena,$match)){
					foreach($match[1] as $item){
						if(!in_array($item,$result,true)){
							$result['Yahoo'][] = $item;
						}
					}
				}
			}
			$url="http://suggestqueries.google.com/complete/search?hl=en&ds=yt&client=youtube&hjson=t&jsonp=window.yt.www.suggest.handleResponse&q=".urlencode($keyword." ".$p)."&cp=16";
			curl_setopt($this->ch, CURLOPT_URL, "$url");
			$html = curl_exec($this->ch);
			if(preg_match("/\[\[.*\]\]/ismU",$html,$match)){
				//echo "Youtube\n";
				$cadena=preg_replace("/\\\\u[0-9A-F]+b?/","",$match[0]);
				$cadena=preg_replace("/\\\\\/b/","",$cadena);
				if(preg_match_all("/\[\"([^\"]+)\"/ismU",$cadena,$match)){
					foreach($match[1] as $item){
						if(!in_array($item,$result,true)){
							$result['Youtube'][] = $item;
						}
					}
				}
			}
		}
		return $result;
	}
	public function youtuber($keyword){
		error_log("KEYWORD $keyword");
		$all="";
		$l="abcdefghijklmnopqrstuvwxyz0123456789";
		$letras=str_split($l);
		$result=array();
		foreach($letras as $p){
			$url="http://suggestqueries.google.com/complete/search?hl=en&ds=yt&client=youtube&hjson=t&jsonp=window.yt.www.suggest.handleResponse&q=".urlencode($keyword." ".$p)."&cp=16";
			curl_setopt($this->ch, CURLOPT_URL, "$url");
			$html = curl_exec($this->ch);
			if(preg_match("/\[\[.*\]\]/ismU",$html,$match)){
				$cadena=preg_replace("/\\\\u[0-9A-F]+b?/","",$match[0]);
				$cadena=preg_replace("/\\\\\/b/","",$cadena);
				if(preg_match_all("/\[\"([^\"]+)\"/ismU",$cadena,$match)){
					foreach($match[1] as $item){
						if(!in_array($item,$result,true)){
							$result[] = $item;
						}
					}
				}
			}
		}
		return $result;
	}
	public function yahoor($keyword){
		error_log("KEYWORD $keyword");
		$all="";
		$l="abcdefghijklmnopqrstuvwxyz0123456789";
		$letras=str_split($l);
		$result=array();
		foreach($letras as $p){
			$url="http://sugg.search.yahoo.com/gossip-us-fp/?nresults=10&queryfirst=2&output=yjsonp&version=&command=".urlencode($keyword." ".$p);
			curl_setopt($this->ch, CURLOPT_URL, "$url");
			$html = curl_exec($this->ch);
			if(preg_match("/\[\[.*\]\]/ismU",$html,$match)){
				$cadena=$match[0];
				if(preg_match_all("/\[\"([^\"]+)\"/ismU",$cadena,$match)){
					foreach($match[1] as $item){
						if(!in_array($item,$result,true)){
							$result[] = $item;
						}
					}
				}
			}
		}
		return $result;
	}
	
	public function googler($keyword){
		error_log("KEYWORD $keyword");
		$all="";
		$l="abcdefghijklmnopqrstuvwxyz0123456789";
		$letras=str_split($l);
		$result=array();
		foreach($letras as $p){
			usleep(rand(50000,100000));
			$url="http://www.google.com/complete/search?hl=en&client=serp&pq=Geodatsource&q=".urlencode($keyword." ".$p)."&cp=16";
			curl_setopt($this->ch, CURLOPT_URL, "$url");
			$html = curl_exec($this->ch);
			if(preg_match("/\[\[.*\]\]/ismU",$html,$match)){
				//echo "Google\n";
				$cadena=preg_replace("/\\\\u[0-9A-F]+b?/","",$match[0]);
				$cadena=preg_replace("/\\\\\/b/","",$cadena);
				if(preg_match_all("/\[\"([^\"]+)\"/ismU",$cadena,$match)){
					foreach($match[1] as $item){
						if(!in_array($item,$result)){
							$result[] = $item;
						}
					}
				}
			}
			flush();
		}
		return $result;
	}
	
	// 2nd ;evel searching for google
	public function googler2($keyword){
		error_log("KEYWORD $keyword");
		$all="";
		$l="abcdefghijklmnopqrstuvwxyz0123456789";
		$letras=str_split($l);
		$l2="abcdefghijklmnopqrstuvwx";
		$letras2=str_split($l);
		$result=array();
		
		// second level for google
		foreach($letras as $p1){
			foreach($letras2 as $p){
				usleep(rand(50000,100000));
				$url="http://www.google.com/complete/search?hl=en&client=serp&pq=Geodatsource&q=".urlencode($keyword." ".$p1.$p)."&cp=16";
				curl_setopt($this->ch, CURLOPT_URL, "$url");
				$html = curl_exec($this->ch);
				if(preg_match("/\[\[.*\]\]/ismU",$html,$match)){
					//echo "Google\n";
					$cadena=preg_replace("/\\\\u[0-9A-F]+b?/","",$match[0]);
					$cadena=preg_replace("/\\\\\/b/","",$cadena);
					if(preg_match_all("/\[\"([^\"]+)\"/ismU",$cadena,$match)){
						foreach($match[1] as $item){
							if(!in_array($item,$result)){
								$result[] = $item;
							}
						}
					}
				}
				flush();
			}
		}
		return $result;
	}
	
	// competiter search
	public function googler3($keyword){
		error_log("KEYWORD $keyword");
		$all="";
		$l="abcdefghijklmnopqrstuvwxyz0123456789";
		$letras=str_split($l);
		$result=array();
		$result1=array();
		
		// first level for google
		$url="http://www.google.com/complete/search?hl=en&client=suggest&js=true&q=".urlencode($keyword);
		@curl_setopt($this->ch, CURLOPT_URL, "$url");
		$html = curl_exec($this->ch);
		//echo "<br /><br />\r\n\r\n".$html;
		$html =  str_replace('window.google.ac.h(["'.$keyword." ".$p.'",[',"",$html);
		$newval = explode('["',$html);
		foreach($newval as $key => $value){
			$newarray = explode('","',$value);
			if(sizeof($newarray)>1){
				$result[] = array("value"=>$newarray[0],"result"=>$newarray[1]);
			}
		}
		// EOF first level for google
				
		// second level for google
		//foreach($letras as $p1){
			foreach($letras as $p){
				//$url="http://www.google.com/complete/search?hl=en&client=serp&pq=Geodatsource&q=".urlencode($keyword." ".$p1.$p)."&cp=16";
				usleep(rand(50000,100000));
				$url="http://www.google.com/complete/search?hl=en&client=suggest&js=true&q=".urlencode($keyword." ".$p);
				@curl_setopt($this->ch, CURLOPT_URL, "$url");
				$html = curl_exec($this->ch);
				//echo "<br /><br />\r\n\r\n".$html;
				$html =  str_replace('window.google.ac.h(["'.$keyword." ".$p.'",[',"",$html);
				$newval = explode('["',$html);
				foreach($newval as $key => $value){
					$newarray = explode('","',$value);
					if(sizeof($newarray)>1){
						$result[] = array("value"=>$newarray[0],"result"=>$newarray[1]);
					}
				}
				flush();
			}
		//}
		return $result;
	}
	
	// competiter search
	public function get_result_count($keyword){
		error_log("KEYWORD $keyword");
		$url1="http://www.google.com/search?q=".
        urlencode(strtolower('"'.$keyword.'"'));;
		@curl_setopt($this->ch, CURLOPT_URL, "$url1");
		$html1 = curl_exec($this->ch);
		//echo "<br /><br />\r\n\r\n".$html1;
		$source_section = str_replace(array(" ","<",">","div","/"),"",$html1);
		$source_section = strtolower($source_section);
		$source_section = str_replace(array("about","results"),array("","result"),$source_section);
		$newval1 = explode('resulttats',$source_section);
		$newval1 = explode('result',$newval1[1]);
		$count = $newval1[0];
		return $count;
	}
	
	public function amazonr($keyword){
		error_log("KEYWORD $keyword");
		$all="";
		$l="abcdefghijklmnopqrstuvwxyz0123456789";
		$letras=str_split($l);
		$result=array();
		foreach($letras as $p){
			$url="http://completion.amazon.com/search/complete?method=completion&q=".urlencode($keyword." ".$p)."&search-alias=aps&client=amazon-search-ui&mkt=1";
			@curl_setopt($this->ch, CURLOPT_URL, "$url");
			$html = curl_exec($this->ch);
			$pattern = strtolower('["'.$keyword.' '.$p.'",[');
			$html = str_replace(array($pattern),array(""),$html);
			$html1 = substr($html,(strpos($html,']')));
			$html = str_replace(array($html1),array(""),$html);
			$html = str_replace(array('","'),array('}]*[{'),$html);
			$html = str_replace(array('"'),array(''),$html);
			$htmlArray = explode('}]*[{',$html);
			
			foreach($htmlArray as $key => $value){
				if($value!=''){
					$result[] = $value;
				}
			}
		}
		return $result;
	}
	
	
}
?>
