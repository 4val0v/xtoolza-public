<?
error_reporting(E_ALL);
$youTrackClient = new YouTrackClient(); 
$youTrackClient->login('', ''); 
$issue = $youTrackClient->getActionFactory()->createIssueAction()->getById('UP-100')->asObject();
var_dump($issue);
?>