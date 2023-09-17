<?php
	echo "Ruta dentro de htdocs: " . $_SERVER['PHP_SELF'];
	echo "Nombre del servidor: " . $_SERVER['SERVER_NAME'];
	echo "Software del servidor: " . $_SERVER['SERVER_SOFTWARE'];
	echo "Protocolo: " . $_SERVER['SERVER_PROTOCOL'];
	echo "Método de la petición: " . $_SERVER['REQUEST_METHOD'];
