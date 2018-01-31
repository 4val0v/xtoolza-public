<!DOCTYPE html>
<html>
<?
session_start();
ignore_user_abort(true);
set_time_limit(0);

define(debug, 0);
define(message, 0);
if (debug == 1) {
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  if (message == 1){
    echo '<pre>
    Идёт отладка!
    Проверка может работать некорректно!
  </pre>';
  }
}
?>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <meta name="robots" content="noindex, nofollow" />
  <title>Добавить произвольные метки в фид</title>
  <link href="/q/style.css" rel="stylesheet"/>
  <link rel='stylesheet' href='nprogress.css'/>
  <link href="/q/css.css" rel="stylesheet"/>
</head>
<body id="linearBg1">
<script src='nprogress.js'></script>
<div style="align:left; background-color: #61C6EC">
  <table>
    <tbody>
      <tr>
        <td>
          <div class="TmgWrae">
            <a href="http://xtoolza.info/pumba-manual2/"><img src="http://xtoolza.info/pumba-manual2/reenterlogo.png" width="115px;"></a>
          </div>
        </td>
        <td>
          <table>
            <tbody>
              <tr>
                <td><h1 class="jumbotron" style="font-size:25px">Добавить произвольные метки в фид</h1></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<br><br>
<form action="/q/map_sait/feed/myowntags/out.php" method="get" name="form">
  <input type="text" name="yml" placeholder="Введите адрес xml" autofocus required size="100px"><br><br>
  <input type="text" name="tags" placeholder="Введите ?utm_метки" required size="100px"><br><br>
  <input type="submit" value="Добавить" class="btn-success btn" id="rollover" onclick="
if ((document.forms['form']['yml'].value != '')&&(document.forms['form']['tags'].value != '')) {
  document.getElementById('div').style.display = 'block';
}" />
<br />
</form>

<div style='display:none' id="div"><img src='http://xtoolza.info/pumba-manual2/settings/ajax-loader-200x200.gif' width="100px">&nbsp;&nbsp;&nbsp;<span>Добавляет к каждому значению в теге URL произвольный текст</span></div>
  <div>Вставьте произвольные utm-метки, в формате URL, например,<br /><code>?utm_source=yandex&utm_medium=remarketing&utm_campaign=all_visitors</code></div>
