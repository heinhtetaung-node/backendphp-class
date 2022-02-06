<?php
session_start();
include('baseurl.php');

if( !isset($_SESSION['user']) ) {
	$url = str_replace('http://localhost', '', $baseUrl);
	header("Location: ${url}login/");	
}


include('adminnav.php');

?>

<h1>Admin Home</h1>