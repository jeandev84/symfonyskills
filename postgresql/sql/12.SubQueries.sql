--- Подзапросы в SQL

--- Получить продукт со самой высокой стоимости
-- SELECT MAX(price) FROM products;
-- SELECT id, name, price, MAX(price) AS max_price; [ 60 000 ]
-- FROM products
-- GROUP BY name
-- HAVING price = max_price;

SELECT id, name, price
FROM products
WHERE price = (SELECT MAX(price) FROM products);



--- Выводим информации о продуктах, которые хотя бы проданы один раз.
--- SELECT product_id FROM sales [ извлекаем ids продуктов, которые были проданы из таблицы sales: (3, 4, 10, 11, 3, 4, 5, 1, 6) ]
--- SELECT id, name, price FROM products WHERE id IN (SELECT product_id FROM sales);
--- SELECT id, name, price FROM products WHERE id IN (3, 4, 10, 11, 3, 4, 5, 1, 6);


SELECT id, name, price
FROM products
WHERE id IN (SELECT product_id FROM sales);




--- Подзапросы в UPDATE
--- Увиличим стоимость каждой книги на 500 рублей
UPDATE products
SET price = price + 500
WHERE type_id = (SELECT id FROM product_types WHERE type_name = 'Книга');



--- ИТОГИ
--- Подзапросы в SQL (subqueries)
--- Запрос внутри другого запроса SQL
--- Оформляется в круглых скобках
--- Запускается перед основными запросом


--- Диагностика подзапроса
--- Запуск подзапроса отдельно от основного запроса


--- Использование подзапросов в командах SQL
--- SELECT
--- UPDATE
--- DELETE
--- INSERT