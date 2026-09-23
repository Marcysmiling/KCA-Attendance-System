<?php
include("config/db.php");

$message="";

if(isset($_POST['register'])){

$fullname=mysqli_real_escape_string($conn,$_POST['fullname']);

$email=mysqli_real_escape_string($conn,$_POST['email']);

$password=md5($_POST['password']);

$role=$_POST['role'];

$check=mysqli_query($conn,

"SELECT * FROM users WHERE email='$email'");

if(mysqli_num_rows($check)>0){

$message="Email already exists.";

}else{

mysqli_query($conn,

"INSERT INTO users(fullname,email,password,role)

VALUES

('$fullname','$email','$password','$role')");

$message="Registration Successful!";

}

}
?>
<!DOCTYPE html>
<html>

<head>

<title>Register</title>

<style>

body{

margin:0;

font-family:Arial;

background:#2e7d32;

display:flex;

justify-content:center;

align-items:center;

height:100vh;

}

.register-box{

width:420px;

background:white;

padding:35px;

border-radius:12px;

box-shadow:0 5px 20px rgba(0,0,0,.25);

}

h2{

text-align:center;

color:#1b5e20;

margin-bottom:25px;

}

input,select{

width:100%;

padding:12px;

margin-top:15px;

border:1px solid #ccc;

border-radius:6px;

box-sizing:border-box;

}

button{

width:100%;

padding:13px;

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

.success{

color:green;

text-align:center;

margin-top:15px;

font-weight:bold;

}

.error{

color:red;

text-align:center;

margin-top:15px;

}

a{

text-decoration:none;

color:#1b5e20;

font-weight:bold;

}

.bottom{

text-align:center;

margin-top:20px;

}

</style>

</head>

<body>

<div class="register-box">

<h2>Create Account</h2>

<form method="POST">

<input
type="text"
name="fullname"
placeholder="Full Name"
required>

<input
type="email"
name="email"
placeholder="Email Address"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<select name="role" required>

<option value="">Select Role</option>

<option value="Student">Student</option>

<option value="Lecturer">Lecturer</option>

</select>

<button
type="submit"
name="register">

Register

</button>

</form>
<?php

if($message!=""){

if($message=="Registration Successful!"){

echo "<p class='success'>$message</p>";

}else{

echo "<p class='error'>$message</p>";

}

}

?>

<div class="bottom">

Already have an account?

<br><br>

<a href="login.php">

Login Here

</a>

</div>
</body>

</html>