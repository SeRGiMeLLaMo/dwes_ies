# 9_AutenticacionAPI

# Introduccion

## middleware:

El middleware  **es un software con el que las diferentes aplicaciones se comunican entre sí** . Brinda funcionalidad para conectar las aplicaciones de manera inteligente y eficiente, de forma que se pueda innovar más rápido.

**(con respeccto a los Middleware)**

En Laravel 11, la estructura del framework ha evolucionado, y algunos archivos y configuraciones han cambiado. Si ya no encuentras el archivo `app/Http/Kernel.php`, es porque Laravel ha simplificado la forma en que se manejan los middlewares.

En Laravel 11, los middlewares se registran directamente en el archivo `bootstrap/app.php`. Aquí te explico cómo añadir un nuevo middleware en 

Laravel 11:

### 1. Crear el Middleware

Primero, crea el middleware si aún no lo has hecho. Puedes usar el comando de Artisan para generar un nuevo middleware:

```
php artisan make:middleware NombreDelMiddleware
```

Esto creará un archivo en `app/Http/Middleware/NombreDelMiddleware.php`.

### 2. Registrar el Middleware

En Laravel 11, los middlewares se registran en el archivo `bootstrap/app.php`. Abre este archivo y busca la sección donde se registran los middlewares. Deberías ver algo como esto:

```
$app->middleware([
    // Middlewares globales
]);

$app->middlewareGroups([
    'web' => [
        // Middlewares para el grupo 'web'
    ],
    'api' => [
        // Middlewares para el grupo 'api'
    ],
]);

$app->routeMiddleware([
    // Middlewares de ruta
]);
```

#### Middleware Global

Si quieres que el middleware se aplique a todas las solicitudes, regístralo en la sección `$app->middleware([])`:

```
$app->middleware([
    \App\Http\Middleware\NombreDelMiddleware::class,
    // Otros middlewares globales
]);
```

#### Middleware de Grupo

Si quieres que el middleware se aplique solo a un grupo específico (como `web` o `api`), regístralo en la sección correspondiente:

```
$app->middlewareGroups([
    'web' => [
        \App\Http\Middleware\NombreDelMiddleware::class,
        // Otros middlewares para el grupo 'web'
    ],
    'api' => [
        // Middlewares para el grupo 'api'
    ],
]);
```

#### Middleware de Ruta

Si quieres aplicar el middleware solo a rutas específicas, regístralo en la sección `$app->routeMiddleware([])`:

```
$app->routeMiddleware([
    'nombre' => \App\Http\Middleware\NombreDelMiddleware::class,
    // Otros middlewares de ruta
]);
```

Luego, puedes aplicar este middleware a rutas específicas usando el alias que has definido:

```
Route::get('/ruta', function () {
    // ...
})->middleware('nombre');
```

### 3. Aplicar el Middleware

Dependiendo de cómo hayas registrado el middleware, se aplicará automáticamente a todas las solicitudes, a un grupo de rutas, o a rutas específicas.

### 4. (Opcional) Modificar el Comportamiento del Middleware

Si necesitas modificar el comportamiento del middleware, puedes hacerlo en el archivo `app/Http/Middleware/NombreDelMiddleware.php`.

# Practica

## Lo que hicimos fue:

1. **Crear un middleware:** Empezamos generando un middleware (llamado "Example") que intercepta las peticiones. Básicamente, este middleware decide si dejar pasar la solicitud o redirigirla a otra ruta (por ejemplo, para manejar permisos o roles).
2. **Registrar el middleware:** En Laravel 11, ya no se hace desde el Kernel, sino que lo registramos en el archivo  **bootstrap/app.php** . Aquí definimos tanto middlewares globales como alias para usarlos en rutas específicas.
3. **Aplicar el middleware en rutas y controladores:** Luego, protegimos nuestras rutas (en este caso, en  **routes/api.php** ) usando el alias que definimos, y también mostramos cómo se puede aplicar el middleware directamente desde el constructor de un controlador.
4. **Implementar autenticación con Sanctum:** Por último, montamos un sistema de autenticación usando Laravel Sanctum. Creamos un **AuthController** con métodos para registrar y loguear usuarios, junto a sus respectivas validaciones (con **CreateUserRequest** y  **LoginRequest** ). Además, configuramos el modelo **User** para usar tokens de API.

Con estos pasos, tenemos un sistema básico de middleware para proteger rutas y un mecanismo de autenticación con tokens, todo listo para probar con herramientas como ThunderClient.
