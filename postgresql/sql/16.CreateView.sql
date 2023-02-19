--- Представление
--- Создание pseudonym для запроса SELECT

CREATE VIEW customers_v id, name AS SELECT id, name FROM customers;



--- ЗАПРОС к представлению

SELECT * FROM customers_v;


--- Представлении с данными из нескольких таблиц
--- Оптимизация запрос

CREATE VIEW products_v
AS SELECT p.id AS id,
          p.name AS product_name,
          t.type_name AS product_type
          p.price AS product_price
FROM products AS p
JOIN product_types AS t
ON p.type_id = t.id;



--- УДАЛИТЬ ПРЕДСТАВЛЕНИЙ
DROP VIEW products_v;


--- Зачем использовать представления ?

--- 1. Ограничение доступа к данным
--- Представление содержит не все столбцы/строки исходной таблицы



--- 2. Псевдонимы для сложных запросов
--- Запрос извлекает данные из нескольких таблиц
--- Запрос выполняет группировки и расчет агрегаций


--- 3. Сокрытие реализации
--- Пользователи работают только с представлениями
--- Таблицы в базе данных можно делать




--- МАТЕРИАЛИЗОВАННЫЕ ПРЕДСТАВЛЕНИЯ (не все базы поддерживают но Postgresql и Oracle поддерживают)
--- Используется для запросов, которые работают достаточно долго
CREATE MATERIALIZED VIEW products_v
AS SELECT p.id AS id,
          p.name AS product_name,
          t.type_name AS product_type
          p.price AS product_price
FROM products AS p
JOIN product_types AS t
ON p.type_id = t.id;



--- ОБНОВЛЕНИЕ МАТЕРИАЛИЗОВАННЫХ ПРЕДСТАВЛЕНИЙ
REFRESH MATERIALIZED VIEW products_v;


--- УДАЛИТЬ МАТЕРИАЛИЗОВАННЫХ ПРЕДСТАВЛЕНИЙ

DROP MATERIALIZED VIEW products_v;



--- ИТОГИ:
--- 1. Представления
--- Псевдонимы для запросов SELECT
--- Используются как аналоги таблиц
--- Не содержат данных


--- 2. Использование представлений
--- Ограничение доступа к данным
--- Псевдонимы для сложных запросов
--- Сокрытие реализации


--- 3. Материализованные предствавления
--- Содержат данные
--- Повышают скорость выполнения запросов



