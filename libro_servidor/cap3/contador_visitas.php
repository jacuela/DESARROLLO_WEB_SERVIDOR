<?php 
/*buscamos la cookie "visitas"
  si no existe se crea con valor 1
  si existe, se le suma 1
  
  En los dos casos se muestra un mensaje apropiado
*/
	if(!isset($_COOKIE['visitas'])){
		setcookie('visitas', '1', time() + 3600 * 24);
		echo "Bienvenido por primera vez";
	}else{
		$visitas = (int) $_COOKIE['visitas'];
		
		$visitas++;
		setcookie('visitas', $visitas, time() + 3600 * 24);
		echo "Bienvenido por $visitas vez";
	}