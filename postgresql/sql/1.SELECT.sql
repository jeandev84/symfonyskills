/* Выборка данных при помощью SELECT */
/* select all columns from table superheroes */
SELECT * FROM superheroes;


/* select some columns from table superheroes */
SELECT name, appearances FROM superheroes;


/* pseudonym or alias */
SELECT name AS hero_name, appearances FROM superheroes;
SELECT name hero_name, appearances FROM superheroes;


/* select all unique value column */
SELECT DISTINCT(align) FROM superheroes;
SELECT DISTINCT(eye) FROM superheroes;


/* LIMIT SELECT */
SELECT DISTINCT(hair) FROM superheroes LIMIT 10;






