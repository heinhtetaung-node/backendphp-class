<?php 
require_once(__DIR__.'\../admin_session.php');
require_once(__DIR__.'\../navi.php');
require_once(__DIR__.'/itemModels.php');

if (isset($_POST['delete'])) {
	$id = $_POST['delete'];
	deleteitem($id);
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

[$arr, $total] = call_user_func_array('getitems', $parameters);

$totalitem = $total['totalitem'];
$noOfPages = ceil($totalitem/$limit);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>Item</h1>
	<a href="create.php"><button>Create</button></a>
	<form action="" method="POST">
		<table style="width: 900px;">
			<tr>
				<th>ID<a style="text-decoration: none; color: black;" href="index.php?search=<?php echo $search; ?>&orderby=id&order=asc">&#9650;</a><a style="text-decoration: none; color: black" href="index.php?search=<?php echo $search; ?>&orderby=id&order=desc">&#9660;</a></th>
				<th>Title<a style="text-decoration: none; color: black;" href="index.php?search=<?php echo $search; ?>&orderby=title&order=asc">&#9650;</a><a style="text-decoration: none; color: black" href="index.php?search=<?php echo $search; ?>&orderby=title&order=desc">&#9660;</a></th>
				<th>Subcategory<a style="text-decoration: none; color: black;" href="index.php?search=<?php echo $search; ?>&orderby=subcategory_id&order=asc">&#9650;</a><a style="text-decoration: none; color: black" href="index.php?search=<?php echo $search; ?>&orderby=subcategory_id&order=desc">&#9660;</a></th>
				<th>Price<a style="text-decoration: none; color: black;" href="index.php?search=<?php echo $search; ?>&orderby=price&order=asc">&#9650;</a><a style="text-decoration: none; color: black" href="index.php?search=<?php echo $search; ?>&orderby=price&order=desc">&#9660;</a></th>
				<th>Cost<a style="text-decoration: none; color: black;" href="index.php?search=<?php echo $search; ?>&orderby=cost&order=asc">&#9650;</a><a style="text-decoration: none; color: black" href="index.php?search=<?php echo $search; ?>&orderby=cost&order=desc">&#9660;</a></th>
				<th></th>
			</tr>
			<?php foreach ($arr as $items) : ?>
			<tr>
				<td style="border: 1px solid black; padding: 7px"> <?php echo $items['id']; ?> </td>
				<td style="border: 1px solid black; padding: 7px"> <?php echo $items['title']; ?> </td>
				<td style="border: 1px solid black; padding: 7px"> <?php echo $items['subcategory_title']; ?> </td>
				<td style="border: 1px solid black; padding: 7px"> <?php echo $items['price']; ?> </td>
				<td style="border: 1px solid black; padding: 7px"> <?php echo $items['cost']; ?> </td>
				<td style="border: 1px solid black; padding: 7px">
					<a href="edit.php?id=<?php echo $items['id']; ?>"><button type="button">Edit</button></a>
					<button name="delete" value="<?php echo $items['id']; ?>">Delete</button>
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