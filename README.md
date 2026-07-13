# Mini Task Management System

A simple task manager thing I made with PHP, MySQL, HTML, CSS and JS.
I built this for a full stack intern practical test.

## How to get it running on Ubuntu

So assuming you already have Apache, MySQL and PHP installed on your machine.

If you dont have them yet just run:

```bash
sudo apt update
sudo apt install apache2 mysql-server php php-mysqli -y
```

### 1. Extract the folder

If you downloaded the ZIP file, extract it somewhere like your Downloads folder.

### 2. Move it to the web folder

Open a terminal and run:

```bash
sudo cp -r /home/yourusername/Downloads/weblock-code /var/www/html/
```

Replace yourusername with your actual Ubuntu username.

### 3. Give proper permissions

```bash
sudo chown -R www-data:www-data /var/www/html/weblock-code
sudo chmod -R 755 /var/www/html/weblock-code
```

### 4. Start Apache and MySQL

```bash
sudo systemctl start apache2
sudo systemctl start mysql
```

To make them start automatically when you boot:

```bash
sudo systemctl enable apache2
sudo systemctl enable mysql
```

### 5. Create the database

Open MySQL:

```bash
sudo mysql -u root
```

Then paste these commands one by one:

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

CREATE USER IF NOT EXISTS 'phpuser'@'localhost' IDENTIFIED BY 'password';

GRANT ALL PRIVILEGES ON intern_task_system.* TO 'phpuser'@'localhost';

FLUSH PRIVILEGES;

EXIT;
```

Or if you want the easy way just run the SQL file thats already in the folder:

```bash
sudo mysql -u root < /var/www/html/weblock-code/database.sql
```

### 6. Open in browser

Open Firefox or whatever browser you use and type:

```
http://localhost/weblock-code/
```

If everything worked you should see the task manager page. Try adding a task and it should show up.

## Database config

Open includes/db.php if you need to change anything. Defaults are:

- Host: localhost
- Username: phpuser
- Password: password
- Database: intern_task_system

If your MySQL login is different just change the values in db.php.
