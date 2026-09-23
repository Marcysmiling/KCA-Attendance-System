<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location:login.php");
    exit();
}

if($_SESSION['role']!="Student"){
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

<title>Student Dashboard</title>

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

.header h2{

margin:0;

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
.card h1{

font-size:42px;

color:#1b5e20;

margin-bottom:15px;

}

.card p{

font-size:18px;

font-weight:bold;

color:#555;

margin-bottom:15px;

}

.card a{

display:inline-block;

background:#2e7d32;

color:white;

padding:10px 20px;

border-radius:8px;

text-decoration:none;

font-weight:bold;

transition:.3s;

}

.card a:hover{

background:#1b5e20;

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

.card h2{

margin-top:10px;

color:#1b5e20;

font-size:24px;

}

.card h1{

font-size:45px;

color:#1b5e20;

margin-bottom:15px;

}

}

</style>

</head>

<body>

<div class="header">

<h2>👨‍🎓 Student Dashboard</h2>

<a class="logout" href="logout.php">

Logout

</a>

</div>

<div class="container">

<div class="welcome">

<h2>

Welcome,

<?php echo $user['fullname']; ?>

👋

</h2>

<p>

You are logged in as

<b>Student</b>

</p>

</div>
<?php

$attendanceTaken = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM attendance")
);

?>

<div class="cards">

<div class="card">

<h1>👤</h1>

<p>Student Profile</p>

<h2><?php echo $user['fullname']; ?></h2>

</div>

<div class="card">

<h1>🎓</h1>

<p>Role</p>

<h2>Student</h2>

</div>

<div class="card">

<h1>📅</h1>

<p>Attendance Records</p>

<h2><?php echo $attendanceTaken; ?></h2>

</div>

</div>
<div class="welcome" style="margin-top:30px;">

<h2>⚡ Quick Actions</h2>

<br>

<div style="display:flex;gap:20px;flex-wrap:wrap;">

<a href="profile.php" class="action-btn">

👤 My Profile

</a>

<a href="attendance_history.php" class="action-btn">

📅 My Attendance

</a>

<a href="logout.php" class="action-btn">

🚪 Logout

</a>

</div>

</div>

</body>

</html>