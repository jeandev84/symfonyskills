--- Агрегатные функции
--- ГРУППИРОВКА ДАННЫХ В SQL
--- Как правило агрегатные функции используются с GROUP BY

/*
 Популярные агрегатные функции в SQL
 ================================================================

 AVG       ( Среднее значение )
 COUNT     ( Количество значений )
 MAX       ( Максимальное значение )
 MIN       ( Минимальное значение )
 SUM       ( Сумма )
*/

SELECT align, COUNT(*) FROM superheroes GROUP BY align;
SELECT align, COUNT(*), SUM(appearances) FROM superheroes GROUP BY align;
SELECT hair, COUNT(*) FROM superheroes WHERE gender='Female Characters' GROUP BY hair;


--- Выражения с агрегатными функциями
--  Сгруппируем таблицу супергероев по align
--  для каждого считаем среднее значение appearances и среднее значение appearances без запятой

SELECT align, AVG(appearances), SUM(appearances)/COUNT(*) AS average
FROM superheroes
GROUP BY align;



-- Сгруппируем таблицу супергероев по годам (year)
-- и для каждого считаем минимальное значение appearances и максимальное значение appearances без запятой

SELECT year, MIN(appearances), MAX(appearances)
FROM superheroes
GROUP BY year;




-- Сгруппируем таблицу супергероев по годам (year) и Оссортируем по годам (year)
-- и для каждого считаем минимальное значение appearances и максимальное значение appearances без запятой

SELECT year, MIN(appearances), MAX(appearances)
FROM superheroes
GROUP BY year
ORDER BY year;


-- Сгруппируем таблицу супергероев по годам (year) и Оссортируем с использованием агрегатных функций
-- и для каждого считаем минимальное значение appearances и максимальное значение appearances без запятой

SELECT year, MIN(appearances), MAX(appearances)
FROM superheroes
GROUP BY year
ORDER BY MAX(appearences) DESC;



-- Сгруппируем таблицу супергероев по годам (year) и Оссортируем с использованием агрегатных функций с алиасом
-- и для каждого считаем минимальное значение appearances и максимальное значение appearances без запятой

SELECT year, MIN(appearances), MAX(appearances) as max_ap
FROM superheroes
GROUP BY year
ORDER BY max_ap DESC;



-- Сгруппируем таблицу супергероев по годам (year) и ограничим количество записи
-- и для каждого считаем минимальное значение appearances и максимальное значение appearances без запятой

SELECT year, MIN(appearances), MAX(appearances) as max_ap
FROM superheroes
GROUP BY year
ORDER BY max_ap DESC
LIMIT 5;


--- Выборка таблицы

SELECT COUNT(*),
       MIN(appearances),
       MAX(appearances),
       SUM(appearances)
       AVG(appearances)
FROM superheroes;


--- ИТОГИ
--- Обрабатывают несколько строк и вычисляют одно значение
--- Используются совместно с группировкой


--- Распространенные агрегатные функции
--- AVG, COUNT, MAX, MIN, SUM
--- Серверы баз данных поддерживают дополнительные функции


--- Агрегатные функции и другие возможности SELECT
--- Фильтрация ( WHERE ), Сортировка ( ORDER BY ), Ограничение количества строк ( LIMIT )
--- Фильтрация результатов группировки: HAVING ( то есть HAVING работает как WHERE )