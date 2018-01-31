<?php
/**
 * send.php
 * Used to send messages with tracking info to users
 * Has config.inc.php included for database information and file info
 * http://www.phpdevtips.com/2013/06/email-open-tracking-with-php-and-mysql
 *
 * @author Bennett Stone
 * @version 1.0
 * @date 07-Jun-2013
 * @website www.phpdevtips.com
 * @package Email Open Tracker
 **/
header('Content-Type: text/html; charset=utf-8');
//Include the configuration file that has the MESSAGE_SENDER and THIS_WEBSITE_URI constants
require( 'config.inc.php' );

//Assign default empty variables for message output
$success = '';
$error = '';

//Only initiate the actual sending action IF the form is submitted
if( isset( $_POST['send'] ) && $_POST['send'] == 'Send' )
{
    
    //Assign the $_POST data to variables for continued usage
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    $to = 'admin@xtoolza.info';
    //$to = explode("\r\n",$_POST['recipient']);
    $from = 'support@uptimus.ru';
    //$plist = explode(",",$_POST['recipient']); 
    //Since the tracking URL is a bit long, I usually put it in a variable of it's own
    $tracker = THIS_WEBSITE_URI . '/record.php?log=true&subject=' . urlencode( $subject ) . '&user=' . urlencode( $to );
    
    //Add the tracker to the message.
    $message .= '<img border="0" src="'.$tracker.'" width="1" height="1" />';
    
    //Since this must be HTML email, we'll need to set some headers
    //See "Example #4 Sending HTML email" at http://php.net/manual/en/function.mail.php
    $headers = "From: $from  <".$from.">\r\n";
    $headers.= "Return-Path: " . $from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    //mail returns a bool which we can use to assign success or failure messages
    $send = mail( $to, $subject, $message, $headers );
    if( $send )
    {
        $success = 'Сообщение отправлено!';
    }
    else
    {
        $error = 'Ошибка при отправке!';
    }
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <title>Emailer</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    </head>
    <body>
    <h1>EMailer</h1>
               
        <?php
        //Output success messages if they exist
        if( !empty( $success ) )
        {
            echo '<div class="success" style="background: green;padding: 15px;">' . $success . '</div>';
        }
        //Output error messages if they exist
        if( !empty( $error ) )
        {
            echo '<div class="error" style="background: red; padding: 15px;">' . $error . '</div>';
        }
        ?>
        <form action="" method="post">
        
            <p>
                <label>Тема</label>
                <input type="text" name="subject" value="" />
            </p>
            
            <p>
                <label>Сообщение</label>
                <textarea name="message" rows="5" cols="15"></textarea>
            </p>
            
            <p>
                <label>Получатель</label>
                <input type="text" name="recipient" value="" />
            
            <p>
                <input type="submit" name="send" value="Send" />
            </p>
            
        </form>
    
    </body>
</html>