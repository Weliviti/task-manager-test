<?php
include '../includes/db.php';

// Get form data
$title = $_POST['title'];
$description = $_POST['description'];
$priority = $_POST['priority'];

// Simple validation
if (empty($title)) {
    header('Location: ../index.php?msg=Title is required');
    exit;
}

if (strlen($title) < 3) {
    header('Location: ../index.php?msg=Title must be at least 3 characters');
    exit;
}

// Prevent SQL injection
$title = mysqli_real_escape_string($conn, $title);
$description = mysqli_real_escape_string($conn, $description);
$priority = mysqli_real_escape_string($conn, $priority);

// Insert into database
$sql = "INSERT INTO tasks (title, description, priority) 
        VALUES ('$title', '$description', '$priority')";

if (mysqli_query($conn, $sql)) {
    header('Location: ../index.php?msg=Task added successfully!');
} else {
    header('Location: ../index.php?msg=Error: ' . mysqli_error($conn));
}
?>
