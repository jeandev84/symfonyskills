--- Группировки и фильтрация в SQL: HAVING


SELECT hair, COUNT(*) FROM superheroes
WHERE gender='Female Characters'
GROUP BY hair;


--- Ошибочный запрос, нельзя использовать агрегатные фуннкции с оператором WHERE (например COUNT(*), AVG(test)
--- Потому что условие выполняется перед тем сгруппируем
--  SELECT hair, COUNT(*) FROM superheroes
--  WHERE gender='Female Characters' AND COUNT(*) > 10
--  GROUP BY hair;



--- HAVING : запускает условия после того как уже создан GROUP BY (Решение предыдущего запроса)
SELECT hair, COUNT(*) FROM superheroes
WHERE gender='Female Characters'
GROUP BY hair
HAVING COUNT(*) > 10;


SELECT hair, COUNT(*) as hair_count FROM superheroes
WHERE gender='Female Characters'
GROUP BY hair
HAVING hair_count > 10;



--- Пример сложный запрос
SELECT hair, COUNT(*) FROM superheroes
WHERE gender='Female Characters'
GROUP BY hair
HAVING COUNT(*) BETWEEN 50 AND 300;



--- ИТОГИ:
--- Фильтрация данных
--- WHERE  - фильтрация строк в таблице
--- HAVING - фильтрация результатов группировки


--- Порядок выполнения SELECT
--- Выбор таблицы: FROM
--- Фильтрация строк из таблицы: WHERE
--- Группировка: GROUP BY
--- Фильтрация результатов группировки: HAVING