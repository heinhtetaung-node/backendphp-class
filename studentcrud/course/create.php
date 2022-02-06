<?php
include("../nav.php");
include("CourseModel.php");

if (isset($_POST['add'])) {
	insertCourse($_POST);
	header('Location: index.php');
}
?>
<form action="" method="POST">
	<div style="padding:20px; border:1px solid black" id="insert-form">
		Name <input type="text" name="name" /> <br/>
		Description <input type="text" name="description" /> <br/>
		Start Date <input type="date" name="startdate" /> <br/>
		End Date <input type="date" name="enddate" /> <br/>
		Price <input type="number" name="price" /> <br/>
		<br/>
		<button name="add">Add</button>
	</div>
</form>