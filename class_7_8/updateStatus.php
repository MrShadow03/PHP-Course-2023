<?php
include 'helper/session.php';
include 'helper/db.php';
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
}

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    $status = $status == true ? 0 : 1;

    $sql = "UPDATE `users` SET `status` = '$status' WHERE `id` = '$id'";
    $result = mysqli_query($connection, $sql);

    $_SESSION['message'] = "Status Updated Successfully";
    header('Location: dashboard.php');
}else{
    $_SESSION['message'] = "Invalid Request";
    header('Location: dashboard.php');
}

?>