<?php
include 'helper/session.php';
include 'helper/db.php';
if(!isset($_SESSION['email'])){
    header('Location: index.php');
}
//getting the id from the url
$id = $_GET['id'];

//getting the user info from the database
$sql = "SELECT * FROM users WHERE id = '$id'";
$query = mysqli_query($connection, $sql);
$user_info = mysqli_fetch_assoc($query);
?>
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
    <h1 class="form_title">Edit <?php echo $user_info['name'] ?>'s Information</h1>
    <form action="../controller/UpdateController.php" method="post">
        <p class="input-error">
            <?php 
                if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
             ?>
        </p>
        <input type="hidden" name="id" value="<?php echo $user_info['id'] ?>" >
        <input type="text" name="name" placeholder="Name" value="<?php echo $user_info['name'] ?>" >
        <input type="email" name="email" placeholder="Email" value="<?php echo $user_info['email'] ?>" >
        <input type="number" name="age" placeholder="Age" value="<?php echo $user_info['age'] ?>" >
        <input type="text" name="address" placeholder="Address" value="<?php echo $user_info['address'] ?>" >
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>