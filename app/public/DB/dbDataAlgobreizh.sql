INSERT INTO products(ref, price, pic) values ('Algue verte', 10, 'algue-verte');
INSERT INTO products(ref, price, pic) values ('Algue rouge', 15, 'algue-rouge');
INSERT INTO products(ref, price, pic) values ('Algue jaune', 35, 'algue-jaune');

INSERT INTO users(name, surname, civility, email, password, userType, registrationDate)
values ('Lucas', 'Jeuland', 'M', 'lucas.jeuland@gmail.com', '$2y$10$VyPLCIqBX9/rODfoPsglrukakrgqiHSbQ.5hHuzX5j2E.1V0RrTIu', 'customer', NOW());

INSERT INTO users(name, surname, civility, email, password, userType, registrationDate)
values ('Howling', 'Wolf', 'M', 'howling.wolf@gmail.com', '$2y$10$6gdNpSgk8J2erCJsBqePRO6F40/cHtYCLWylWdyD.JD.cWIMyAzeu', 'customer', NOW());

INSERT INTO users(name, surname, civility, email, password, userType, registrationDate)
values ('Admin', 'Admin', 'M', 'prod@algobreizh.com', '$2y$10$/Nz4jPFR8/9yVGw3uBn33OjYD3Yj4zuAxell7r2tYLACsKdSerSc6', 'employee', NOW());

INSERT INTO adresses(user_id, country, city, street, zip)
values ('1', 'France', 'Rennes', '44 rue des digitales', '35000');

INSERT INTO adresses(user_id, country, city, street, zip)
values ('2', 'Belgique', 'Bruxelles', '24 boulevard des oubliés', '45555');

INSERT INTO orders(user_id, billing_adress_id, expedition_adress_id, total_price)
values ('1', '1', '1', 345);

INSERT INTO orders(user_id, billing_adress_id, expedition_adress_id, total_price)
values ('2', '2', '2', 325);

INSERT INTO order_items(order_id, product_id, quantity)
values ('1', '1', '5');

INSERT INTO order_items(order_id, product_id, quantity)
values ('1', '2', '1');

INSERT INTO order_items(order_id, product_id, quantity)
values ('1', '3', '8');

INSERT INTO order_items(order_id, product_id, quantity)
values ('2', '1', '10');

INSERT INTO order_items(order_id, product_id, quantity)
values ('2', '2', '15');
