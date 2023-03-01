<?php 
session_start();
include '../helper/db.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    //check if all fields are filled, if not, redirect to register page with error message in session
    if(empty($email) || empty($password)){
        $_SESSION['error'] = 'All fields are required';
        header('Location: ../index.php');
    }else{
        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            $_SESSION['error'] = 'Invalid email';
            header('Location: ../index.php');
        }else{
            $select_sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($connection, $select_sql);

            $row = mysqli_num_rows($result);
            $user_info = mysqli_fetch_assoc($result);

            if($row == 1){
                $_SESSION['success'] = 'User logged in successfully';
                $_SESSION['email'] = $user_info['email'];
                $_SESSION['name'] = $user_info['name'];
                header('Location: ../dashboard.php');
            }else{
                $_SESSION['error'] = 'Invalid email or password';
                header('Location: ../index.php');
            }
        }
    }
}



?>