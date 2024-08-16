-- Ensure the database exists
CREATE DATABASE IF NOT EXISTS `leetcode-176-second-highest-salary`;

-- Use the database
USE `leetcode-176-second-highest-salary`;


-- Create the Employee table
CREATE TABLE Employee (
    id INT PRIMARY KEY,
    salary INT
);

-- Insert sample data into the Employee table
INSERT INTO Employee (id, salary) VALUES (1, 100);
INSERT INTO Employee (id, salary) VALUES (2, 200);
INSERT INTO Employee (id, salary) VALUES (3, 300);

