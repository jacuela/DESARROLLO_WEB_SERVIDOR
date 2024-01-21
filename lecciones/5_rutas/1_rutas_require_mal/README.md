# PROBLEMA DE RUTAS 1
## Rutas en require() y include()
En este ejercicio vemos como en ocasiones, debido a la estructura de nuestro proyecto, al poner la ruta relativa con un require/include, no es capaz de acceder
al archivo.

PHP se pierde un poco al construir las rutas relativas.

Podemos solucionar el problema usando la constante \_\_DIR\_\_, que nos indica la ruta absoluta de donde se invoca
dicha constante. A partir de esta, podemos construir la ruta al archivo.

