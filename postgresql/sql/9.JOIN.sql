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
JOIN product_types AS t ON p.type_id = t.id;


SELECT p.name, t.type_name
FROM  products AS p
JOIN product_types AS t ON p.type_id = t.id;




--- JOIN WITH USE PSEUDONYM AND WHERE (Filter)

SELECT
    p.name AS product_name,
    t.type_name as product_type,
    p.price as product_price
FROM  products AS p
JOIN product_types AS t ON p.type_id = t.id
WHERE t.type_name = 'Онлайн-курс';

