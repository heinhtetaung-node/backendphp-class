<?php
include("nav.php");
include("StudentModel.php");
include("course/CourseModel.php");

if (isset($_POST['add'])) {
	insertStudent($_POST);
	header('Location: index.php');
}
[$courses, $total] = getCourses(10000, 0, null, 'name', 'asc');
?>
<form action="" method="POST">
	<div style="padding:20px; border:1px solid black" id="insert-form">
		Name <input type="text" name="stuname" /> <br/>
		Age <input type="text" name="age" /> <br/>
		Course 
		<select name="course_id"> 
			<?php foreach($courses as $c) : ?>

				<option value="<?php echo $c['id']; ?>"><?php echo $c['name']; ?></option>

			<?php endforeach; ?>
		</select>
		<br/>
		<button name="add">Add</button>
	</div>
</form>