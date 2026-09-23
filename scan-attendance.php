<?php
include("config/db.php");

$courses = mysqli_query($conn, "SELECT * FROM courses");
?>

<!DOCTYPE html>
<html>
<head>

<title>Scan Attendance</title>

<script src="https://unpkg.com/html5-qrcode"></script>

<style>

body{
    margin:0;
    font-family:Arial;
    background:#eef5ef;
}

.container{
    width:90%;
    margin:auto;
    padding:30px;
}

.card{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
    margin-bottom:25px;
}

h2{
    color:#1b5e20;
}

select,input{
    width:100%;
    padding:12px;
    margin:12px 0;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:16px;
}

button{
    background:#2e7d32;
    color:white;
    border:none;
    padding:14px;
    width:100%;
    border-radius:8px;
    font-size:17px;
    cursor:pointer;
}

button:hover{
    background:#1b5e20;
}

#reader{
    width:500px;
    margin:auto;
    display:none;
}

#result{
    margin-top:20px;
    text-align:center;
    font-size:20px;
    color:#1b5e20;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="container">

<div class="card">

<h2>📷 QR Attendance Scanner</h2>

<label>Select Course</label>

<select id="course">

<option value="">Choose Course</option>

<?php
while($row=mysqli_fetch_assoc($courses)){
?>

<option value="<?php echo $row['course_id']; ?>">
<?php echo $row['course_name']; ?>
</option>

<?php
}
?>

</select>

<label>Date</label>

<input type="date" id="date" value="<?php echo date('Y-m-d');?>">

<button onclick="startScanner()">

Open Camera Scanner

</button>

</div>

<div id="reader"></div>

<div id="result"></div>

</div>

<script src="scanner.js"></script>

</body>

</html>