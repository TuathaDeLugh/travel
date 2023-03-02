<?php

include '../db/db.php';

$mno = $_GET['mno'];

$q = " DELETE FROM `calls` WHERE mno = $mno ";

mysqli_query($con, $q);

// header('location:../admin.php');
echo "<script>window.location.replace('../admin.php');</script>";
?>