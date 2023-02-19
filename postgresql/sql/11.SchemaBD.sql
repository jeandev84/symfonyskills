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
CREATE TABLE sales(
  product_id INT,
  order_id INT,
  quantity INT
);




--- Таблица клиентов онлайн-школы
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