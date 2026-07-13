<?php
// including the database connection and helpers
include '../includes/db.php';
include '../includes/functions.php';

// getting the data from the form
$title = $_POST['title'];
$description = $_POST['description'];
$priority = $_POST['priority'];

// check if title is empty
if (empty($title)) {
    redirect_with_msg('../index.php', 'Title is required');
}
// check if title is atleast 3 characters long
if (strlen($title) < 3) {
    redirect_with_msg('../index.php', 'Title must be at least 3 characters');
}

// using prepared statement for safety (prevents SQL injection)
$stmt = mysqli_prepare($conn, "INSERT INTO tasks (title, description, priority) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, 'sss', $title, $description, $priority);

// if the query works it will redirect with success message
if (mysqli_stmt_execute($stmt)) {
    redirect_with_msg('../index.php', 'Task added successfully!');
} else {
    //if query fails show error
    redirect_with_msg('../index.php', 'Error: ' . mysqli_error($conn));
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
