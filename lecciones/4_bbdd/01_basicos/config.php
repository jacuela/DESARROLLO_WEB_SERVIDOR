<?php

// CONSTANTES DEFINIDAS
define("SQLITE", 2);                        // Base de datos SQLITE
define("MYSQL", 1);                         // Base de datos MySQL

// Base de datos utilizada por la aplicación
$cfg["dbMotor"] = MYSQL;                                   // Valores posibles: MYSQL o SQLITE

// Configuración para MySQL
$cfg["mysqlHost"]     = "localhost";                        // Nombre de host
$cfg["mysqlUser"]     = "root";           // Nombre de usuario
$cfg["mysqlPassword"] = "";                                 // Contraseña de usuario
$cfg["mysqlDatabase"] = "personas";           // Nombre de la base de datos
