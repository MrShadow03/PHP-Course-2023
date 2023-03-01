<?php 
include '../helper/session.php';
include '../helper/db.php';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $address = $_POST['address'];

    //check if all fields are filled, if not, redirect to register page with error message in session
    if(empty($id)){
        $_SESSION['error'] = 'Something went wrong!';
        header('Location: ../dashboard.php');
    }

    if(empty($name) || empty($email) || empty($age) || empty($address)){
        $_SESSION['error'] = 'All fields are required';
        header('Location: ../index.php');
    }else{
        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            $_SESSION['error'] = 'Invalid email';
            header('Location: ../index.php');
        }else{

                $sql = "UPDATE users SET name = '$name', email = '$email', age = '$age', address = '$address' WHERE id = '$id'";
                
                mysqli_query($connection, $sql);
                
                $_SESSION['success'] = 'User registered successfully';
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                
                header('Location: ../dashboard.php');
        }
    }
}

?>