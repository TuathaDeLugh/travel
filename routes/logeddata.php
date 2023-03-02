<?php
include "../db/db.php";
if (isset($_POST['sign-in-email']) && isset($_POST['sign-in-password'])) {
    $email = $_POST['sign-in-email'];
    $password = $_POST['sign-in-password'];
    if(empty($email)||empty($password)){
        setcookie("data", "You have only one job & you forgot to put data.",time()+5,"/");
        header("location:../login.php");
        exit();
    }
    $q = "select * from admin where email='$email' && password='$password'";

    $query = mysqli_query($con, $q);


    if (mysqli_num_rows($query) === 1) {
        session_start();
        $_SESSION['admin'] = $email;
        header('Location:../admin.php');
        exit();

    } else {
        setcookie("data", "Invalid ID or Password you noob.",time()+5,"/");
        header("location:../login.php");
        exit();
    }
} elseif (isset($_POST['logout'])) {
    session_start();
    session_destroy();
    setcookie("data", "Loged Out Successfully",time()+5,"/");
    header("location:../index.php");
    exit();
} else {
    header('Location:../index.php');
    exit();
}