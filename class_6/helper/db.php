<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'my_app';

$connection = new mysqli($host, $username, $password, $db);

//check connection
if($connection->connect_error){
    die('Connection failed');
}