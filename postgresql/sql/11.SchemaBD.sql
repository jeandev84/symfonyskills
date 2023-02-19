--- product_types  (OneToMany)   products [ one product_types belongs many products ]
--- products       (ManyToMany)  orders
--- orders         (ManyToMany)  products
--- customers      (OneToMany)   orders


--- ТАБЛИЦЫ
CREATE TABLE products(
 id SERIAL PRIMARY KEY,
 name VARCHAR(100),
 type_id INT,
 price INT
);



--- Таблица типы продуктов онлайн-школы
CREATE TABLE product_types(
  id SERIAL PRIMARY KEY,
  type_name VARCHAR(100)
);



--- Таблица продажи продуктов онлайн-школы
--- Intermediate table
CREATE TABLE sales(
  product_id INT,
  order_id INT,
  quantity INT
);




--- Таблица заказчиков ( клиентов ) онлайн-школы
CREATE TABLE customers(
  id SERIAL PRIMARY KEY,
  name VARCHAR(255),
  email VARCHAR(255)
);


--- Таблица заказы продуктов
CREATE TABLE orders(
  id SERIAL PRIMARY KEY,
  order_date DATE,
  customer_id INT
);


--- JOIN ( запрос для продукты в заказе )

SELECT p.id,
       p.name,
       p.price,
       s.quantity,
       p.price * s.quantity AS total
FROM products AS p
JOIN sales AS s
ON p.id = s.product_id
WHERE s.order_id = 2;



--- Найти всех покупок конкретного заказчика

SELECT p.id,
       p.name,
       p.price,
       s.quantity,
       p.price * s.quantity AS total
FROM products AS p
JOIN sales AS s
ON p.id = s.product_id
JOIN orders AS o
ON o.id = s.order_id
WHERE o.customer_id = 1;



--- ИТОГИ
--- Схема базы данных
--- Таблицы
--- Столбцы в таблицах и типы данных в них
--- Связи между таблицами


--- Типы связей между таблицами
--- Один к одному (one-to-one)
--- Один к многим (one-to-many)
--- Многие к одному (many-to-one)
--- Многие ко многим (many-to-many, реализуется через отдельную таблицу)
