<?php

include('nav.php');

echo '<h1>Associative Array</h1>';

$arr = [
	'id' => 1,
	'username' => 'Ye',
	'age' => 20
];

echo '<pre>';
var_dump($arr);
echo '</pre>';

echo '<h3>Retrieving item from Array</h3>';
echo '<p>Retrieving item id from Array - '.$arr['id'].'</p>';
echo '<p>Retrieving item username from Array - '.$arr['username'].'</p>';
echo '<p>Retrieving item age from Array - '.$arr['age'].'</p>';

echo '<hr>';
echo '<h3>Adding/Insert item (phoneno) to Array by programmatically</h3>';
$arr['phoneno'] = '0912121212';
echo '<pre>';
var_dump($arr);
echo '</pre>';

echo '<h3>Counting items from Array by programmatically</h3>';
echo count($arr);

echo '<hr>';
echo '<h3>Updating item from Array by programmatically</h3>';
$arr['age'] = 21;
echo '<pre>';
var_dump($arr);
echo '</pre>';


echo '<hr>';
echo '<h3>Deleting item from Array by programmatically</h3>';
unset($arr['phoneno']);


echo '<pre>';
var_dump($arr);
echo '</pre>';

echo '<hr>';

echo '<h4>Reading/Looping item from array with foreach loop</h4>';
echo '<ul>';
foreach ($arr as $key => $value) {
	echo '<li>'.$key.' = '.$value.'</li>';
}
echo '</ul>';