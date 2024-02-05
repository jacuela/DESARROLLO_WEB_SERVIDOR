DROP DATABASE IF EXISTS empleados_api;
CREATE DATABASE empleados_api CHARACTER SET utf8mb4;
USE empleados_api;


CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `salary` int(10) NOT NULL,
  PRIMARY KEY (`id`)
);


INSERT INTO `employees` (`name`, `address`, `salary`) VALUES
('Roland Mendel', 'C/ Araquil, 67, Madrid', 5000),
('Victoria Ashworth', '35 King George, London', 6500),
('Martin Blank', '25, Rue Lauriston, Paris', 8000);





