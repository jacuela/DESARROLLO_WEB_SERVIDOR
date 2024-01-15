## 4 MENUS

Partiendo del ejercicio anterior, donde nos creamos la funcionanidad para el alta de usuario y el login de usuario, vamos a incluir un menú y un footer, creando una aplicación con cierta coherencia.

El menú y el footer serán archivos independientes, y lo que haremos, será incluirlos donde queramos. De esta forma, si hacemos algún cambio en el menu o el footer, solo tendremos que hacerlo en un único archivo.

**Otras tareas**

- Vamos a aprender a crearnos una cookie para guardar información en el lado del cliente. En este caso, indicaremos en la pantalla principal, nombre, la fecha y hora de creación del ultimo usuario.
- Almaceranemos la constraseña cifrada, usando la funcion *password_hash()* para encriptarla y *password_verify()* para desencriptarla.


![index sin loguear](img/index.png)

Al loguearnos, nos aparecerá la opción de perfil, el nombre del usuario, y logout, desaparaciendo login,
![index logueado](img/index_logueado.png)

![alta](img/alta.png)

![login](img/login.png)

Vista del perfil de usuario
![perfil](img/perfil.png)







