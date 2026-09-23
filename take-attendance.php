<?php
include("config/db.php");

$course_id=$_GET['course_id'];
$date=$_GET['date'];

$students=mysqli_query($conn,"SELECT * FROM students");

if(isset($_POST['save'])){

foreach($_POST['status'] as $student_id=>$status){

$check=mysqli_query($conn,"SELECT * FROM attendance
WHERE student_id='$student_id'
AND course_id='$course_id'
AND attendance_date='$date'");

if(mysqli_num_rows($check)==0){

mysqli_query($conn,"INSERT INTO attendance
(student_id,course_id,attendance_date,status)

VALUES

('$student_id','$course_id','$date','$status')");

}

}

echo "<script>alert('Attendance Saved Successfully');window.location='attendance.php';</script>";

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Mark Attendance</title>

<style>

body{
font-family:Arial;
background:#eef5ef;
}

.container{
width:90%;
margin:auto;
padding:30px;
}
table{

width:100%;

background:white;

border-collapse:collapse;

border-radius:12px;

overflow:hidden;

box-shadow:0 5px 15px rgba(0,0,0,.1);

}

th{
background:#1b5e20;
color:white;
padding:12px;
}

td{

padding:15px;

border-bottom:1px solid #ddd;

text-align:center;

}

tr:nth-child(even){

background:#f8f8f8;

}

tr:hover{

background:#e8f5e9;

}

button{
background:#2e7d32;
color:white;
padding:15px;
border:none;
width:100%;
margin-top:25px;
border-radius:8px;
font-size:16px;
font-weight:bold;
cursor:pointer;
transition:.3s;
}

button:hover{
background:#1b5e20;
}

select{
padding:10px;
border-radius:6px;
border:1px solid #ccc;
width:160px;
}
.card{
background:white;
padding:20px;
margin-bottom:20px;
border-radius:12px;
box-shadow:0 4px 15px rgba(0,0,0,.1);
}

.card h2,
.card h3{
color:#1b5e20;
margin-bottom:10px;
}

.card p{
font-size:16px;
line-height:1.8;
}
</style>

</head>

<body>

<div class="container">
<?php

$course=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$course_id'"));

?>
<div class="card">

<h3>Today's Attendance Session</h3>

<p>

Course Selected ✔

<br><br>

Students Loaded ✔

<br><br>

Ready to Record Attendance ✔

</p>

</div>

<br>

<div class="card">

<h2>📋 Attendance Register</h2>

<p><strong>Course:</strong> <?php echo $course['course_name']; ?></p>

<p><strong>Date:</strong> <?php echo $date; ?></p>

</div>

<br>
<h2>Mark Attendance</h2>

<form method="POST">

<table>

<tr>

<th>Reg No</th>

<th>Student Name</th>

<th>Status</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($students)){

?>

<tr>

<td><?php echo $row['reg_no']; ?></td>

<td><?php echo $row['fullname']; ?></td>

<td>

<select name="status[<?php echo $row['student_id'];?>]">

<option value="Present">🟢 Present</option>

<option value="Absent">🔴 Absent</option>

<option value="Late">🟡 Late</option>

</select>

</td>

</tr>

<?php

}

?>

</table>

<button name="save">

💾 Save Today's Attendance

</button>

</form>

</div>

</body>

</html>