<?php
include('nav.php');

if ( isset( $_POST['color'] ) ) {  // check color button is clicked
	$color = $_POST['color'];
	if ($color == 'green') {
		echo 'go';
	} else if ($color == 'yellow') {
		echo 'slow';
	} else {
		echo 'stop';
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Traffic Light Program</title>
</head>
<body>
	<h1>Traffic Light Program</h1>
	<form action="" method="POST">
		<button name="color" value="green">Green</button>
		<button name="color" value="yellow">Yellow</button>
		<button name="color" value="red">Red</button>
	</form>	
</body>
</html>