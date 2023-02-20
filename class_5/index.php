<?php
include 'helper/session.php';
include 'helper/db.php';
?>

<!-- html user form with name, email and password -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Register</title>
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
    </style>
</head>
<body>
    <form action="controller/RegisterController.php" method="post">
        <p class="input-error">
            <?php 
                if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
             ?>
        </p>
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register">
    </form>
</body>
</html>
