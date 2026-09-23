<?php
session_start();
include("config/db.php");

$search="";

if(isset($_GET['search'])){

$search=$_GET['search'];

$result=mysqli_query($conn,"SELECT * FROM students
WHERE fullname LIKE '%$search%'
OR reg_no LIKE '%$search%'");

}else{

$result=mysqli_query($conn,"SELECT * FROM students");

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Students</title>

<link rel="stylesheet" href="style.css">

<style>


table{
width:100%;
border-collapse:collapse;
margin-top:20px;
background:white;
}

table th,table td{
padding:12px;
border:1px solid #ddd;
text-align:center;
}

th{
background:#1b5e20;
color:white;
}

.btn{
background:#2e7d32;
color:white;
padding:10px 15px;
text-decoration:none;
border-radius:5px;
}

.btn:hover{
background:#1b5e20;
}

</style>

</head>

<body>

<h2>Students</h2>
<form method="GET">

<input
type="text"
name="search"
placeholder="Search Student..."
value="<?php echo $search; ?>"
style="padding:10px;width:300px;">

<button type="submit">Search</button>

</form>

<br>

<a href="add-student.php" class="btn">+ Add Student</a>

<table>

<tr>
<th>Programme</th>
<th>Reg No</th>
<th>Full Name</th>
<th>Email</th>
<th>Phone</th>
<th>Course</th>
<th>Year</th>
<th>Action</th>
<th>QR Code</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['reg_no']; ?></td>
<td><?php echo $row['fullname']; ?></td>
<td><?php echo $row['programme']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['course']; ?></td>
<td><?php echo $row['year_of_study']; ?></td>
<td>

<a href="edit-student.php?id=<?php echo $row['student_id'];?>">Edit</a> |

<a href="delete-student.php?id=<?php echo $row['student_id'];?>">Delete</a>

</td>

<td>

<a href="generate-qr.php?id=<?php echo $row['student_id']; ?>">

Generate

</a>

|

<a href="view-qr.php?id=<?php echo $row['student_id']; ?>">

View QR

</a>

</td>

</tr>

<?php
}
?>

</table>

</body>
</html>