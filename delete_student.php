<?php
    require_once './dbconnection.php';
    $id= base64_decode($_GET['id']);
    //echo $id;
    mysqli_query($link,"DELETE FROM `student_info` WHERE `id`='$id'");
    header("location:index.php?page=all-students");
?>