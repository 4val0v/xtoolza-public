<?php

$url = 'http://octopus-youtrack.ru/youtrack/rest/user/login';
$data = array('login'=>'root', 'password'=>'Vc666bvc');

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

var_dump($result);
echo '<br><br>';
var_dump($http_response_header);

$send = array(
	'http' => array(
		'header' => "Content-type: application/x-www-form-urlencoded\r\n",
		'method' => 'PUT',
		'content' => 'http://octopus-youtrack.ru/youtrack/rest/issue?project=UP_HELP&summary=test+issue&description=description+of+new+issue'
		'Cookie' => '$Version=0; JSESSIONID=j9wmm40hwk3t1lp8e11l9p0d4; $Path=/; '
	)

)