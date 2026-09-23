<?php
include("config/db.php");

$courses=mysqli_query($conn,"SELECT * FROM courses");
?>

<!DOCTYPE html>
<html>

<head>

<title>Attendance</title>

<style>

body{
font-family:Arial;
background:#eef5ef;
margin:0;
}

.container{
width:90%;
margin:auto;
padding:30px;
}

.card{

background:white;
padding:20px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,.1);

}

select,input{

width:100%;
padding:12px;
margin:10px 0;

}

button{

background:#1b5e20;
color:white;
padding:12px;
border:none;
cursor:pointer;
width:100%;

}

</style>

</head>

<body>

<div class="container">

<div class="card">

<h2>Take Attendance</h2>

<form action="take-attendance.php" method="GET">

<label>Select Course</label>

<select name="course_id" required>

<option value="">Choose Course</option>

<?php

while($row=mysqli_fetch_assoc($courses)){

?>

<option value="<?php echo $row['course_id']; ?>">

<?php echo $row['course_name']; ?>

</option>

<?php

}

?>

</select>

<label>Date</label>

<input type="date" name="date" required>

<button>Load Students</button>

</form>

</div>

</div>

</body>

</html>