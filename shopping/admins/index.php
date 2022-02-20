<?php
session_start();
require_once(__DIR__.'/baseurl.php');

if( !isset($_SESSION['user']) ) {
	$url = str_replace('http://localhost', '', $baseUrl);
	header("Location: ${url}login/");	
}


require_once('navi.php');

?>

<h1>Admin Home</h1>