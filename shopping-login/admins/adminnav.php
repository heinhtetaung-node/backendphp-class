<?php

if (!isset($GLOBALS['baseUrl'])) {
     include('baseurl.php');
}

echo "<a href='${baseUrl}admin/index.php'>Admin Setup</a> | ";
echo "<a href='${baseUrl}/logout.php'>Logout</a> ";
echo "<br>";