CREATE DATABASE bank_db;
USE bank_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
);

INSERT INTO users (username, email) VALUES ('admin', 'admin@vuln_bank.com');