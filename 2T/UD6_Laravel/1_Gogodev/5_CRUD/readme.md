## Proyecto: CRUD

### Descripción

El proyecto `crud` es una aplicación básica de gestión de datos que permite realizar operaciones CRUD (Crear, Leer, Actualizar y Eliminar) sobre una base de datos. Este proyecto está desarrollado utilizando Laravel, un framework de PHP.

### Funcionalidades

* **Crear** : Permite agregar nuevos registros a la base de datos.
* **Leer** : Permite visualizar los registros existentes en la base de datos.
* **Actualizar** : Permite modificar los registros existentes en la base de datos.
* **Eliminar** : Permite eliminar registros de la base de datos.

### Estructura del Proyecto

* **Controllers** : Contienen la lógica de negocio y manejan las solicitudes HTTP.
* **Models** : Representan las entidades de la base de datos.
* **Views** : Plantillas Blade que generan la interfaz de usuario.
* **Routes** : Definen las rutas de la aplicación.

### Instalación

1. Clona el repositorio del proyecto.
2. Ejecuta `composer install` para instalar las dependencias.
3. Configura el archivo `.env` con los detalles de tu base de datos.
4. Ejecuta `php artisan migrate` para crear las tablas en la base de datos.
5. Ejecuta `php artisan serve` para iniciar el servidor de desarrollo.

### Uso

1. Accede a la URL proporcionada por el servidor de desarrollo.
2. Utiliza la interfaz para realizar operaciones CRUD sobre los datos.

---

## Proyecto: CRUD_v1_Dinamicas

### Descripción

El proyecto `crud_v1_dinamicas` es una versión mejorada del proyecto `crud` que incluye funcionalidades dinámicas adicionales. Este proyecto también está desarrollado utilizando Laravel.

### Funcionalidades

* **Crear** : Permite agregar nuevos registros a la base de datos.
* **Leer** : Permite visualizar los registros existentes en la base de datos.
* **Actualizar** : Permite modificar los registros existentes en la base de datos.
* **Eliminar** : Permite eliminar registros de la base de datos.
* **Validación de Formularios** : Incluye validaciones en los formularios para asegurar la integridad de los datos.

### Estructura del Proyecto

* **Controllers** : Contienen la lógica de negocio y manejan las solicitudes HTTP.
* **Models** : Representan las entidades de la base de datos.
* **Views** : Plantillas Blade que generan la interfaz de usuario.
* **Request:**Se utiliza para acceder a los datos de la solicitud HTTP entrante.
* **Routes** : Definen las rutas de la aplicación.

### Instalación

1. Clona el repositorio del proyecto.
2. Ejecuta `composer install` para instalar las dependencias.
3. Configura el archivo `.env` con los detalles de tu base de datos.
4. Ejecuta `php artisan migrate` para crear las tablas en la base de datos.
5. Ejecuta `php artisan serve` para iniciar el servidor de desarrollo.
