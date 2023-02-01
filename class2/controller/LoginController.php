<?php 
session_start();
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        $_SESSION['error'] = "Username or password cannot be empty";
        header('Location:../index.php');
    } else {
        if(strlen($password) < 8){
            $_SESSION['error'] = "Password must be at least 8 characters";
            header('Location:../index.php');
        }else{
            $_SESSION['username'] = $username;
            header('Location:../dashboard.php');
        };

        
    }
}

//PHP superglobals
// $_GET
// $_POST
// $_REQUEST
// $_SESSION
// $_COOKIE













?>