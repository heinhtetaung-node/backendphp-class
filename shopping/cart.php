<?php
session_start();

$id = $_GET['id'];

/*
[
	[
		id => $id,
		qty => 1,
	],
	[
		..
	],
	[
		..
	]
]
*/
$isExisting = false;

if (isset($_SESSION['products'])) {
	$products = $_SESSION['products'];

	for ($i = 0; $i < count($products); $i++) {
		$pro = $products[$i];
		if ($pro['id'] == $id) {
			$oldQty = $pro['qty'];
			$newQty = $oldQty + 1;
			$products[$i]['qty'] = $newQty;
			$_SESSION['products'] = $products;
			$isExisting = true;
			break;
		}
	}
}

if ($isExisting == false) {
	$_SESSION['products'][] = [
		'id' => $id,
		'qty' => 1
	];
}

header('Location: ' . $_SERVER['HTTP_REFERER']); // redirect back to coming page
