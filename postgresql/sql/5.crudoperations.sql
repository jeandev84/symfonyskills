-- DROP TABLE IF EXISTS superheroes;
-- CREATE TABLE superheroes(
--     id SERIAL PRIMARY KEY,
--     name VARCHAR(100),
--     align VARCHAR(30),
--     eye VARCHAR(30),
--     hair VARCHAR(30),
--     gender VARCHAR(30),
--     appearances INT,
--     year INT,
--     universe VARCHAR(10)
-- );


/*
 Вставка данных в таблицы
*/

INSERT INTO superheroes(name, appearances, universe)
VALUES ('Spider-Man', 4043, 'marvel');

INSERT INTO superheroes(name, align, eye, hair, gender, appearances, year, universe)
VALUES ('Spider-Man (Peter Parker)', 'Good characters', 'Hazel Eyes', 'Brown Hair', 'Male Characters', 4043, 1962, 'marvel');


INSERT INTO superheroes(id, name, align, eye, hair, gender, appearances, year, universe)
VALUES (1, 'Spider-Man (Peter Parker)', 'Good characters', 'Hazel Eyes', 'Brown Hair', 'Male Characters', 4043, 1962, 'marvel');


-- INSERT INTO superheroes
-- VALUES (1, 'Spider-Man (Peter Parker)', 'Good characters', 'Hazel Eyes', 'Brown Hair', 'Male Characters', 4043, 1962, 'marvel');


/*
 Измнение данных в таблицы
*/

UPDATE superheroes
SET name='Batman', universe='dc'
WHERE id=1;



/*
 Удалить данных из таблицы
*/

DELETE FROM superheroes WHERE id = 2;
DELETE FROM superheroes WHERE gender='Male Characters';
DELETE FROM superheroes;




--- ИТОГ
--- Вставка данных в таблицы ( Оператор INSERT )
--- Изменение данных в таблице ( Оператор UPDATE )
--- Удаление данных из таблиц ( Оператор DELETE )
--- Особенности
--  Один оператор может менять несколько строк данных,
--  Фильтры в WHERE такие же, как в SELECT
--  Первичный ключ позволяет однозначно идентифицировать строки