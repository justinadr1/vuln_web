CREATE DATABASE vuln_db;
USE vuln_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    email VARCHAR(100),
    password VARCHAR(100)
);

INSERT INTO users (username, email, password) VALUES 
('admin', 'admin@vuln_db.com', 'FAHHH1!!');