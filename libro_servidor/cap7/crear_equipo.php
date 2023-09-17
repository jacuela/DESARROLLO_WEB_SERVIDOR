<?php
require_once "bootstrap.php";
require_once './src/Equipo.php';
$nuevo = new Equipo();
$nuevo->setNombre('Real Madrid');
$nuevo->setFundacion(1900);
$nuevo->setSocios(50000);
$nuevo->setCiudad('Madrid');
$entityManager->persist($nuevo);
$entityManager->flush();
echo "Equipo insertado " . $nuevo->getId() . "\n";
