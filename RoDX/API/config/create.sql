-- Create database
CREATE DATABASE IF NOT EXISTS API;

-- Create user with privileges for API database
CREATE IF NOT EXISTS USER 'root'@'localhost' IDENTIFIED BY '';
GRANT ALL PRIVILEGES ON test.* TO 'root'@'localhost';
FLUSH PRIVILEGES;

-- Switch to "API" database
USE API;

-- Create users table
CREATE TABLE IF NOT EXISTS data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    rows INT NOT NULL
);

-- Insert dummy data into users table
INSERT INTO data (name, rows) VALUES
('2022_urgente_medicale', 33),
('2022_confiscari',23);