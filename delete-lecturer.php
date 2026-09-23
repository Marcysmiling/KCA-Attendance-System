<?php

include("config/db.php");

$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM lecturers WHERE lecturer_id='$id'");

header("Location:lecturers.php");

exit();

?>