<?php

// CONSTANTES DEFINIDAS
define("MYSQL", 1);                         // Base de datos MySQL

// Base de datos utilizada por la aplicación
$cfg["dbMotor"] = MYSQL;                                   // Valores posibles: MYSQL o SQLITE

// Configuración para MySQL
$cfg["mysqlHost"]     = "127.0.0.1";                        // Nombre de host
$cfg["mysqlUser"]     = "root";           // Nombre de usuario
$cfg["mysqlPassword"] = "";                                 // Contraseña de usuario
$cfg["mysqlDatabase"] = "empleados_api";           // Nombre de la base de datos

$cfg["nombretabla"] = "employees";       //Tabla usada 

//Necesito el CURRENT WORKING DIRECTORY
//define('APP_FOLDER', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])));
