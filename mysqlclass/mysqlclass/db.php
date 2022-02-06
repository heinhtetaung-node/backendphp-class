<?php

function connectDb() {
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = 'newproject';

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	// echo "Connected successfully";
	return $conn;
}

$db = connectDb();