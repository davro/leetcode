-- Ensure the database exists
CREATE DATABASE IF NOT EXISTS `leetcode-database`;

-- Use the database
USE `leetcode-database`;



CREATE TABLE Testing (
    testId INT PRIMARY KEY,
    testing1 VARCHAR(255),
    testing2 VARCHAR(255)
);


-- Insert data into Person table
INSERT INTO Testing (testId, testing1, testing2) VALUES (1, 'Testing One', 'Testing Two');
INSERT INTO Testing (testId, testing1, testing2) VALUES (2, 'Testing One', 'Testing Two');

