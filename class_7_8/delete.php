<?php
include 'helper/session.php';
include 'helper/db.php';
if(!isset($_SESSION['email'])){
    header('Location: index.php');
}

//getting the id from the url
$id = $_GET['id'];

//getting the user info from the database
$sql = "DELETE FROM users WHERE id = '$id'";

$query = mysqli_query($connection, $sql);

//if the user is deleted successfully, redirect to dashboard
header('Location: ../dashboard.php');

?>