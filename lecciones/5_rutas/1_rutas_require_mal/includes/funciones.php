<?php

//ESTO FALLA
//require_once('../config.php');

//ESTO LO SOLUCIONA
require_once(__DIR__ . '/../config.php');


function ir_a_inicio()
{
    print("<br>");
    print "<p><a href='index.php'>Ir a index.php</a></p>";
    print "<p><a href='otro.php'>Otro</a></p>";
}
