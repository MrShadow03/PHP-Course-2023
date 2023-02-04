<?php 
session_start();

if(!isset($_SESSION['username'])){
    header('Location:./index.php');
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #f1f1f1;
        }
        nav {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            display: inline-block;
            margin-right: 10px;
        }
        nav ul li a {
            text-decoration: none;
            color: #333;
        }
        nav ul li a:hover {
            color: #555;
        }
        .user-profile {
            text-align: right;
        }
        .user-profile span {
            color: #333;
        }
    </style>
</head>
<body>
    <!-- dashboard with simple navbar -->
    <nav>
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./dashboard.php">Dashboard</a></li>
            <li><a href="./controller/LogoutController.php">Logout</a></li>
        </ul>
        <div class="user-profile">
            <p>Welcome, <span><?php  echo isset($_SESSION['username']) ?  ($_SESSION['username']) : 'Guest' ?></span></p>
        </div>
    </nav>
</body>
</html>