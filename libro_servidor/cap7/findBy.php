<?php
require_once "bootstrap.php";
require_once './src/Jugador.php';
require_once './src/Equipo.php';

/*Con findBy/findOneBy:
- Jugadores con exactamente XX años..*/
echo "Jugadores con 12 años<br>";
$jugadores = $entityManager->getRepository('Jugador')->findBy(array('edad' => 12));

foreach($jugadores as $jugador)
{
	echo "Nombre: ". $jugador->getNombre(). " ". $jugador->getApellidos(). "<br>";

}

//Equipos de Madrid fundados en 1900.
echo "Equipos de Madrid fundados en 1900<br>";
$equipos = $entityManager->getRepository('Equipo')->findBy(array('fundacion' => 1900, 'ciudad'=>'Madrid'));
foreach($equipos as $equipo)
{
	echo "Nombre: ". $equipo->getNombre()."<br>";

}

/**Equipo cuyo nombre es "Real Madrid"*/
echo "Equipos cuyo nombre es 'Real Madrid'<br>";
$equipo = $entityManager->getRepository('Equipo')->findOneBy(array('nombre' => 'Real Madrid'));
echo "Nombre: ". $equipo->getNombre(). " ". $equipo->getFundacion(). " ". $equipo->getCiudad()."<br>";