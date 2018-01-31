	<?php
   $services = array(); 
   array_push($services, "rookee");
   array_push($services, "rooletka");
   array_push($services, "babkee");
   array_push($services, "uniplace");
   array_push($services, "rookee plus");
	// Sort the list
sort($services);
	// Randomly select a winner!
//echo count($services); //count of services
$count = count($services);	
$win = $services[rand(0, $count)];
	// Print the winner's name in ALL CAPS
	echo "<p>Winner is: ".strtoupper($win)."!!!";
	?>