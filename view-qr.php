<?php
include("config/db.php");

$id=$_GET['id'];

$result=mysqli_query($conn,"SELECT * FROM students WHERE student_id='$id'");
$row=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html>

<head>

<title>Student QR Code</title>

<link rel="stylesheet" href="style.css">

<style>

.qr-card{

width:450px;

margin:50px auto;

background:white;

padding:30px;

border-radius:15px;

box-shadow:0 5px 20px rgba(0,0,0,.15);

text-align:center;

}

.qr-card img{

width:250px;

margin:20px 0;

}

.print-btn{

display:inline-block;

padding:12px 25px;

background:#2e7d32;

color:white;

text-decoration:none;

border-radius:8px;

margin-top:20px;

}

.print-btn:hover{

background:#1b5e20;

}

</style>

</head>

<body>

<div class="qr-card">

<h2><?php echo $row['fullname']; ?></h2>

<p><strong>Reg No:</strong> <?php echo $row['reg_no']; ?></p>

<img
src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=<?php echo urlencode($row['qr_code']); ?>"
alt="Student QR Code">

<br>

<a class="print-btn" href="#" onclick="window.print();">

🖨 Print QR

</a>

</div>

</body>

</html>