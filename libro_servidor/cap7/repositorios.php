<?php
// repositorios.php
require_once "bootstrap.php";
require_once './src/Jugador.php';
require_once './src/Equipo.php';

/*usar el repositorio*/
$jugadores = $entityManager->getRepository('Equipo')->getLista("Real Madrid");
if($jugadores === -1)
{
	echo "Equipo no encontrado";
	}else
	{
		foreach($jugadores as $jugador)
		{
			echo "Nombre: ". $jugador->getNombre(). " ". $jugador->getApellidos(). "<br>";
		}
}
	// Este falla
	$jugadores = $entityManager->getRepository('Equipo')->getLista("Manchester");
	if($jugadores === -1)
	{
		echo "Equipo no encontrado";
	}
	else{
		foreach($jugadores as $jugador)
		{
			echo "Nombre: ". $jugador->getNombre(). " ". $jugador->getApellidos(). "<br>";
		}
}
