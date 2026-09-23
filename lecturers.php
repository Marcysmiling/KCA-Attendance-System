<?php
session_start();
include("config/db.php");

$result = mysqli_query($conn,"SELECT * FROM lecturers");
?>

<!DOCTYPE html>
<html>
<head>

<title>Lecturers</title>

<style>

body{
    font-family:Arial;
    background:#eef5ef;
}

.container{
    width:95%;
    margin:30px auto;
}

h2{
    color:#1b5e20;
}

a.button{
    background:#2e7d32;
    color:white;
    padding:10px 18px;
    text-decoration:none;
    border-radius:5px;
}

table{
    width:100%;
    margin-top:20px;
    border-collapse:collapse;
    background:white;
}

table th{
    background:#1b5e20;
    color:white;
    padding:12px;
}

table td{
    padding:12px;
    border-bottom:1px solid #ddd;
}

.edit{
    color:green;
    text-decoration:none;
}

.delete{
    color:red;
    text-decoration:none;
}

</style>

</head>

<body>

<div class="container">

<h2>Lecturers</h2>

<a href="add-lecturer.php" class="button">+ Add Lecturer</a>

<table>

<tr>

<th>ID</th>
<th>Full Name</th>
<th>Email</th>
<th>Phone</th>
<th>Department</th>
<th>Action</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['lecturer_id']; ?></td>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['department']; ?></td>

<td>

<a class="edit" href="edit-lecturer.php?id=<?php echo $row['lecturer_id']; ?>">Edit</a> |

<a class="delete" href="delete-lecturer.php?id=<?php echo $row['lecturer_id']; ?>" onclick="return confirm('Delete Lecturer?')">Delete</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>