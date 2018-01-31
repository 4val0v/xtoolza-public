<?
error_reporting(E_ALL);
$youTrackClient = new YouTrackClient(); 
$youTrackClient->login('root', 'Vc666bvc'); 
$issue = $youTrackClient->getActionFactory()->createIssueAction()->getById('TP-1')->asObject();
var_dump($issue);
?>