<?
function start(){
  session_start();
  ignore_user_abort(true);
  set_time_limit(0);
  define(debug, 0);
  define(message, 0);
  define(ALL_ERRORS, 0);
  if (debug == 1) {
    ini_set('display_errors', 1);
    if (ALL_ERRORS == 1) {
      error_reporting(E_ALL);
    } else error_reporting(E_WARNING);
    if (message == 1){
      echo '<pre style="border:3px;color:red;font-weight:bold;font-size:20px;">
      Идут технические работы!!!
      Проверка может работать некорректно!!!
      По всем вопросам писать на gennadiy.shershov@ingate.ru
    </pre>';
    }
  }
}

function head_tags(){
  echo '<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <meta name="robots" content="noindex, nofollow" />
  <title>Результат аудита YML фида</title>
  <link href="http://xtoolza.info/q/style.css" rel="stylesheet"/>
  <link href="http://xtoolza.info/q/css.css" rel="stylesheet"/>
  <link rel="stylesheet" href="../style.css" type="text/css"  />
  <!-- <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
  <script type="text/javascript" src="tocsv.js"></script>
  <script type="text/javascript" src="dropdownlist.js"></script>
  <script type="text/javascript" src="preloader.js"></script>
  <script type="text/javascript" src="/js/totop.js"></script>
  <style>
    h1, p, span, b, td {font-family: "Roboto","PT Sans","sans-serif";}
    abbr {border-bottom: 1px dashed red !important; color: #000080;position: relative;cursor:help;}
    abbr:hover::after{content:attr(data-title);position: absolute;width: 200px;left: 100%;display: block;padding:1em;background:#333333;border-radius: 20px;color:white;cursor:help;}
    .top_header {background-color: #61C6EC; margin-top: -20px; margin-left: -20px; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; width: 100%; position: absolute;}
    .wrapping {/* white-space: nowrap;overflow: hidden;padding:5px;text-overflow: ellipsis; */}
    /* .shorter:hover{background: #f0f0f0;white-space: normal} */
    table {table-layout: fixed; width: 100%}
  </style>
</head>';
}

function body_header(){
  echo '<body id="linearBg1">
<div class="top_header">
  <table>
    <tbody>
      <tr>
        <td>
          <div class="TmgWrae">
            <a href="http://reentermanual.local/"><img src="http://reentermanual.local/reenterlogo.png" width="115px;" style="cursor:pointer"></a>
          </div>
        </td>
        <td>
          <form action="checkavailable.php" method="get">
  <input type="text" name="site" value="Введите адрес yml" style="width:200px; height:15px; margin-left:-100px;" onclick=\'if(this.value=="Введите адрес yml") this.value=""\' onBlur=\'if(this.value=="") this.value="Введите адрес yml"\' size="10px">
  <input type="submit" value="Проверить" class="btn-success btn" id="rollover" onclick=\'document.getElementById("div").style.display = "inline-block";\'  style="margin-top:-12px"/>
          </form>
        </td>
        <td><h1 class="jumbotron" style="font-size:23px; ">Результат аудита YML фида</h1></td>
        <td><a href="javascript:window.location.reload()"><abbr data-title="Обновить" style="border-bottom:0px !important;cursor:pointer"><img src="/images/refresh.png" width="10%"></abbr></a> </td>
        <td><span style="padding-left:150px;""><a style="color:#000000;cursor:pointer" href="../feedback/" target="_blank">Обратная связь&nbsp;&#9997;</a></span></td>
      </tr>
    </tbody>
  </table>
</div>';

}

function preloader(){
  echo '<div id="preloader" style="position: fixed;top:185px; width:100%"><left><img src="44.gif"><span> Считаю элементы! Пожалуйста, подожди... </span></left></div>';
}

function main_table_values(){
    echo '<table border="1" bordercolor="#CDC9C9" style="position: absolute;top:200px; width:100%">
  <tr>
  <td><b><abbr data-title="значение тега &lt;offer&gt;. Может быть true(товар в наличии) или false(товара в наличии нет).  Например, &lt;offer id=&quot;5&quot; available=&quot;true&quot;&gt;">Available:</abbr></b></td>
  <td><b><abbr data-title="значение тега &lt;offer&gt;. Должно иметь числовое значение. Означает ID товара. Например, &lt;offer id=&quot;5&quot; available=&quot;true&quot;&gt;.">Значения ID:</abbr></b></td>
  <td><b><abbr data-title="значение тега &lt;price&gt;. Должно иметь числовое значение. Означает цену товара. Например, &lt;price&gt;950&lt;/price&gt;.">Значения PRICE</abbr></b></td>
  <td><b><abbr data-title="значение тега &lt;name&gt;. Должно быть заполнено название товара. Например, &lt;name&gt;Красные бумажки формата A4&lt;/name&gt;.">Значения NAME</abbr>/<abbr data-title="альтернатива тегу &lt;name&gt;. Содержит название производителя. А Model - сам товар. Используется, если нет NAME. Складывается VENDOR+MODEL. Например, &lt;vendor&gt;Бумажки Incorporated&lt;/vendor&gt;&lt;model&gt;Красные штуковины&lt;/model&gt;.">VENDOR/MODEL</abbr></b></td>
  <td><b>Значения <abbr data-title="значение тега &lt;picture&gt;. Содержит url изображения товара. Например, &lt;picture&gt;http://teestore.ru/wp-content/uploads/2015/11/Christmas-Walker-L-510x600.jpg&lt;/picture&gt;</span>.">PICTURE</abbr></b></td></tr>';
}

function first_buttons_string(){
  echo '<td><a class="btn-warning btn" href="checkstatus/index.php" target="_blank" style="padding-top:3px;padding-bottom:5px;">Проверить статус-коды URL</a></td><td><a class="btn-success btn" href="checkpicturestatus/index.php" target="_blank">Проверить статус-коды PICTURE</a></td><td><a class="btn-info btn" href="reentercheck2/" target="_blank">Проверить наличие скрипта ReEnter </a></td><td>';
}

function second_buttons_string(){
    echo'<span style="font-size:20px;font-weight:bold;">)</span></td><td><a class="btn-primary btn" href="checkpicturesize/" target="_blank">Проверка размеров изображений</a></td><td><a class="btn-danger btn" href="https://webmaster.yandex.ru/tools/robotstxt/" target="_blank">Ya.Webmaster проверить robots.txt</a></td><td><a class="btn-primary btn" href="https://www.google.com/webmasters/tools/home?hl=ru&pli=1" target="_blank" style="padding:3px 41px 5px 41px;">Google Search Console</a></td><td><a class="btn-success btn" href="http://reentermanual.local/feed/csvresult.csv" download style="padding:2px 36px 5px 41px;">&#128190;&nbsp;&nbsp;Скачать сводный CSV</a></td></td></tr></table>';
}

function second_table_values(){
  echo '<tr><td><b><abbr data-title="Адрес страницы карточки товара">URL</abbr></b></td><td><b><abbr data-title="Значение атрибута available тега offer - показывает доступность товара. True или False">Статус</abbr></b></td><td><b><abbr data-title="Уникальный в рамках фида идентификатор товара">ID</abbr></b></td><td><b><abbr data-title="информация о стоимости товара из тега price">Цена</abbr></b></td><td><b><abbr data-title="Указанная валюта товара">Валюта</abbr></b></td><td><b><abbr data-title="Название товара">Name or Vendor/Model</abbr></b></td><td><abbr data-title="Товары без картинок"><b>Без картинок</b></abbr></td></tr>';
}

function versions(){
  define(version, 1.61215);
  echo '<p style="position:fixed;top:10px;right:25px; display:block" id="version"><a href="#open" onclick="show(\'hidden_2\',200,30)"> version '. version.'</a></p>';
  echo '<div id="hidden_2" style="display:none;height:200px;width:350px;background-color:#f0f0f0;position:fixed;top:45px;right:25px;">
  <div style="top:-15px;right:-15px;cursor:pointer;background:#ee7156;text-align:center" onclick="show(\'hidden_2\',200,30)">x</div>
  <p>
    <br><b>1.61215</b>
    <br> Фикс подгрузки 404-го robots.txt;
    <br> Оптимизация кода;
    <br><b>1.61214</b>
    <br> Кнопка обновить страницу;
    <br> Кнопка скрытия версионности;
    <br><b>1.61213</b>
    <br> Улучшено оботражение ошибок;
    <br><b>1.61212</b>
    <br> Обрезание длинных URL с помощью CSS;
    <br> Ссылка на ввод URL фида в хедере;
    <br><b>1.61205</b>
    <br> Проверка CMS, файла для мерча, robots.txt теперь проходит по тегу URL из фида;
    <br> Добавлена кнопка "требования к сайтам";
    <br> Добавлено проверка трафика и тематики;
    <br> При нажатии на ссылку robots.txt выводится фрейм с содержимым файла;
    <br> bug fix of http_status_code check;
    <br> слишком длинные URL теперь обрезаются;
    <br><b>1.61202</b>
    <br> Обновлено визуальное отображение всплывающих подсказок;
    <br><b>1.61128</b>
    <br> Проверка статус кодов страниц теперь выводит последний URL перехода;
    <br> Если статус-код 200 - не выводим Location;
    <br> В проверке статус-кодов изображений выводится само изображение;
    <br><b>1.61124</b>
    <br> добавлено выделение красным ошибок в сводной таблице;
    <br> добавлены всплывающие подсказки;
    <br> добавлена выгрузка сводной таблицы в csv;
    <br> изменен стиль отображения результатов (меньшие шрифты);
    <br> улучшено определение ряда CMS;
    <br> добавлено отображение версионности;
    <br> добавлена информация об отсутствующих картинках;
    <br> добавлен preloader;
  </p>
</div>';
}

function bottom_page_and_button_up(){
  echo '<a id="toTop" style="display: block;position: fixed;
  z-index: 9999;
  bottom: 15px;
  right: 10px;
  background: #333333;
  border: 0px solid #ccc;
  padding: 10px;
  cursor: pointer;
  color: #EEEEEE;
  text-decoration: none;
  width: 75px;
  border-radius: 15px;">⇑&nbsp;Наверх</a>
</body>';
}

?>
