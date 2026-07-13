Mini Task Management System

A simple PHP task manager - Add, View, Delete, and Search tasks.

How to Setup

//1. Start MySQL and Apache


```bash
sudo systemctl start mysql
sudo systemctl start apache2
```

//2. Create the database
```bash
sudo mysql -u root
```

Then paste this inside MySQL:
```sql
CREATE DATABASE intern_task_system;
USE intern_task_system;
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    priority ENUM('Low','Medium','High') DEFAULT 'Medium',
    status ENUM('Pending','Completed') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
EXIT;
```

//3. Move project to the right folder to get the code 
```bash
sudo cp -r "/home/walivitigoda/Desktop/Weblock code" /var/www/html/
```

//4. Open in browser
```
http://localhost/Weblock%20code/
```

