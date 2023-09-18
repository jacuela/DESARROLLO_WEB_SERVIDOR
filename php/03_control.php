<?php

$var = 3;
if ($var == 1) {
    echo "Es un uno";
} elseif ($var == 2) {
    echo "Es un dos";
} elseif ($var == 3) {
    echo "Es un tres";
} else {
    echo "No es un uno, ni un dos, ni un tresss";
}


print '<hr>';
$a = 3;
$b = "3";

if ($a == $b) {
    echo "Son iguales (mismo valor) <br>";
} else {
    echo "No son iguales <br>";
}

if ($a === $b) {
    echo "Son idénticos (mismo tipo y valor) <br>";
} else {
    echo "No son idénticos <br>";
}

print '<hr>';
for ($i = 0; $i < 5; $i = $i + 1) {
    echo "$i <br>";
}
print '<br>';

$matriz = [0, 1, 10, 100, 1000];
foreach ($matriz as $valor) {
    print $valor . "<br>\n";
}

print '<br>';

//Mira como interpolamos en la cadena el valor de la varible
foreach ($matriz as $indice => $valor) {
    print "$indice --> $valor <br>\n";
}
