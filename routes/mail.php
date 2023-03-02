<?php

include '../db/db.php';

$c_no = $_GET['c_no'];

$q = " DELETE FROM `contact` WHERE c_no = $c_no ";

mysqli_query($con, $q);

echo "<script>window.location.replace('../admin.php');</script>";

?>