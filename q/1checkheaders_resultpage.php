<!DOCTYPE html>
<html>
<?// считываем текущее время
$start_time = microtime();
// разделяем секунды и миллисекунды (становятся значениями начальных ключей массива-списка)
$start_array = explode(" ",$start_time);
// это и есть стартовое время
$start_time = $start_array[1] + $start_array[0];
?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Result Status Code Checker</title>
    <link href="/q/style.css" rel="stylesheet"/>
    <script src="/q/modernize.js"></script>
    <script src="/q/seotext.js"></script>
    <link href="/q/css.css" rel="stylesheet"/>
</head>
<body>

<?
header('Content-Type: text/html; charset=utf-8');

//данные из textarea через $_POST.
if ($_POST['textt'] != ''){
	echo "<h2>Статусы страниц:</h2> <br />";
	}
else die('Поле должно быть заполнено!');  

//выводим таблицу с результатом	
echo "<table border=\"1\" bordercolor=\"#CDC9C9\"><tr><td><b>URL</b></td><td><b>Status</b></td></tr>"; 
$plist = explode("\r\n",$_POST['textt']); 


function result($plist) 
{
foreach ($plist as $arraylist) {
	$log .= $val . " " . $answer . PHP_EOL;
	echo "<tr><td>".$arraylist."</td>"; 
	echo "<td>"." ". proverit_dostupnost_saita($arraylist) . "<td>".curl_redir_exec($arraylist) ."</td>"."<br /></td></tr>";
	}  
echo "</table>"; 
return $log;
}

function mylog($data){
    $data = date('[Y-m-d H:i:s] - ') . $data . PHP_EOL;
    file_put_contents('statuslogs.txt', $data, FILE_APPEND);
}
mylog($loger);

//проверим статусы
function proverit_dostupnost_saita($arraylist) {
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
          if ($result == 301 || $result == 302 || $result == 303)
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

<br />
<form class="btn">
<input type="button" border="0" value="Назад" onClick="history.back()">
</form>&nbsp;&nbsp;&nbsp;
<form class="btn">
<input type="button" border="0" value="Помощь" onclick="location.href='http://www.xtoolza.info/q/help.php'">
</form>
<div style="text-align: center; bottom:10px; position: relative;">
<?   //generate time
$end_time = microtime();
$end_array = explode(" ",$end_time);
$end_time = $end_array[1] + $end_array[0];
// вычитаем из конечного времени начальное
$time = $end_time - $start_time;
// выводим в выходной поток (броузер) время генерации страницы
printf("Страница сгенерирована за %f секунд",$time);
?>
</div>
</body>
</html>