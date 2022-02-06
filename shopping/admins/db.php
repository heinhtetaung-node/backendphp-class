<?php

function connectdb() {
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$database = "shopping";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	//echo "Connected successfully";
	return $conn;
}

$dbcon=connectdb(); 

?>