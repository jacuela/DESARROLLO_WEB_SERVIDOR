<?php

require_once(__DIR__ . "/../config.php");

function pie()
{

    print "  <footer>\n";
    print "    <p class=\"ultmod\">\n";
    print "      Creado por Juan Antonio Cuello\n";
    print "    </p>\n";
    print "\n";
    print "  </footer>\n";
}

function cabecera($texto, $menu)
{
    print "  <header>\n";
    print "    <h1>Bases de datos - $texto</h1>\n";
    print "\n";
    print "    <nav>\n";
    print "      <ul>\n";
    if ($menu == MENU_PRINCIPAL) {
        print "        <li><a href='" . APP_FOLDER . "/index.php'>Inicio</a></li>\n";
        print "        <li><a href='" . APP_FOLDER . "/listar.php'>Listar</a></li>\n";
        print "        <li><a href='" . APP_FOLDER . "/insertar-1.php'>Insertar-1</a></li>\n";
        print "        <li><a href='" . APP_FOLDER . "/insertar-1_v2.php'>Insertar-1_v2</a></li>\n";
        print "        <li><a href='" . APP_FOLDER . "/modificar-1.php'>Modificar</a></li>\n";
        print "        <li><a href='" . APP_FOLDER . "/borrar-1.php'>Borrar</a></li>\n";
        print "        <li><a href='" . APP_FOLDER . "/borrar-todo-1.php'>Borrar todo</a></li>\n";
    } elseif ($menu == MENU_VOLVER) {
        print "        <li><a href='" . APP_FOLDER . "/index.php'>Volver</a></li>\n";
    } else {
        print "        <li>Error en la selección de menú</li>\n";
    }
    print "      </ul>\n";
    print "    </nav>\n";
    print "  </header>\n";
    print "\n";
}


//######## FUNCION RECOGER
//Recoge los datos de los formularios y los depura para no meter código malicioso
//Esta función no comprueba errores.
//ENTRADA: el nombre del campo a recoger, indicado por el atributo 'name' del formulario
//SALIDA: el valor del campo o null si está vacio
function recoge($var)
{
    if (isset($_REQUEST[$var])) {
        if ($_REQUEST[$var] != "") {
            $tmp = trim(htmlspecialchars(strip_tags($_REQUEST[$var])));
            return $tmp;
        }
    }
    return null;
}

function recogeLista($var)
{
    if (isset($_REQUEST[$var]) && is_array($_REQUEST[$var])) {
        return $_REQUEST[$var];
    }
    return null;
}



//######## FUNCION CONSUMIR_ENDPOINT
//ENTRADA:
//    $body: json con los datos a enviar
//SALIDA: 
//    $resultado: json con la respuesta
function conectar_endpoint($tipo, $url, $body)
{
    $curlHandle = curl_init();
    curl_setopt($curlHandle, CURLOPT_URL, $url);
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);

    //Header
    $headers = array(
        "Content-Type: application/json; charset=UTF-8"
    );
    curl_setopt($curlHandle, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curlHandle, CURLOPT_HEADER, false);


    if ($tipo == "POST") {
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $body);
    }

    $response = curl_exec($curlHandle);
    curl_close($curlHandle);

    return $response;
}








//Esta funcion me devuelve el PDO
function conectaDb()
{
    global $cfg;

    try {
        //Conecto a una bbdd concreta
        $tmp = new PDO("mysql:host=$cfg[mysqlHost];dbname=$cfg[mysqlDatabase];charset=utf8mb4", $cfg["mysqlUser"], $cfg["mysqlPassword"]);
    } catch (PDOException $e) {
        //Conecto pero sin escoger la bbdd. Por ejemplo, si voy a crearla
        $tmp = new PDO("mysql:host=$cfg[mysqlHost];charset=utf8mb4", $cfg["mysqlUser"], $cfg["mysqlPassword"]);
    } catch (PDOException $e) {
        print "    <p>Error: No puede conectarse con la base de datos. {$e->getMessage()}</p>\n";
        return null;
        //exit;
    } finally {
        $tmp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        $tmp->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return $tmp;
    }
}

// MYSQL: Borrado y creación de base de datos y tablas

function borraTodo()
{
    global $pdo, $cfg;
    $mensaje = "";

    $consulta = "DROP DATABASE IF EXISTS $cfg[mysqlDatabase]";

    if (!$pdo->query($consulta)) {
        //print "    <p class=\"aviso\">Error al borrar la base de datos." SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
        $mensaje = $mensaje . "<p class=\"aviso\">Error al borrar la base de datos.</p>";
    } else {
        //print "    <p>Base de datos borrada correctamente (si existía).</p>\n";
        $mensaje = $mensaje . "<p>Base de datos borrada correctamente (si existía).</p>";
    }


    $consulta = "CREATE DATABASE $cfg[mysqlDatabase]
                 CHARACTER SET utf8mb4
                 COLLATE utf8mb4_unicode_ci";

    if (!$pdo->query($consulta)) {
        //print "    <p class=\"aviso\">Error al crear la base de datos. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
        $mensaje = $mensaje . "<p class=\"aviso\">Error al crear la la base de datos.</p>";
    } else {
        //print "    <p>Base de datos creada correctamente.</p>\n";
        $mensaje = $mensaje . "<p>Base de datos creada correctamente (si existía).</p>";

        $consulta = "USE $cfg[mysqlDatabase]";

        if (!$pdo->query($consulta)) {
            //print "    <p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            $mensaje = $mensaje . "<p class=\"aviso\">Error en la consulta.</p>";
            //return false;
            return $mensaje;
        } else {
            //print "    <p>Base de datos seleccionada correctamente.</p>\n";
            $mensaje = $mensaje . "<p>Base de datos seleccionada correctamente</p>";


            $consulta = "CREATE TABLE $cfg[nombretabla] (
                         id INTEGER UNSIGNED AUTO_INCREMENT,
                         nombre VARCHAR(255),
                         apellidos VARCHAR(255),
                         PRIMARY KEY(id)
                         )";

            if (!$pdo->query($consulta)) {
                //print "    <p class=\"aviso\">Error al crear la tabla. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
                $mensaje = $mensaje . "<p class=\"aviso\">Error al crear la tabla.</p>";
                //return false;
                return $mensaje;
            } else {
                //print "    <p>Tabla creada correctamente.</p>\n";
                $mensaje = $mensaje . "<p>Tabla creada correctamente.</p>";
                //return true;
                return $mensaje;
            }
        }
    }
}
