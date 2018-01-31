<?php
//Connect to the database
mysql_connect("localhost", "root", "root") or die(mysql_error());
mysql_select_db("tetestdb") or die(mysql_error());

//Grab the destination page from the link
$redirect = mysql_real_escape_string($_GET['page']);
$url = $_SERVER['HTTP_REFERER'];

//Insert the destination page and timestamp into your database
$page_insert = mysql_query("INSERT INTO tracking_table_new (`rec_use_page`, `rec_use_date`, `url`) VALUES ('$redirect', now(), '$url')") or die(mysql_error());

//Redirect the user to their intended location
header("Location: $redirect");
?>