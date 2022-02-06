<?php

include 'nav.php';

// ! is equal to 'not'
// !empty() is equal to isset()
if ( !empty($_POST['login']) ) {   // check login button is clicked
	$username = $_POST['username'];
	$password = $_POST['password'];

	$realUser = 'paing';
	$realPass = 'password';

	if ($username == $realUser) {
		if ($password == $realPass) {
			echo 'You are logged In!';
		} else {
			echo 'password is incorrect!';
		}
	} else {
		echo 'user not found';
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
	<h2>Login</h2>

	<form action="" method="POST">
		Username : <input type="text" name="username" />
		<br/>
		Password : <input type="password" name="password" >
		<br/>
		<!-- <input type="submit" value="Login" /> -->
		<button name="login" type="submit" value="login">Login</button>
	</form>

</body>
</html>