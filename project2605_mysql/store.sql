CREATE DATABASE IF NOT EXISTS store;

USE store;

CREATE TABLE
    IF NOT EXISTS categories (
        id SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL UNIQUE
    );

CREATE TABLE
    IF NOT EXISTS vendors (
        id MEDIUMINT UNSIGNED PRIMARY KEY,
        name VARCHAR(255) NOT NULL UNIQUE
    );

CREATE TABLE
    IF NOT EXISTS categories (
        id SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL UNIQUE
    );

CREATE TABLE
    IF NOT EXISTS orders (
        id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        number VARCHAR(14) NOT NULL,
        first_name VARCHAR(50) NOT NULL,
        second_name VARCHAR(50) NOT NULL,
        phone VARCHAR(11)
    );

CREATE TABLE
    IF NOT EXISTS statuses (
        id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL UNIQUE
    );

CREATE TABLE
    IF NOT EXISTS products (
        id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        description TEXT NOT NULL,
        article VARCHAR(9) NOT NULL UNIQUE,
        vendor_id MEDIUMINT UNSIGNED,
        FOREIGN KEY (vendor_id) REFERENCES vendors (id)
    );

CREATE TABLE
    IF NOT EXISTS evaluations (
        id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        score TINYINT UNSIGNED NOT NULL,
        product_id INT UNSIGNED NOT NULL,
        FOREIGN KEY (product_id) REFERENCES products (id)
    );

CREATE TABLE
    IF NOT EXISTS products_categories (
        id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        product_id INT UNSIGNED NOT NULL,
        category_id SMALLINT UNSIGNED NOT NULL,
        FOREIGN KEY (product_id) REFERENCES products (id),
        FOREIGN KEY (category_id) REFERENCES categories (id)
    );

CREATE TABLE
    IF NOT EXISTS orders_products (
        id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        order_id INT UNSIGNED NOT NULL,
        product_id INT UNSIGNED NOT NULL,
        product_quantity SMALLINT UNSIGNED NOT NULL,
        FOREIGN KEY (order_id) REFERENCES orders (id),
        FOREIGN KEY (product_id) REFERENCES products (id)
    );

CREATE TABLE
    IF NOT EXISTS orders_statuses (
        id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        order_id INT UNSIGNED NOT NULL,
        status_id TINYINT UNSIGNED NOT NULL,
        date TIMESTAMP NOT NULL,
        FOREIGN KEY (order_id) REFERENCES orders (id),
        FOREIGN KEY (status_id) REFERENCES statuses (id)
    );
