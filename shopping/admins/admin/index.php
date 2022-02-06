<?php
include('../admin_session.php');
include('../navi.php');
include('AdminModel.php');

[$arr, $total] = getAdmins();

?>


<h1>Admin List</h1>

<a href="create.php"><button>Create</button></a>
<table style="width:100%; padding:20px;">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Email</th>
		<th></th>
	</tr>

	<?php foreach($arr as $a): ?>
	<tr>
		<td style=" border: 1px solid black; padding: 10px"><?php echo $a['id']; ?></td>
		<td style=" border: 1px solid black; padding: 10px"><?php echo $a['name']; ?></td>
		<td style=" border: 1px solid black; padding: 10px"><?php echo $a['email']; ?></td>
		<td style=" border: 1px solid black; padding: 10px"></td>
	</tr>
	<?php endforeach; ?>
</table>