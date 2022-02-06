<?php 
include('../admin_session.php');
include('../navi.php');
include('ctgmodels.php');

if (isset($_POST['delete'])) {
	$id = $_POST['delete'];
	deletecategory($id);
}

$search = '';
if (isset($_GET['search'])) {
	$search = $_GET['search'];
}

$orderby="";
$order="";
$array=[];
$total=[];
$limit=2;
$offset=0;
$parameters=[];
$currentPage=1;

if (isset($_GET['limit']) && isset($_GET['offset'])) {
	$limit=$_GET['limit'];
	$offset=$_GET['offset'];	
	$currentPage=($offset / $limit) + 1;
}
array_push($parameters, $limit, $offset, $search);

if (isset($_GET['orderby']) && isset($_GET['order'])) {
	$orderby=$_GET['orderby'];
	$order=$_GET['order'];
	array_push($parameters, $orderby, $order);
}

[$arr, $total] = call_user_func_array('getcategories', $parameters);

$totalcategory = $total['totalcategory'];
$noOfPages = ceil($totalcategory/$limit);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>Category</h1>
	<a href="create.php"><button>Create</button></a>
	<form action="" method="POST">
		<table style="width: 900px;">
			<tr>
				<th>ID<a style="text-decoration: none; color: black;" href="index.php?search=<?php echo $search; ?>&orderby=id&order=asc">&#9650;</a><a style="text-decoration: none; color: black" href="index.php?search=<?php echo $search; ?>&orderby=id&order=desc">&#9660;</a></th>
				<th style="width: 19%;">Title<a style="text-decoration: none; color: black;" href="index.php?search=<?php echo $search; ?>&orderby=title&order=asc">&#9650;</a><a style="text-decoration: none; color: black" href="index.php?search=<?php echo $search; ?>&orderby=title&order=desc">&#9660;</a></th>
				<th style="width: 60%;">Description<a style="text-decoration: none; color: black;" href="index.php?search=<?php echo $search; ?>&orderby=description&order=asc">&#9650;</a><a style="text-decoration: none; color: black" href="index.php?search=<?php echo $search; ?>&orderby=description&order=desc">&#9660;</a></th>
				<th></th>
			</tr>
			<?php foreach ($arr as $categories) : ?>
			<tr>
				<td style="border: 1px solid black; padding: 7px"> <?php echo $categories['id']; ?> </td>
				<td style="border: 1px solid black; padding: 7px"> <?php echo $categories['title']; ?> </td>
				<td style="border: 1px solid black; padding: 7px"> <?php echo $categories['description']; ?> </td>
				<td style="border: 1px solid black; padding: 7px">
					<a href="edit.php?id=<?php echo $categories['id']; ?>"><button type="button">Edit</button></a>
					<button name="delete" value="<?php echo $categories['id']; ?>">Delete</button>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php if ($currentPage>1) { ?>
			<a style="text-decoration: none;" href="index.php?<?php echo "search=${search}&limit=${limit}&offset=". ($offset-$limit) ; ?>">
				<button type="button">Prev</button>
			</a> <?php
		} ?>
		<?php 
		for ($i=1; $i <= $noOfPages ; $i++) { 
			$offsetEach = $limit * $i - $limit;
			$query = "search=${search}&limit=${limit}&offset=${offsetEach}";

			if ($orderby != '' && $order != '') {
				$query = $query . "&orderby=${orderby}&order=${order}"; 
			} ?>
			<a style="text-decoration: none" href="index.php?<?php echo $query; ?>">
				<button type="button" style="<?php if ($currentPage == $i) {echo "background-color: cyan";} ?>">
					<?php echo $i; ?>
				</button> 
			</a> <?php
		} ?>
		<?php if ($currentPage<$noOfPages) { ?>
			<a href="index.php?<?php echo "search=${search}&limit=${limit}&offset=". ($offset+$limit); ?>">
				<button type="button">Next</button>
			</a> <?php
		} ?>
	</form>
</body>
</html>