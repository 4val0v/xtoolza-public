<?php
/**
 * config.inc.php
 * Provides database configuration info
 * Provides directory and URI info to these files
 * http://www.phpdevtips.com/2013/06/email-open-tracking-with-php-and-mysql
 *
 * @author Bennett Stone
 * @version 1.0
 * @date 07-Jun-2013
 * @website www.phpdevtips.com
 * @package Email Open Tracker
 **/

define( 'DB_HOST', 'localhost' ); // set database host
define( 'DB_USER', 'root' ); // set database user
define( 'DB_PASS', 'Vc666bvc' ); // set database password
define( 'DB_NAME', 'emailer' ); // set database name
define( 'SEND_ERRORS_TO', 'gennadiy.shershov@ingate.ru' ); //set email notification email address
define( 'DISPLAY_DEBUG', true ); //display db errors?
define( 'MESSAGE_SENDER', 'emailer@xtoolza.info' );

//Assign a constant to the location of THESE files to use
define( 'THIS_WEBSITE_URI', 'http://' . $_SERVER['HTTP_HOST'] . dirname( $_SERVER['REQUEST_URI'] ) );
define( 'THIS_ABSOLUTE_PATH', dirname( __FILE__ ) );