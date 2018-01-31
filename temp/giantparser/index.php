<?
include('simple_html_dom.php'); 
$html = file_get_html('http://xtoolza.info');
  
  //ѕоиск ссылок на разделы
  foreach($html->find('a.mainlevel') as $element){
      //echo $element->href . '<br>';
       $linki[] = $element->href;
   }
   foreach ($linki as $key => $value) {
    $full_link_razdel = "http://xtoolza.info";
    $full_link_razdel .= $value;
    $full_links_razdel[] = $full_link_razdel;
    echo $full_link_razdel . '<br>';
   }
   foreach ($full_links_razdel as $numlink => $pagelink) {
      scanlink($pagelink);
   }
 
    function scanlink($scanlink){
      db_connect();
      echo "<span style='color: green'>—канируема€ страничка - " . $scanlink . "</span><br>";
  
        $html = file_get_html($scanlink);
 
        foreach ($html->find('ul.pagination li a') as $element) {
            $link[] = $element->href;
        }
        foreach ($link as $key => $value) {
    $full_link = "http://xtoolza.info";
    $full_link .= $value;
    $full_links[] = $full_link;
    //echo $full_link . '<br>';
   }
 
   $full_links = array_unique($full_links);
   /*$deletelement = array_pop($full_links);*/
   $kollink = count($full_links);
   if ($kollink > 10) {
       $delet = array_shift($full_links);
   }
   if ($kollink >= 10) {
       $delet2s = array_pop($full_links);
   }
   foreach ($full_links as $key => $linka){
        echo "—траницы пагинатора - ".$linka."<br>";
   } 
   
   foreach ($full_links as $key => $linkpage) {
      $html = file_get_html($linkpage);
      foreach($html->find('#vmMainPage') as $article) {
    //$title = $article->find('h3', 0)->plaintext;
      $item['title'] = $article->find('h3', 0)->plaintext;
      foreach($html->find('tr') as $article) {
        /*$size = $article->find('td', 0)->plaintext;
        $artikl = $article->find('td', 1)->plaintext;
        $sklad = $article->find('td', 2)->plaintext;
        $kol = $article->find('td', 3)->plaintext;*/
    $item['size'] = $article->find('td', 0)->plaintext;
    $item['artikl'] = $article->find('td', 1)->plaintext;
    $item['sklad'] = $article->find('td', 2)->plaintext;
    $item['kol'] = $article->find('td', 3)->plaintext;
    //$query = mysql_query("INSERT INTO table(title, size, artikl, sklad, kol) VALUES ('$title','$size', '$artikl', '$sklad', '$kol')");
    $articles[] = $item;
      }
    }
 }
 
   $endlink = count($full_links);
   echo " оличество ссылок - ". $endlink ."<br>";
   switch ($endlink) {
       case '9':
           $endlink-=1;
            echo "<span style='color: red'>—траничка со ссылкой дл€ следующих сканирований - ".$full_links[$endlink]."</span><br>";
           // print_r($full_links);
            scanlink($full_links[$endlink]);
           break;
       case '10':
            $endlink-=1;
            echo "<span style='color: red'>—траничка со ссылкой дл€ следующих сканирований - ".$full_links[$endlink]."</span><br>";
            print_r($full_links);
            scanlink($full_links[$endlink]);
           break;
        case '12':
            if(isset($full_links[10])){
              $endlink-=3;
              echo "<span style='color: red'>—траничка со ссылкой дл€ следующих сканирований - ".$full_links[$endlink]."</span><br>";
             print_r($full_links);
 
              scanlink($full_links[$endlink]);
            }elseif (isset($full_links[11])) {
              $endlink-=1;
              echo "<span style='color: red'>—траничка со ссылкой дл€ следующих сканирований - ".$full_links[$endlink]."</span><br>";
            print_r($full_links);
              scanlink($full_links[$endlink]);
            }
           break;
       default:
           echo "ссылок меньше 10<br>";
           break;
    }
    
    echo "<table>";
    foreach ($articles as $key3 => $value3) {
      echo "<tr><td>".$key3 ."</td>";
      
      foreach ($value3 as $key4 => $value4) {
      echo "<td>" . $value4 . "</td>";
      
      }
    echo "</tr>";
    }
    echo "</table>";
    
}
?>