<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location:login.php");
    exit();
}

if($_SESSION['role']!="Lecturer"){
    header("Location:login.php");
    exit();
}

include("config/db.php");

$id=$_SESSION['id'];

$result=mysqli_query($conn,"SELECT * FROM users WHERE id='$id'");
$user=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>

<title>Lecturer Dashboard</title>

<style>

body{
margin:0;
font-family:Arial;
background:#eef5ef;
}

.header{
background:#1b5e20;
color:white;
padding:20px;
display:flex;
justify-content:space-between;
align-items:center;
}

.logout{
background:white;
color:#1b5e20;
padding:10px 18px;
text-decoration:none;
border-radius:8px;
font-weight:bold;
}

.container{
width:90%;
margin:30px auto;
}

.welcome{
background:white;
padding:30px;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,.1);
margin-bottom:30px;
}

.cards{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:20px;
}

.card{
background:white;
padding:30px;
border-radius:15px;
text-align:center;
box-shadow:0 5px 15px rgba(0,0,0,.1);
transition:.3s;
}

.card:hover{
transform:translateY(-5px);
}

.card a{
text-decoration:none;
color:#1b5e20;
font-size:18px;
font-weight:bold;
}

@media(max-width:900px){

.cards{
grid-template-columns:1fr;
}
.action-btn{

display:inline-block;

background:#2e7d32;

color:white;

padding:15px 25px;

border-radius:10px;

text-decoration:none;

font-weight:bold;

transition:.3s;

}

.action-btn:hover{

background:#1b5e20;

transform:translateY(-3px);

}

.card h1{

font-size:45px;

color:#1b5e20;

margin-bottom:15px;

}

.card h2{

margin-top:10px;

font-size:24px;

color:#1b5e20;

}

.card p{

font-size:18px;

font-weight:bold;

color:#555;

margin-bottom:15px;

}

}

</style>

</head>

<body>

<div class="header">

<h2>👩‍🏫 Lecturer Dashboard</h2>

<a class="logout" href="logout.php">

Logout

</a>

</div>

<div class="container">

<div class="welcome">

<h2>

Welcome,

<?php echo $_SESSION['fullname']; ?>

👋

</h2>

<p>

You are logged in as

<b>Lecturer</b>

</p>

</div>
<?php

$coursesCount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM courses"));

$attendanceCount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM attendance"));

?>


<div class="cards">

<div class="card">

<h1>👩‍🏫</h1>

<p>Lecturer</p>

<h2><?php echo $user['fullname']; ?></h2>

</div>

<div class="card">

<h1>📚</h1>

<p>Total Courses</p>

<h2><?php echo $coursesCount; ?></h2>

</div>

<div class="card">

<h1>📋</h1>

<p>Attendance Records</p>

<h2><?php echo $attendanceCount; ?></h2>

</div>

</div>
</div>
<div class="welcome" style="margin-top:30px;">

<h2>⚡ Quick Actions</h2>

<br>

<div style="display:flex;gap:20px;flex-wrap:wrap;">

<a href="courses.php" class="action-btn">

📚 My Courses

</a>

<a href="scan-attendance.php" class="action-btn">

📷 Scan QR

</a>

<a href="attendance.php" class="action-btn">

📋 Attendance

</a>

<a href="logout.php" class="action-btn">

🚪 Logout

</a>

</div>

</div>

</body>

</html>