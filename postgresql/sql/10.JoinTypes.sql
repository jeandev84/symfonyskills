
--- ТАБЛИЦЫ
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


--- INNER JOIN ( Внутренее объединение )
--- Объединяет таблицы (products + product_types)
SELECT products.name, product_types.type_name
FROM  products
INNER JOIN product_types
ON products.type_id = product_types.id;




--- LEFT OUTER JOIN ( Левое внешнее объединение )
--- объединяет таблицы (products => product_types)
--- если в таблице products не нашел соотвествующее значение всё равно включает в запись
SELECT products.name, product_types.type_name
FROM  products
LEFT OUTER JOIN product_types
ON products.type_id = product_types.id;



--- RIGHT OUTER JOIN ( Правое внешнее объединение ) [ Наоборот LEFT JOIN ]
--- объединяет таблицы (product_types => products)
--- если в таблице product_types не нашел соотвествующее значение всё равно включает в запись
SELECT products.name, product_types.type_name
FROM  products
RIGHT OUTER JOIN product_types
ON products.type_id = product_types.id;



--- [ LEFT AND RIGHT ] OUTER JOIN ( Левое и Правое объединение )
SELECT products.name, product_types.type_name
FROM  products
LEFT OUTER JOIN product_types
ON products.type_id = product_types.id;


SELECT products.name, product_types.type_name
FROM  product_types
RIGHT OUTER JOIN products
ON product_types.id = products.type_id;



--- FULL OUTER JOIN ( Полное внешнее объединение )
SELECT products.name, product_types.type_name
FROM  products
FULL OUTER JOIN product_types
ON products.type_id = product_types.id;



--- CROSS JOIN ( Перекрестное объединение )
--- Объединяет двух таблиц каждое к каждому
SELECT products.name, product_types.type_name
FROM  products
CROSS JOIN product_types;



--- ИТОГИ
--- Внутренне объединение
--- INNER JOIN
--- Тип объединения по умолчанию



--- Внешнее объединение
--- Левое  ( LEFT OUTER JOIN )
--- Правое ( RIGHT OUTER JOIN )
--- Полное ( FULL OUTER JOIN )


--- Перекрестное объединение
--- CROSS JOIN
--- Не используется практике

