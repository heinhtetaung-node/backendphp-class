<?php

include('../header.php');
include('../user_session.php');
include('OrderModel.php');
$login_user = $_SESSION['login_user'];
[$orders, $total] = getOrders($login_user['id']);

include('ordertable.php');
?>
