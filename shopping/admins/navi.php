<?php

if (!isset($GLOBALS['baseUrl'])) {
     include('baseurl.php');
}


echo "<a href='${baseUrl}category/index.php'>Category</a> | ";
echo "<a href='${baseUrl}subcategory/index.php'>Subcategory</a> | ";
echo "<a href='${baseUrl}item/index.php'>Item</a> | ";
echo "<a href='${baseUrl}admin/index.php'>Admins</a> | ";
echo "<a href='${baseUrl}stock/index.php'>Stock</a> | ";
echo "<a href='${baseUrl}order/index.php'>Orders</a> | ";
echo "<a href='${baseUrl}logout.php'>Logout</a> | ";
echo '<br>';

  ?>