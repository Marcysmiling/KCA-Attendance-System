```php
<?php
session_start();
include("config/db.php");

if(isset($_POST['save']))
{
    $reg_no = $_POST['reg_no'];
    $fullname = $_POST['fullname'];
    $programme = $_POST['programme'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $year = $_POST['year'];

    $qr = uniqid("STD");

    mysqli_query($conn,"INSERT INTO students
    (reg_no,fullname,programme,email,phone,course,year_of_study,qr_code)

    VALUES

    ('$reg_no','$fullname','$programme','$email','$phone','$course','$year','$qr')");

    header("Location:students.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Add Student</title>

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

<h2>Add Student</h2>

<form method="POST">

<input type="text" name="reg_no" placeholder="Registration Number" required>

<input type="text" name="fullname" placeholder="Full Name" required>

<input type="text" name="programme" value="DIT" readonly>

<input type="email" name="email" placeholder="Email">

<input type="text" name="phone" placeholder="Phone">

<input type="text" name="course" placeholder="Course">

<input type="number" name="year" placeholder="Year of Study">

<button type="submit" name="save">Save Student</button>

</form>

</div>

</body>

</html>
```
