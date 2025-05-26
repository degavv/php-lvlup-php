CREATE DATABASE IF NOT EXISTS school;

USE school;

CREATE TABLE
    IF NOT EXISTS teachers (
        id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        second_name VARCHAR(100) NOT NULL,
        phones VARCHAR(100) NOT NULL
    );

CREATE TABLE
    IF NOT EXISTS `groups` (
        id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) UNIQUE NOT NULL,
        teacher_id TINYINT UNSIGNED NOT NULL,
        chat VARCHAR(255) UNIQUE,
        FOREIGN KEY (teacher_id) REFERENCES teachers (id)
    );

CREATE TABLE
    IF NOT EXISTS students (
        id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        second_name VARCHAR(100) NOT NULL,
        phone VARCHAR(15) NOT NULL
    );

CREATE TABLE
    IF NOT EXISTS students_groups (
        id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        student_id INT UNSIGNED NOT NULL,
        group_id INT UNSIGNED NOT NULL,
        FOREIGN KEY (student_id) REFERENCES students (id) ON UPDATE CASCADE ON DELETE CASCADE,
        FOREIGN KEY (group_id) REFERENCES `groups` (id) ON UPDATE CASCADE ON DELETE CASCADE
    );

INSERT INTO
    teachers (name, second_name, phones)
VALUES
    ('Бред', 'Пітт', '+380671234567,+380967654321'),
    ('Антоніо', 'Бандерос', '+380932456398'),
    ('Шон', 'Пен', '+380502536569,+380502536568');

INSERT INTO
    students (name, second_name, phone)
VALUES
    ('Тарас', 'Шевченко', '+380953298641'),
    ('Річард', 'Гір', '+380675698521'),
    ('Памела', 'Андерсон', '+919820865612'),
    ('Джорж', 'Клуні', '+380635698528'),
    ('Меган', 'Фокс', '+380631492904'),
    ('Том', 'Круз', '+380978549625');

INSERT INTO
    `groups` (name, teacher_id, chat)
VALUES
    ('Основи програмування', 1, 'url://example.com'),
    ('Fullstack JavaScript', 2, 'url://example2.com'),
    ('Програмування PHP', 2, 'url://example3.com'),
    ('Програмування PYTHON', 3, 'url://example4.com'),
    ('Програмування Java', 1, 'url://example5.com');

INSERT INTO
    students_groups (student_id, group_id)
VALUES
    ('1', '5'),
    ('2', '4'),
    ('3', '5'),
    ('4', '3'),
    ('5', '1'),
    ('6', '2');

-- Ім’я прізвище студента та назва групи в якій навчається
SELECT
    students.name,
    students.second_name,
    `groups`.name
FROM
    students,
    students_groups,
    `groups`
WHERE
    students.id = students_groups.student_id
    AND students_groups.group_id = `groups`.id;

-- вибрати ім’я прізвище викладача та назву групи в якій викладає
SELECT
    teachers.name,
    teachers.second_name,
    `groups`.name
FROM
    teachers,
    `groups`
WHERE
    teachers.id = `groups`.teacher_id;

-- вибрати назви груп в яких навчається студент з прізвищем Шевченко
SELECT
    `groups`.name
FROM
    students,
    students_groups,
    `groups`
WHERE
    students.second_name = 'Шевченко'
    AND students.id = students_groups.student_id
    AND students_groups.group_id = `groups`.id;

-- вибрати ім’я прізвище студента та прізвище викладача, який цього студента навчає
SELECT
    students.name,
    students.second_name,
    teachers.second_name
FROM
    students,
    teachers,
    `groups`,
    students_groups
WHERE
    students.id = students_groups.student_id
    AND students_groups.group_id = `groups`.id
    AND `groups`.teacher_id = teachers.id