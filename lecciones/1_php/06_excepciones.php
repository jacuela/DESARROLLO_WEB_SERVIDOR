<?php

//####  Excepciones

function dividir($a, $b)
{
    if ($b == 0) {
        throw new Exception('ERROR: Division por cero');
    }
    return $a / $b;
}

try{
    $a = 5;
    $b = 3;   //probar con el valor 0
    $resultado = dividir($a, $b);
    print "$a divido por $b es ". number_format($resultado,3). "<br>";
}catch (Exception $e) {
    print "Excepcion capturada: " . $e->getMessage();
}



