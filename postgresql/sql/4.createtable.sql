/*
Создание таблицы в SQL
*/
-- Создаем таблицу супергероев
DROP TABLE IF EXISTS superheroes;
CREATE TABLE superheroes(
    id INT,
    name VARCHAR(100),
    align VARCHAR(30),
    eye VARCHAR(30),
    hair VARCHAR(30),
    gender VARCHAR(30),
    appearances INT,
    year INT,
    universe VARCHAR(10)
);

/*
Тип данныых в SQL
=======================================================================================================================
CHARACTER(n) (CHAR(n))                            |     Строка фиксированной длины (n)
CHARACTER(n) VARYING(n) (VARCHAR(n))              |     Строка переменной длины, максимальная длина n
BOOLEAN                                           |     Логический тип данных
INTEGER(INT)                                      |     Целое число
NUMERIC(p,s)                                      |     Действительное число (p - количество значащих циффр, s - количество циффр после запятой). Хранится точно.
REAL                                              |     Действительное число одинарной точности, формат IEEE 754
DOUBLE PRECISION                                  |     Действительное число двойной точности, формат IEEE 754
DATE                                              |     Дата
TIMESTAMP                                         |     Дата и время
*/


/*
Привичный ключ (PRIMARY KEY)
*/
CREATE TABLE superheroes(
    id INT PRIMARY KEY,
    name VARCHAR(100),
    align VARCHAR(30),
    eye VARCHAR(30),
    hair VARCHAR(30),
    gender VARCHAR(30),
    appearances INT,
    year INT,
    universe VARCHAR(10)
);



/*
 Автоматическая генерация первичных ключей: SERIAL (PostgresSQL) | AUTO_INCREMENT (MYSQL)
*/

CREATE TABLE superheroes_postgres(
    id SERIAL PRIMARY KEY,
    name VARCHAR(100),
    align VARCHAR(30),
    eye VARCHAR(30),
    hair VARCHAR(30),
    gender VARCHAR(30),
    appearances INT,
    year INT,
    universe VARCHAR(10)
);

CREATE TABLE superheroes_mysql(
    id AUTOINCREMENT PRIMARY KEY,
    name VARCHAR(100),
    align VARCHAR(30),
    eye VARCHAR(30),
    hair VARCHAR(30),
    gender VARCHAR(30),
    appearances INT,
    year INT,
    universe VARCHAR(10)
);



/*
 Просмотр информации о таблице

 $ postgres=# \d superheroes; (POSTGRES)
 $ describe superheroes; ( ORACLE AND MYSQL )

*/


/*
Удаление таблицы: DROP TABLE
*/

DROP TABLE superheroes;
DROP TABLE IF EXISTS superheroes;




/*
Изменение таблицы: ALTER TABLE
*/

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

ALTER TABLE superheroes ADD COLUMN alive BOOLEAN;

ALTER TABLE superheroes ADD COLUMN first_appearance TIMESTAMP;

ALTER TABLE superheroes DROP COLUMN year;

ALTER TABLE superheroes RENAME COLUMN name TO hero_name;

ALTER TABLE superheroes RENAME TO comic_characters;



/*
 ИТОГИ
*/

--- Работа с таблицами в SQL
--  Создание таблицы   - CREATE TABLE
--  Удаление таблицы   - DROP TABLE
--  Изменение таблицы  - ALTER TABLE


--- Язык в SQL
--- Data Definition Language   (DDL)    - язык описания данных
--- Data Manipulation Language (DML)    - язык манипулирования данными (SELECT, INSERT, UPDATE, DELETE)
--- Data Control Language      (DCL)    - язык управления доступом к данных


--- Работа с таблицами отличается в разных реализациях
--- Смотрите документацию по используемой системе управления базами данных

