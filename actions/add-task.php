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

// using prepared statement for safety (prevents SQL injection)
$stmt = mysqli_prepare($conn, "INSERT INTO tasks (title, description, priority) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, 'sss', $title, $description, $priority);

// if the query works it will redirect with success message
if (mysqli_stmt_execute($stmt)) {
    header('Location: ../index.php?msg=Task added successfully!');
} else {
    //if query fails show error
    header('Location: ../index.php?msg=Error: ' . mysqli_error($conn));
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
