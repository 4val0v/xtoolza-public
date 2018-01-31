<!DOCTYPE html>
<? 
// считываем текущее время
$start_time = microtime();
// разделяем секунды и миллисекунды (становятся значениями начальных ключей массива-списка)
$start_array = explode(" ",$start_time);
// это и есть стартовое время
$start_time = $start_array[1] + $start_array[0];?>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
	<meta name ="robots" content="noindex, nofollow" />
    <title>Toolza Checker Result</title>
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>
	

</head>
<body>
<h4>Rookee Plus Toolza Checker</h4>
<?

header('Content-Type: text/html; charset=utf-8');
$url = array('a2foton.com',
'abort-dr.com.ua',
'accord-stroy.ru',
'a-fur.com',
'algeco.ru',
'amway-dostavka24.ru',
'arhivcentr.ru',
'conceptsound.ru',
'diplatt.com',
'dovgolittya-rodyni.com.ua',
'efca.ru',
'eurosmed.ru',
'eurovorota.net',
'forladyonly.ru',
'form4concrete.ru',
'gazovik-real.ru',
'get66.ru',
'hm-net.ru',
'altpremium.ru',
'eurolyx.ru',
'inautomatic.ru',
'lira-print.ru',
'lombard2000.ru',
'lssport.ru',
'mosvipremont.ru',
'multifin.ru',
'news.vesga.ru',
'obuv-opt-nsk.ru',
'otdohnites.com',
'pro-cosmetik.ru',
'rukuxni.ru',
'sportcover.ru',
'stroy-legko.ru',
'styagkapola.ru',
'supertabak.ru',
'texsklad.ru',
'tkyul.ru',
'topshouse.ru',
'vaga007.ru',
'vendagroup.ru',
'versallis.ru',
'vipcostumchik.ru',
'wmalliance.ru',
'www.addictless.ru',
'www.cruzak.ru',
'www.dip555.com',
'www.esd.su',
'www.guestworkers.ru',
'www.kvartiraprosto.ru',
'www.mebmetall.ru',
'www.slon-tea.ru',
'www.tisa.su',
'yic-mfp.ru',
'xn----8sbdbpn5cqc1i.xn--p1ai',
'xn--80aahq5bdlid7b6c.xn--p1ai',
'xn--80agogmahibmm.xn--p1ai',
'xn----ctbinbefehuegehxcok.xn--p1ai',
'xn--b1ag1aplai.xn--p1ai'
);
$date = date(DATE_RFC822);
echo "<table><tr></td><pre style='width:405px;background-color:#FFDEAD'>
                   toolza
            <(__)> | | |
            | \/ | \_|_/
            \^  ^/   |
            /\--/\  /|
           /  \/  \/ |
  $date
    </pre></td></tr>
	<tr><td></td></tr>
	</table>";
echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>Сайт</b></td><td><b>Тулза включена?</b></td><td><b>Статус-код</b></td></tr>";
$xt = "http://xtoolza.info/q/d/magiyafile.html";
foreach ($url as $arraylist) {
echo '<tr><td>'.'<a href="http://'.$arraylist.'/?magiya=poyav1s" target="_blank">'.$arraylist.'</a>'.'</td>';
$urlcheck = "http://".$arraylist."/?magiya=poyav1s";
$a = getpage($xt);
$b = getpage($urlcheck);
	if ($a === $b) {
		echo "<td>Да</td>";
	}
	else echo "<td>Нет</td>";
	
echo "<td>". proverit_dostupnost_saita($arraylist)."</td></tr>";	
}


echo '</table>';

//получить содержимое страницы
function getpage($nadres){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,$nadres);
  curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_VERBOSE, false);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_SSLVERSION, 3);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

  $pagemeta = curl_exec($ch);
  $result = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
  return $pagemeta;
  return $result;
  
            if ($result == 301 || $result == 302)
        {
            $matches = array();
            preg_match('/Location:(.*?)\n/', $header, $matches);
            $url = @parse_url(trim(array_pop($matches)));
            if (!$url)
            {
                //couldn't process the url to redirect to
                $curl_loops = 0;
                return "no";
            }
            $last_url = parse_url(curl_getinfo($ch, CURLINFO_EFFECTIVE_URL));
            if (!$url['scheme'])
                $url['scheme'] = $last_url['scheme'];
            if (!$url['host'])
                $url['host'] = $last_url['host'];
            if (!$url['path'])
                $url['path'] = $last_url['path'];
            $new_url = $url['scheme'] . '://' . $url['host'] . $url['path'] . ($url['query']?'?'.$url['query']:'');
            curl_setopt($ch, CURLOPT_URL, $new_url);
            debug('Redirecting to', $new_url);
            return curl_redir_exec($ch);
        } else {
            $curl_loops=0;
            return $new_url;
        }
  
  
}


//проверим статусы
function proverit_dostupnost_saita($arraylist) {
  $result = array(
    'kod_http' => 'не удалось определить',
    'dostupen' => false
  );
  $user_agent = "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:16.0) Gecko/20100101 Firefox/16.0";
  $temp = curl_init();
  curl_setopt($temp, CURLOPT_URL,$arraylist);
  curl_setopt($temp, CURLOPT_USERAGENT, $user_agent);
  curl_setopt($temp, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($temp, CURLOPT_VERBOSE, false);
  curl_setopt($temp, CURLOPT_TIMEOUT, 5);
  curl_setopt($temp, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($temp, CURLOPT_SSLVERSION, 3);
  curl_setopt($temp, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($temp, CURLOPT_SSL_VERIFYHOST, false);
  $page = curl_exec($temp);
  //print curl_error($temp);
  $result = curl_getinfo($temp, CURLINFO_HTTP_CODE);
  curl_close($temp);
  return $result;
          if ($result == 301 || $result == 302)
        {
            $matches = array();
            preg_match('/Location:(.*?)\n/', $header, $matches);
            $url = @parse_url(trim(array_pop($matches)));
            if (!$url)
            {
                //couldn't process the url to redirect to
                $curl_loops = 0;
                return "no";
            }
            $last_url = parse_url(curl_getinfo($ch, CURLINFO_EFFECTIVE_URL));
            if (!$url['scheme'])
                $url['scheme'] = $last_url['scheme'];
            if (!$url['host'])
                $url['host'] = $last_url['host'];
            if (!$url['path'])
                $url['path'] = $last_url['path'];
            $new_url = $url['scheme'] . '://' . $url['host'] . $url['path'] . ($url['query']?'?'.$url['query']:'');
            curl_setopt($ch, CURLOPT_URL, $new_url);
            debug('Redirecting to', $new_url);
            return curl_redir_exec($ch);
        } else {
            $curl_loops=0;
            return $new_url;
        }
}

    function curl_redir_exec($ch)
    {
        static $curl_loops = 0;
        static $curl_max_loops = 20;
        if ($curl_loops++ >= $curl_max_loops)
        {
            $curl_loops = 0;
            return FALSE;
        }
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        list($header, $data) = explode("\n\n", $data, 2);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code == 301 || $http_code == 302)
        {
            $matches = array();
            preg_match('/Location:(.*?)\n/', $header, $matches);
            $url = @parse_url(trim(array_pop($matches)));
            if (!$url)
            {
                //couldn't process the url to redirect to
                $curl_loops = 0;
                return $data;
            }
            $last_url = parse_url(curl_getinfo($ch, CURLINFO_EFFECTIVE_URL));
            if (!$url['scheme'])
                $url['scheme'] = $last_url['scheme'];
            if (!$url['host'])
                $url['host'] = $last_url['host'];
            if (!$url['path'])
                $url['path'] = $last_url['path'];
            $new_url = $url['scheme'] . '://' . $url['host'] . $url['path'] . ($url['query']?'?'.$url['query']:'');
            curl_setopt($ch, CURLOPT_URL, $new_url);
            debug('Redirecting to', $new_url);
            return curl_redir_exec($ch);
        } else {
            $curl_loops=0;
            return $new_url;
        }
    }




?>
<br>
<a class="btn-success btn" href="http://xtoolza.info">На главную</a>&nbsp;&nbsp;&nbsp;
<div style="text-align: center; bottom:10px; position: relative;">
<?php 


//generate time
$end_time = microtime();
$end_array = explode(" ",$end_time);
$end_time = $end_array[1] + $end_array[0];
// вычитаем из конечного времени начальное
$time = $end_time - $start_time;
// выводим время генерации страницы
printf("<br>Страница сгенерирована за %f секунд",$time);

?> 

</div>
</body>
</html>

