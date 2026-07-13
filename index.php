<!DOCTYPE html>
<html>
 
//this is the head section of the html file
    <head>
        <title>Task Manager</title>
        <link rel="stylesheet" href="css/style.css">
    </head>


    //this is the body section of the html file
    <body>

        // this is the header section of the html file
        <div class="header">
            <h1>Task Manager</h1>
        </div>
        
        //a class for the container of the html file
        <div class="container">

        //this is the php code for showing the message if redirected from an action
        <?php
        if (isset($_GET['msg'])) {
            echo '<div class="msg">' . $_GET['msg'] . '</div>';
        }
        ?>

        //this is the add new task hear 
        <div class="card">
            <h2>Add New Task</h2>
            //a form is created hear and it uses post method for sending data
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

        //this is for all the tasks
        <div class="card">
            <h2>All Tasks</h2>

            //search bar for findng tasks
            <div class="search-box">
                <input type="text" id="searchInput" onkeyup="searchTasks()" placeholder="Search by title...">
            </div>

                <?php
                    //conectin to database
                    include 'includes/db.php';
                    //get all tasks from the database
                    $result = mysqli_query($conn, "SELECT * FROM tasks ORDER BY created_at DESC");
                    //check if there is any tasks in the database
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
                        //if no tasks found this will show
                        echo '<p style="text-align:center;color:#999;padding:20px;">No tasks yet. Add one above!</p>';
                    }
                    //close the database connection
                    mysqli_close($conn);
                ?>
        </div>

        </div>
        //linking the javascript file
        <script src="js/app.js"></script>
        //validation for the form using javascript
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
