<?php
session_start();
include("config/db.php");

if(!isset($_SESSION['id'])){
    header("Location:login.php");
    exit();
}

$students=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM students"));
$lecturers=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM lecturers"));
$courses=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM courses"));
$attendance=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM attendance"));
$users=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users"));

$date=date("l, d F Y");
?>

<!DOCTYPE html>
<html>
<head>

<title>Attendance Management System</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,Helvetica,sans-serif;
}

body{
background:#f4f7f8;
}

/* HEADER */

.header{
background:#1b5e20;
color:white;
padding:20px 40px;
display:flex;
justify-content:space-between;
align-items:center;
}

.header h1{
font-size:28px;
}

.header p{
margin-top:5px;
}

.user{
text-align:right;
}

/* NAVIGATION */

nav{
background:white;
display:flex;
justify-content:center;
padding:15px;
box-shadow:0 2px 10px rgba(0,0,0,.1);
}

nav a{
text-decoration:none;
color:#1b5e20;
font-weight:bold;
margin:0 20px;
transition:.3s;
}

nav a:hover{
color:#43a047;
}

.container{
width:90%;
margin:auto;
padding:30px;
}

.welcome{
background:white;
padding:25px;
border-radius:15px;
box-shadow:0 4px 15px rgba(0,0,0,.1);
margin-bottom:25px;
}

.welcome h2{
color:#1b5e20;
margin-bottom:10px;
}

/* CARDS */

.stats{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:20px;
margin-bottom:30px;
}

.card{
background:white;
padding:25px;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,.1);
text-align:center;
transition:.3s;
}

.card:hover{
transform:translateY(-5px);
}

.card h1{
font-size:40px;
color:#1b5e20;
margin:10px 0;
}

.card p{
font-weight:bold;
color:#666;
}

/* PANELS */

.panels{
display:grid;
grid-template-columns:1fr 1fr;
gap:20px;
margin-bottom:30px;
}

.panel{
background:white;
padding:25px;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,.1);
}

.panel h2{
color:#1b5e20;
margin-bottom:20px;
}

.action{
display:block;
background:#2e7d32;
color:white;
text-decoration:none;
padding:12px;
margin-bottom:15px;
text-align:center;
border-radius:8px;
font-weight:bold;
transition:.3s;
}

.action:hover{
background:#1b5e20;
}

.status{
padding:10px;
border-bottom:1px solid #ddd;
}

/* TABLE */

.table-card{
background:white;
padding:25px;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,.1);
margin-bottom:30px;
}

.table-card h2{
margin-bottom:20px;
color:#1b5e20;
}

table{
width:100%;
border-collapse:collapse;
}

table th{
background:#1b5e20;
color:white;
padding:15px;
}

table td{
padding:12px;
text-align:center;
border-bottom:1px solid #ddd;
}

table tr:hover{
background:#eef8ef;
}

.footer{
background:white;
padding:25px;
text-align:center;
color:#666;
border-top:1px solid #ddd;
margin-top:20px;
}

@media(max-width:900px){

.stats{
grid-template-columns:repeat(2,1fr);
}

.panels{
grid-template-columns:1fr;
}

}

@media(max-width:650px){

.stats{
grid-template-columns:1fr;
}

nav{
flex-wrap:wrap;
}

.header{
flex-direction:column;
text-align:center;
}

}

</style>

</head>

<body>

<div class="header">

<div>

<h1>🎓 Attendance Management System</h1>

<p>KCA University</p>

</div>

<div class="user">

<h3>👋 <?php echo $_SESSION['fullname']; ?></h3>

<p><?php echo $date; ?></p>

</div>

</div>

<nav>

<a href="dashboard.php">Dashboard</a>

<a href="students.php">Students</a>

<a href="lecturers.php">Lecturers</a>

<a href="courses.php">Courses</a>

<a href="attendance.php">Attendance</a>

<a href="reports.php">Reports</a>

<a href="logout.php">Logout</a>

</nav>

<div class="container">

<div class="welcome">

<h2>Welcome Back 👋</h2>

<p>Manage students, lecturers, courses and attendance records from one professional dashboard.</p>

</div>
<div class="stats">

<div class="card">
<h3>👨‍🎓 Students</h3>
<h1><?php echo $students; ?></h1>
<p>Total Students</p>
</div>

<div class="card">
<h3>👩‍🏫 Lecturers</h3>
<h1><?php echo $lecturers; ?></h1>
<p>Total Lecturers</p>
</div>

<div class="card">
<h3>📚 Courses</h3>
<h1><?php echo $courses; ?></h1>
<p>Total Courses</p>
</div>

<div class="card">
<h3>📅 Attendance</h3>
<h1><?php echo $attendance; ?></h1>
<p>Attendance Records</p>
</div>

</div>

<div class="panels">

<!-- QUICK ACTIONS -->

<div class="panel">

<h2>⚡ Quick Actions</h2>

<a href="add-student.php" class="action">
➕ Add Student
</a>

<a href="add-lecturer.php" class="action">
👩‍🏫 Add Lecturer
</a>

<a href="add-course.php" class="action">
📚 Add Course
</a>

<a href="attendance.php" class="action">
📝 Take Attendance
</a>

<a href="students.php" class="action">
📷 Generate QR Codes
</a>

</div>

<!-- SYSTEM STATUS -->

<div class="panel">

<h2>📊 System Status</h2>

<div class="status">
🟢 Database Connected
</div>

<div class="status">
🟢 Student Module Active
</div>

<div class="status">
🟢 Lecturer Module Active
</div>

<div class="status">
🟢 Attendance Module Active
</div>

<div class="status">
🟡 QR Code Module (Final Setup)
</div>

<div class="status">
🟢 Reports Module Ready
</div>

<div class="status">
👥 Registered Users:
<strong><?php echo $users; ?></strong>
</div>

</div>

</div>
<div class="table-card">

<h2>📋 Recent Attendance</h2>

<table>

<tr>

<th>Student</th>
<th>Course</th>
<th>Date</th>
<th>Status</th>

</tr>

<?php

$recent=mysqli_query($conn,"
SELECT
students.fullname,
courses.course_name,
attendance.attendance_date,
attendance.status

FROM attendance

INNER JOIN students
ON attendance.student_id=students.student_id

INNER JOIN courses
ON attendance.course_id=courses.course_id

ORDER BY attendance.attendance_id DESC

LIMIT 5
");

if(mysqli_num_rows($recent)>0){

while($row=mysqli_fetch_assoc($recent)){

?>

<tr>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['course_name']; ?></td>

<td><?php echo $row['attendance_date']; ?></td>

<td>

<?php

if($row['status']=="Present"){

echo "<span style='color:green;font-weight:bold;'>🟢 Present</span>";

}

elseif($row['status']=="Absent"){

echo "<span style='color:red;font-weight:bold;'>🔴 Absent</span>";

}

else{

echo "<span style='color:orange;font-weight:bold;'>🟡 Late</span>";

}

?>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="4">

No attendance records available.

</td>

</tr>

<?php

}

?>

</table>

</div>

<div class="footer">

<h3 style="color:#1b5e20;">

🎓 Attendance Management System

</h3>

<br>

<p>

Developed by

<strong>Angella Nungai</strong>

</p>

<br>

<p>

Diploma in Information Technology

</p>

<br>

<p>

© 2026 All Rights Reserved

</p>

</div>

</div>

</body>

</html>