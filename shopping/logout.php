<?php

session_start();
require_once(__DIR__.'/baseurl.php');
unset($_SESSION['login_user']);
unset($_SESSION['login_user_time']);

header("Location: ${baseUrl}login.php");
	
?>