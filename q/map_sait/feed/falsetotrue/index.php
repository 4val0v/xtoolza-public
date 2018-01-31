<!DOCTYPE html>
<html>
<?
session_start();
ignore_user_abort(true);
set_time_limit(0);

$debug = 0;
if ($debug == 1) {
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  $message = 1;
  if ($message == 0){
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
  <title>Конвертировать все FALSE в TRUE в YML фиде</title>
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
                <td><h1 class="jumbotron" style="font-size:25px">Конвертировать все FALSE в TRUE в YML фиде</h1></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<br><br>
<form action="/q/map_sait/feed/falsetotrue/out.php" method="get" name="form">
  <input type="text" name="yml" placeholder="Введите адрес xml" autofocus required size="100px"><br><br>
  <input type="submit" value="Вырезать" class="btn-success btn" id="rollover" onclick="
if (document.forms['form']['yml'].value != '') {
  document.getElementById('div').style.display = 'block';
}" />
<br /><br />
</form>
<div style='display:none' id="div"><img src='http://xtoolza.info/pumba-manual2/settings/ajax-loader-200x200.gif' width="100px">&nbsp;&nbsp;&nbsp;<span>Меняем FALSE на TRUE! Пожалуйста, подождите и не закрывайте страницу.</span></div>
<div><p>Заменяет любые available="false" на available="true". Используйте ссылку из адресной строки, полученную после конвертации.</p></div>
