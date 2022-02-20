<?php

session_start();
require_once(__DIR__.'/baseurl.php');
if( !isset($_SESSION['user']) ) {
	// http://localhost/shopping/admins => /shopping/admins
	// $url = str_replace('http://localhost', '', $baseUrl);
	// /shopping/admins/login
	header("Location: ${baseUrl}login/");	
}