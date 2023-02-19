--- 1. Типы Ограничения в базах данных
--- Напримеры: 1. PRIMARY KEY (это объеденение UNIQUE + NO NULL), 2. NOT NULL, 3. UNIQUE
CREATE TABLE superheroes(
  id INT PRIMARY KEY,
  name VARCHAR(100) UNIQUE NOT NULL,
  align VARCHAR(30),
  eye VARCHAR(30),
  hair VARCHAR(30),
  gender VARCHAR(30),
  appearances INT,
  year INT,
  universe VARCHAR(10)
);


--- 2. Первичный ключ из нескольких полей
--- Добавляем несколько ограничений PRIMARY KEy когда таблица содержает несколько первичных ключей
CREATE TABLE sales(
   product_id INT,
   order_id INT,
   quantity INT,
   PRIMARY KEY(product_id, order_id)
);


--- 3. Ограничения по проверке значений (простой способ)
--- Пишем ограничение чтобы цена продукты была положительная
CREATE TABLE products(
   id PRIMARY KEY,
   name VARCHAR(100),
   type_id INT,
   price INT CHECK (price >= 0)
);


--- 4. Именованные ограничения
CREATE TABLE products(
    id PRIMARY KEY,
    name VARCHAR(100),
    type_id INT,
    price INT CONSTRAINT positive_price CHECK (price >=0)
);


--- 5. Ограничения на уровне таблицы
--- Таблица продуктов онлайн-школы

CREATE TABLE products(
     id PRIMARY KEY,
     name VARCHAR(100),
     type_id INT REFERENCES product_types(id),
     price INT,
     CONSTRAINT positive_price CHECK (price >= 0)
);

--- 6. Ограничения внешного ключа или ссылочной целостности

-- CREATE TABLE products(
--  id SERIAL PRIMARY KEY,
--  name VARCHAR(100),
--  type_id INT,
--  price INT
-- );
--
--
-- --- Таблица типы продуктов онлайн-школы
-- CREATE TABLE product_types(
--   id SERIAL PRIMARY KEY,
--   type_name VARCHAR(100),
-- );


CREATE TABLE products(
     id PRIMARY KEY,
     name VARCHAR(100),
     type_id INT REFERENCES product_types(id),
     price INT
);



--- 7. Действия при удалении
--- ON DELETE RESTRICT : при удалении записи из product_types строго не даст удалить.
--- ON DELETE CASCADE  : при удалении записи из product_types удаляется тоже записи в products
--- ON UPDATE RESTRICT : при обновлении записи из product_types строго не даст удалить.
--- ON UPDATE CASCADE  : при обновлении записи из product_types обновляет тоже записи в products


CREATE TABLE products(
 id PRIMARY KEY,
 name VARCHAR(100),
 type_id INT REFERENCES product_types(id) ON DELETE RESTRICT,
 price INT
);


CREATE TABLE products(
 id PRIMARY KEY,
 name VARCHAR(100),
 type_id INT REFERENCES product_types(id) ON DELETE CASCADE,
 price INT
);



CREATE TABLE products(
 id PRIMARY KEY,
 name VARCHAR(100),
 type_id INT REFERENCES product_types(id) ON UPDATE RESTRICT,
 price INT
);


CREATE TABLE products(
     id PRIMARY KEY,
     name VARCHAR(100),
     type_id INT REFERENCES product_types(id) ON UPDATE CASCADE,
     price INT
);

--- 8. Внешний ключ на уровне таблицы

CREATE TABLE products(
   id PRIMARY KEY,
   name VARCHAR(100),
   type_id INT,
   price INT,
   FOREIGN KEY(type_id) REFERENCES product_types(id)
);



--- 9. Первечный и Внешний Ключи

CREATE TABLE sales(
   product_id INT REFERENCES products(id),
   order_id INT REFERENCES orders(id),
   quantity INT,
   PRIMARY KEY(product_id, order_id)
);