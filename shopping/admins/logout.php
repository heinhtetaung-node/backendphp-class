<?php

session_start();
require_once(__DIR__.'/baseurl.php');
unset($_SESSION['user']);
unset($_SESSION['login_time']);

header("Location: ${baseUrl}login");