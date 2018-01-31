<?php

function start(){
  session_start();
  ignore_user_abort(true);
  set_time_limit(0);
  define(debug, 1); //change to 1 here to turn on debug mode
  define(ALL_ERRORS, 1);
  if (debug == 1) {
    ini_set('display_errors', 1);
    if (ALL_ERRORS == 1) {
      error_reporting(E_ALL);
      // phpinfo();
    }
  }
}
start();

    if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} } //заносим введенный пользователем email в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
 if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
 //удаляем лишние пробелы
    $email = trim($email);
    $login = trim($login);
    $password = trim($password);
    if    (strlen($login) < 3 or strlen($login) > 15) {
        exit("Логин должен состоять не менее чем из 3 символов и не более чем из 15.");
    }
    if    (strlen($password) < 3 or strlen($password) > 15) {
        exit("Пароль должен состоять не менее чем из 3 символов и не более чем из 15.");
    }
    $password = md5($password);
    $password    = strrev($password);
    $password    = $password."skdghlskdg";

 // подключаемся к базе
    include ("db.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
 // проверка на существование пользователя с таким же логином
    $result = mysql_query("SELECT id FROM users WHERE email='$email'",$db);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['id'])) {
        exit ("Извините, введённый вами email уже зарегистрирован. Введите другой email.");
    }
 // если такого нет, то сохраняем данные
    $result2 = mysql_query ("INSERT INTO users (login,password,email) VALUES('$login','$password','$email')");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
    }
 else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
?>
