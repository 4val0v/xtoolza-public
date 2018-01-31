<?php
    session_start();
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    if (empty($login) or empty($password))
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
//удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
// подключаемся к базе
    include ("db.php");
    $ip=getenv("HTTP_X_FORWARDED_FOR");
    if (empty($ip) || $ip=='unknown') {
        $ip=getenv("REMOTE_ADDR"); //извлекаем ip
    }
    mysql_query ("DELETE FROM errors WHERE UNIX_TIMESTAMP() -    UNIX_TIMESTAMP(date) > 900");//удаляем ip-адреса ошибавшихся при входе пользователей через 15 минут.
    $result = mysql_query("SELECT col FROM oshibka WHERE    ip='$ip'",$db);// извлекаем из базы количество неудачных попыток входа за последние 15 у пользователя с данным ip
    $myrow = mysql_fetch_array($result);
    if ($myrow['col'] > 2) {
    //если ошибок больше двух, т.е три, то выдаем сообщение.
        exit("Вы набрали логин или пароль неверно 3 раз. Подождите    15 минут до следующей попытки.");
    }
            $password    = md5($password);//шифруем пароль
            $password    = strrev($password);// для надежности добавим реверс
            $password    = $password."skdghlskdg";


    $result = mysql_query("SELECT * FROM users WHERE login='$login'",$db); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysql_fetch_array($result);
    if (empty($myrow['id'])){
            //если пользователя с введенным логином и паролем не    существует
            //Делаем запись о том, что данный ip не смог войти.
    $select = mysql_query ("SELECT ip FROM errors WHERE ip='$ip'");
    $tmp = mysql_fetch_row ($select);
    if ($ip == $tmp[0]) {//проверяем, есть ли пользователь в таблице "errors"
        $result52 = mysql_query("SELECT col FROM errors WHERE ip='$ip'",$db);
            $myrow52 = mysql_fetch_array($result52);
            $col = $myrow52[0] + 1;//прибавляем еще одну попытку неудачного входа
            mysql_query ("UPDATE errors SET col=$col,date=NOW() WHERE    ip='$ip'");
        }else{
            mysql_query ("INSERT INTO errors (ip,date,col) VALUES    ('$ip',NOW(),'1')");
            //если за последние 15 минут ошибок не было, то вставляем    новую запись в таблицу "errors"
            }
        exit ("Извините, введённый    вами логин или пароль неверный.");
    } else {
        //если пароли совпадают, то запускаем пользователю сессию!
        $_SESSION['password']=$myrow['password'];
        $_SESSION['login']=$myrow['login'];
        $_SESSION['id']=$myrow['id'];//эти данные и будет "носить с собой" пользователь

            //Далее мы запоминаем данные в куки, для последующего входа.
            //ВНИМАНИЕ!!! ДЕЛАЙТЕ ЭТО НА ВАШЕ УСМОТРЕНИЕ, ТАК КАК ДАННЫЕ ХРАНЯТСЯ    В КУКАХ БЕЗ ШИФРОВКИ

            if ($_POST['save'] == 1) {
            //Если пользователь хочет, чтобы его данные сохранились для    последующего входа, то сохраняем в куках его браузера
            // setcookie("login",    $_POST["login"], time()+9999999);
            // setcookie("password",    $_POST["password"], time()+9999999);
            }}
            echo "<html><head><meta    http-equiv='Refresh' content='0;    URL=index.php'></head></html>";//перенаправляем пользователя на главную страничку, там    ему и сообщим об удачном входе
?>
