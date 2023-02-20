<?php 
include '../helper/session.php';
include '../helper/db.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //check if all fields are filled, if not, redirect to register page with error message in session
    if(empty($name) || empty($email) || empty($password)){
        $_SESSION['error'] = 'All fields are required';
        header('Location: ../index.php');
    }else{
        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            $_SESSION['error'] = 'Invalid email';
            header('Location: ../index.php');
        }else{
            if(strlen($password) < 6){
                $_SESSION['error'] = 'Password must be at least 6 characters';
                header('Location: ../index.php');
            }else{

                $insert_sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
                mysqli_query($connection, $insert_sql);

                
                $_SESSION['success'] = 'User registered successfully';
                $_SESSION['name'] = $name;
                header('Location: ../dashboard.php');
            }
        }
    }
}

?>