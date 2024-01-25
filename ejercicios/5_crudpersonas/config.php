<?php

// CONSTANTES DEFINIDAS
define("MYSQL", 1);                         // Base de datos MySQL

define("MENU_PRINCIPAL", 1);                // Menú principal
define("MENU_VOLVER", 2);                   // Menú Volver a inicio


// Base de datos utilizada por la aplicación
$cfg["dbMotor"] = MYSQL;                                   // Valores posibles: MYSQL o SQLITE

// Configuración para MySQL
$cfg["mysqlHost"]     = "localhost";                        // Nombre de host
$cfg["mysqlUser"]     = "root";           // Nombre de usuario
$cfg["mysqlPassword"] = "";                                 // Contraseña de usuario
$cfg["mysqlDatabase"] = "crudpersonas";           // Nombre de la base de datos

$cfg["nombretabla"] = "personas";       //Tabla usado en el CRUD
