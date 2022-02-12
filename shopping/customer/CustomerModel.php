<?php

function insertCustomer( $data /* $_POST */) {
	$name = $data['name'];
	$email = $data['email'];
	$password = $data['password'];
	$address = $data['address'];
	$password = sha1(md5($password));
	$sql = "INSERT INTO customer (name, email, password, address) VALUES ('$name', '$email', '$password', '$address')";
	$result = $GLOBALS['dbcon']->query($sql);
	if ($result != true) {
		echo 'something wrong';
		return false;
	}
	return true;
}


function getCustomer($limit = 5, $offset = 0, $search = null, $orderby = 'id', $order = 'desc') {

	$sql = "
			SELECT 
			 *
			FROM customer			 
			WHERE customer.name like '%$search%' 
			ORDER BY customer.${orderby} ${order} 
			LIMIT ${limit} OFFSET ${offset}
		";	

	$result = $GLOBALS['dbcon']->query($sql); // $GLOBALS['dbcon'] == $dbcon from db.php
	$arr = $result->fetch_all(MYSQLI_ASSOC);

	$sqlTotal = "SELECT COUNT(*) AS totalcustomer FROM customer WHERE name like '%$search%'";
	$resultTotal = $GLOBALS['dbcon']->query($sqlTotal);
	$total = $resultTotal->fetch_assoc();
	return [$arr, $total];
}


function getCustomerByEmail($email) {

	$sql = "SELECT * FROM customer WHERE email = '${email}'";
	$result = $GLOBALS['dbcon']->query($sql);
	$row = $result->fetch_assoc();
	return $row;

}

function login($data /* $_POST email and password */) {
	$email = $data['email'];
	$password = $data['password'];
	$password = sha1(md5($password));
	$sql = "SELECT * FROM customer 
			WHERE 
			email = '${email}' 
			AND password = '${password}'";
	$result = $GLOBALS['dbcon']->query($sql);
	$row = $result->fetch_assoc();
	return $row;
}