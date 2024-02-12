<?php
require_once(__DIR__ . "/src/funciones.php");

header("Access-Control-Allow-Origin: *");

header("Content-Type: application/json; charset=UTF-8");
//header("Content-Type: text/plain; charset=UTF-8");

header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($uri[1] !== 'personas') {
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
            //-------------------------------
            //Endpoint    /personas/X
            //-------------------------------
            //Tendria que conectarme a la bbdd para obtener la persona con dicho id
            $pdo = conectaDb();
            $persona = obtenerPersonaBBDD($userId);

            if ($persona == null) {
                header("HTTP/1.1 404 Not Found");
                exit();
            }
            $respuesta = $persona;
            header("HTTP/1.1 200 OK");
            echo json_encode($respuesta);
            exit();
        } else {
            //-------------------------------
            //Endpoint    /personas/
            //-------------------------------
            //Pedir la lista de personas a la bbdd
            $pdo = conectaDb();

            $listaPersonas = obtenerPersonasBBDD();

            //Debug-----
            //print_r($listaPersonas);
            //------------

            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! usar === en lugar de ==
            if ($listaPersonas === null) {
                header("HTTP/1.1 500 Internat Server Error");
                exit();
            }

            $respuesta = $listaPersonas;
            header("HTTP/1.1 200");
            echo json_encode($respuesta);
            exit();
        }
        break;

    case 'POST':
        if ($userId != null) {
            //-------------------------------
            //Endpoint POST /personas/X
            //-------------------------------

            //######### SIN PROGRAMAR ############
            header("HTTP/1.1 404 Not Found");
            exit();
        } else {

            //-------------------------------
            //Endpoint POST /personas/
            //-------------------------------
            $data = (array) json_decode(file_get_contents('php://input'), TRUE);

            // echo json_encode($data);
            // exit;
            //file_put_contents("php://stdout", "\nDEBUG");

            //file_put_contents("php://stdout", "\nData[apellidos]:$data[apellidos]");


            //Añadir datos a la bbdd
            $pdo = conectaDb();
            $insercionOK = añadirPersonaBBDD($data);



            if ($insercionOK) {
                $respuesta = ['mensaje' => "Persona añadido."];
                header("HTTP/1.1 201");
                echo json_encode($respuesta);
                exit();
            } else {
                $respuesta = ['mensaje' => 'Error al añadir persona.'];
                header("HTTP/1.1 500");
                echo json_encode($respuesta);
                exit();
            }
        }
        break;

    case 'DELETE':
        //-------------------------------
        //Endpoint DELETE /personas/X
        //-------------------------------
        if ($userId == null) {
            header("HTTP/1.1 404 Not Found");
            exit();
        } else {
            $pdo = conectaDb();
            $borrarOK = borrarPersonaBBDD($userId);

            if ($borrarOK) {
                $respuesta = ['mensaje' => "Persona borrada."];
                header("HTTP/1.1 200 OK");
                echo json_encode($respuesta);
                exit();
            } else {
                $respuesta = ['mensaje' => 'Error al borrar persona.'];
                header("HTTP/1.1 500");
                echo json_encode($respuesta);
                exit();
            }
        }
        break;
    default:
        header("HTTP/1.1 404 Not Found");
        exit();
}




//file_put_contents("php://stdout", "\nMethod:$requestMethod");
//file_put_contents("php://stdout", "\nLista:$lista");
            //file_put_contents("php://stdout", "\nHOLA4");
