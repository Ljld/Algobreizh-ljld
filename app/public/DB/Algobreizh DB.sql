CREATE TABLE `users` (
  `user_id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50),
  `surname` varchar(50),
  `civility` ENUM ('M', 'Mme') DEFAULT "M",
  `email` varchar(50),
  `password` varchar(255),
  `userType` ENUM ('customer', 'employee') DEFAULT "customer",
  `registrationDate` timestamp DEFAULT (now())
);

CREATE TABLE `orders` (
  `order_id` int PRIMARY KEY AUTO_INCREMENT,
  `ref` varchar(50),
  `user_id` int,
  `status` ENUM ('pending', 'done') DEFAULT "pending",
  `confirm_date` timestamp DEFAULT (now()),
  `expedition_date` timestamp,
  `billing_adress_id` int,
  `expedition_adress_id` int,
  `total_price` int
);

CREATE TABLE `order_items` (
  `order_id` int,
  `product_id` int,
  `quantity` int
);

CREATE TABLE `products` (
  `product_id` int PRIMARY KEY AUTO_INCREMENT,
  `ref` varchar(50),
  `price` int
);

CREATE TABLE `adresses` (
  `adress_id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `country` ENUM ('France', 'Belgique') DEFAULT "France",
  `city` varchar(50),
  `street` varchar(50),
  `zip` varchar(5)
);

ALTER TABLE `orders` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `order_items` ADD FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

ALTER TABLE `order_items` ADD FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

ALTER TABLE `adresses` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `adresses` ADD FOREIGN KEY (`adress_id`) REFERENCES `orders` (`billing_adress_id`);

ALTER TABLE `adresses` ADD FOREIGN KEY (`adress_id`) REFERENCES `orders` (`expedition_adress_id`);
