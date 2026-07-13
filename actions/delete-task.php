<?php
// Delete task from database

//include database connection file
include '../includes/db.php';

//getting the id from the url
$id = $_GET['id'];

//this query will delete the task from the database
$sql = "DELETE FROM tasks WHERE id = $id";

//if it works it will redirect with a message
if (mysqli_query($conn, $sql)) {
    header('Location: ../index.php?msg=Task deleted!');
} else {
    //if it fails show error
    header('Location: ../index.php?msg=Delete failed');
}

?>
