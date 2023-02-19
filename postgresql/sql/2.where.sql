/* Фильтрация данных при помощью WHERE */

SELECT * FROM superheroes WHERE gender = 'Female Characters';
SELECT * FROM superheroes WHERE align  = 'Reformed Criminals';


/* Оператор фильтрации */
/*
=         (Равно)
<>, !=    (Неравно)
>         (Больше)
>=        (Больше или равно)
<         (Меньше)
<=        (Меньше или равно)
BETWEEN   (Значение находится в указанном диапазоне)
IN        (Значение входит в список)
LIKE      (Проверка строки на соответствие шаблону)
*/


SELECT * FROM superheroes WHERE year BETWEEN 2000 AND 2005;


SELECT * FROM superheroes WHERE hair IN ('Strawberry Blond Hair', 'Red Hair', 'Auburn Hair');

/*
% - любое количество симболов ( включая 0 )
_ - ровно один символ
*/

SELECT * FROM superheroes WHERE hair LIKE '%Blond%';


/*
Логические операции в WHERE
====================================================
AND          Логическое И
OR           Логическое ИЛИ
NOT          Логическое НЕ
*/

SELECT * FROM superheroes WHERE gender = 'Female Characters' AND align = 'Bad Characters';
SELECT * FROM superheroes WHERE hair = 'Strawberry Blond Hair' OR hair = 'Red Hair' OR hair = 'Auburn Hair';
SELECT * FROM superheroes WHERE hair NOT IN ('Blond Hair', 'Black Hair', 'Brown Hair', 'Red Hair');

