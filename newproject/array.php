<?php

include('nav.php');

echo '<h1>Array</h1>';

echo '<h2>Single Array</h2>';

// $arr = array('1', '2', '3');
$singleArr = [1, 2, 3, 'a', 'b', 'c'];
echo '<pre>';
var_dump($singleArr);
echo '</pre>';

echo '<h3>Retrieving item from Array</h3>';
echo '<p>Retrieving item from room 0 from Array - '.$singleArr[0].'</p>';
echo '<p>Retrieving item from room 3 from Array - '.$singleArr[3].'</p>';

echo '<hr>';
echo '<h3>Adding/Insert item to Array by programmatically</h3>';
array_push($singleArr, 'd');
echo '<pre>';
var_dump($singleArr);
echo '</pre>';

$singleArr[] = 'e';
echo '<pre>';
var_dump($singleArr);
echo '</pre>';


// $singleArr[8] = 'f'; // by human
// echo '<pre>';
// var_dump($singleArr);
// echo '</pre>';


echo '<h3>Counting items from Array by programmatically</h3>';
echo count($singleArr);
$singleArr[count($singleArr)] = 'f'; // by human
echo '<pre>';
var_dump($singleArr);
echo '</pre>';


echo '<hr>';
echo '<h3>Updating item from Array by programmatically</h3>';
$singleArr[0] = 10;
echo '<pre>';
var_dump($singleArr);
echo '</pre>';

$singleArr[3] = 'aa';
echo '<pre>';
var_dump($singleArr);
echo '</pre>';


echo '<hr>';
echo '<h3>Deleting item from Array by programmatically</h3>';
// unset($singleArr[3]);
array_splice($singleArr, 3, 1);  // array_splice(array, delete_room, how_many_mostly_1)

echo '<pre>';
var_dump($singleArr);
echo '</pre>';


// unset($singleArr[5]);
array_splice($singleArr, 4, 1);
echo '<pre>';
var_dump($singleArr);
echo '</pre>';

echo '<hr>';
echo '<h3>Looping/reading item from Array by programmatically</h3>';
echo '<h4>Reading itme from array Without loop</h4>';

echo '<ul>';
echo '<li>'.$singleArr[0].'</li>';
echo '<li>'.$singleArr[1].'</li>';
echo '<li>'.$singleArr[2].'</li>';
echo '<li>'.$singleArr[3].'</li>';
echo '<li>'.$singleArr[4].'</li>';
echo '<li>'.$singleArr[5].'</li>';
echo '<li>'.$singleArr[6].'</li>';
echo '</ul>';


echo '<h4>Reading item from array with foreach loop</h4>';
echo '<ul>';
foreach ($singleArr as $key => $value) {
	echo '<li>'.$value.'</li>';	
}
echo '</ul>';

?>
<!-- 
<div style="background: yellow; width: 100px; height: 100px; margin: 20px">
	1
</div>

<div style="background: yellow; width: 100px; height: 100px; margin: 20px">
	2
</div>
 -->
<?php
echo '------------------------ Foreach Looping start ----------------------<br>'; 
foreach ($singleArr as $key => $value) { ?>
	<div style="background: yellow; width: 100px; height: 100px; margin: 20px">
		<?php echo $value; ?>
	</div>	
	<?php
}
echo '------------------------ Foreach Looping end ----------------------';
echo '<br>';echo '<br>';

$i = 0;
echo '---------------------- While Loooping start--------------------------<br>';
while ( $i < count($singleArr) ) {

	echo $i;
	echo ' - '.$singleArr[$i];
	echo '<hr>';

	$i++;
}
echo '---------------------- While Loooping end--------------------------';
echo '<br><br>';

echo '-------------------- For Loooping start ----------------- <br>';
for ( $i = 0; $i < count($singleArr); $i++ ) {

	echo $i;
	echo ' - '.$singleArr[$i];
	echo '<hr>';

}
echo '-------------------- For Loooping end ----------------- <br>';


echo '<br><br>';
echo '<h4>Break (looping ထဲမှာ အခြေအနေတစ်ခုပေါ်မူတည်ပြီး ရပ်ပစ်လိုက်ချင်တဲ့ အခါမျိုးမှာသုံး)</h4>';
echo '<h5>Break always use with if condition</h5>';
echo '-------------------- For Loooping start ----------------- <br>';
for ($x = 0; $x < 10; $x++) {  
	if ($x == 5) {
		break;
	}
  	echo "The number is: $x <br>";
}
echo '-------------------- For Loooping end ----------------- <br>';


echo '<br><br>';
echo '<h4>Continue (looping ထဲမှာ အခြေအနေတစ်ခုပေါ်မူတည်ပြီး skip လုပ်ချင်တဲ့ အခါမျိုးမှာသုံး)</h4>';
echo '<h5>Continue always use with if condition</h5>';
echo '-------------------- For Loooping start ----------------- <br>';
for ($x = 0; $x < 10; $x++) {  
	if ($x == 6) {
		continue;
	}
  	echo "The number is: $x <br>";
}
echo '-------------------- For Loooping end ----------------- <br>';








