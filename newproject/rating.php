<?php
include('nav.php');
echo "<br>";
$array=[];
if (isset($_POST['submit'])) {
	$name=$_POST['name'];
	$rating=$_POST['rating'];
	$review=$_POST['review'];
	if (isset($_POST['old'])) {
		$old=$_POST['old'];
		foreach ($old as $key => $oldr) {
			array_push($array, $oldr);
		}
	}
	array_push($array, ['name'=>$name,'rating'=>$rating, 'review'=>$review]);
}
if (isset($_POST['update'])) {
	if (isset($_POST['old'])) {
		$old=$_POST['old'];
		foreach ($old as $key => $oldr) {
			array_push($array, $oldr);
		}
	}
	$name=$_POST['name-upd'];
	$rating=$_POST['rating-upd'];
	$review=$_POST['review-upd'];
	$key=$_POST['updkey'];
	$array[$key]['name'] =$name;
	$array[$key]['rating'] =$rating;
	$array[$key]['review'] =$review;
}
if (isset($_POST['delete'])) {
	if (isset($_POST['old'])) {
		$old=$_POST['old'];
		foreach ($old as $key => $oldr) {
			array_push($array, $oldr);
		}
	}
	$key=$_POST['delete'];
	array_splice($array, $key, 1);
}


/******** Finding percentage **************/
if (count($array) > 0) {
	$total = count($array);
	$totalRating1 = 0;
	$totalRating2 = 0;
	$totalRating3 = 0;
	$totalRating4 = 0;
	$totalRating5 = 0;
	foreach ($array as $key => $val) {
		if ($val['rating'] == 1) {
			$totalRating1 = $totalRating1 + 1;
		}
		if ($val['rating'] == 2) {
			$totalRating2 = $totalRating2 + 1;
		}
		if ($val['rating'] == 3) {
			$totalRating3 = $totalRating3 + 1;
		}
		if ($val['rating'] == 4) {
			$totalRating4 = $totalRating4 + 1;
		}
		if ($val['rating'] == 5) {
			$totalRating5 = $totalRating5 + 1;
		}
	}
	echo ' Total-'; echo $total; echo '<br>';
	echo ' TotalRating1-'; echo $totalRating1; echo '<br>';
	echo ' TotalRating2-'; echo $totalRating2; echo '<br>';
	echo ' TotalRating3-'; echo $totalRating3; echo '<br>';
	echo ' TotalRating4-'; echo $totalRating4; echo '<br>';
	echo ' TotalRating5-'; echo $totalRating5;

	echo '<hr>'; 

	echo 'Percentage for rating 1 = ';
	$rating1 = round(100 * $totalRating1/$total); 
	echo $rating1; echo '%<br>';

	echo 'Percentage for rating 2 = ';
	$rating2 = round(100 * $totalRating2/$total); 
	echo $rating2; echo '%<br>';

	echo 'Percentage for rating 3 = ';
	$rating3 = round(100 * $totalRating3/$total); 
	echo $rating3; echo '%<br>';

	echo 'Percentage for rating 4 = ';
	$rating4 = round(100 * $totalRating4/$total); 
	echo $rating4; echo '%<br>';

	echo 'Percentage for rating 5 = ';
	$rating5 = round(100 * $totalRating5/$total); 
	echo $rating5; echo '%<br>';

	$averageRating = (1*$totalRating1 + 2*$totalRating2 + 3*$totalRating3 + 4*$totalRating4 + 5*$totalRating5) / (5*$total) * 5;
	$averageRating = round($averageRating, 2);
	echo '<h2>Average Rating - '.$averageRating.'</h2>';
}
/******************************************/
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1 style="color: #006AF1;">Review</h1>
	<form action="" method="post">
		<table style="width: 900px; height: auto;">
			<tr>
				<th>Name</th>
				<th>Rating</th>
				<th style="width: 70%;">Review</th>
				<th></th>
			</tr>
		<?php foreach ($array as $key => $ar) { ?>
			<tr>
				<td style="text-align: center;"><?php echo $ar['name']; ?></td>
				<td style="text-align: center;"><?php echo $ar['rating']; ?></td>
				<td style="text-align: center;"><?php echo $ar['review']; ?></td>
				<td style="text-align: center;">
					<button style="color: white; background-color: #006AF1; border: 1px solid #006AF1;border-radius: 3px;" type="button"
					onclick="edit('<?php echo $ar['name']; ?>', '<?php echo $ar['rating']; ?>', '<?php echo $ar['review']; ?>', '<?php echo $key; ?>') ">Edit</button>
					<button style="color: white; background-color: #006AF1; border: 1px solid #006AF1; border-radius: 3px;" name="delete" value="<?php echo $key; ?>">Delete</button>
				</td>
			</tr> <?php
		}?>
		</table>
		<span>Average rating : <?php
			if (isset($_POST['rating'])) {
				echo ($_POST['rating']/( count($array)*5 ) )*5;
			}?>
			</span>
		<br>
		<div id="inform" style="border: 1px solid black; padding: 20px; width: 400px; height: auto;">
			Username : <input type="text" name="name"><br>
			Rating : 1 <input type="range" name="rating" min="1" max="5"> 5 <br>
			Review : <textarea name="review"></textarea><br>
			<button name="submit" style="width: 100px; height: 30px; color: white; background-color: #006AF1; border: 1px solid #006AF1; border-radius: 3px;">
				Submit
			</button>
		</div>
		<div id="updform" style="border: 1px solid black; padding: 20px; width: 400px; height: auto;
		display: none">
			Username : <input type="text" name="name-upd"><br>
			Rating : 1 <input type="range" name="rating-upd" min="1" max="5"> 5 <br>
			Review : <textarea name="review-upd"></textarea><br>
			<button name="update" style="width: 100px; height: 30px; color: white; background-color: #006AF1; border: 1px solid #006AF1; border-radius: 3px;">
				Update
			</button>
			<input type="hidden" name="updkey">
		</div>
		<?php foreach ($array as $key => $oldr) {?>
			<input type="hidden" name="old[<?php echo $key; ?>][name]" value="<?php echo $oldr['name']; ?>">
			<input type="hidden" name="old[<?php echo $key; ?>][rating]" value="<?php echo $oldr['rating']; ?>">
			<input type="hidden" name="old[<?php echo $key; ?>][review]" value="<?php echo $oldr['review']; ?>"> <?php
		}?>
	</form>
	<script type="text/javascript">
		function edit(name,rating,review,key) {
			var informdiv=document.getElementById('inform')
			var updformdiv=document.getElementById('updform')
			informdiv.style.display='none'
			updformdiv.style.display='block'
			var nameupdtxt=document.querySelector('input[name=name-upd]')
			var ratingupdtxt=document.querySelector('input[name=rating-upd]')
			var reviewupdtxt=document.querySelector('textarea[name=review-upd]')
			var updkey=document.querySelector('input[name=updkey]')
			nameupdtxt.value=name
			ratingupdtxt.value=rating
			reviewupdtxt.value=review
			updkey.value=key
		}
	</script>
</body>
</html>

