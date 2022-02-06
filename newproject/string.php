<?php

include('nav.php');

echo 'String is text';

echo '<br>';

echo 'Variable is starting with $ , is basically a room on memory (RAM) which able to store data';

echo '<br>';

echo '<hr>';

$variable1 = 'This is Variable 1';
echo $variable1;

echo '<hr>';

$variable2 = 'Edited variable 1';
echo $variable2;

echo '<hr>';

$total = $variable1 . $variable2;
echo 'Variable1 and Variable2 = ' . $total;

echo '<hr>';

$name = "Mg Mg '(mg)' ";
$age = 25;

echo 'My name is ' . $name . ' , My age is ' . $age;
echo '<hr>';
$str = "My name is ${name} , and My age is ${age}";
echo $str;
echo '<hr>';


echo '<hr>';
$str1 = 'Mg Mg';
$totalOfCharInStr1 = strlen($str1);

echo "Total of character in '".$str1."' is ".$totalOfCharInStr1;
echo '<br>';
echo "Total of character in '${str1}' is ${totalOfCharInStr1} ";

echo '<hr>';
$name = 'Ye Myat Paing';

$totalWord = str_word_count($name);
echo "The total word in '${name}' is ${totalWord}";


echo '<hr>';
$str = "Hello world!";
$finding = "world";
$strpos = strpos($str, $finding);
echo "Found '${finding}' in '${str}' at ${strpos}";

echo '<hr>';
$str = 'Hello world!';
$replaceBy = 'Dolly';
$replaceTo = 'world';
$strAfterReplace = str_replace($replaceTo, $replaceBy, $str);

echo "In ${str} , we just replaced ${replaceTo} by ${replaceBy} = ${strAfterReplace}";




