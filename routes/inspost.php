<?php
include '../db/db.php';
date_default_timezone_set("Asia/Kolkata");
if (isset($_POST['done'])) {
    $title = $_POST['title'];
    $area = $_POST['area'];
    $image = $_POST['image'];
    $data = $_POST['data'];
    $date = "hi";
    $date = date("d-m-Y") ." ". date("h:i:sa");
    $q = "insert into `travel` (`page_no`,`title`,`area`,`image`,`data`,`uploadtime`) values(NULL,'$title','$area','$image','$data','$date')";
    $query = mysqli_query($con, $q);
    echo "<script>window.location.replace('../admin.php');</script>";
    // header('location:../admin.php');
}

if (isset($_POST['update'])) {
    $page_no = $_GET['page_no'];
    $title = $_POST['title'];
    $area = $_POST['area'];
    $image = $_POST['image'];
    $data = $_POST['data'];
    $date = date("d-m-Y") ." ". date("h:i:sa");
    $q = "UPDATE `travel` SET `title`='$title', `area`='$area', `image`='$image' ,`data`='$data',`uploadtime`='$date' WHERE `page_no`=$page_no";
    $query = mysqli_query($con, $q);
    header('location:../admin.php');
}
?>