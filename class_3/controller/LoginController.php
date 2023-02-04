<?php
session_start();

if(isset($_POST['sign_up'])){
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);
    

    //Check if all fields are given
    if(empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)){
        $_SESSION['error'] = "All fields are required";
        header('Location:../index.php');
    }else{
        //check if the email is valid
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['error'] = "Invalid Email";
            header('Location:../index.php');

        }else{
            if(strlen($password) < 6){
                $_SESSION['error'] = "Password is too Short";
                header('Location:../index.php');
            }else{

                if($password != $confirm_password){
                    $_SESSION['error'] = "Passwords doesn't match";
                    header('Location:../index.php');
                }else{
                    if(empty($_FILES['photo']['name'])){
                        $_SESSION['error'] = "Please Upload a Photo!";
                        header('Location:../index.php');
                    }else{
                        // echo "<pre>";
                        // print_r($_FILES['photo']);
                        // echo "</pre>";

                        $photo_name = $_FILES['photo']['name'];
                        $photo_tmp_name = $_FILES['photo']['tmp_name'];
                        $photo_size = $_FILES['photo']['size'];
                        $destination = '../storage/'.$photo_name;

                        $move = move_uploaded_file($photo_tmp_name, $destination);

                        if($move){
                            echo "<p>file Uploaded Successfully!</p>";
                        }

                    }
                }
            }

        }
    }









}












?>