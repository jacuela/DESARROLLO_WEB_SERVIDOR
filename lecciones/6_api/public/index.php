<?php

header("Access-Control-Allow-Origin: *");

header("Content-Type: application/json; charset=UTF-8");
//header("Content-Type: text/plain; charset=UTF-8");

header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($uri[1] !== 'empleados') {
    header("HTTP/1.1 404 Not Found");
    exit();
}

// Miramos a ver si hay userid en el endpoint
$userId = null;
if (isset($uri[2])) {
    $userId = (int) $uri[2];
}

switch ($requestMethod) {
    case 'GET':
        if ($userId != null) {
            //Endpoint    /empleados/X

            //Tendria que conectarme a la bbdd para obtener el emepleado con dicho id
            $body = "Persona con id " . $userId;
            header("HTTP/1.1 200 ok");
            echo json_encode($body);
            exit();
        }else{
            //Tendriamos que conectarnos a la bbdd y devolver lista empleados
            $body = "Lista de empleados";
            header("HTTP/1.1 200");
            echo json_encode($body);
            exit();

        }

    default:
        header("HTTP/1.1 404 Not Found");
        exit();
}




//file_put_contents("php://stdout", "\nMethod:$requestMethod");
