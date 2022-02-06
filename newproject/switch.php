<?php

include 'nav.php';


echo '<h1>Switch</h1>';


$color = 'green';

echo "<h3>color is ${color}</h3>";

if ($color == 'green') {
	echo 'go';
} else if ($color == 'yellow') {
	echo 'go slow';
} else {
	echo 'stop';
}


echo '<hr>';

echo '<h2>Using switch</h2>';

switch ($color) {
	case 'green' :
		echo 'go';
		break;
	case 'yellow' : 
		echo 'slow';
		break;
	default : 
		echo 'stop';
		break;
}

echo '<hr>';


$t = date("H");
echo "<p>The hour (of the server) is " . $t; 
echo ", and will give the following message:</p>";

// if ($t < "10") {
//   echo "Have a good morning!";
// } elseif ($t < "20") {
//   echo "Have a good day!";
// } else {
//   echo "Have a good night!";
// }

switch ($t) {
	case $t < 10 : 
		echo 'Morning';
		break;
	case $t < 20 : 
		echo 'Day';
		break;
	default : 
		echo 'Night';
		break;		
}

?>