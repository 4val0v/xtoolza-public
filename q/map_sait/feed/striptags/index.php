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
  <title>Вырезать все html-теги из фида</title>
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
                <td><h1 class="jumbotron" style="font-size:25px">Вырезать все html-теги из фида</h1></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<br><br>
<form action="/q/map_sait/feed/striptags/out.php" method="get" name="form">
  <input type="text" name="site" placeholder="Введите адрес xml" autofocus required size="100px"><br><br>
  <input type="submit" value="Вырезать" class="btn-success btn" id="rollover" onclick="
if (document.forms['form']['site'].value != '') {
  document.getElementById('div').style.display = 'block';
}" />
<br /><br />
</form>
<div style='display:none' id="div">
  <img src='http://xtoolza.info/pumba-manual2/settings/ajax-loader-200x200.gif' width="100px">&nbsp;&nbsp;&nbsp;Работаем! Подождите!
</div>
<div>
  <span>Инструмент удаляет html-теги из name, description, vendor и model тегов.</span>
</div>
