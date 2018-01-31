
<?
$quote = file("http://xtoolza.info//q/d/quotes.txt"); 
srand((double)microtime()*1000000); 
echo "<br />".$quote[rand(0,count($quote))] . "<br /><br />";
?>
