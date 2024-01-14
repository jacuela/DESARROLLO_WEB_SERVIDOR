<?php

require_once "funciones.php";

$pdo = conectaDb();


//Lista de parametros
$id = "2";
$nombre = "Alicia";

//Consulta preparada usando ?   El orden sí importa
$consulta_preparada1 = "SELECT * FROM personas WHERE id = ? AND nombre = ?";
$resultado = $pdo->prepare($consulta_preparada1);
$resultado->execute([$id, $nombre]);

//Consulta preparada usando :valor   El orden no importa
// $consulta_preparada2 = "SELECT * FROM personas WHERE id = :valor1 AND nombre = :valor2";
// $resultado = $pdo->prepare($consulta_preparada2);
// $resultado->execute([":valor2" => $nombre, ":valor1" => $id]);


print "<h2>CONSULTA PREPARADA</h2>";
print "<h3>REGISTROS CON ID:{$id} y NOMBRE:{$nombre}</h3>";

if (!$resultado) {
    print "    <p>Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} elseif ($resultado->rowCount() == 0) {
    print "<p>0 registros encontrados</p>";
} else {

    print "<p>" . $resultado->rowCount() . " registros encontrados</p>";
    print "    <table>\n";
    print "      <thead>\n";
    print "        <tr>\n";
    print "          <th>ID</th>\n";
    print "          <th>Nombre</th>\n";
    print "          <th>Apellidos</th>\n";
    print "          <th>Edad</th>\n";
    print "        </tr>\n";
    print "      </thead>\n";

    //USANDO UN FOREACH
    //OJO, EL BUCLE RECORRE LAS TUPLAS RESULTADO. LUEGO YA NO LAS TENDRÍAMOS
    foreach ($resultado as $registro) {
        print "      <tr>\n";
        print "        <td>$registro[id]</td>\n";
        print "        <td>$registro[nombre]</td>\n";
        print "        <td>$registro[apellidos]</td>\n";
        print "        <td>$registro[edad]</td>\n";
        print "      </tr>\n";
    }
    print "    </table>\n";
}


$pdo = null;
