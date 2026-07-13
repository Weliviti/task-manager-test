<?php
// Database connection file

//database details
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'intern_task_system';

//create connection
$conn = mysqli_connect($host, $user, $pass, $dbname);

//check if connection works
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
