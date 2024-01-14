DROP DATABASE IF EXISTS personas;
CREATE DATABASE personas CHARACTER SET utf8mb4;
USE personas;


CREATE TABLE `Personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
);


INSERT INTO personas (Nombre, Apellidos, Edad) VALUES ('Juan', 'Cuello Zaragoza', 40);
INSERT INTO personas (Nombre, Apellidos, Edad) VALUES ('Alicia', 'Martinez Perez', 35);
INSERT INTO personas (Nombre, Apellidos, Edad) VALUES ('Celia', 'Cuello Morales', 18);




