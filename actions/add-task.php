<?php
// including the database connection
include '../includes/db.php';

// getting the data from the form
$title = $_POST['title'];
$description = $_POST['description'];
$priority = $_POST['priority'];

// check if title is empty
if (empty($title)) {
    header('Location: ../index.php?msg=Title is required');
    exit;
}
// check if title is atleast 3 characters long
if (strlen($title) < 3) {
    header('Location: ../index.php?msg=Title must be at least 3 characters');
    exit;
}

// this will prevent sql injection attacks
$title = mysqli_real_escape_string($conn, $title);
$description = mysqli_real_escape_string($conn, $description);
$priority = mysqli_real_escape_string($conn, $priority);

// this query will insert the task into the database
$sql = "INSERT INTO tasks (title, description, priority) 
        VALUES ('$title', '$description', '$priority')";

// if the query works it will redirect with success message
if (mysqli_query($conn, $sql)) {
    header('Location: ../index.php?msg=Task added successfully!');
} else {
    //if query fails show error
    header('Location: ../index.php?msg=Error: ' . mysqli_error($conn));
}
?>
