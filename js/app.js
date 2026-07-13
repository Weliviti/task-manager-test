// JavaScript for search filter and delete confirm

//function to search tasks
function searchTasks() {
    //get the search input
    var input = document.getElementById('searchInput');
    //convert to lowercase so search is not case sensitive
    var keyword = input.value.toLowerCase();
    //get all the rows in the table
    var rows = document.querySelectorAll('.task-row');

    //loop through each row
    for (var i = 0; i < rows.length; i++) {
        var title = rows[i].querySelector('.task-title');
        if (title) {
            var text = title.textContent.toLowerCase();
            //if the title contains the keyword show the row, else hide it
            if (text.indexOf(keyword) > -1) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }
}

//function to confirm before deleting
function confirmDelete() {
    return confirm('Are you sure you want to delete this task?');
}

// dark mode toggle
function toggleDarkMode() {
    var body = document.body;
    body.classList.toggle('dark-mode');

    var btn = document.getElementById('darkToggle');
    if (body.classList.contains('dark-mode')) {
        btn.innerHTML = 'Light';
        localStorage.setItem('darkMode', 'on');
    } else {
        btn.innerHTML = 'Dark';
        localStorage.setItem('darkMode', 'off');
    }
}

// apply saved dark mode on page load
(function() {
    if (localStorage.getItem('darkMode') === 'on') {
        document.body.classList.add('dark-mode');
        var btn = document.getElementById('darkToggle');
        if (btn) btn.innerHTML = 'Light';
    }
})();
