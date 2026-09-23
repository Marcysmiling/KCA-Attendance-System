<?php
include("config/db.php");

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM students WHERE student_id='$id'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $reg_no=$_POST['reg_no'];
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $course=$_POST['course'];
    $year=$_POST['year'];

    mysqli_query($conn,"UPDATE students SET
    reg_no='$reg_no',
    fullname='$fullname',
    email='$email',
    phone='$phone',
    course='$course',
    year_of_study='$year'
    WHERE student_id='$id'");

    header("Location:students.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>

<style>

body{
    background:#eef5ef;
    font-family:Arial;
}

.container{
    width:500px;
    margin:40px auto;
    background:white;
    padding:30px;
    border-radius:10px;
}

input{
    width:100%;
    padding:12px;
    margin:10px 0;
}

button{
    width:100%;
    padding:12px;
    background:#2e7d32;
    color:white;
    border:none;
    cursor:pointer;
}

</style>

</head>

<body>

<div class="container">

<h2>Edit Student</h2>

<form method="POST">

<input type="text" name="reg_no" value="<?php echo $row['reg_no']; ?>">

<input type="text" name="fullname" value="<?php echo $row['fullname']; ?>">

<input type="email" name="email" value="<?php echo $row['email']; ?>">

<input type="text" name="phone" value="<?php echo $row['phone']; ?>">

<input type="text" name="course" value="<?php echo $row['course']; ?>">

<input type="number" name="year" value="<?php echo $row['year_of_study']; ?>">

<button name="update">Update Student</button>

</form>

</div>

</body>
</html>