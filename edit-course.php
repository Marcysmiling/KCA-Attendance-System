<?php
include("config/db.php");

$id=$_GET['id'];

$result=mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$id'");

$row=mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

$code=$_POST['course_code'];
$name=$_POST['course_name'];
$department=$_POST['department'];
$year=$_POST['year_level'];
$semester=$_POST['semester'];

mysqli_query($conn,"UPDATE courses SET

course_code='$code',
course_name='$name',
department='$department',
year_level='$year',
semester='$semester'

WHERE course_id='$id'");

header("Location:courses.php");
exit();

}
?>

<!DOCTYPE html>

<html>

<head>

<title>Edit Course</title>

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

input{

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

}

</style>

</head>

<body>

<div class="container">

<h2>Edit Course</h2>

<form method="POST">

<input type="text" name="course_code" value="<?php echo $row['course_code'];?>">

<input type="text" name="course_name" value="<?php echo $row['course_name'];?>">

<input type="text" name="department" value="<?php echo $row['department'];?>">

<input type="number" name="year_level" value="<?php echo $row['year_level'];?>">

<input type="number" name="semester" value="<?php echo $row['semester'];?>">

<button name="update">Update Course</button>

</form>

</div>

</body>

</html>