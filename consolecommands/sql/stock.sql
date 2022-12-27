insert into stock_item (id, item_number, item_name, item_description, supplier_cost, price)
values (nextval('stock_item_id_seq'), '100', 'Item 100', 'Description of item 100', 20, 24);

select * from stock_item si;