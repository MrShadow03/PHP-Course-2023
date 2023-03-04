<?php 
session_start();
if(isset($_SESSION['email'])){
    header('Location: dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        form{
            width: 300px;
            margin: 0 auto;
        }
        input{
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
        }
        .input-error{
            color: red;
            font-size: 14px;
        }
        .form_title{
            text-align: center;
            color: #000;
            font-size: 30px;
            font-weight: 700;
        }
        .form_subtitle{
            text-align: center;
            color: #000;
            font-size: 20px;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <form action="controller/LoginController.php" method="post">
        <h1 class="form_title">Login Form</h1>
        <h1 class="form_subtitle">Provide email and password to Login</h1>
        <p class="input_error">
            <?php 
                if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
             ?>
        </p>
        <input type="text" name="email" placeholder="email">
        <p class="input_error">
            <?php 
                if(isset($_SESSION['email_error'])){
                    echo $_SESSION['email_error'];
                    unset($_SESSION['email_error']);
                }
             ?>
        </p>
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>