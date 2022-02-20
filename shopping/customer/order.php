<?php

require_once(__DIR__.'\../header.php');
require_once(__DIR__.'\../user_session.php');
require_once(__DIR__.'/OrderModel.php');
$login_user = $_SESSION['login_user'];
[$orders, $total] = getOrders($login_user['id']);

require_once('ordertable.php');
?>
