<?php
   class Matematicas{
	/* funcion factorial */
		public static function factorialEx($num){
			if ($num < 0) {
				throw new InvalidArgumentException("Número negativo");
			}	
			$resul = 1;
			for($i=2; $i <= $num; $i++){
				$resul = $resul * $i;
			}
			return $resul;
		}
   }