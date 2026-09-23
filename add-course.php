<?php
include("config/db.php");

if(isset($_POST['save'])){

$course_code=$_POST['course_code'];
$course_name=$_POST['course_name'];
$department=$_POST['department'];
$year_level=$_POST['year_level'];
$semester=$_POST['semester'];
$lecturer_id=$_POST['lecturer_id'];

mysqli_query($conn,"INSERT INTO courses
(course_code,course_name,department,year_level,semester,lecturer_id)

VALUES

('$course_code','$course_name','$department','$year_level','$semester','$lecturer_id')");

header("Location:courses.php");
exit();

}

$lecturers=mysqli_query($conn,"SELECT * FROM lecturers");
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Course</title>

<style>

body{
background:#eef5ef;
font-family:Arial;
}

.container{
width:500px;
margin:40px auto;
background:white;
padding:30px;
border-radius:10px;
}

input,select{
width:100%;
padding:12px;
margin:10px 0;
}

button{
width:100%;
padding:12px;
background:#1b5e20;
color:white;
border:none;
cursor:pointer;
}

</style>

</head>

<body>

<div class="container">

<h2>Add Course</h2>

<form method="POST">

<input type="text" name="course_code" placeholder="Course Code" required>

<input type="text" name="course_name" placeholder="Course Name" required>

<input type="text" name="department" placeholder="Department" required>

<input type="number" name="year_level" placeholder="Year Level" required>

<input type="number" name="semester" placeholder="Semester" required>

<select name="lecturer_id">

<option value="">Assign Lecturer</option>

<?php
while($row=mysqli_fetch_assoc($lecturers)){
?>

<option value="<?php echo $row['lecturer_id']; ?>">

<?php echo $row['fullname']; ?>

</option>

<?php
}
?>

</select>

<button name="save">Save Course</button>

</form>

</div>

</body>
</html>