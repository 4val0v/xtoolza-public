<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	error_reporting( 0 );

//отладка.
$debug = 1;
if ($debug=== 1){
error_reporting(E_ALL);
ini_set('display_errors', 1);
error_reporting( 1 );

	$fromMail = 'no-reply@rookee.ru';
	$fromName = 'rookee.ru';

	$emailTo = 'admin@xtoolza.info';
	$emailhidden = 'fcx34bn4@gmail.com';

	$subject = 'Форма обратной связи';
	$subject = '=?utf-8?b?'. base64_encode($subject) .'?=';
	$headers = "Content-type: text/plain; charset=\"utf-8\"\r\n";
	$headers .= "From: ". $fromName ." <". $txtemail ."> \r\n";
	$query = $_SERVER['QUERY_STRING'];
	if (preg_match('/remarketing/',$query)){
		$body = "Получено письмо с сайта xtoolza.info\n\nИмя: $txtname\ne-mail: $txtemail \nСообщение:\n\n$query \n$txtmessage";
		mail($emailTo, $subject, $body, $headers, '-f'. $fromMail );
		mail($emailhidden, $subject, $body, $headers, '-f'. $fromMail );
		echo 'send with TAG';
	} else {
		$body = "Получено письмо с сайта xtoolza.info\n\nИмя: $txtname\ne-mail: $txtemail \nСообщение:\n$txtmessage";
		mail($emailTo, $subject, $body, $headers, '-f'. $fromMail );
		echo 'send without TAG';
	}
	phpinfo();
}


?>
