<?php

function ir_a_inicio()
{
    print("<br>");
    print "<p><a href='index.php'>Ir a index.php</a></p>";
    print "<p><a href='otro.php'>Otro</a></p>";
}


// PARA SOLUCIONAR EL PROBLEMA
// require_once(__DIR__ . '/../config.php');

// function ir_a_inicio()
// {
//     print("<br>");
//     print "<p><a href='" . APP_FOLDER . "index.php'>Ir a index.php</a></p>";
//     print "<p><a href='" . APP_FOLDER . "otro.php'>Otro</a></p>";
// }
