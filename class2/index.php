<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login - Home</title>
    <style>
        body {
            background-color: #f1f1f1;
        }
        form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            text-align: center;
        }
        .input-error {
            color: red;
            font-size: 12px;
        }
        input {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: 0;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <form action="./controller/LoginController.php" method="POST">
        <h1 class="form-title">Login</h1>
        <input type="text" name="username" placeholder="Username">
        <!-- show error from session -->
        <?php
        //start session
        if(isset($_SESSION['error'])){
            echo "<p class='input-error'>{$_SESSION['error']}</p>";
            //unset session
            unset($_SESSION['error']);
        }
        ?>
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>