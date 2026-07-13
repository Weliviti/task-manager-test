// Simple JavaScript for search and delete confirm

function searchTasks() {
    //variables to get the input value and 
    var input = document.getElementById('searchInput');
    //variable to get the value of the input and convert it to lowercase for case-insensitive search
    var keyword = input.value.toLowerCase();
    //variabl to get all the rows of the table
    var rows = document.querySelectorAll('.task-row');

    //this is a loop to get each row and check if the title of the task contains the keyword
    for (var i = 0; i < rows.length; i++) {
        var title = rows[i].querySelector('.task-title');
        if (title) {
            var text = title.textContent.toLowerCase();
            if (text.indexOf(keyword) > -1) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }
}

function confirmDelete() {
    return confirm('Are you sure you want t delete the taskk?');    
}
