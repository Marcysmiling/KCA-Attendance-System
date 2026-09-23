<?php
session_start();
include("config/db.php");

if(isset($_POST['save']))
{
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $department=$_POST['department'];

    mysqli_query($conn,"INSERT INTO lecturers(fullname,email,phone,department)
    VALUES('$fullname','$email','$phone','$department')");

    header("Location:lecturers.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add Lecturer</title>

<style>

body{
font-family:Arial;
background:#eef5ef;
}

.container{
width:500px;
margin:40px auto;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,.15);
}

h2{
color:#1b5e20;
text-align:center;
}

input{
width:100%;
padding:12px;
margin:10px 0;
border:1px solid #ccc;
border-radius:5px;
}

button{
width:100%;
padding:12px;
background:#2e7d32;
color:white;
border:none;
border-radius:5px;
cursor:pointer;
}

button:hover{
background:#1b5e20;
}

</style>

</head>

<body>

<div class="container">

<h2>Add Lecturer</h2>

<form method="POST">

<input type="text" name="fullname" placeholder="Full Name" required>

<input type="email" name="email" placeholder="Email">

<input type="text" name="phone" placeholder="Phone">

<input type="text" name="department" placeholder="Department">

<button name="save">Save Lecturer</button>

</form>

</div>

</body>
</html>