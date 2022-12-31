create table products (id int auto_increment primary key not null, name varchar(255) not null, price integer not null); */

insert into products (name, price) values ('Acme Radio', 100), ('Blue Yeti Microphone', 150);

create table users (id int auto_increment primary key not null, username varchar(255) not null, name varchar(255) not null);

insert into users (username, name) values ('garycharketech', 'Gary Clarke'), ('janedoe', 'Joe Doe');
