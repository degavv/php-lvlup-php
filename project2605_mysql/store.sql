CREATE DATABASE IF NOT EXISTS store;

USE store;

CREATE TABLE
    IF NOT EXISTS categories (
        id SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL UNIQUE
    );

CREATE TABLE
    IF NOT EXISTS vendors (
        id MEDIUMINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL UNIQUE
    );

CREATE TABLE
    IF NOT EXISTS orders (
        id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        number VARCHAR(14) NOT NULL,
        first_name VARCHAR(50) NOT NULL,
        second_name VARCHAR(50) NOT NULL,
        phone VARCHAR(15)
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

INSERT INTO
    categories (name)
VALUES
    ('Мобільні телефони'),
    ('Смартфони'),
    ('Телефони Apple'),
    ('Телефони Samsung'),
    ('Телефони Xiaomi'),
    ('Телефони Siemens'),
    ('Телефони Nokia');

INSERT INTO
    vendors (name)
VALUES
    ('Apple'),
    ('Samsung'),
    ('Xiaomi'),
    ('Siemens');

INSERT INTO
    statuses (name)
VALUES
    ('Замовлення в обробці'),
    ('Замовлення прийняте'),
    ('Замовлення відправлене'),
    ('Замовлення отримано');

INSERT INTO
    products (name, price, description, article, vendor_id)
VALUES
    (
        'Мобільний телефон Apple iPhone 16 Pro Max 1TB Desert Titanium',
        83399,
        'Apple Intelligence
iPhone 16 Pro Max створено для Apple Intelligence, персональної інтелектуальної системи, яка допомагає вам писати, висловлюватись і виконувати завдання без зусиль. Завдяки революційному захисту конфіденційності ви можете бути впевнені, що ніхто інший не зможе отримати доступ до ваших даних — навіть Apple.',
        'U0961527',
        1
    ),
    (
        'Мобільний телефон Samsung Galaxy A16 LTE 8/256Gb Black (SM-A165FZKCEUC)',
        7599,
        'Чіткі кольори та деталі оживають на 6,7-дюймовому дисплеї
6,7-дюймовий екран Galaxy A16 надає вам більше простору для розваг. Зануртеся у вир улюбленого контенту завдяки яскравим кольорам і реалістичним деталям дисплея FHD+ Super AMOLED.Стильний тонкий дизайн
Додайте енергійності своєму образу завдяки тонкому та жвавому дизайну Galaxy A16. Доступний у чорному, світло-зеленому та сірому кольорах.',
        'U0893082',
        2
    ),
    (
        'Мобільний телефон Samsung Galaxy S24 5G 8/256Gb Marble Gray (SM-S921BZAGEUC)',
        32499,
        'Live Translate. Найпростіший спосіб спілкування
Скористайтеся функцією інтерактивного перекладу під час наступного телефонного виклику. Саме так! Технологія AI-перекладу допомагає спілкуватися незнайомою мовою навіть під час телефонних розмов. Щобільше, ця функція працює навіть для текстових повідомлень.Обведіть, щоб знайти. Усе – просто.
Зустрічайте нову еру пошуку з функцією Circle to Search. Просто обведіть об\'єкт, і відкриється сторінка з результатами пошуку Google. Це інноваційний інструмент для пошуку корисної інформації.',
        'U0893021',
        2
    ),
    (
        'Мобільний телефон Xiaomi 14T 12/512GB Titan Black (1079733)',
        21999,
        'З Xiaomi все можливо
Смартфон Xiaomi 14T, оснащений потужним 4 нм процесором Media Tek Dimensity 8300-Ultra, легко підтримує режим багатозадачності і справляється з будь-якими викликами. 6.67-дюймовий дисплей з частотою оновлення 144 Гц, широким кольоровим охопленням DCI-P3 та піковою яскравістю 4000 ніт радує насиченими кольорами та чіткими деталями. Основна камера з високочутливим модулем 50 Мп отримує чудові фото навіть за слабкого освітлення. Завдяки супер-швидкій зарядці потужністю 67 Вт поповнити заряд батареї можна прямо перед виходом з дому.',
        'U0966802',
        3
    ),
    (
        'Мобільний телефон Xiaomi Redmi 13 8/256GB Midnight Black (1054935)',
        6499,
        'Redmi: характер лідера
Оцініть потужну роботу, збільшений час автономної роботи, супер-чітке зображення на дисплеї та барвисті фотографії, зроблені навіть за слабкого освітлення – все це пропонує новий смартфон Redmi 13. Насолоджуйтесь плавним та реалістичним зображенням на 6.79-дюймовому імерсивному FHD+ дисплеї. Продуктивний процесор MediaTek Helio G91 Ultra дозволяє легко вирішувати будь-які завдання. Основна камера з роздільною здатністю 108 Мп допоможе зберегти всі пам\'ятні моменти у найдрібніших подробицях. Потужна батарея на 5030 мАг + швидка зарядка 33 Вт гарантують доступ до всіх функцій смартфона протягом всього дня.',
        'U0938559',
        3
    ),
    (
        'Мобільний телефон Apple iPhone 14 128GB Starlight (MPUR3)',
        25999,
        'Оновлена ​​легенда
Новий iPhone 14 зробив величезний прорив у фотографії при слабкому освітленні, отримав максимальний час автономної роботи і став ще надійнішим і швидшим. Вибирайте один з п\'яти фантастичних кольорів і поспішайте володіти досконалістю.',
        'U0699761',
        1
    ),
    (
        'Siemens M65',
        99999,
        'Siemens M65 - мобільний телефон фірми Siemens 2004 року випуску. Основною особливістю телефону є захищений корпус. Також в апараті були присутні два світлодіоди, що прийшли з Siemens M55, але за захисними вставками корпусу їх було погано видно.',
        'U1939492',
        4
    );

INSERT INTO
    products_categories (product_id, category_id)
VALUES
    (1, 1),
    (1, 2),
    (1, 3),
    (2, 1),
    (2, 2),
    (2, 4),
    (3, 1),
    (3, 2),
    (3, 4),
    (4, 1),
    (4, 2),
    (4, 5),
    (5, 1),
    (5, 2),
    (5, 5),
    (6, 1),
    (6, 2),
    (6, 3),
    (7, 1),
    (7, 6);

INSERT INTO
    evaluations (product_id, score)
VALUES
    (1, 1),
    (1, 2),
    (1, 3),
    (2, 4),
    (2, 1),
    (2, 5),
    (3, 4),
    (3, 3),
    (3, 3),
    (4, 3),
    (4, 5),
    (4, 4),
    (5, 4),
    (5, 3),
    (6, 3),
    (6, 4),
    (7, 5);

INSERT INTO
    orders (number, first_name, second_name, phone)
VALUES
    ('1747755912', 'Джорж', 'Клуні', '0673934953'),
    ('1747757623', 'Бред', 'Пітт', '0983284711'),
    ('1747757901', 'Том', 'Круз', '0639294014'),
    ('1747758123', 'Пенелопа', 'Круз', '0504050693'),
    ('1747759021', 'Стів', 'Тайлер', '0934853243');

INSERT INTO
    orders_products (order_id, product_id, product_quantity)
VALUES
    (1, 2, 1),
    (1, 3, 1),
    (2, 7, 4),
    (3, 1, 1),
    (3, 5, 1),
    (4, 3, 2),
    (5, 4, 10);

INSERT INTO
    orders_statuses (order_id, status_id, date)
VALUES
    (1, 1, FROM_UNIXTIME (1747755912)),
    (1, 2, FROM_UNIXTIME (1747767910)),
    (1, 3, FROM_UNIXTIME (1747765935)),
    (1, 4, FROM_UNIXTIME (1747759923)),
    (2, 1, FROM_UNIXTIME (1747757623)),
    (2, 2, FROM_UNIXTIME (1747786748)),
    (2, 3, FROM_UNIXTIME (1747788529)),
    (3, 1, FROM_UNIXTIME (1747757901)),
    (3, 2, FROM_UNIXTIME (1747762345)),
    (3, 3, FROM_UNIXTIME (1747776231)),
    (4, 1, FROM_UNIXTIME (1747758123)),
    (5, 1, FROM_UNIXTIME (1747759021));

-- Вибрати назву категорії, к-ть товарів в цій категорії та найменшу ціну в цій категорії.
SELECT
    categories.name AS category,
    COUNT(products_categories.product_id) AS quantity,
    MIN(products.price) AS min_price
FROM
    categories
    LEFT OUTER JOIN products_categories ON categories.id = products_categories.category_id
    LEFT OUTER JOIN products ON products_categories.product_id = products.id
GROUP BY
    categories.name;

-- Вибрати всі категорії в яких відсутні товари
SELECT
    categories.name AS category,
    COUNT(products_categories.product_id) AS quantity
FROM
    categories
    LEFT OUTER JOIN products_categories ON categories.id = products_categories.category_id
GROUP BY
    categories.name
HAVING
    quantity = 0;

-- Вибрати номер замовлення та загальну к-ть одиниць товару в цьому замовлені та загальну вартість замовлення.
SELECT
    orders.number AS number,
    SUM(orders_products.product_quantity) AS total_quantity,
    SUM(products.price * orders_products.product_quantity) AS order_cost
FROM
    orders
    INNER JOIN orders_products ON orders.id = orders_products.order_id
    INNER JOIN products ON orders_products.product_id = products.id
GROUP BY
    orders.id;

-- Вибрати назву товару, ціну і його середню оцінку та загальну к-ть оцінок для нього
SELECT
    products.name AS product,
    products.price AS price,
    AVG(evaluations.score) AS score,
    COUNT(evaluations.id) AS evaluations_quantity
FROM
    products
    LEFT OUTER JOIN evaluations ON evaluations.product_id = products.id
GROUP BY
    products.id;