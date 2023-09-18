<?php

/* declaracíon de variables */
$entero = 4; // tipo integer
$numero = 4.5;     // tipo coma flotante
$cadena = "cadena"; // tipo cadena de caracteres
$bool = True; //tipo booleano


//############ cambio de tipo de una variable */
$a = 5; // entero
echo gettype($a); // imprime el tipo de dato de a
echo "<br>";
$a = "Hola"; // cambia a cadena
echo gettype($a); // se comprueba que ha cambiado
print "<hr>";


//CONSTANTES
define("LIMITE", 1000);
print LIMITE.'<br>';
print "la const LIMITE vale ".LIMITE."<br>";
$suma = 1 + LIMITE;
print $suma;


// print "<pre>";
// print_r(get_defined_constants());
// print "</pre>\n";


//######### TIPO NUMERICOS #################

print "<hr>";
$a = 0b100; // 4 en binario
print $a . "<br>";

$a = 0100;  // 64 en octal
print $a . "<br>";

$a = 0xF; // 15 en hexadecimal
print $a . "<br>";


$a = 3 / 2;   // la división entre enteros no da problemas
echo $a . '<br>';    // 1.5	
$b = 7.5;
$a = (int) $b; // casting a int
echo $a . '<br>';    // 7, se trunca		



//###### VARIABLES PREDEFINIDAS
print '<hr>';
echo "Ruta dentro de htdocs: " . $_SERVER['PHP_SELF'].'<br>';
echo "Nombre del servidor: " . $_SERVER['SERVER_NAME'].'<br>';
echo "Software del servidor: " . $_SERVER['SERVER_SOFTWARE'].'<br>';
echo "Protocolo: " . $_SERVER['SERVER_PROTOCOL'].'<br>';
echo "Método de la petición: " . $_SERVER['REQUEST_METHOD'].'<br>';


//#### Interpolacion de variables
print '<hr>';
$name = "Juan";
echo "Me llamo $name".'<br>'; // output: Me llamo Juan
echo 'Me llamo $name'.'<br>'; // output: Me lamo $name

$prefijo="super";
print "estoy $prefijocontento".'<br>'; //mezcla variable con texto
print "estoy {$prefijo}contento".'<br>'; //interpola
print 'estoy {$prefijo}contento'.'<br>'; //con comillas simples no vale
print "Estoy $prefijo"."contento".'<br>';


//######## ASIGNACION POR REFERENCIA
print "<hr>";
$var1 = 100; 
$var2 = &$var1;  // asignación por referencia
$var3 = $var1;   // asignación por copia
echo "$var2<br>";// muestra 100
$var2 = 300;     // cambia el valor de $var2
echo "$var1<br>";// $var1 también cambia
$var3 = 400;     // este cambio no afecta a $var1
echo $var3;

