/* Сортировка */

SELECT * FROM superheroes ORDER BY year;


/*
Порядок сортировки:
ASC  (ascending)  - сортировка по возрастанию
DESC (descending) - сортировка по убыванию
*/
SELECT * FROM superheroes ORDER BY appearances DESC;


/*
 Сортировка и Фильтры в SELECT
*/
SELECT * FROM superheroes WHERE align = 'Bad Characters' ORDER BY appearances DESC;
SELECT * FROM superheroes WHERE align = 'Bad Characters' AND gender = 'Female Characters' ORDER BY appearances DESC LIMIT 5;


/*
 Сортировка по несколько столбцов
*/
SELECT * FROM superheroes WHERE align = 'Bad Characters' ORDER BY year, appearances;