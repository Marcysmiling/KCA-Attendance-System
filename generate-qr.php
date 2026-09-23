<?php
echo "Page Started <br>";

include("config/db.php");
echo "Database Connected <br>";

include("phpqrcode/phpqrcode/qrlib.php");
echo "QR Library Loaded <br>";

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM students WHERE student_id='$id'");
$row = mysqli_fetch_assoc($result);

$text = $row['qr_code'];

$file = "C:/xampp/htdocs/AttendanceSystem/qrcodes/" . $text . ".png";

echo "About to Generate QR...<br>";

QRcode::png($text,$file,'H',8,2);
if(file_exists($file)){
    echo "QR saved successfully!";
}else{
    echo "QR was NOT saved.";
}

echo "QR Generated!";
?>