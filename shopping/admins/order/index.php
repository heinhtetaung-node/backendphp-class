<?php
session_start();
include('../db.php');
include('../navi.php');
include('../../customer/OrderModel.php');

[$orders, $total] = getOrders();

include('../../customer/ordertable.php');
?>
