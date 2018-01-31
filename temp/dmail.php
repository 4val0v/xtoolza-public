<?
if (mail("gennadiy.shershov@ingate.ru", "Актуализировать Backlog", "http://octopus-youtrack.ru/youtrack/rest/agile/UP_HELP-4/sprint/Ideas
АКТУАЛИЗИРУЙ BACKLOG!!!",   
"From: octopus-youtrack@ingate.ru")) { 
    echo "<br>messege accepted for delivery"; 
} else { 
    echo "<br>some error happen"; 
} 
?> 


