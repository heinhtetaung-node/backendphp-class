<?php

session_start();

unset($_SESSION['login_user']);
unset($_SESSION['login_user_time']);

header('Location: login.php');
	
?>