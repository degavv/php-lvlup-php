CREATE DATABASE IF NOT EXISTS project2805;

USE project2805;

CREATE TABLE
    IF NOT EXISTS users (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        login VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE
    );

INSERT INTO
    users (login, password, email)
VALUES
    ('login_EX', 'password_EX', 'email_EX');