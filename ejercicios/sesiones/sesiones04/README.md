## 04 ALTA Y LOGIN

Hacer dos vistas:

### alta.php ###
Formulario de alta donde se pedirán al menos:
- nombre y apellidos
- telefono
- email (será nuestro nombre de usuario) *
- password *
- repite password *
- imagen

\* -> campos obligatorios

### procesar_alta.php ###
Recogeremos los datos del formulario para procesarlos. Haremos control de errores de dichos datos (falta @ en el email, password no coindice, etc...).

Si los datos son correctos, se guardarán en disco, en formato json (_data.json_). Podemos guardar más de un usuario. 

Otras consideraciones:
- No podemos tener usuarios con el mismo email.

### login.php ###
Formulario para loguearnos con alguno de los usuarios guardados en el archivo json. Se usará el email como usuario y la contraseña.
Si nos logueamos correctamente, mostraremos la información 


### procesar_login.php ###
Recogemos los datos del formulario de login para procesarlos, al igual que antes. Si no hemos rellenado algun campo, volveremos al login e informaremos del error.

Si hay datos, comprobaremos credenciales. En caso de ser correctas, mostraremos una tabla con los datos del usuario. Sino, mostraremos mensaje de error en el formlario de login.


### modelo.php ###
Archivo con la clase usuario. Usaremos objetos a la hora de crear un nuevo usuario y meterlo en la bbdd.

Podemos meter una imagen por defecto

```php
class Usuario
{
    public $nombre = "";
    public $apellidos = "";
    public $email = "";
    public $password = "";
    public $imagen = "";

    public function __construct()
    {
        $this->imagen = "default.png";
    }
}

```

### funciones.php ###
Es posible definir un archivo con funciones auxiliares a usar en el programa. Por ejemplo, podemos definir aqui la función recoge. También sería interesante crear una función para comprobar las credenciales. Esta segunda función, en lugar de devolver true o false, podría devolver el objeto usuario con todos sus campos si hay ido bien la comprobación de credenciales. En caso contrario, devolvería null. Es útil hacerlo así porque ya tenemos el objeto usuario para mostrar sus datos. 

```php

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


```