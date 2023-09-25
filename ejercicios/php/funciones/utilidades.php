<?php

//############# FUNCION SALUDAR
function saludar($nombre = "usuario")
{
    return "Hola $nombre";
}


//############# FUNCION SUMAR
function sumar($a, $b)
{
    return $a + $b;
}

//#############
// Función que resuelva ecuaciones de 2º grado ax2+bx+c=0
// Recibe los coeficientes y devuelve un array con las soluciones
// Si no hay soluciones reales, devuelve false

function ecuacion_grado_2($a, $b, $c)
{
    // Coeficientes de la ecuación de segundo grado
    $solucion = [];

    // Calcula el discriminante
    $discriminante = $b * $b - 4 * $a * $c;

    // Calcula las soluciones
    if ($discriminante > 0) {
        // Dos soluciones reales
        $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
        $x2 = (-$b - sqrt($discriminante)) / (2 * $a);
        //echo "Las soluciones son x1 = $x1 y x2 = $x2";
        $solucion[] = $x1;
        $solucion[] = $x2;
        return $solucion;

    } elseif ($discriminante == 0) {
        // Una solución real
        $x1 = -$b / (2 * $a);
        //echo "La solución única es x1 = $x1";
        $solucion[] = $x1;
        return $solucion;
    } else {
        // No hay soluciones reales
        //echo "No hay soluciones reales";
        return false;
    }
}


//#############
// Función que te diga si una cadena es un palíndromo
function esPalindromo($cadena) {
    // Elimina espacios en blanco y convierte todo a minúsculas
    $cadena = strtolower(str_replace(' ', '', $cadena));
    
    // Invierte la cadena
    $cadenaInvertida = strrev($cadena);
    
    // Compara la cadena original con la cadena invertida
    if ($cadena == $cadenaInvertida) {
        return true;
    } else {
        return false;
    }
}
