<?php
$baseUrl = "";
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
     $baseUrl = "https://";   
else  
     $baseUrl = "http://";   
// Append the host(domain name, ip) to the baseUrl.   
$baseUrl.= $_SERVER['HTTP_HOST'];   

// Append the requested resource location to the baseUrl   
$uri = $_SERVER['REQUEST_URI'];    
$uriArr = explode('/', $uri); // change string to array
$baseUrl .= '/'.$uriArr[1];

echo "<a href='${baseUrl}/index.php'>Student</a> ";
echo " | <a href='${baseUrl}/course/index.php'>Course</a> ";
echo "<br>";

