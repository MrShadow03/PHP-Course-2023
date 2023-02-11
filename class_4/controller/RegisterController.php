<?php
include '../helpers/db.php';
session_start();

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    if(empty($name) || empty($email) || empty($uid) || empty($pwd)){
        $_SESSION['error'] = "All fields are required";
        header("Location: ../index.php?signup=empty");
    }else{
       $sql = "INSERT INTO users (name, email, uid, pwd) VALUES ('$name', '$email', '$uid', '$pwd')";

       $insert = mysqli_query($connection, $sql);
    }
}






















?>