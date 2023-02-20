<?php 
include '../helper/session.php';
include '../helper/db.php';

if(isset($_SESSION['name'])){
    session_destroy();
    header('Location: ../index.php');
}


?>