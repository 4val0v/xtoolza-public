<?php
	ini_set('display_errors', 1);
	error_reporting( E_ALL );
$headers   = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/html; charset=UTF-8";
$headers[] = "From: Uptimus.ru <support@uptimus.ru>";
$headers[] = "Reply-To: Recipient Name <support@uptimus.ru>";
// $headers[] = "X-Mailer: PHP/".phpversion();
$from = "support@uptimus.ru";
// $to = "<gennadiy.shershov@ingate.ru>";
$subject = "Осеннее предложение от Uptimus.ru";
$message = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR...l1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=base64" />
<title></title>
<meta name="title" content="" />
<meta name="keywords" content="" />
<meta name="description" content="" />
</head>
<body>
<table align="center" cellpadding="0" cellspacing="0" class="mceItemTable" width="602">
  <tbody>
	<tr>
	  <td><a class="daria-goto-anchor" data-mce-href="http://uptimus.ru?utm_source=social_links" data-orig-href="http://uptimus.ru?utm_source=social_links" data-vdir-href="http://uptimus.ru?utm_source=social_links" href="http://uptimus.ru?utm_source=social_links" target="_blank"><img alt="Баннер Uptimus" data-mce-src="http://xtoolza.info/temp/images/shapka_social.jpg" src="http://xtoolza.info/temp/images/shapka_social.jpg" /></a></td>
	</tr>
	<tr>
	  <td>
	  <br /><br />
	  <p>Здравствуйте!</p>

	  <p>Сервис Аптимус представляет новую акцию для постоянных пользователей сервиса!</p>

	  <table class="mceItemTable">
		<tbody>
		  <tr>
			<td>
			<p>&nbsp;</p>
			</td>
			<td>
			<p>Только этой осенью, при заказе услуги &laquo;Ссылки из социальных сетей&raquo;, помимо 10 ссылок из ВКонтакте и 10 ссылок в Twitter вы получаете дополнительные <strong>10 ссылок в Facebook абсолютно бесплатно!</strong> Сделать заказ вы можете на рабочей зоне &laquo;Продвижение в поиске&raquo; -&gt; &laquo;Все ошибки и улучшения оптимизации сайта&raquo; -&gt; &laquo;Внешние факторы&raquo; -&gt; &laquo;Ссылки из социальных сетей&raquo; .<br />
			&nbsp;</p>
			</td>
		  </tr>
		</tbody>
	  </table>

	  <p><a class="daria-goto-anchor" data-mce-href="http://uptimus.ru?utm_source=social_links" data-orig-href="http://uptimus.ru?utm_source=social_links" data-vdir-href="http://uptimus.ru?utm_source=social_links" href="http://uptimus.ru?utm_source=social_links" style="line-height: 1.6em;" target="_blank"><img alt="Попробовать Аптимус" data-mce-src="http://xtoolza.info/temp/images/try_uptimus.png" src="http://xtoolza.info/temp/images/try_uptimus.png" /></a></p>
	  </td>
	</tr>
  </tbody>
	</table>
	</body>
</html>' ;
$to = array(
'<support@uptimus.ru>',
'<admin@xtoolza.info>',
'<rookeeplus@gmail.com>',

);
foreach ($to as $toto) {
mail($toto, $subject, $message, implode("\r\n", $headers));
}

echo 'success!!!';

?>