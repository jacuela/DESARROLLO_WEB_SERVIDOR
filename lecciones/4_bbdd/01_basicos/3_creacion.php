<?php

require_once "funciones.php";

$pdo = conectaDb();

//BORRO LA BBDD
$consulta = "DROP DATABASE IF EXISTS $cfg[mysqlDatabase_prueba]";

if (!$pdo->query($consulta)) {
    print "    <p>Error al borrar la base de datos. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} else {
    print "    <p>Base de datos borrada correctamente (si existía).</p>\n";
}

//CREO LA BBDD
$consulta = "CREATE DATABASE $cfg[mysqlDatabase_prueba]
             CHARACTER SET utf8mb4
             COLLATE utf8mb4_unicode_ci";

if (!$pdo->query($consulta)) {
    print "    <p>Error al crear la base de datos. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} else {
    print "    <p>Base de datos creada correctamente.</p>\n";
    $consulta = "USE $cfg[mysqlDatabase_prueba]";

    if (!$pdo->query($consulta)) {
        print "<p>Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
        print "<p>Base de datos seleccionada correctamente.</p>\n";
    }
}

//CREO LA TABLA
$consulta = "CREATE TABLE personas (
    id INTEGER UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(255),
    apellidos VARCHAR(255),
    edad INT UNSIGNED,
    PRIMARY KEY(id)
    )";

if (!$pdo->query($consulta)) {
    print "    <p>Error al crear la tabla. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
} else {
    print "    <p>Tabla creada correctamente.</p>\n";
}
