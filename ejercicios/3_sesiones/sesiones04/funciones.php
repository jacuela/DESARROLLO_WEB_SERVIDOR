<?php


//######## FUNCION RECOGER
//Recoge los datos de los formularios y los depura para no meter código malicioso
//Esta finción no comprueba errores.
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



//######## FUNCION CHECKUSER
//Función para comprobar las credenciales de un usuario
//ENTRADA: el email y el password 
//SALIDA: objeto usario con sus datos en caso de existo y null en caso de error.

function checkuser($user, $password)
{
    //Recupero la lista de usuarios
    $lista_usuarios = [];
    $file = 'bbdd/data.json';    //la carpeta bbdd debe existir

    $jsonData = file_get_contents("./{$file}", FILE_USE_INCLUDE_PATH);
    $lista_usuarios = json_decode($jsonData);

    foreach ($lista_usuarios as $usuario) {
        if ($usuario->email == $user and $usuario->password == $password) {

            //Me creo el objeto. Podría haber devuelto directamente el object literal, sin usar la clase Usuario
            $usuarioObjeto = new Usuario;
            $usuarioObjeto->nombre = $usuario->nombre;
            $usuarioObjeto->apellidos = $usuario->apellidos;
            $usuarioObjeto->email = $usuario->email;
            $usuarioObjeto->password = $usuario->password;
            $usuarioObjeto->imagen = $usuario->imagen;
            return $usuarioObjeto;
            //return $usuario;
        }
    }
    return null;
}


//######## FUNCION CHECKUSER
//Función para comprobar las credenciales de un usuario
//ENTRADA: el email y el password 
//SALIDA: objeto usario con sus datos en caso de existo y null en caso de error.
function existeUsuario($mail)
{
    //Recupero la lista de usuarios
    $lista_usuarios = [];
    $file = 'bbdd/data.json';    //la carpeta bbdd debe existir

    $jsonData = file_get_contents("./{$file}", FILE_USE_INCLUDE_PATH);
    $lista_usuarios = json_decode($jsonData);

    foreach ($lista_usuarios as $usuario) {
        if ($usuario->email == $mail) {
            return true;
        }
    }
    return false;
}
