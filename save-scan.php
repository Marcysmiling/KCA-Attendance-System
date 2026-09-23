<?php
include("config/db.php");

if(isset($_POST['qr'])){

    $qr = mysqli_real_escape_string($conn, $_POST['qr']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    // Find student using QR code
    $student = mysqli_query($conn,
        "SELECT * FROM students WHERE qr_code='$qr'"
    );

    if(mysqli_num_rows($student)==0){

        echo "❌ Student Not Found";
        exit();

    }

    $row = mysqli_fetch_assoc($student);

    $student_id = $row['student_id'];

    // Check if attendance already exists
    $check = mysqli_query($conn,

    "SELECT * FROM attendance

    WHERE student_id='$student_id'

    AND course_id='$course'

    AND attendance_date='$date'"

    );

    if(mysqli_num_rows($check)>0){

        echo "⚠ Attendance Already Recorded";

    }else{

        mysqli_query($conn,

        "INSERT INTO attendance
        (student_id,course_id,attendance_date,status)

        VALUES

        ('$student_id','$course','$date','Present')"

        );

        echo "
<b>👨‍🎓 Student:</b> ".$row['fullname']."<br><br>

<b>🆔 Registration:</b> ".$row['reg_no']."<br><br>

<b>🟢 Status:</b> Present<br><br>

<b>✅ Attendance Saved Successfully</b>
";

    }

}
?>