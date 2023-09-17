<?php
  require_once "bootstrap.php";
  require_once './src/Equipo.php';
  require_once './src/Jugador.php';
  $id = $_GET['id'];
  /*buscar el jugador con el id indicado*/
  $jugador = $entityManager->find("Jugador", $id);
  if(!$jugador){
 	echo "Jugador no encontrado";
  }else{
	echo "Nombre del jugador: ". $jugador->getNombre()."<br>";
	$equipo = $jugador->getEquipo();
	echo "Nombre del equipo: ". $equipo->getNombre();
  }
