<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "todo";

// Create connection
$connection = new mysqli($host, $username, $password, $dbname);

// Check connection
if($connection->connect_error){
    die('Connection Failed: ');
}

//echo "Connected Successfully";









?>