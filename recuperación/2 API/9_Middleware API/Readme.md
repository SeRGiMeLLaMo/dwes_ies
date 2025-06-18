# Autenticación API

![1747992256203](image/Readme/1747992256203.png)

> En este documento, veremos al igual que en el 2 trimestre **la Autenticación API en laravel** **12** practicaremos mientras que aprendemos sobre estos y documentaremos **paso a paso** para mayor entendimiento.

---

### Índice.

* Introducción
* Registrar Middleware
* Middleware en Grupos de Rutas
* Ejemplo de middleware
* Proyecto ApiAuth
* Ejemplo Con ROLES

---

## Introducción.

Middleware proporciona un mecanismo práctico para inspeccionar y filtrar las solicitudes HTTP que entran en tu aplicación. Por ejemplo, Laravel incluye un middleware que verifica que el usuario de tu aplicación esté autenticado. Si el usuario no está autenticado, el middleware lo redirigirá a la pantalla de inicio de sesión de tu aplicación.

![1749135704053](image/Readme/1749135704053.png)

---

## Registrar Middleware.

En este apartado, se estará trabajando con el proyecto del apartado anterior, como ya hemos visto en ocasiones anteriores, simplemente hemos copiado y pegado el archivo en la nueva carpeta:

![1749137849938](image/Readme/1749137849938.png)

Al proyecto lo he llamado autenticacion_api, tambien podremos crearlos desde 0 como ya hemos comentado en anteriores puntos.

En laravel 12 no viene la carpeta middleware no se crea automáticamente a menos que se genere un middleware o ya exista alguno en el proyecto.

Como no tenemos ninguno haremos lo siguiente:

> * **¿Como creamos un middleware?**
>
> Para crear un middleware, solo debemos realizar el siguiente comando dentro de nuestro proyecto:
>
> `php artisan make:middleware (NombreMiddleware)  //Con esa misma nomenclatura`

En mi caso crearé el middleware **"Ejemplo"** para ir probando y ojeando los middleware.

![1750035320106](https://file+.vscode-resource.vscode-cdn.net/c%3A/xampp/htdocs/dwes/recuperaci%C3%B3n/2%20API/9_Middleware%20API/image/Readme/1750035320106.png)

como podemos observar ahora si tendremos la carpeta middleware en el caso de que no estuviera anteriormente.

![1750056156457](image/Readme/1750056156457.png)

![1749141910607](image/Readme/1749141910607.png)

Para **registrar** los middleware lo haremos desde el archivo `/bootstrap/app.php` y se vería así:

```php
<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Middleware global
        $middleware->use([
        // middleware globales
        // Si quieres que el middleware se aplique a todas las solicitudes
          //  \App\Http\Middleware\ejemplo::class,
        ]);

        // Middleware de grupo "web"
        $middleware->group('web', [
            // middleware para el grupo web
            // Si quieres que el middleware se aplique solo a un grupo específico web
            // \App\Http\Middleware\ejemplo::class,
        ]);

        // Middleware de grupo "api"
        $middleware->group('api', [
            // middleware para el grupo api
            // Si quieres que el middleware se aplique solo a un grupo específico api
            // \App\Http\Middleware\ejemplo::class,
        ]);

        // Alias de middleware para rutas
        $middleware->alias([
            // middleware de rutas
            // Si quieres aplicar el middleware solo a rutas específicas
            // 'ejemplo' => \App\Http\Middleware\ejemplo::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

```

> Dependiendo de cómo hayas registrado el middleware, se aplicará automáticamente a todas las solicitudes, a un grupo de rutas, o a rutas específicas.
>
> * **(Opcional)**
>
> ### Modificar el Comportamiento del Middleware
>
> Si necesitas modificar el comportamiento del middleware, puedes hacerlo en el archivo `app/Http/Middleware/NombreDelMiddleware.php`.

---

**En resumen:**

En Laravel 11, el middleware ya no se registra en `Kernel.php`. Ahora se agrega en `bootstrap/app.php` o directamente en las rutas usando `middleware()`. Esto hace que la aplicación sea más flexible y modular.

---

## Rutas Middleware

* **¿Como proteger una ruta?**

Lo normal es proteger una ruta en el archivo de enrutado pero tambien hay otra opción que veremos mas adelante.

> Un ejemplo de proteccion en ruta lo hemos podido observar cuando hemos trabajado con API ya que nos ha aparecido por defecto lo siguiente:
>
> ```php
> <?php
>
> use Illuminate\Http\Request;
> use Illuminate\Support\Facades\Route;
>
> Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
>     return $request->user();
> });
> ```
>
> Nos esta marcando el uso de un middleware llamado `auth:sanctum` para proteger esa ruta de ejemplo que muestra ahí, nosotros lo usaremos mas adelante cuando trabajemos el bloque de autenticación

![1749168094965](image/Readme/1749168094965.png)

Así se vería mi app.php en mi caso:

```php
<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
  
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->web(\App\Http\Middleware\Ejemplo::class,);
    })
  
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

```

WithMiddleware (function ... recibe una función con todas las rutas que se contienen dentro de este grupo.

```php
->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias(['example' => \App\Http\Middleware\Example::class]);
        $middleware->group('api', ['example']);
        $middleware->api(['example']);
```

Ya sabemos aplicar middleware de forma singular y en grupo, el tercer formato sólo es válido en una buena estructuración de controladores, siguiente apartado

---

## Ejemplo Middleware

El ejemplo va a consistir en lo siguiente:

1. obtiene el valor del parámetro `token` desde la URL.
2. Si el token **no es igual** a `123456`, se detiene la ejecución.
3. Si la condición **ES CORRECTA**: Todo está bien, sigue con el controlador.
4. Si la condición **NO** **ES CORRECTA**: Devuelve una respuesta inmediata **sin pasar al controlador.**

Para comenzar con este ejemplo primero crearemos nuestro middleware como hemos visto anteriormente:

![1750035320106](image/Readme/1750035320106.png)

Y lo buscamos en la carpeta `app/http/middleware` a continuación lo modificaremos de la siguiente manera:

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Ejemplo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Ejemplo de condición: validar si el parámetro 'token' es correcto
        if ($request->input('token') !== '123456') {
            return response('Acceso denegado por middleware.', 403);
        }

        // Si la condición pasa, continúa al controlador
        return $next($request);
    }
}

```

Para proseguir debemos registrar dicho middleware para ello nos movemos a `bootstrap/app.php` y modificamos el archivo tal que así:

```php
<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
         $middleware->alias([
        'ejemplo' => \App\Http\Middleware\Ejemplo::class,
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

```

> Esto crea un **alias** llamado `ejemplo` para que puedas llamarlo fácilmente en las rutas.

Nos vamos a desplazar a ` routes/web.php` y ahi vamos a colocar una ruta:

> web.php

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EjemploController;

Route::get('/demo', [EjemploController::class, 'index'])
    ->middleware('ejemplo');

```

> Esto significa que **la ruta `/demo` estará protegida por el middleware `Ejemplo`.**

Y nos vamos al controlador para crearlo, ruta: `app/Http/Controllers/EjemploController.php`

![1750035346275](image/Readme/1750035346275.png)

> EjemploController.php

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EjemploController extends Controller
{
    public function index()
    {
        return 'Bienvenido, pasaste por el middleware correctamente.';
    }
}

```

---

## Proyecto

> Ahora vamos a realizar nuestro primer sistema de autenticación a traves de API.

Se basa en el método " **Token al portador o bearer tokens** ".

1. Usuario facilita email y password desde el formulario
2. Generamos token y se lo devolvemos al frontend
3. Ahora cada vez que quiera pedirnos información ha de enviarnos ese token para que el backend verifique

> **Laravel ya nos incluye autenticación con la librería SANCTUM**

Creamos el controlador:

Lo llamaremos AuthController

![1749169736958](image/Readme/1749169736958.png)

Este es el controlador que permitira loguear y registrar a los usuarios, en mi caso autores.

* Aquí creamos algunas funciones para registrar a nuestros usuarios
* Necesitamos crear primero una request para validar usuarios

Para crearla ya lo vimos en apartados anteriores:

![1750036332655](image/Readme/1750036332655.png)

La modificamos de la siguiente manera:

> /app/Http/Request/CreateUserRequest.php

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //En las reglas, solicitamos los datos necesarios:
            'username' => 'required',
            //el email ha de ser único dentro de la tabla authors en el campo email
            'email' => 'required|email|unique:users, email',
            'password' => 'required|min:8', //podriamos indicar longitud minima...
        ];
    }
}

```

* Ahora el AuthController quedaría tal que así:

```php
<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\CreateUserRequest as RequestsCreateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function store(CreateUserRequest $request)
    {
        try {
            // Crear el usuario
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Devolver respuesta con token de API
            return response()->json([
                'status' => true,
                'message' => 'User created successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 201);

        } catch (\Exception $e) {
            // Manejo de errores generales
            return response()->json([
                'status' => false,
                'message' => 'User registration failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

```

Seguimos con la Request de Login para ello repetimos el comando para crear la Request pero cambiamos el nombre:

![1750036877524](image/Readme/1750036877524.png)

Así se vería:

> LoginRequest.php

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required', 
        ];
    }
}

```

Ahora generamos las validaciones, Laravel nos ofrece una clase ***muy muy útil*** que es la clase ***`Auth`***

> ¿Qué hace la clase `Auth`?

> La clase `Auth` permite:
>
> * **Verificar si un usuario está autenticado.**
> * **Acceder al usuario actualmente autenticado.**
> * **Realizar el login y logout de los usuarios.**
> * **Proteger rutas mediante middleware.**
> * **Validar credenciales de acceso.**
> * **Gestionar diferentes guardias de autenticación.**

Desde nuestro controlador `AuthController.php` podemos :

1. Acceder a los datos del usuario logueado.
2. Tratar de loguear a un usuario.

Así se vería actualmente el ***AuthController***, habiendole añadido la función ***Login***:

> AuthController.php

```php
<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\CreateUserRequest as RequestsCreateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function store(CreateUserRequest $request)
    {
        try {
            // Crear el usuario
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Devolver respuesta con token de API
            return response()->json([
                'status' => true,
                'message' => 'User created successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 201);

        } catch (\Exception $e) {
            // Manejo de errores generales
            return response()->json([
                'status' => false,
                'message' => 'User registration failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

     public function loginUser(LoginRequest $request)
{
    try {
        // Obtener credenciales validadas
        $credentials = $request->validated();

        // Intentar autenticación
        if (!Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            return response()->json([
                'status' => false,
                'message' => 'Email & password do not match our records'
            ], 401);
        }

        // Obtener usuario autenticado
        $user = User::where('email', $credentials['email'])->firstOrFail();

        return response()->json([
            'status' => true,
            'message' => 'User logged in successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Login failed',
            'error' => $e->getMessage()
        ], 500);
    }
}
}

```

En Laravel 11, debemos configurar un poco más nuestro modelo ***User* **para que podamos hacer uso de las API Tokens generadas.

### Agregar `HasApiTokens` en el modelo `Author`

Abre `app/Models/User.php` y asegúrate de agregar `HasApiTokens`:

```php
<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
}

```

> pd: en caso de duda, aqui dejo como se veria la tabla de user en la migración (database/migrations/create-user-table)
>
> ```php
> <?php
>
> use Illuminate\Database\Migrations\Migration;
> use Illuminate\Database\Schema\Blueprint;
> use Illuminate\Support\Facades\Schema;
>
> return new class extends Migration
> {
>     /**
>      * Run the migrations.
>      */
>     public function up(): void
>     {
>         Schema::create('users', function (Blueprint $table) {
>             $table->id();
>             $table->string('name');
>             $table->string('email')->unique();
>             $table->timestamp('email_verified_at')->nullable();
>             $table->string('password');
>             $table->rememberToken();
>             $table->timestamps();
>         });
>
>         Schema::create('password_reset_tokens', function (Blueprint $table) {
>             $table->string('email')->primary();
>             $table->string('token');
>             $table->timestamp('created_at')->nullable();
>         });
>
>         Schema::create('sessions', function (Blueprint $table) {
>             $table->string('id')->primary();
>             $table->foreignId('user_id')->nullable()->index();
>             $table->string('ip_address', 45)->nullable();
>             $table->text('user_agent')->nullable();
>             $table->longText('payload');
>             $table->integer('last_activity')->index();
>         });
>     }
>
>     /**
>      * Reverse the migrations.
>      */
>     public function down(): void
>     {
>         Schema::dropIfExists('users');
>         Schema::dropIfExists('password_reset_tokens');
>         Schema::dropIfExists('sessions');
>     }
> };
>
> ```

#### Configuración de las rutas:

Ya que tenemos nuestro controlador, necesitamos especificarlo en nuestras **rutas API**.

```php
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/create', [AuthController::class, 'store'])->name('create');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login');

//ruta para obtener un dato protegido, aprovechamos la de laravel.
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


```

Una vez redefinida nuestra ***API***, vamos a probarla:

> Levantamos el servicio:

```
php artisan serve
```

> Nueva petición en thunderclient:

**Thunder Client**

* Ruta

![1749178912535](image/Readme/1749178912535.png)

Nuestra ruta será `http://127.0.0.1:8000/api/create` y de tipo post.

Y a continuación en el ***body***, escribimos nuestro primer usuario:

![1750038120242](image/Readme/1750038120242.png)

**¡Guarda ese TOKEN ya que lo vas a necesitar para autenticarte!**

#### Login User:

Vamos a acceder indicándole el ***token***:

En la Autorización debemos entregar el **BEARER** ***token** *al usuario, eso se hace desde los ***headers** *así:

![1750038641403](image/Readme/1750038641403.png)

A continuación para ver que todo funciona ***clickamos*** de nuevo en **send** y devería aparecer lo siguiente:

![1750038554445](image/Readme/1750038554445.png)

> Ya sabemos cómo añadir el middleware ***auth Sanctum*** mediante sistema de ***token** *para poder autenticar a los usuarios.



---

## Ejemplo con ROLES

Aquí mostrare un sencillo ejemplo de un middleware, que se encargará de diferenciar por roles.

Para comenzar añadiremos el atributo ***rol*** a nuestra tabla user para ello podemos movernos a la carpeta de migraciones y a **create_user_table.**

Una vez nos encontremos ahi lo modificaremos de la siguiente forma:

> Añadiremos esta linea `$table->enum('role', ['admin', 'author'])->default('author');`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'author'])->default('author');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

```

> un enum es como una lista de valores etiquetados que se pueden utilizar en lugar de números o cadenas de texto para representar opciones específicas en un programa.

Ahora para que este campo se actualice, en la terminal pondremos:

`php artisan migrate:refresh`

![1750238507713](image/Readme/1750238507713.png)

Ahora crearemos el middleware:

`php artisan make:middleware RoleMiddleware`

![1750238564926](image/Readme/1750238564926.png)

Y dentro de el pondremos lo siguiente:

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!$request->user() || !in_array($request->user()->role, $roles)) {
        return response()->json(['message' => 'No autorizado.'], 403);
    }

    return $next($request);
    }
}

```

`...$roles: esto significa que puedes pasar varios roles como parámetros separados por coma.`

`!$request->user() // Verifica si no hay un usuario autenticado. Esto protege contra solicitudes no autenticadas (usuarios sin token válido).`

`!in_array($request->user()->role, $roles) // Verifica si el rol del usuario NO está en la lista de roles permitidos que le pasaste al middleware.`

> Si alguna de estas condiciones es verdadera = significa que **el usuario no está autorizado.**
>
> Si el usuario  **no pasa la verificación** , aquí devuelve una respuesta JSON con **código 403 Forbidden.**
>
> Esto detiene la ejecución y **NO permite que la solicitud siga al siguiente middleware ni al controlador.**

`return $next($request);`

Si el usuario está autenticado y su rol es válido, este método pasa la solicitud al siguiente paso del flujo (ya sea otro middleware o el controlador final).

---

Registramos el middleware en Bootstrap/app.php:

```php
->withMiddleware(function (Middleware $middleware): void {   
    	$middleware->alias([   
	'role' => \App\Http\Middleware\RoleMiddleware::class,   
]);
```

Se vería así:

```php
<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        /* $middleware->alias([
        'ejemplo' => \App\Http\Middleware\Ejemplo::class,
    ]);*/
    $middleware->alias([
        'role' => \App\Http\Middleware\RoleMiddleware::class,
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

```

Una vez ya hemos visto y modificado el middleware apliquemos las rutas de la API dependiendo de los roles, pongamos de ejemplo que los admins podran ver todos los libros, los autores solo los suyos y ambos podran ver la opcion de perfil, quedaría tal que así:

```php
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Ruta protegida solo para admin
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/admin/libros', [AdminController::class, 'libros']);
});
//Si el usuario se ha autenticado y tiene el role=admin puede traerse todos los libros con la funcion libros del controlador de admin


// Ruta protegida solo para cliente
Route::middleware(['auth:sanctum', 'role:cliente'])->group(function () {
    Route::get('/cliente/libros', [LibroController::class, 'misLibros']);
});
//Si el usuario se ha autenticado y tiene el role=cliente puede traerse todos sus libros con la funcion misLibros del controlador de Libro


// Ruta accesible para ambos
Route::middleware(['auth:sanctum', 'role:cliente,admin'])->group(function () {
    Route::get('/perfil', function () {
        return response()->json(['user' => auth()->user()]);
    });
//Si el usuario se ha autenticado y tiene el role=cliente||admin  puede ver el perfil.


});

```

> Esto es un ejemplo de como se haría.

---

Ahora solo quedaría probar para ello se puede utilizar ***thunder client***:

#### **Registro:**

###### Enlace :

POST `http://localhost:8000/api/register` (o */api/store* si es como la nombraste)

###### Body:

```json
{
    "name": "Federico",
    "email": "federico@prueba.com",
    "password": "123456789",
}
```

Opcional: Puedes permitir que al registrarse envíen el *role* (si quieres).

#### **Login:**

###### Enlace:

POST `http://localhost:8000/api/login`

###### Body:

```json
{
    "email": "federico@prueba.com",
    "password": "123456789"
}
```

Copia el token que te devuelve.

En Thunder Client, en la pestaña "*Authorization*" selecciona ***Bearer Token*** y pega el token.

> Llama a:
>
> * GET `/api/admin/libros` (solo si el rol es admin)
> * GET `/api/cliente/libros` (solo si el rol es cliente)
> * GET `/api/perfil` (para ambos roles)

---

Y este sería un ejemplo de como usar un middleware para los roles en un futuro podremos profundizar en el y darle el uso que deseamos.
