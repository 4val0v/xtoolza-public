<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Скрипт поиска внешних и битых ссылок</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script language="JavaScript" src="jquery.js" type="text/javascript"></script>
<script language="JavaScript" src="light.js" type="text/javascript"></script>
<script type="text/javascript">
        jQuery(document).ready(function($) {

                function PushTheButton(TEvent) {
                        if (TEvent.keyCode == 13) {
                                if (document.getElementById('broken_site').focused)
                                        build_map();
                        }
                }

                $(document).bind('keyup', PushTheButton);
        });
</script>
</head>
<body onload="$('#broken_site').focus()">

<table border="1" width="100%" cellpadding="10px" cellspacing="0" bordercolor="#4d77a0" style="-moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius: 10px;" rules="none">

<tr>
<td valign="top">

<div id="broken_map">

Адрес вашего сайта:<br><br>
<input id='broken_site' type='text' name='broken_site' maxlength='100' style='width:250px' onfocus="this.focused=true;" onblur="this.focused=false;"><br><br>
<input type='button' value='Построить' onClick='build_map();'><br><br>
<font size='1'>* в зависимости от объема сайта процедура может занять некоторое время.</font>
<br><br><div id="info"></div><br>

<div id='show_map' style='display :none;'></div>

</div>

</td>
</tr>
</table>

<br>
<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/uniplacer_config.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/'._UNIPLACE_USER_.'/uniplacer.php'); 
    $Uniplacer = new Uniplacer(_UNIPLACE_USER_);
    $Uniplacer->GetCode();
    $links = $Uniplacer->GetLinks();
  
    if($links){
    foreach($links as $link){
        echo $link.'<br>';
    }
    }
?>

</body>
</html>