<?php
$key = $_GET['key'];
include('../db/db.php');
if ($key == 'calls') {
    $qu = "truncate table calls";
}

if ($key == 'mail'){
    $qu = " truncate table contact";
    
}
mysqli_query($con, $qu);
echo "<script>window.location.replace('../admin.php');</script>";

?>