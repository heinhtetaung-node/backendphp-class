<?php

if( !isset($_SESSION['login_user']) ) {
	// http://localhost/shopping/admins => /shopping/admins
	$url = str_replace('http://localhost', '', $baseUrl);
	// /shopping/admins/login
	header("Location: ${url}login.php");	
}