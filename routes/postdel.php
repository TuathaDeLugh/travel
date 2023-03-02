<?php

include '../db/db.php';

$page_no = $_GET['page_no'];

$q = " DELETE FROM `travel` WHERE page_no = $page_no ";

mysqli_query($con, $q);
echo "<script>window.location.replace('../admin.php');</script>";
// header('location:../admin.php');

?>