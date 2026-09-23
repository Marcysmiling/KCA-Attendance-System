<?php

include("config/db.php");

$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM courses WHERE course_id='$id'");

header("Location:courses.php");

exit();

?>