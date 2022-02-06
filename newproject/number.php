<?php

include('nav.php');

$num1 = 20;
$num2 = 30;

$total = $num1 + $num2;

echo '<h2>Number lesson</h2>';
echo 'Num1 : ' . $num1;
echo '<br>';
echo 'Num2 : ' . $num2;
echo '<br>';
echo 'Total : ' . $total;


$num3 = 10;
$total = ($num1 + $num2) - $num3;


echo '<h2>Number lesson complicated</h2>';
echo 'Num1 : ' . $num1;
echo '<br>';
echo 'Num2 : ' . $num2;
echo '<br>';
echo 'Num3 : ' . $num3;
echo '<br>';
echo 'Num1 + Num2 - Num3 = ' . $total;


echo '<h2>Number lesson multiply / division</h2>';
$total = $num1 * $num2;
echo 'Num1 : ' . $num1;
echo '<br>';
echo 'Num2 : ' . $num2;
echo '<br>';
echo 'Total of Num1 multiply Num2 = '. $total;


echo '<br><br>';
$total = $num2 / $num1;
echo 'Num1 : ' . $num1;
echo '<br>';
echo 'Num2 : ' . $num2;
echo '<br>';
echo 'Num2 divided by Num1 = ' . $total;

echo '<br><br>';
$total = ($num1 * $num2) / $num3;
echo 'Num1 : ' . $num1;
echo '<br>';
echo 'Num2 : ' . $num2;
echo '<br>';
echo 'Num3 : ' . $num3;
echo '<br>';
echo 'First num1 multiply num2 and divided by num3 = ' . $total;


echo '<h2>Decimal lesson</h2>';
$decimal1 = 1.5678;
$decimal2 = 3.2134;
$total = $decimal1 + $decimal2;
$total2decimal = round($total, 1); // round is used to cut decimal

echo 'Decimal1 : ' . $decimal1;
echo '<br>';
echo 'decimal2 : ' . $decimal2;
echo '<br>';
echo 'Total = ' . $total2decimal;


echo '<h2>Currency showing</h2>';
$currency = 'USD';
$amount = 2560000;
$amountStr = number_format($amount); // number_format is used to separate comma with 3 number
echo 'currency : '.$currency;
echo '<br>';
echo 'amount : '. $amountStr;
echo '<br>';
echo '1 year salary is ' . $amountStr . $currency;

$oneMonthSalary = $amount / 12;
$oneMonthSalary = number_format($oneMonthSalary, 2); // number_format works both round and number separate
echo '<br>';
echo 'one month salary is ' . $oneMonthSalary . $currency;



echo '<h2>is_int and var_dump</h2>';

// Check if the type of a variable is integer   
$x = 0;
$result = is_int($x);  // check if variable is number. if number, return true/1 else return false/emptystring
echo $x . " is integer. isn't it? " . $result;
echo '<br>';	
var_dump($result);  // output also type of the variable
// is_float is used to check if variable is decimal. if decimal, return true/1 else return false/emptystring


echo '<h2>Change string to int</h2>';
$str = "1999";
$num = (int)$str;

echo 'string is '.$str;
echo '<br>';
echo 'After change to int by (int) = ' . $num;


echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>';
