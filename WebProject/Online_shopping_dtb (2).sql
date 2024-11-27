CREATE DATABASE shop_bag;

CREATE TABLE user_form(
   id int AUTO_INCREMENT not null,
   name varchar(50) not null,
   surname varchar(50) not null,
   email varchar(50) not null,
   password varchar(100) not null,
   PRIMARY KEY (id));


CREATE TABLE products(
   p_id int AUTO_INCREMENT not null,
   name varchar(50) not null,
   price int not null,
   quantity int not null,
   color varchar(50) not null,
   image varbinary not null,
   PRIMARY KEY (id));


CREATE TABLE shopping_cart(
   cart_id int AUTO_INCREMENT not null,
   user_id int not null,
   p_id  int not null,
   price int not null,
   quantity int not null,
   added_date timestamp not null,
   FOREIGN KEY (user_id) REFERENCES user_form(id),
   FOREIGN KEY (p_id) REFERENCES products(p_id),
   PRIMARY KEY (cart_id));


INSERT INTO `user_form`(`name`, `surname`, 'email', `password`) VALUES ('admin', 'admin', 'a@gmail.com',123);

INSERT INTO 'products' (name, price, quantity, color, image, design, new_in, category)
VALUES ('DaMilano bag', '150', '3', 'green', 'bag1.jpg', ' ','new','women'),
VALUES ('bag2', '300', '2', 'white', 'bag13m.jpg', ' ','not','men'),
VALUES ('DaMilano bag', '90', 'NULL', 'black', 'bag3.jpg', ' The design is from Italy',' ','women'),
VALUES ('Cocinelle', '110', 'NULL', 'white', 'bag7.jpg', ' The design is from Italy',' ','women'), 
VALUES ('Laptop bag', '205', '5', 'blue', 'bag5.jpg', ' daMilano',' ','women'),   
VALUES ('Luggage bag', '258', '7', 'brown', 'bag6.jpg', 'daMilano',' ','women'),  
VALUES ('Coccinelle', '219', '10', 'light blue', 'bag8.jpg', ' Wardow,Italy',' ','women'),
VALUES ('Lacoste', '246', '8', 'black', 'bag9m.jpg', ' This design is from Lacoste','new ','men'),
VALUES ('Croco Effect bag', '190', '10', 'black', 'bag10m.jpg', ' Design from DaMilano','new ','men'),
VALUES ('Lacoste', '50', '7', 'blue', 'bag11m.jpg', ' This design is from Lacoste','not ','men'),
VALUES ('Coccinelle', '70', '7', 'brown', 'bag12m.jpg', ' This design is from Coccinelle, Italy','not ','men'),
VALUES ('Lacoste', '120', '10', 'black', 'bag14m.jpg', ' This design is from Lacoste',' not','men'),
VALUES ('Aleon', '225', '9', 'black', 'travel6.jpg', ' Designed as a travel bag','new ','travel'),
VALUES ('Eastpack', '70', '10', 'green', 'travel1.jpg', ' Design from Italy','not ','travel'),
VALUES ('Eastpack', '80', '10', 'black', 'travel2.jpg', 'Design from England','new','travel'),
VALUES ('Patagonia', '90', '14', 'black', 'travel3.jpg', 'Design from England','new','travel'),
VALUES ('Patagonia', '90', '10', 'black', 'travel5.jpg', 'Design from France','new','travel'),
VALUES ('Eastpack', '65', '10', 'black', 'travel4.jpg', 'Design from Italy','new','travel'),
VALUES ('DaMilano bag', '150', '3', 'green', 'bag1.jpg', ' ','new','women');

INSERT INTO `products` (`p_id`, `name`, `price`, `quantity`, `color`, `image`, `design`, `new_in`, `category`) VALUES ('21', 'La roche', '45', '13', 'white', 'acc1.PNG', 'Design from Italy', 'new', 'accessory');
INSERT INTO `products` (`p_id`, `name`, `price`, `quantity`, `color`, `image`, `design`, `new_in`, `category`) VALUES ('22', 'La roche', '70', '0', 'white', 'acc2.PNG', 'Design from Italy', 'new', 'accessory');
INSERT INTO `products` (`p_id`, `name`, `price`, `quantity`, `color`, `image`, `design`, `new_in`, `category`) VALUES ('23', 'La roche', '55', '13', 'white', 'acc3.PNG', 'Design from Italy', 'new', 'accessory');



