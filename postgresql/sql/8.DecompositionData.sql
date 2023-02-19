--- Декомпозиция данных в базе

--- Таблица супергероев
CREATE TABLE superheroes(
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

--- Таблица фильма о супергероев
--- Внешный ключ FOREIGN KEY
CREATE TABLE superheroes_movies(
  id SERIAL PRIMARY KEY,
  title VARCHAR(100),
  year INT,
  superhero_id INT
);



--- Оптимизация и декомпозиция таблиц
--- align_id [1, 1, 1, 3, 1]
CREATE TABLE superheroes(
    id SERIAL PRIMARY KEY,
    name VARCHAR(100),
    align_id INT,
    eye VARCHAR(30),
    hair VARCHAR(30),
    gender VARCHAR(30),
    appearances INT,
    year INT,
    universe VARCHAR(10)
);


--- 1. Good | 2. Bad | 3. Neutral | 4. Reformed Criminal
CREATE TABLE superheroes_alignment(
    id SERIAL PRIMARY KEY,
    align VARCHAR(30)
);

--- Таблица фильма о супергероев
--- Внешный ключ FOREIGN KEY
CREATE TABLE superheroes_movies(
   id SERIAL PRIMARY KEY,
   title VARCHAR(100),
   year INT,
   superhero_id INT
);


--- ИТОГ
--- Несколько таблиц в базе данных
--- Разные сущности
--- Декомпозиция одной таблицы на несколько


--- Связи между таблицами
--- Ссылки из одной таблицы на другую
--- Внешний ключ ( FOREIGN KEY )


--- Проектирование баз данных
--- Нормализация: нормальные формы
--- Типы связей: один к одному, один ко многим, многие ко многим
