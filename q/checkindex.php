<?php
header('Content-Type: text/html; charset=utf-8');
set_time_limit(0);

if (@$_GET['site'])

    {

    $a=grab_ya($_GET['site']);

    echo "<h1>Яндекс</h1>";

    echo "<b>SITE:</b> $_GET[site]<Br>";

    echo "<b>Количество страниц:</b> ". count($a)."<br>";

    echo "<font size=-1>";

    for ($i=0;$i<count($a);$i++)

        {

        echo $a[$i]."<br>";

        }

    echo "</font>";





    }

function grab_ya($site)

    {

    $end=0;

    $p=0;

    while (!$end)

        {

        $html=file_get_contents("http://www.yandex.ru/yandsearch?p=$p&ras=1&spcctx=notfar&zone=all&wordforms=all&lang=all&within=0l&Link=&rstr=&site=$site&numdoc=1&ds=");

        $tmp=explode("<a tabinde",$html);

        for ($i=1;$i<count($tmp);$i++)

            {

            $a=explode('href="',$tmp[$i]);

            $a=explode('"',$a[1]);

            flush();

            $out[]=$a[0];

            }

        if (preg_match('/<span class="arr disabled">следующая<span>/i',$html))

            {

            $end=1;

            return $out;

            }

        $p++;

        }

    }

?>