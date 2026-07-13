# Mini Task Management System

this is a simple php task manager for the intern practical test.

## how to setup

1. start apache and mysql
```bash
sudo systemctl start mysql
sudo systemctl start apache2
```

2. go to mysql and create the database
```bash
sudo mysql -u root
```
then copy paste this inside mysql:
```sql
CREATE DATABASE intern_task_system;
USE intern_task_system;

-- create the table
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    priority ENUM('Low','Medium','High') DEFAULT 'Medium',
    status ENUM('Pending','Completed') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- create a user for php to connect
CREATE USER IF NOT EXISTS 'phpuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON intern_task_system.* TO 'phpuser'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

3. copy the folder to the web directory
```bash
sudo cp -r "/home/walivitigoda/Desktop/Weblock code" /var/www/html/
```

4. open in browser
```
http://localhost/Weblock%20code/
```

## the folder structure

```
Weblock code/
├── css/style.css
├── js/app.js
├── includes/db.php
├── actions/
│   ├── add-task.php
│   └── delete-task.php
├── index.php
├── database.sql
└── README.md
```
