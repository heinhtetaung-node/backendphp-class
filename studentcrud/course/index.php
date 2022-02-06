<?php
include("../nav.php");
include("CourseModel.php");

$search = "";
if (isset($_GET['search'])) {
	$search = $_GET['search'];
}

$orderby = "";
$order = "";
$arr = [];
$total = [];
$limit = 2; 
$offset = 0;
$parameters = [];
$currentPage = 1;
if (isset($_GET['limit']) && isset($_GET['offset'])) {
	$limit = $_GET['limit'];
	$offset = $_GET['offset'];
	$currentPage = ($offset / $limit) + 1;
}	
array_push($parameters, $limit, $offset, $search);

if (isset($_GET['orderby']) && isset($_GET['order'])) {
	$orderby = $_GET['orderby'];
	$order = $_GET['order'];	
	array_push($parameters, $orderby, $order);	
}

[$arr, $total] = call_user_func_array('getCourses', $parameters); // getStudents($limit, $offset, $search) or getStudents($limit, $offset, $search, $orderBy, $order)

$totalStu = $total['totalcourses'];
$noOfPages = ceil($totalStu / $limit);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Course Registeration</title>
</head>
<body>
	<h1>Course Registeration</h1>
	<a href="create.php"><button>Create</button></a>

	<form action="" method="GET">
		<input type="text" name="search" placeholder="Search by name"><button name="searchbtn">Search</button>
	</form>
	<form action="" method="POST">
		<?php
		if ($search != '') {
			echo 'Search result for "'.$search.'"';
		} ?>
		<table style="width:80%">
			<tr>
				<th>
					Name 
					<a style="text-decoration: none;" href="index.php?search=<?php echo $search; ?>&orderby=name&order=asc">
						&#9650;
					</a>

					<a style="text-decoration: none;" href="index.php?search=<?php echo $search; ?>&orderby=name&order=desc">
						&#9660;
					</a>
				</th>
				<th>Description</th>
				<th>Start Date ~ End Date</th>
				<th>Price</th>
				<th></th>
			</tr>

			<?php
			foreach ($arr as $key => $data) { ?>
				<tr>
					<td><?php echo $data['name']; ?></td>
					<td><?php echo $data['description']; ?></td>
					<td><?php echo $data['startdate']; ?> ~ <?php echo $data['enddate']; ?></td>
					<td><?php echo $data['price']; ?></td>
					<td>
						<a href="edit.php?id=<?php echo $data['id']; ?>">  <!-- data carry from query string / GET method -->
							<button type="button">
								Edit
							</button>
						</a>
						<button name="delete" value="<?php echo $data['id']; ?>">Delete</button>
					</td>
				</tr><?php
			} ?>			
		</table>

		<?php 
		if ($currentPage > 1) { ?>
			<a href="index.php?<?php echo "search=${search}&limit=${limit}&offset=". ($offset-$limit); ?>"><button type="button">Previous</button></a><?php
		} ?>

		<?php
		for ($i = 1; $i <= $noOfPages; $i++) { 
			
			$offsetEach = ($limit * $i) - $limit;
			$query = "search=${search}&limit=${limit}&offset=${offsetEach}";

			if ($orderby != '' && $order != '') {
				$query = $query . "&orderby=${orderby}&order=${order}";
			}

			?>
			<a style="text-decoration: none;" href="index.php?<?php echo $query; ?>">
				<button type="button" style="<?php if ($currentPage==$i){ echo 'background: blue'; } ?>"><?php echo $i; ?></button> 
			</a>
			<?php
		}
		?>

		<?php
		if ($currentPage < $noOfPages) { ?>
			<a href="index.php?<?php echo "search=${search}&limit=${limit}&offset=". ($offset+$limit); ?>"><button type="button">Next</button></a>
		<?php
		}
		?>
		<hr>
		
		<br />
	</form>	
</body>
</html>