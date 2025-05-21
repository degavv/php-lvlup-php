CREATE DATABASE IF NOT EXISTS project1905;

USE project1905;

CREATE TABLE IF NOT EXISTS positions (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS branches (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(150) NOT NULL UNIQUE,
    employee_id INT UNSIGNED NULL COMMENT 'Director',
    street VARCHAR(100) NOT NULL,
    city VARCHAR(40) NOT NULL,
    region VARCHAR(40) NOT NULL
);

CREATE TABLE IF NOT EXISTS employees (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    passport VARCHAR(9) NOT NULL UNIQUE,
    tax_number VARCHAR(10) NOT NULL UNIQUE,
    position_id INT UNSIGNED NOT NULL,
    branch_id INT UNSIGNED NOT NULL,
    FOREIGN KEY (position_id) REFERENCES positions (id),
    FOREIGN KEY (branch_id) REFERENCES branches (id)
);

ALTER TABLE branches
ADD FOREIGN KEY (employee_id) REFERENCES employees (id) ON UPDATE CASCADE ON DELETE SET NULL;

INSERT INTO positions (name) VALUES ('Директор'), ('Працівник');

INSERT INTO
    branches (name, street, city, region)
VALUES (
        'Oracle Corporation Dnipro',
        'проспект Дмитра Яворницького, 62',
        'Дніпро',
        'Дніпропетровська'
    ),
    (
        'Oracle Corporation Kyiv',
        'вулиця Хрещатик, 22',
        'Київ',
        'Київська'
    ),
    (
        'Oracle Corporation Lviv',
        'вулиця Словацького, 1',
        'Львів',
        'Львівська'
    ),
    (
        'Oracle Corporation Kharkiv',
        'площа Привокзальна, 2',
        'Харків',
        'Харківська'
    );

INSERT INTO
    employees (
        name,
        surname,
        passport,
        tax_number,
        position_id,
        branch_id
    )
VALUES (
        'Бред',
        'Пітт',
        'МЕ403203',
        '3234028641',
        1,
        1
    ),
    (
        'Антоніо',
        'Бандерос',
        'МЕ303526',
        '0923145184',
        1,
        2
    ),
    (
        'Шон',
        'Пен',
        '209534932',
        '2947305827',
        1,
        3
    ),
    (
        'Памела',
        'Андерсон',
        '846294028',
        '3948204758',
        1,
        4
    ),
    (
        'Річард',
        'Гір',
        'МЕ439350',
        '2394018732',
        2,
        4
    );

UPDATE branches SET employee_id = 1 WHERE id = 1;

UPDATE branches SET employee_id = 2 WHERE id = 2;

UPDATE branches SET employee_id = 3 WHERE id = 3;

UPDATE branches SET employee_id = 4 WHERE id = 4;