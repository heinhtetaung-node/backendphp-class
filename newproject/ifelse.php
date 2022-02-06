<?php

include('nav.php');

echo '<h2>Conditional Statement</h2>';

/*
if green can go else if red stop else slow

$color = 'yellow';
if ($color is green) {
	// echo 'go'
} else if ($color is yellow) {
	// ehoc 'slow'
} else {
	// echo 'stop'
}
*/

$color = 'red';

echo "<h3>color is ${color}</h3>";

if ($color == 'green') {
	echo 'go';
} else if ($color == 'yellow') {
	echo 'go slow';
} else {
	echo 'stop';
}

echo '<hr>';

$t = date("H");
echo "<p>The hour (of the server) is " . $t; 
echo ", and will give the following message:</p>";

if ($t < "10") {
  echo "Have a good morning!";
} elseif ($t < "20") {
  echo "Have a good day!";
} else {
  echo "Have a good night!";
}


echo '<hr>';

// login
// check username 
// if is ok password is okay 'you are logged in' else 'password is not match'
// else no user found
$realUser = 'paing';
$realPass = 'password';

echo "real username in database is '${realUser}' and password is '${realPass}'";

echo '<br>';

$username = 'paing';
$password = 'password';

echo "user typed username '${username}' and password '${password}'";

echo '<br>';

if ($username == $realUser) {
	if ($password == $realPass) {
		echo 'You are logged in';
	} else {

		//if (// password wrong more than 10 times) {
			// echo 'Your account is disable for 1 hour'
		// }
		
		echo 'Password is not correct';


	}
} else {
	echo "User not found for ${username}";
}



