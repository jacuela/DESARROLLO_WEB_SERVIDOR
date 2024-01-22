<?php

require_once("config.php");

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
        print "        <li><a href='borrar-todo-1.php'>Borrar todo</a></li>\n";
        print "        <li><a href='listar.php'>Listar</a></li>\n";
        print "        <li><a href='insertar-1.php'>Insertar</a></li>\n";

    } elseif ($menu == MENU_VOLVER) {
        print "        <li><a href='index.php'>Volver</a></li>\n";
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

    print "    <p>Sistema Gestor de Bases de Datos: MySQL.</p>\n";
    print "\n";

    $consulta = "DROP DATABASE IF EXISTS $cfg[mysqlDatabase]";

    if (!$pdo->query($consulta)) {
        print "    <p class=\"aviso\">Error al borrar la base de datos. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
        print "    <p>Base de datos borrada correctamente (si existía).</p>\n";
    }
    print "\n";

    $consulta = "CREATE DATABASE $cfg[mysqlDatabase]
                 CHARACTER SET utf8mb4
                 COLLATE utf8mb4_unicode_ci";

    if (!$pdo->query($consulta)) {
        print "    <p class=\"aviso\">Error al crear la base de datos. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
    } else {
        print "    <p>Base de datos creada correctamente.</p>\n";
        print "\n";

        $consulta = "USE $cfg[mysqlDatabase]";

        if (!$pdo->query($consulta)) {
            print "    <p class=\"aviso\">Error en la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
            return false;
        } else {
            print "    <p>Base de datos seleccionada correctamente.</p>\n";
            print "\n";

            $consulta = "CREATE TABLE $cfg[nombretabla] (
                         id INTEGER UNSIGNED AUTO_INCREMENT,
                         nombre VARCHAR(255),
                         apellidos VARCHAR(255),
                         PRIMARY KEY(id)
                         )";

            if (!$pdo->query($consulta)) {
                print "    <p class=\"aviso\">Error al crear la tabla. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()[2]}</p>\n";
                return false;
            } else {
                print "    <p>Tabla creada correctamente.</p>\n";
                return true;
            }
        }
    }
}