<!DOCTYPE html>
<html>
 
<!-- head section -->
    <head>
        <title>Task Manager</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <!-- body section -->
    <body>

        <!-- header section -->
        <div class="header">
            <h1>Task Manager</h1>
        </div>
        
        <!-- container for everything -->
        <div class="container">

        <!-- show message if redirected from an action -->
        <?php
        if (isset($_GET['msg'])) {
            echo '<div class="msg">' . htmlspecialchars($_GET['msg'], ENT_QUOTES, 'UTF-8') . '</div>';
        }
        ?>

        <!-- add new task form -->
        <div class="card">
            <h2>Add New Task</h2>
            <!-- form uses post method for security -->
            <form method="POST" action="actions/add-task.php" onsubmit="return validateForm()">
                <label>Task Title *</label>
                <input type="text" name="title" id="title" placeholder="Enter task title">

                <label>Description</label>
                <textarea name="description" placeholder="Optional description"></textarea>

                <label>Priority</label>
                <select name="priority">
                    <option value="Low">Low</option>
                    <option value="Medium" selected>Medium</option>
                    <option value="High">High</option>
                </select>

                <button type="submit" class="btn btn-blue">Add Task</button>
            </form>
        </div>

        <!-- all tasks section -->
        <div class="card">
            <h2>All Tasks</h2>

            <!-- search bar for filtering tasks -->
            <div class="search-box">
                <input type="text" id="searchInput" onkeyup="searchTasks()" placeholder="Search by title...">
            </div>

                <?php
                    // connect to database
                    include 'includes/db.php';
                    // get all tasks newest first
                    $result = mysqli_query($conn, "SELECT * FROM tasks ORDER BY created_at DESC");
                    // check if there are tasks
                    if (mysqli_num_rows($result) > 0) {
                        echo '<table>';
                        echo '<tr>
                                <th>Title</th>
                                <th>Desc</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>';

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr class="task-row">';
                            echo '<td class="task-title">' . $row['title'] . '</td>';
                            echo '<td>' . ($row['description'] ? $row['description'] : '-') . '</td>';
                            echo '<td class="' . strtolower($row['priority']) . '">' . $row['priority'] . '</td>';
                            echo '<td>' . $row['status'] . '</td>';
                            echo '<td>
                                    <a href="actions/delete-task.php?id=' . $row['id'] . '" class="btn btn-red" onclick="return confirmDelete()">Delete</a>
                                  </td>';
                            echo '</tr>';
                        }

                        echo '</table>';
                    } else {
                        // no tasks found
                        echo '<p style="text-align:center;color:#999;padding:20px;">No tasks yet. Add one above!</p>';
                    }
                    // close the connection
                    mysqli_close($conn);
                ?>
        </div>

        </div>

        <!-- link to javascript file -->
        <script src="js/app.js"></script>

        <!-- form validation -->
        <script>
        function validateForm() {
            var title = document.getElementById('title').value.trim();
            if (title == '') {
                alert('Title is required');
                return false;
            }
            if (title.length < 3) {
                alert('Title must be at least 3 characters');
                return false;
            }
            return true;
        }
        </script>

    </body>
</html>
