<?php

//####  Excepciones

function dividir($a, $b)
{
    if ($b == 0) {
        throw new Exception('ERROR: Division por cero');
    }
    return $a / $b;
}

$a = 4;
$b = 3;
$resultado = dividir($a, $b);
print "$a divido por $b es $resultado" . "<br>";

try {
    $a = 4;
    $b = 0;
    $resultado = dividir($a, $b);
    print "$a divido por $b es $resultado" . "<br>";
} catch (Exception $e) {
    print "Excepcion capturada: " . $e->getMessage();
}

