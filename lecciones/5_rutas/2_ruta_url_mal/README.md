# PROBLEMA DE RUTAS 2
## Rutas en la url de un enlace

En este ejercicio vemos como la URL de un enlace puede estar mal si usamos una función para generar dicha URL y llamamos a la función desde diferentes carpetas y subcarpetas. 
Si pensamos en ello, es normal, pues como indicamos URL's relativas, dependiendo de donde carguemos dicha URL, habrá que indicar una u otra. 

Podemos solucionar el problema definiendo una constante, en esta caso, APP_FOLDER, que nos devuelve la URL absoluta donde comienza nuestra aplicación, y a partir de ella, podemos contruir la URL correcta.

```php
define('APP_FOLDER', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])) . '/');
```

Esta constante la podemos definir en un archivo de configuración, por ejemplo, _config.php_ que suele estar en el raiz del proyecto.