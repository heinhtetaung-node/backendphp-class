<?php

include('nav.php');

echo '<h1>Seconds to Hour , Minutes, seconds</h1>';
if (isset($_POST['change'])) {
	$seconds = $_POST['seconds'];

	$minute = 0;

	$mmss = minuteToSecond($seconds);

	$hhmm = minuteToHour($mmss['mm']);

	$output = $seconds . ' = '. $hhmm['hh'] . ':' . $hhmm['mm'] . ':' . $mmss['ss'];	
}

function minuteToSecond($seconds) {
	$mm = floor($seconds/60);
	$ss = $seconds%60;
	return [
		'mm' => $mm,
		'ss' => $ss
	];
}

function minuteToHour($minute) {
	$hh = floor($minute/60);
	$mm = $minute%60;
	return [
		'hh' => $hh,
		'mm' => $mm
	];
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hour Minute Second program</title>
</head>
<body>
	<form action="" method="POST">
		<input type="number" name="seconds">
		<button name="change">Change Hh:mm:ss</button>
	</form>

	<?php
	if (isset($_POST['change'])) {
		echo $output;
	} ?>
</body>
</html>