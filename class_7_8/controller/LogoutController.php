<?php 
include '../helper/session.php';
include '../helper/db.php';

session_destroy();
header('Location: ../index.php');


?>