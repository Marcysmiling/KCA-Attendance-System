<?php
session_start();
include("config/db.php");

$message = "";

if(isset($_POST['login'])){

$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = md5($_POST['password']);

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

$user=mysqli_fetch_assoc($result);

$_SESSION['id']=$user['id'];
$_SESSION['fullname']=$user['fullname'];
$_SESSION['role']=$user['role'];

if($user['role']=="Admin"){
header("Location:dashboard.php");
exit();
}

if($user['role']=="Lecturer"){
header("Location:lecturer_dashboard.php");
exit();
}

if($user['role']=="Student"){
header("Location:student_dashboard.php");
exit();
}

}else{

$message="Invalid Email or Password.";

}

}
?>

<!DOCTYPE html>
<html>

<head>

<title>Attendance System Login</title>

<style>

body{

margin:0;
padding:0;
font-family:Arial;
background:#2e7d32;
display:flex;
justify-content:center;
align-items:center;
height:100vh;

}

.login-box{

width:380px;
background:white;
padding:35px;
border-radius:12px;
box-shadow:0 0 20px rgba(0,0,0,.3);

}

h2{

text-align:center;
color:#1b5e20;

}

input{

width:100%;
padding:12px;
margin-top:15px;
border:1px solid #ccc;
border-radius:6px;
box-sizing:border-box;

}

button{

width:100%;
padding:12px;
margin-top:20px;
background:#1b5e20;
color:white;
border:none;
border-radius:6px;
cursor:pointer;
font-size:16px;

}

button:hover{

background:#2e7d32;

}

.error{

color:red;
text-align:center;
margin-top:15px;

}

</style>

</head>

<body>

<div class="login-box">

<h2>Attendance Management System</h2>

<form method="POST">

<input type="email" name="email" placeholder="Email Address" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="login">Login</button>

</form>

<?php

if($message!=""){
echo "<p class='error'>$message</p>";
}

?>

</div>

</body>

</html>