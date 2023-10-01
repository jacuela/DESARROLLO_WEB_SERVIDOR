<?php


//######## FUNCION RECOGER
//Recoge los datos de los formularios y los depura
function recoge($var)
{
    if (isset($_REQUEST[$var])) {
        if ($_REQUEST[$var] != "") {
            $tmp = trim(htmlspecialchars(strip_tags($_REQUEST[$var])));
            return $tmp;
        }
    }
    return null;
}


//################ FUNCION PARA PINTAR UNA LISTA
function lista_a_tabla_html($lista)
{
    $s = '<table border="1">';

    $s .= '<tr>';
    foreach ($lista as $valor) {
        $s .= '<td>' . $valor . '</td>';
    }
    $s .= '</tr></table>';

    $s .= '</table>';
    return $s;
}

//################ FUNCION PARA PINTAR UNA MATRIZ SENCILLA, TIPO TABLA DE BD
function matriz_a_tabla_html($matriz)
{
    $s = '<table border="1">';

    //Me creo la cabecera
    $s .= '<thead><tr>';
    foreach ($matriz[0] as $key => $value) {
        //print "$key";
        $s .= "<th>$key</th>";
    }
    $s .= '</tr></thead>';

    //Me creo el cuerpo de la tabla
    foreach ($matriz as $r) {
        $s .= '<tr>';
        foreach ($r as $v) {
            $s .= '<td>' . $v . '</td>';
        }
        $s .= '</tr>';
    }
    $s .= '</table>';
    return $s;
}













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
function esPalindromo($cadena)
{
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
