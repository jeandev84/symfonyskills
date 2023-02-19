--- Запрос данных из нескольких таблиц:

--- Таблица продуктов онлайн-школы
CREATE TABLE products(
    id SERIAL PRIMARY KEY,
    name VARCHAR(100),
    type_id INT,
    price INT
);



--- Таблица типы продуктов онлайн-школы
CREATE TABLE product_types(
    id SERIAL PRIMARY KEY,
    type_name VARCHAR(100),
);




-- JOIN:
SELECT products.name, product_types.type_name
FROM  products
JOIN product_types ON products.type_id = product_types.id


-- SELECT products.name, product_types.type_name
-- FROM  products
-- JOIN product_types pt on products.type_id = pt.id;


SELECT products.name, product_types.type_name
FROM  products
JOIN product_types ON products.type_id = product_types.id;


--- JOIN WITH USE PSEUDONYM

SELECT p.name, t.type_name
FROM  products AS p
JOIN product_types AS t
ON p.type_id = t.id;


SELECT p.name, t.type_name
FROM  products AS p
JOIN product_types AS t
ON p.type_id = t.id;




--- (Фильтрия) JOIN WITH USE PSEUDONYM AND WHERE

SELECT
    p.name AS product_name,
    t.type_name As product_type,
    p.price As product_price
FROM  products AS p
JOIN product_types AS t
ON p.type_id = t.id
WHERE t.type_name = 'Онлайн-курс';



SELECT
    p.name AS product_name,
    t.type_name As product_type,
    p.price As product_price
FROM  products AS p
JOIN product_types AS t
ON p.type_id = t.id
WHERE t.type_name = 'Вебинар' AND p.price = 0;


--- СОРТИРОВКА (JOIN)

SELECT
    p.name AS product_name,
    t.type_name As product_type,
    p.price As product_price
FROM  products AS p
JOIN product_types AS t
ON p.type_id = t.id
WHERE t.type_name = 'Онлайн-курс'
ORDER BY p.price DESC;



--- ИТОГИ
--- Запрос данных из несколько таблиц
--- Оператор SELECT
--- В ключевом слове FROM указываем несколько таблиц с JOIN
--- После ключевого слова ON указываем условия объединения


--- Связи между таблицами
--- Ссылки из одной таблицы на другую
--- Внешний ключ ( FOREIGN KEY )

--- Использование JOIN в SELECT
--- Комбинация с WHERE, ORDER BY, LIMIT, GROUP BY, HAVING
--- Типы JOIN. внешнее и внутреннее, левое и правое, перекрестное, полное.