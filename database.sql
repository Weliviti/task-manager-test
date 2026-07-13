CREATE DATABASE IF NOT EXISTS intern_task_system;
USE intern_task_system;

CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    priority ENUM('Low', 'Medium', 'High') DEFAULT 'Medium',
    status ENUM('Pending', 'Completed') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE USER IF NOT EXISTS 'phpuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON intern_task_system.* TO 'phpuser'@'localhost';
FLUSH PRIVILEGES;
