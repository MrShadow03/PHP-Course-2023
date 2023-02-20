<?php
include 'helper/session.php';
include 'helper/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<style>
    nav{
        width: 100%;
        background-color: #333;
        color: #fff;
        padding: 10px;
    }
    nav ul{
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: space-between;
    }
    nav ul li{
        margin: 0 10px;
    }
    nav ul li a{
        color: #fff;
        text-decoration: none;
    }
</style>
<body>
    <!-- user dashboard with username, logout button and link to profile page -->
    <nav>
        <ul>
            <li>Welcome, <?php echo $_SESSION['name']; ?></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="controller/LogoutController.php">Logout</a></li>
        </ul>
    </nav>

</body>
</html>