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

$baseUrl .= '/'.$uriArr[1].'/'.(($uriArr[2] != 'admins') ? 'admins' : $uriArr[2]).'/';


// if ($uriArr[2] != 'admins') {
//      echo 'admins';
// } else {
//      echo $uriArr[2];
// }
          // same
// echo ($uriArr[2] != 'admins') ? 'admins' : $uriArr[2];
          // same only for true false
// (($uriArr[2] != 'admins') ?: 'admins')