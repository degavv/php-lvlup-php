CREATE DATABASE IF NOT EXISTS project2105;

USE project2105;

CREATE TABLE IF NOT EXISTS goods (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT NOT NULL
);

INSERT INTO
    goods (name, price, description)
VALUES (
        "Фарба акрилова водоемульсійна Sniezka Ultra Biel мат білий 14 кг",
        94.20,
        "Переваги фарби: не залишає смуг на поверхні; максимальна білизна; паропроникна, забезпечує «дихання» стін; стійка до стирання; відмінна покривна здатність – 2-й клас. Утворює сніжно-білі, матові, гладкі покриття з хорошою адгезією до основи, які дозволяють стінам «дихати». Рекомендована для фарбування нових основ і відновлення старих малярних покриттів. Застосування Фарба призначена для декоративного фарбування стін і стель із цементних, цементно-вапняних, вапняних, гіпсових, гіпсокартонних, дерев’яних і деревопохідних матеріалів усередині приміщень."
    ),
    (
        "Фарба латексна Totus Mattlatex Profi 14 кг Білий",
        490,
        "Фарба матова латексна TOTUS Mattlatex Profi - латексна матова фарба для внутрішніх робіт. Призначена для нанесення на поверхні з матеріалів : цегла, гіпс, бетон, штукатурка, фанера, дерево та плити з пиломатеріалів. Властивості фарби TOTUS Mattlatex Profi: Інтер'єрна - для фарбування стін та стель усередині приміщень Стійка до стирання - витримує не значні вологі прибирання та проміжні підфарбовування Висока адгезія до основ Екологічно безпечна - не забруднює навколишнє середовище."
    ),
    (
        "Фарба гумова Farbex Універсальна мат графіт 12 кг",
        628,
        "Призначена для нанесення на поверхні з матеріалів : цегла, гіпс, бетон, штукатурка, фанера, дерево та плити з пиломатеріалів. Властивості фарби TOTUS Mattlatex Profi: Інтер'єрна - для фарбування стін та стель усередині приміщень Стійка до стирання - витримує не значні вологі прибирання та проміжні підфарбовування Висока адгезія до основ Екологічно безпечна - не забруднює навколишнє середовище."
    ),
    (
        "Телевізор 32 дюйми JVC LT-32VHP255W (Smart TV Wi-Fi Bluetooth — W24-EA9391)",
        641,
        "
Мінімальні потертості на рамці та задній кришці 
Телевізор LT-32VHP255W від JVC вражає своїм екстравагантним дизайном і пропонує абсолютно нові можливості для перегляду телепередач. Компактний телевізор був спеціально розроблений таким чином, щоб його можна було легко змінювати місце використання - в дитячій кімнаті, в саду, в кемпінгу або під час подорожі. Smart TV пропонує безліч попередньо встановлених додатків, таких як Prime Video, Netflix, YouTube, Amazon Music або Twitch, для отримання яких достатньо лише одного підключення до домашньої мережі WiFi та відповідної підписки від провайдера. Крім того, ви можете безкоштовно тестувати пакет HD+ через супутник протягом 6 місяців."
    ),
    (
        "Телевізор 32 дюйми Panasonic TX-32GW324 (Triple Tuner HDMI USB — W24-GC3624)",
        832,
        "
Непомітна смітинка на екрані та мінімальні потертості на рамці й задній кришці
Panasonic TX-32GW324
надійний вибір для вашого дому!"
    ),
    (
        "Телевизор Android TV 42 дюйма Android T2 FULL HD USB/HDMI wi-fi",
        9990,
        "
Телевізор  42-дюймова модель з операційною системою Android TV, яка підтримує Full HD (1920×1080) роздільну здатність, цифрові ефірні та кабельні тюнери DVB-T2, а також має вбудовані порти USB і HDMI, Wi-Fi та Bluetooth.
    Основні характеристики
    Діагональ екрану: 42 дюйми
    Роздільна здатність: Full HD (1920×1080)
    Операційна система: Android TV
    Тюнери:
    DVB-T2 (цифровий ефірний HD)
    DVB-C (цифровий кабельний)
    Порти та роз'єми:
    2 × USB 2.0
    3 × HDMI
    Ethernet (RJ-45)
    Аудіо-вхід/вихід 3.5 мм
    Композитний AV-вхід
    Бездротові можливості:
    Wi-Fi
    Bluetooth"
    ),
    (
        "Проєктор Samsung The Freestyle 2nd-Gen White (SP-LFF3CLAXXUA) + Зовнішній акумулятор Samsung для проектора The Freestyle (VG-FBB3BA) у подарунок!",
        29999,
        "Автокорекція трапецеїдальних викривлень
Автоматичне виправлення спотворених зображень
Просто увімкніть The Freestyle 2-ї генерації, і він легко виправить спотворені зображення, вирівнявши екран і зробивши його прямокутним.
* Проектований екран призначений для ілюстрації і може відрізнятися від реального зображення. Розмір екрану може варіюватися в залежності від напрямку проекції пристрою. * Портативна батарея продається окремо."
    ),
    (
        "Проектор RZTK 4K Cinema Android HDMI",
        2499,
        "RZTK 4K Cinema Android HDMI: Кінотеатр, який завжди з вами!
Сучасне рішення для створення ідеальної атмосфери перегляду фільмів, презентацій або ігрових вечорів — портативний мініпроєктор RZTK 4K Cinema Android HDMI. Цей компактний пристрій поєднує високу якість зображення, інноваційні технології та стильний дизайн, перетворюючи будь-яке місце на справжній кінотеатр."
    ),
    (
        "Проектор JmGo N1S Infinity (J92-5DH)",
        66199,
        "4K лазерний проектор, який вражає
Пориньте у неймовірні враження з JMGO N1S Infinity — надсучасним мультимедійним проектором, створеним для тих, хто бере від життя тільки краще. Ця модель входить у флагманську лінійку 2024 року, саме тому має роздільну здатність 4K і працює на основі потрійної кольорової лазерної оптики MALC 2.0, щоб забезпечувати якість неймовірного рівня.

N1S Infinity також оснащено чудовою звуковою системою з технологією розширеної обробки аудіо, що автоматично регулює аудіопродуктивність залежно від середовища, забезпечуючи оптимальне відтворення ефектів для повного занурення в події на екрані.

Неймовірна краса кожного кадру
N1S Infinity оснащено фірмовим джерелом світла JMGO Microstructure Adaptive Laser Control (MALC) і потрійною кольоровою лазерною оптикою преміумкласу. Технологія MALC 2.0 використовує провідні напрацювання лазерного наведення, зокрема чотиришарову розсіювальну систему, забезпечуючи покращену оптичну продуктивність, деталізацію картинки та насиченість кольорів.

Представлена модель також має спеціальну динамічну технологію Light Speckle Reducer Technology, яка усуває артефакти при проектуванні зображення. Лазерний спекл — це візуальне спотворення, яке виникає в лазерних проекційних системах. Він виглядає як зерниста пляма та може псувати враження при перегляді, особливо в темних сценах."
    ),
    (
        "Проектор ViewSonic LS740W (VS19579)",
        59118,
        "LS740HD належить до серії ViewSonic Luminous Superior, лінійки безлампових проекторів високої яскравості, призначених для комерційних та освітніх установ. Завдяки застосуванню лазерно-фосфорної технології 3-го покоління він забезпечує світловий потік 5000 ANSI люмен протягом 30 000 годин, забезпечуючи яскраві та живі зображення без заміни лампи. Безлампова конструкція є екологічно чистим і економічним рішенням, а легка і компактна конструкція проектора знижує транспортні витрати. Проекція з діагоналлю до 300 дюймів з роздільною здатністю 1080p Full HD з високою природною контрастністю ідеально підходить для конференц- і лекційних залів, а також інших громадських місць. Цей проектор оснащений 1,3-кратним оптичним зумом, функцією корекції трапецеїдальних викривлень по горизонталі та вертикалі, регулюванням по 4 кутах, проекцією на 360° і портретним режимом для легкого налаштування та універсальності застосування."
    ),
    (
        "Проектор Nebula Cosmos Laser 4K SE, Dolby Vision, до 150 дюймів, оптимізована якість зображення, Google TV та офіційний Netflix",
        69900,
        "Мобільний проектор Nebula Cosmos Laser 4K SE

Це перший проектор Nebula, який може відображати зображення в якості 4K UHD. Відмінна картинка завдяки 1800 люмен ISO, що дозволяє дивитися фільми навіть при яскравому зовнішньому освітленні.

У проекторі використовується технологія ALPD 3.0, яка додатково збільшує яскравість лампи. Він оснащений динаміками загальною потужністю 30 Вт з підтримкою технології Dolby Audio, що забезпечує дивовижну якість звуку.

Ергономічна вбудована ручка дозволяє легко переносити пристрій. З Nebula Cosmos Laser 4K ви відчуєте магію літнього кінотеатру під хмарами у своєму саду, під наметом або де завгодно."
    ),
    (
        "Проєктор XGIMI Aura 2 (WM03B)",
        198249,
        "Лазерний проектор для дому XGIMI Aura 2 (WM03B). Найкращий проєктор в лінійці.
Кінематографічна магія вже у вас вдома зі проектором XGIMI Aura 2 (WM03B). Забудьте про громіздкі системи домашніх кінотеатрів: ультракороткофокусна проекція дає змогу отримати чітке зображення навіть у тісних просторах, а яскравість 2300 ISO люменів робить кожну сцену живою та насиченою. Технологія HDR дарує баланс світла і тіні та відтворює навіть найтонші деталі з дивовижною точністю. Але це не все. Звукова система Harman/Kardon із Dolby Atmos виводить ваш перегляд на новий рівень занурення й поглиблює емоційний досвід. Що робить XGIMI Aura 2 справді винятковим? Це не просто зображення — це новий вимір комфорту та технологій. Лише за кілька секунд ви можете повністю налаштувати проєктор завдяки інтелектуальним функціям автоматичного налаштування, які адаптуються до ваших умов. Якщо стіна нерівна чи є інші перешкоди — не проблема: система автоматично виправляє всі спотворення для ідеального перегляду. А як щодо безпеки? Проєктор оснащений системою захисту очей, що автоматично знижує яскравість, коли хтось наближається до пристрою, щоб захистити зір.
"
    );
-- вибрати всі товари
SELECT name FROM goods;
-- вибрати товари дешевші за 100 од.
SELECT name FROM goods WHERE price < 100;
-- вибрати товари ціна яких в межах від 500 до 1000
SELECT name FROM goods WHERE price BETWEEN 500 AND 1000;
-- вибрати товари опис яких містить слово “найкращий”
SELECT name FROM goods WHERE description LIKE '%найкращий%';
-- вибрати найдорожчий товар в таблиці
SELECT name FROM goods ORDER BY price DESC LIMIT 1;