<?php

require_once(__DIR__ . "/config.php");

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
        //print "    <p>Error: No puede conectarse con la base de datos. {$e->getMessage()}</p>\n";
        return null;
        //exit;
    } finally {
        $tmp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        $tmp->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return $tmp;
    }
}

function obtenerEmpleadosBBDD()
{
    global $cfg;
    global $pdo;
    //$pdo = conectaDb();
    $consulta = "SELECT * FROM $cfg[nombretabla]";

    $resultado = $pdo->query($consulta);
    if (!$resultado) {
        return null;
    } else {

        $listaEmpleados = array(); //array con los datos

        //Creo un array de arrais asociativos. 
        foreach ($resultado as $registro) {
            $empleado = array(
                "id" => $registro["id"],
                "name" => $registro["name"],
                "address" => $registro["address"],
                "salary" => $registro["salary"]
            );
            array_push($listaEmpleados, $empleado);
        }
        return $listaEmpleados;
    }
}

function obtenerEmpleadoBBDD($id)
{

    global $cfg;
    global $pdo;

    //$pdo = conectaDb();
    $consulta = "SELECT * FROM $cfg[nombretabla] WHERE id=$id";

    $resultado = $pdo->query($consulta);
    if (!$resultado) {
        return null;
    } else {
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
}

function añadirEmpleadoBBDD($empleado)
{

    global $cfg;
    global $pdo;

    if ($pdo != null) {

        $consulta = "INSERT INTO $cfg[nombretabla] 
                    (`name`, `address`, `salary`)
                     VALUES (:name_, :address_, :salary_)";

        $resultado = $pdo->prepare($consulta);
        if (!$resultado) {
            return false;
        } elseif (!$resultado->execute([
            ":name_" => $empleado["name"],
            ":address_" => $empleado["address"],
            ":salary_" => $empleado["salary"]
        ])) {
            return false;
        } else {
            //Insercion OK
            return true;
            $pdo = null;
        }
    } else {
        //$pdo es null
        return false;
    }
}

function borrarEmpleadoBBDD($id)
{

    global $cfg;
    global $pdo;

    if ($pdo != null) {

        $consulta = "DELETE FROM $cfg[nombretabla]
                WHERE id = :indice";


        $resultado = $pdo->prepare($consulta);
        if (!$resultado) {
            return false;
        } elseif (!$resultado->execute([
            ":indice" => $id
        ])) {
            return false;
        } else {
            //Borrado OK
            return true;
            $pdo = null;
        }
    } else {
        //$pdo es null
        return false;
    }
}
