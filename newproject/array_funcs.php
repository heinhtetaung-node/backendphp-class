<?php

include('nav.php');

echo '<h1>Array useful functions</h1>';

echo '<h2>sort()  - sorting single array</h2>';
$singleArr = ["b", "c", "a"];
print_r($singleArr);
sort($singleArr);
print_r($singleArr);
echo '<hr>';

echo '<h2>rsort()</h2>';
rsort($singleArr);
echo '<pre>';
print_r($singleArr);
echo '<hr>';

$singleArr = [3, 1, 2];
print_r($singleArr);
sort($singleArr);
print_r($singleArr);


echo '<h2>asort()  - Sorting associative array</h2>';
$assoArr = [
	'id' => 1,
	'username' => 'Mg',
	'phone' => '092323'
];
echo '<hr>';
print_r($assoArr);
asort($assoArr);
echo '<pre>';
print_r($assoArr);


echo '<h2>rsort</h2>';
arsort($assoArr);
echo '<pre>';
print_r($assoArr);


echo '<hr>';

$arr = [
	[
		'id' => 2,
		'username' => 'Ye',
		'age' => 20
	], 
	[
		'id' => 3,
		'username' => 'Myat',
		'age' => 22
	],
	[
		'id' => 1,
		'username' => 'Pg',
		'age' => 23
	]
]; 
$columns = array_column($arr, 'id');
echo '<h2>array_column()</h2>';
print_r($columns);

array_multisort($columns, SORT_ASC, $arr);
echo '<pre>';
print_r($arr);

array_multisort($columns, SORT_DESC, $arr);
echo '<pre>';
print_r($arr);