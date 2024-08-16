-- Ensure the database exists
CREATE DATABASE IF NOT EXISTS `leetcode-175-combine-two-tables`;

-- Use the database
USE `leetcode-175-combine-two-tables`;



CREATE TABLE Person (
    personId INT PRIMARY KEY,
    lastName VARCHAR(255),
    firstName VARCHAR(255)
);

CREATE TABLE Address (
    addressId INT PRIMARY KEY,
    personId INT,
    city VARCHAR(255),
    state VARCHAR(255),
    FOREIGN KEY (personId) REFERENCES Person(personId)
);



-- Insert data into Person table
INSERT INTO Person (personId, lastName, firstName) VALUES (1, 'Wang', 'Allen');
INSERT INTO Person (personId, lastName, firstName) VALUES (2, 'Alice', 'Bob');
INSERT INTO Person (personId, lastName, firstName) VALUES (3, 'Smith', 'Charlie'); -- Adding personId = 3

-- Insert data into Address table
INSERT INTO Address (addressId, personId, city, state) VALUES (1, 2, 'New York City', 'New York');
INSERT INTO Address (addressId, personId, city, state) VALUES (2, 3, 'Leetcode', 'California'); -- personId = 3 now exists
