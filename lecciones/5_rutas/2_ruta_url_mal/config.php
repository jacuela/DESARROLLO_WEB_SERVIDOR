<?php


//Solucion al problema: definir una constante, por ejemplo, en un archivo de configuración
//Necesito el CURRENT WORKING DIRECTORY
define('APP_FOLDER', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])) . '/');
