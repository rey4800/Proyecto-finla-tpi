# Proyecto Final TPI Aplicación Web Para Administrar Una Pequeña Página Para Comprar y Rentar Películas. 



_Desarrollo de una aplicación para la administración de una pequeña pagina de compra y renta de peliculas tomando en cuenta acciones administrativas CRUD llevandolas a cabo a través de API REST._



## Comenzando 🚀

_Tenemos Algunos aspectos importantes que debe hacer el proyecto como los siguientes._

### Aspectos de seguridad:
- _Agregue la funcionalidad de inicio de sesión / cierre de sesión._

- _Solo los administradores pueden agregar, modificar, quitar o eliminar películas_.

- _Solo los usuarios registrados pueden alquilar y comprar películas_.
- _Solo los usuarios registrados pueden dar me gusta a las películas_.

- _Todos (autenticados o no) pueden obtener la lista de películas._
- _Todos (autenticados o no) pueden obtener el detalle de una película_.

#### Otros de los aspectos más importantes que  hace la pagina es lo siguiente:

1. _Los usuarios pueden alquilar y comprar una película. Para la funcionalidad de alquiler, debe realizar un
seguimiento de cuándo el usuario debe devolver la película y aplicar una multa monetaria si hay un retraso_

2. _A los usuarios les pueden gustar las películas._

3. _La lista se ordenar por título (predeterminado) y por popularidad (me gusta)._

_Entre otros Aspectos_.

***
## Desarrollado con 🛠️

_Las herramientas que utilizamos para la creación y desarrollo del proyecto son:_

* [PHP](https://www.php.net/manual/es/index.php) - Lenguaje de programación para el desarrollo web.
* [Laravel 6.0](https://laravel.com/docs/6.x) -  frameworks de código abierto más fáciles de asimilar para PHP. 
* [Bootstrap 5](https://getbootstrap.com/) -  framework front-end utilizado para desarrollar la aplicación web .
* [XAMPP](https://www.apachefriends.org/es/index.html) -  Utilizado como de software  comom sistema de gestión de bases de datos MySQL, el servidor web Apache y los intérpretes para lenguajes de script PHP.
* [Composer](https://getcomposer.org/) - sistema de gestión de paquetes para programar en PHP el cual provee los formatos estándar necesarios para manejar dependencias y librerías de PHP.


***
### Instalación 🔧

_Primero tenemos  que tener descargado el proyecto y tener instalado las herramientas Composer y XAMPP explicados en el apartado anterior_


_Ya teniendo los requisitos anteriores:_

_Abrimos el programa XAMPP y Iniciamos las siguientes opciones:_


(https://github.com/rey4800/Proyecto-finla-tpi/blob/main/xampp.PNG)

_Importar la base de datos con el nombre db_movie_

_Luego hacemos el siguiente paso_


_Como primer paso abrimos la consola en la carpeta del proyecto para dirígete al directorio donde guardas tus proyectos web (si usas XAMPP la ruta es C:\xampp\htdocs\movie_

_Escribimos lo siguiente (para evitar errores de versiones) y damos enter:_
```
composer update
```

*Los siguientes comandos se utilizan cuando no importamos la base de datos esto para crearla de una vez:

_Luego en la misma consola digitamos lo siguiente para migrar toda la base de datos de manera automatica_.

```
php artisan migrate
```

_Luego en la misma consola digitamos lo siguiente para tener unos registros por default para poder acceder al proyecto_.


```
php artisan db:seed
```

_Para Finalizar solo abrimos el proyecto en el navegador con su ruta correspondiente en XAMPP_.

***

### Informacion Importante del Proyecto 📋

_Los modulos al momento de pagar por la pelicula, pagar la renta de la pelicula o pagar la multa de la pelicula son simulados es decir no acepta pagos reales, la API para realizar pagos reales no esta implementada ._

_Los usuarios administradores los crea por default los cuales son:_
* _email: miguel@ues.com contraseña:1234567*_
*  _email: pr19004@ues.edu.sv contraseña: abcdefghij*_


***
## Autores ✒️

_Para llevar acabo el proyecto contamos con la participación de los integrantes del Equipo siguientes_

* 📌**Reynaldo Daniel Panameño Romero** - *PR19004* 📢 **Lider**. 
* 📌**Gabriel Antonio Alegría Castillo** - *CA19040*
* 📌**Miguel Ángel Ayala Bejarano** - *AB19015*
* 📌**Carlos Humberto Posada Gaitán** - *PG19029*




