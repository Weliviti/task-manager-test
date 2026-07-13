<?php
// Delete task from database

//include database connection file
include '../includes/db.php';

//getting the id from the url and convert to integer (prevents SQL injection)
$id = (int)$_GET['id'];

//prepared statement to safely delete
$stmt = mysqli_prepare($conn, "DELETE FROM tasks WHERE id = ?");
mysqli_stmt_bind_param($stmt, 'i', $id);

//if it works it will redirect with a message
if (mysqli_stmt_execute($stmt)) {
    header('Location: ../index.php?msg=Task deleted!');
} else {
    //if it fails show error
    header('Location: ../index.php?msg=Delete failed');
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
