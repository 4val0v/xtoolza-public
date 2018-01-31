<!DOCTYPE html>
<html>
<?
ignore_user_abort(true);
set_time_limit(0);
?>
<head>
  <title>Проверить значения YML фида</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex,nofollow" />
  <meta id='page-params'
    theme='united' title='ReEnter&trade;' menu='Создание РК,http://xtoolza.info/pumba-manual2/campaign,Настройки Feed/YML,http://xtoolza.info/pumba-manual2/settings, Алгоритмы,http://xtoolza.info/pumba-manual2/algorythms, Feeds Check,http://xtoolza.info/pumba-manual2/feeds_check/'
    active='4'>
  <link rel="stylesheet" href="http://xtoolza.info/pumba-manual2/_/owl-carousel/owl.carousel.css">
  <link rel="stylesheet" href="http://xtoolza.info/pumba-manual2/_/owl-carousel/owl.theme.css">
  <link rel="stylesheet" href="http://xtoolza.info/pumba-manual2/css.css">
  <script src='nprogress.js'></script>
  <link rel='stylesheet' href='nprogress.css'/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="http://xtoolza.info/pumba-manual2/js/totop.js"></script>
</head>
<xmp theme="spacelab" style="display:none;">
<body id="linearBg1">
<script src='nprogress.js'></script>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<h1 style="margin-top: 100px;">Аудит YML фида</h1>
<br />
<form action="checkavailable.php" method="get" name="form">
  <input type="text" name="site" placeholder="Введите адрес xml" autofocus required size="100px"><br><br>
  <input type="submit" value="Проверить" class="btn-success btn" id="rollover" onclick="
if (document.forms['form']['site'].value != '') {
  document.getElementById('div').style.display = 'block';
}" />
<br /><br />
</form>
<br>
<br>
<div style='display:none' id="div"><img src='http://xtoolza.info/pumba-manual2/feed/44.gif'>&nbsp;&nbsp;&nbsp;<span>Идёт проверка фида! Пожалуйста, подождите и не закрывайте страницу.</span></div>
<br>
<br>
<div><p>Введите адрес YML-фида. <br>Если фид защищен логином/паролем, необходимо их ввести в следующем формате: <br><code>http://login:password@feedurl.yml</code>,<br>где: <br><code>login</code> - логин <br><code>password</code> - пароль <br><code>feedurl.yml</code> - URL фида без протокола (http://)</p></div>
</xmp>
<script src="http://xtoolza.info/pumba-manual2/_/strapdown/strapdown1.js"></script>
<script src="http://xtoolza.info/pumba-manual2/_/owl-carousel/owl.carousel.js"></script>
<a id="toTop" style="display: block;position: fixed;
  z-index: 9999;
  bottom: 30px;
  right: 10px;
  background: #333333;
  border: 0px solid #ccc;
  padding: 20px;
  cursor: pointer;
  color: #EEEEEE;
  text-decoration: none;
  width: 100px;
  border-radius: 15px;">⇑&nbsp;Наверх</a>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- xtoolza -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-0745697304390645"
     data-ad-slot="5937572266"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<script>
 $('body').show();
 $('.version').text(NProgress.version);
 NProgress.start();
 setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);
 </script>
 </body>
 </html>
</html>
