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
            text-align: center;
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
    <form action="./controller/LoginController.php" method="POST" enctype="multipart/form-data">
        <h1 class="form-title">Sign Up</h1>
        <?php if(isset($_SESSION['error'])){ ?>
        <p class="input-error"><?php echo $_SESSION['error'] ?></p>
        <?php 
        }
        unset($_SESSION['error']);
        ?>
        <input type="text" name="first_name" placeholder="first_name">
        <input type="text" name="last_name" placeholder="last_name">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="password" name="confirm_password" placeholder="Re-type password">

        <input type="file" name="photo">
        <input type="submit" name="sign_up" value="sign up">
    </form>
</body>
</html>