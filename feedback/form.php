	<?php 

session_start();

require_once 'validator.php';

$validator = new Validator();

$validator->set_error_delimiters('<div class="error">', '</div>');

//Задаем правила валидации
$rules = array(
	array(
		'field' => 'user_name',
		'label' => 'Ваше имя',
		'rules' => array(
                        'trim' => '', //Обрезаем пробелы по бокам
                        'strip_tags' => '', // Удаляем HTML и PHP теги
                        'required' => 'Поле %s обязательно для заполнения'
					)
	),
	array(
		'field' => 'user_email',
		'label' => 'Ваш e-mail адрес',
		'rules' => array(
                        'trim' => '',
                        'required' => 'Поле %s обязательно для заполнения',
                        'valid_email' => 'Поле %s должно содержать правильный email-адрес'
					)
	),
	array(
		'field' => 'user_url',
		'label' => 'URL адрес сайта',
		'rules' => array(
                        'trim' => '',
                        'valid_url' => 'Поле %s должно содержать правильный URL адрес'
					)
	),
    array(
		'field' => 'subject',
		'label' => 'Тема письма',
		'rules' => array(
                        'trim' => '', //Обрезаем пробелы по бокам
                        'strip_tags' => '', // Удаляем HTML и PHP теги
                        'required' => 'Поле %s обязательно для заполнения'
					)
	),
    array(
		'field' => 'text',
		'label' => 'Текст сообщения',
		'rules' => array(
                        'trim' => '', //Обрезаем пробелы по бокам
                        'strip_tags' => '', // Удаляем HTML и PHP теги
                        'required' => 'Поле %s обязательно для заполнения'
					)
	),
    array(
		'field' => 'keystring',
		'label' => 'Капча',
		'rules' => array(
                        'trim' => '', //Обрезаем пробелы по бокам
                        'required' => 'Вы не ввели цифры изображенные на картинке',
    					'valid_captcha[keystring]' => 'Вы ввели не правильный цифры с картинки'
					)
	)
);

//Устанавливаем правила валидации
$validator->set_rules($rules);
$message = '';

//Запускаем валидацию POST данных
if($validator->run()){

	//Здесь впишите свой e-mail адрес
	//на негу будут приходить уведомления с формы
	$to = 'admin@xtoolza.info';
 
	$from = "=?UTF-8?b?" . base64_encode($validator->postdata('user_name')) . "?=";
	$subject = "=?UTF-8?b?" . base64_encode( $validator->postdata('subject') ) . "?=";
	
	$mail_body = "Поступил новый ответ от формы обратной связи.\r\nАвтор оставил такие данные:\r\n";
	
	//Формируем текст сообщения
	foreach($rules as $rule){
		if($rule['field'] == 'keystring') continue;
		$mail_body .= $rule['label'].': '.$validator->postdata($rule['field'])."\r\n";
	}
	
	$header = "MIME-Version: 1.0\n";
	$header .= "Content-Type: text/plain; charset=UTF-8\n";
	$header .= "From: ". $from . " <" . $validator->postdata('user_email'). ">";

	//Отправка сообщения
	if(mail($to, $subject, $mail_body, $header)){
		
		$message = '<div class="error">Ваше сообщение успешно отправлено!</div>';
		
		//Очищаем форму обратной связи
		$validator->reset_postdata();
	}
	else{
		
		$message = '<div class="error">Ваше сообщение не отправлено!</div>';
	}
}
else{
	
    //Получаем сообщения об ошибках в виде строки
	$message = $validator->get_string_errors();
	
    //Получаем сообщения об ошибках в виде массива
	$errors = $validator->get_array_errors();

}

?>
<html>
<head>
<link rel="shortcut icon" type="image/ico" href="http://xtoolza.info/favicon.ico" />
<link href="/newcss3.css" rel="stylesheet"/>
</head>
<body>
	<form action="" method="post" class="form">
    <div>
        <label>Ваше имя:</label>
        <input type="text" class = "text" name="user_name" value="" />
    </div> 
    
    <div>
        <label>Ваш e-mail адрес:</label>
        <input type="text" class = "text" name="user_email" value="" />
    </div> 
    
    <div>
        <label>URL адрес сайта:</label>
        <input type="text" class = "text" name="user_url" value="" />
    </div> 
    
    <div>
        <label>Тема письма:</label>
        <input type="text" class = "text" name="subject" value=""/>
    </div> 
    
    <div class="area">
        <label>Текст сообщения:</label>
        <textarea cols="40" class = "textarea" rows="5" name="text"></textarea>
    </div> 
    
    <div>
        <label class="captcha">Введите цифры изображенные на картинке:</label>
        <div class="capth_images"></div>
        <input type="text" class = "text" name="keystring" value=""/>
    </div> 


    <div>
        <label>&nbsp;</label>
        <input type="submit" class="btn" value="Отправить сообщение" />
    </div>
        
 </form>
</body>
<html>
