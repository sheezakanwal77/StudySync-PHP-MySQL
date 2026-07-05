<?php

session_start();
include("includes/config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if(!isset($_GET['id'])){
    header("Location: courses.php");
    exit();
}

$course_id = (int)$_GET['id'];

$check = mysqli_query($conn,"SELECT * FROM enrollments WHERE user_id='$user_id' AND course_id='$course_id'");

if(mysqli_num_rows($check)==0){

    mysqli_query($conn,"INSERT INTO enrollments(user_id,course_id,progress)
    VALUES('$user_id','$course_id',0)");

}

header("Location: dashboard.php");
exit();
?>