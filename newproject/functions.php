<?php

include('nav.php');

echo '<h1>Functions</h1>';


function writeHello () {
	echo 'hello world';
	echo '<br>';
}		

function calculate($a, $b, $operator = '+') { // a, $b is parameter
	echo 'a - '.$a.' , $b - '.$b. ' --- ';
	echo 'operator = '.$operator;
	echo '<br>';
	$total = 0;
	if ($operator == '+') {
		$total = $a + $b;	
	}
	if ($operator == '-') {
		$total = $a - $b;	
	}
	if ($operator == '*') {
		$total = $a * $b;	
	}
	if ($operator == '/') {
		$total = $a / $b;	
	}
	echo $total;
	echo '<hr>';
}

writeHello();

calculate(10, 5);

calculate(10, 2, '-');

calculate(10, 2, '*');

calculate(10, 2, '/');

?>