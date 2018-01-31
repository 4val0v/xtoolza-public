<form action="" method="post">
<input name="email" value="" type="text" >
<input value="Войти" type="submit" >
</form>

<?php 

if($_POST['email'] != ''){
	// $f = fopen('email.txt', 'a');
	// fwrite($f, $_POST['email'] . PHP_EOL);
	// fclose($f);
	send_mail();
}
else {
	echo 'error';
	die();
}

function send_mail(){
  // $filename = "email.txt"; //Имя файла для прикрепления
  $to = "admin@ztoolza.info"; //Кому
  $from = "support@xtoolza.info"; //От кого
  $subject = "Подписка"; //Тема
  $message = '<table align="center" cellpadding="0" cellspacing="0" class="mceItemTable" width="602">
  <tbody>
    <tr>
      <td><a class="daria-goto-anchor" data-mce-href="http://blondinka.link.sendsay.ru/blondinka/969,pVv0WVrxoghBDpxbLPIKRQ/338,898200,14043,?aHR0cDovL3VwdGltdXMucnUvP3V0bV9zb3VyY2U9YW9yaSZ1dG1fbWVkaXVtPWVtYWlsJnV0bV9jYW1wYWlnbj1hb3JpX3Nlb18yOF8wNSZ1dG1fY29udGVudD1iYW5uZXI=" data-orig-href="http://blondinka.link.sendsay.ru/blondinka/969,pVv0WVrxoghBDpxbLPIKRQ/338,898200,14043,?aHR0cDovL3VwdGltdXMucnUvP3V0bV9zb3VyY2U9YW9yaSZ1dG1fbWVkaXVtPWVtYWlsJnV0bV9jYW1wYWlnbj1hb3JpX3Nlb18yOF8wNSZ1dG1fY29udGVudD1iYW5uZXI=" data-vdir-href="https://mail.yandex.ru/re.jsx?uid=1130000015749394&h=a,hgdUBONEAMZx4B7Dh9oHGA&l=aHR0cDovL2Jsb25kaW5rYS5saW5rLnNlbmRzYXkucnUvYmxvbmRpbmthLzk2OSxwVnYwV1ZyeG9naEJEcHhiTFBJS1JRLzMzOCw4OTgyMDAsMTQwNDMsP2FIUjBjRG92TDNWd2RHbHRkWE11Y25VdlAzVjBiVjl6YjNWeVkyVTlZVzl5YVNaMWRHMWZiV1ZrYVhWdFBXVnRZV2xzSm5WMGJWOWpZVzF3WVdsbmJqMWhiM0pwWDNObGIxOHlPRjh3TlNaMWRHMWZZMjl1ZEdWdWREMWlZVzV1WlhJPQ" href="http://blondinka.link.sendsay.ru/blondinka/969,pVv0WVrxoghBDpxbLPIKRQ/338,898200,14043,?aHR0cDovL3VwdGltdXMucnUvP3V0bV9zb3VyY2U9YW9yaSZ1dG1fbWVkaXVtPWVtYWlsJnV0bV9jYW1wYWlnbj1hb3JpX3Nlb18yOF8wNSZ1dG1fY29udGVudD1iYW5uZXI=" target="_blank"><img alt="Баннер Uptimus" data-mce-src="https://cache.mail.yandex.net/mail/64794aa7e0a01b5870b94efbf7259fde/image.sendsay.ru/image/blondinka/cke/201505/281653/shapka_aori.jpg" src="https://cache.mail.yandex.net/mail/64794aa7e0a01b5870b94efbf7259fde/image.sendsay.ru/image/blondinka/cke/201505/281653/shapka_aori.jpg" /></a></td>
    </tr>
    <tr>
      <td>
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

      <p><a class="daria-goto-anchor" data-mce-href="http://uptimus.ru" data-orig-href="http://uptimus.ru" data-vdir-href="http://uptimus.ru" href="http://uptimus.ru" style="line-height: 1.6em;" target="_blank"><img alt="Попробовать Аптимус" data-mce-src="https://cache.mail.yandex.net/mail/45d4670709cb39dffba080951a62755e/image.sendsay.ru/image/blondinka/cke/201505/281654/try_uptimus.png" src="https://cache.mail.yandex.net/mail/45d4670709cb39dffba080951a62755e/image.sendsay.ru/image/blondinka/cke/201505/281654/try_uptimus.png" /></a></p>
      </td>
    </tr>
  </tbody>
</table>
'; //Текст письма
  $boundary = "---"; //Разделитель
  /* Заголовки */
  $headers = "From: $from\nReply-To: $from\n";
  $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"";
  $body = "--$boundary\n";
  /* Присоединяем текстовое сообщение */
  $body .= "Content-type: text/html; charset='utf-8'\n";
  $body .= "Content-Transfer-Encoding: quoted-printablenn";
  $body .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode($filename)."?=\n\n";
  $body .= $message."\n";
  $body .= "--$boundary\n";
  $file = fopen($filename, "r"); //Открываем файл
  $text = fread($file, filesize($filename)); //Считываем весь файл
  fclose($file); //Закрываем файл
  /* Добавляем тип содержимого, кодируем текст файла и добавляем в тело письма */
  $body .= "Content-Type: application/octet-stream; name==?utf-8?B?".base64_encode($filename)."?=\n"; 
  $body .= "Content-Transfer-Encoding: base64\n";
  $body .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode($filename)."?=\n\n";
  $body .= chunk_split(base64_encode($text))."\n";
  $body .= "--".$boundary ."--\n";
  //Отправляем письмо
  if (mail($to, $subject, $body, $headers)) {echo "Good";}
  else {echo "Bad!!!";}
}
