<?php

include('nav.php');

echo '<h1>Multi Dimensional Array</h1>';

echo '<p>Multi Dimensional Array is array which insert associative arrays to single array</p>';


// $arr = array(1, 2);
$arr = [
	[
		'id' => 1,
		'username' => 'Ye',
		'age' => 20
	], 
	[
		'id' => 2,
		'username' => 'Myat',
		'age' => 22
	],
	[
		'id' => 3,
		'username' => 'Pg',
		'age' => 23
	],
	// anything you can add like following
	// 2,
	// 'string',
	// [1, 2, 3, 4],
	// [
	// 	[
	// 		'id' => 1
	// 	]
	// ]
	/// and so on
];
echo '<pre>';
var_dump($arr);
echo '</pre>';


echo '<h3>Retrieving item from Array</h3>';
echo '<p>Retrieving item from room 0 from Array </p>';
echo '<pre>';
print_r($arr[0]);
// echo $arr[0]['id'];

echo '</pre>';
$assoArr = $arr[0];
echo '<p>Retrieving item id from Array - '.$assoArr['id'].'</p>';
echo '<p>Retrieving item username from Array - '.$assoArr['username'].'</p>';
echo '<p>Retrieving item age from Array - '.$assoArr['age'].'</p>';
echo '<hr>';
echo '<p>Retrieving item from room 2 from Array</p>';
echo '<pre>';
print_r($arr[2]);
echo '</pre>';
$assoArr = $arr[2];
echo '<p>Retrieving item id from Array - '.$assoArr['id'].'</p>';
echo '<p>Retrieving item username from Array - '.$assoArr['username'].'</p>';
echo '<p>Retrieving item age from Array - '.$assoArr['age'].'</p>';


echo '<hr>';
echo '<h3>Adding/Insert item to Array from bottom by programmatically using array_push</h3>';
array_push($arr, [
	'id' => 4,
	'username' => 'Hein',
	'age' => 28
]);
echo '<pre>';
var_dump($arr);
echo '</pre>';


echo '<hr>';
echo '<h3>Adding/Insert item to Array from top by programmatically using array_unshift</h3>';
array_unshift($arr, [
	'id' => 5,
	'username' => 'Htet',
	'age' => 29
]);
echo '<pre>';
var_dump($arr);
echo '</pre>';

echo '<hr>';
echo '<h3>Adding/Insert item to Array from bottom by programmatically using $arr[] = $assoArr </h3>';
$arr[] = [
	'id' => 6,
	'username' => 'Aung',
	'age' => 30
];
echo '<pre>';
var_dump($arr);
echo '</pre>';


echo '<h3>Counting items from Array by programmatically</h3>';
echo count($arr);
$arr[count($arr)] = [
	'id' => 7,
	'username' => 'Mg',
	'age' => 31
]; // by human
echo '<pre>';
var_dump($arr);
echo '</pre>';

echo '<hr>';
echo '<h3>Updating item from Array by programmatically</h3>';
$arr[1]['age'] = 21;
// $assoArr = $arr[1];
// $assoArr['age'] = 21;
// $arr[1] = $assoArr;

echo '<pre>';
var_dump($arr);
echo '</pre>';



echo '<hr>';
echo '<h3>Deleting item from Array by programmatically</h3>';
array_splice($arr, 5, 1);
echo '<pre>';
var_dump($arr);
echo '</pre>';


echo '<hr>';
echo '<h3>Looping/reading item from Array by programmatically</h3>';
echo '<h4>Reading item from array With Foreach loop</h4>';
echo '<ul>';
foreach ($arr as $key => $assoArr) {
	echo '<li> Id : '.$assoArr['id'].'</li>';
	echo '<li> Username : '.$assoArr['username'].'</li>';
	echo '<li> Age : '.$assoArr['age'].'</li>';
	echo '<hr>';
}
echo '</ul>';


echo '<h4>Reading item from array With For loop</h4>';
echo '<ul>';

for ($i = 0; $i < count($arr); $i++) {
	$assoArr = $arr[$i];
	echo '<li> Id : '.$assoArr['id'].'</li>';
	echo '<li> Username : '.$assoArr['username'].'</li>';
	echo '<li> Age : '.$assoArr['age'].'</li>';
	echo '<hr>';
}
echo '</ul>';