<?php
include("config/db.php");

$result = mysqli_query($conn,"
SELECT
students.reg_no,
students.fullname,
courses.course_name,
attendance.attendance_date,
attendance.status

FROM attendance

JOIN students
ON attendance.student_id = students.student_id

JOIN courses
ON attendance.course_id = courses.course_id

ORDER BY attendance.attendance_date DESC
");

?>

<!DOCTYPE html>
<html>

<head>

<title>Attendance Reports</title>

<style>

body{
font-family:Arial;
background:#eef5ef;
margin:0;
}

.container{
width:95%;
margin:auto;
padding:30px;
}

.card{
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,.1);
}

h2{
color:#1b5e20;
}

table{
width:100%;
border-collapse:collapse;
margin-top:20px;
}

th{
background:#1b5e20;
color:white;
padding:12px;
}

td{
padding:12px;
border-bottom:1px solid #ddd;
text-align:center;
}

.present{
color:green;
font-weight:bold;
}

.absent{
color:red;
font-weight:bold;
}

.late{
color:orange;
font-weight:bold;
}

</style>

</head>

<body>

<div class="container">

<div class="card">

<h2>Attendance Reports</h2>

<table>

<tr>

<th>Reg No</th>

<th>Student</th>

<th>Course</th>

<th>Date</th>

<th>Status</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

$status=strtolower($row['status']);

?>

<tr>

<td><?php echo $row['reg_no']; ?></td>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['course_name']; ?></td>

<td><?php echo $row['attendance_date']; ?></td>

<td class="<?php echo $status; ?>">
<?php echo $row['status']; ?>
</td>

</tr>

<?php
}
?>

</table>

</div>

</div>

</body>

</html>