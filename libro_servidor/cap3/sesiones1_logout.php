<?php
	session_start();    // unirse a la sesión
						//comprobar si existe la variable usuario????
	$_SESSION = array();
	session_destroy();	// eliminar la sesion
	setcookie(session_name(), 123, time() - 1000); // eliminar la cookie
	header("Location: sesiones1_login.php");