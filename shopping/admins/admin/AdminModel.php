<?php

// require_once('../../db.php');

// $uri = $_SERVER['REQUEST_URI'];    
// $uriArr = explode('/', $uri); // change string to array

// $escapeFolder = '';
// if ($uriArr[3] == 'admin' || $uriArr[3] == 'login') {
// 	$escapeFolder = '../';
// }

// if (!isset($GLOBALS['dbcon'])) {
	require_once(__DIR__."\../db.php");
// }


function insertAdmin( $data /* $_POST */) {
	$name = $data['name'];
	$email = $data['email'];
	$password = $data['password'];
	$password = sha1(md5($password));
	$sql = "INSERT INTO admins (name, email, password) VALUES ('$name', '$email', '$password')";
	$result = $GLOBALS['dbcon']->query($sql);
	if ($result != true) {
		echo 'something wrong';
		return false;
	}
	return true;
}


function getAdmins($limit = 5, $offset = 0, $search = null, $orderby = 'id', $order = 'desc') {

	$sql = "
			SELECT 
			 *
			FROM admins			 
			WHERE admins.name like '%$search%' 
			ORDER BY admins.${orderby} ${order} 
			LIMIT ${limit} OFFSET ${offset}
		";	

	$result = $GLOBALS['dbcon']->query($sql); // $GLOBALS['dbcon'] == $dbcon from db.php
	$arr = $result->fetch_all(MYSQLI_ASSOC);

	$sqlTotal = "SELECT COUNT(*) AS totaladmins FROM admins WHERE name like '%$search%'";
	$resultTotal = $GLOBALS['dbcon']->query($sqlTotal);
	$total = $resultTotal->fetch_assoc();
	return [$arr, $total];
}


function getAdminByEmail($email) {

	$sql = "SELECT * FROM admins WHERE email = '${email}'";
	$result = $GLOBALS['dbcon']->query($sql);
	$row = $result->fetch_assoc();
	return $row;

}

function login($data /* $_POST email and password */) {
	$email = $data['email'];
	$password = $data['password'];
	$password = sha1(md5($password));
	$sql = "SELECT * FROM admins 
			WHERE 
			email = '${email}' 
			AND password = '${password}'";
	$result = $GLOBALS['dbcon']->query($sql);
	$row = $result->fetch_assoc();
	return $row;
}