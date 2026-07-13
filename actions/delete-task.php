<?php
// Delete task

//this line does the include of the db.php file which is in the includes folder
include '../includes/db.php';

//this variable gets the id of the task from the url parameter
$id = $_GET['id'];

//this variable is used to delete the task from the database given the id 
$sql = "DELETE FROM tasks WHERE id = $id";

//this if statement checks if the query was successful and redirects to the index.php page with a message
if (mysqli_query($conn, $sql)) {
    header('Location: ../index.php?msg=Task deleted!');
} else {
    header('Location: ../index.php?msg=Delete failed');
}

?>
