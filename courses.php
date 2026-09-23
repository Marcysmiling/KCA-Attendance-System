<?php
include("config/db.php");

$result=mysqli_query($conn,"SELECT * FROM courses");
?>

<!DOCTYPE html>

<html>

<head>

<title>Courses</title>

<style>

body{
font-family:Arial;
background:#eef5ef;
}

.container{
width:95%;
margin:30px auto;
}

h2{
color:#1b5e20;
}

.button{
background:#2e7d32;
padding:10px 18px;
color:white;
text-decoration:none;
border-radius:5px;
}

table{

width:100%;
margin-top:20px;
background:white;
border-collapse:collapse;

}

th{

background:#1b5e20;
color:white;
padding:12px;

}

td{

padding:12px;
border-bottom:1px solid #ddd;

}

</style>

</head>

<body>

<div class="container">

<h2>Courses</h2>

<a href="add-course.php" class="button">+ Add Course</a>

<table>

<tr>

<th>ID</th>

<th>Course Code</th>

<th>Course Name</th>

<th>Department</th>

<th>Year</th>

<th>Semester</th>

<th>Action</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['course_id']; ?></td>

<td><?php echo $row['course_code']; ?></td>

<td><?php echo $row['course_name']; ?></td>

<td><?php echo $row['department']; ?></td>

<td><?php echo $row['year_level']; ?></td>

<td><?php echo $row['semester']; ?></td>

<td>

<a href="edit-course.php?id=<?php echo $row['course_id'];?>">Edit</a>

|

<a href="delete-course.php?id=<?php echo $row['course_id'];?>"

onclick="return confirm('Delete Course?')">

Delete

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>