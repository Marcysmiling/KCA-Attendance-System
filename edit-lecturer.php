<?php
include("config/db.php");

$id=$_GET['id'];

$result=mysqli_query($conn,"SELECT * FROM lecturers WHERE lecturer_id='$id'");
$row=mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
$fullname=$_POST['fullname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$department=$_POST['department'];

mysqli_query($conn,"UPDATE lecturers SET

fullname='$fullname',
email='$email',
phone='$phone',
department='$department'

WHERE lecturer_id='$id'");

header("Location:lecturers.php");
exit();
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Lecturer</title>

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
}

</style>

</head>

<body>

<div class="container">

<h2>Edit Lecturer</h2>

<form method="POST">

<input type="text" name="fullname" value="<?php echo $row['fullname'];?>">

<input type="email" name="email" value="<?php echo $row['email'];?>">

<input type="text" name="phone" value="<?php echo $row['phone'];?>">

<input type="text" name="department" value="<?php echo $row['department'];?>">

<button name="update">Update Lecturer</button>

</form>

</div>

</body>

</html>