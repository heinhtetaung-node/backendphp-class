<?php
session_start();
require_once(__DIR__.'\../db.php');
require_once(__DIR__.'\../navi.php');
require_once(__DIR__.'\../../customer/OrderModel.php');

[$orders, $total] = getOrders();

require_once('../../customer/ordertable.php');
?>
