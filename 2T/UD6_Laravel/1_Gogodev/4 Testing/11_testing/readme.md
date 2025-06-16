INTRODUCCIÓN

El testing es una disciplina dentro del desarrollo. Independientemente de eso, todo desarrollador debe ser capaz de realizar los diferentes tests.

## CREACIÓN DE TEST

### Lo primero:

* ¿Qué vamos a testear?
* ¿Cuándo?

### Tipos de Test

#### Test Unitarios

Se enfocan en funciones o acciones concretas. Se prueban pequeños trozos de código para asegurarse de que funcionan correctamente de manera aislada.

#### Test de Integración

Prueban el circuito completo de la aplicación. Se verifica que la ruta correcta devuelve la vista correspondiente con los datos esperados.

### Importancia

Al inicio, puede parecer innecesario en proyectos pequeños, pero en el trabajo profesional, los tests son obligatorios.

## FORMATOS DE TRABAJO

### Test-Driven Development (TDD)

Se escriben los tests **antes** de desarrollar la funcionalidad.

### Test Después del Desarrollo

Siempre se ejecutan antes de cada commit.

### Estrategias

* Usar **seeders** o **factories** para datos en memoria y evitar alterar la base de datos.
* Usar un **entorno de testing** para ejecutar los tests sin afectar los datos reales.

## ESCRIBIENDO TESTS

### Creación de Proyecto

```bash
composer create-project laravel/laravel testexample
```

### PHPUnit en Laravel

Laravel soporta **PHPUnit** y  **Pest** . Comenzaremos con PHPUnit.

### Creación de Test

```bash
php artisan make:test UserTest
```

Si se desea que sea unitario:

```bash
php artisan make:test UserTest --unit
```

### Estructura Base

Ubicación: `tests/Feature`

```php
<?php
namespace Tests\Feature;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_example(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
```

### Creación de un Test para Listar Usuarios

```php
public function test_get_users_list(): void
{
    $response = $this->get('/users');
    $response->assertStatus(200);
    $response->assertJsonStructure([
        ['id', 'name', 'email', 'email_verified_at', 'created_at', 'updated_at']
    ]);
    $response->assertJsonFragment(['name' => 'Antonio']);
    $response->assertJsonCount(4);
}
```

### Test para Detalle de Usuario

```php
public function test_get_user_detail(): void
{
    $userId = 1;
    $response = $this->get("/users/{$userId}");
    $response->assertStatus(200);
    $response->assertJsonStructure(['id', 'name', 'email', 'email_verified_at', 'created_at', 'updated_at']);
    $response->assertJsonFragment(['id' => $userId, 'name' => 'Antonio']);
}
```

### Test para Usuario Inexistente

```php
public function test_get_non_existing_user_detail(): void
{
    $nonExistingUserId = 9999;
    $response = $this->get("/users/{$nonExistingUserId}");
    $response->assertStatus(404);
}
```

## CONFIGURACIÓN DEL ENTORNO DE TESTING

* Crear `.env.testing` y configurar la base de datos para testing.

```env
DB_CONNECTION=sqlite_testing
DB_DATABASE=database/databasetesting.sqlite
```

* Definir en `config/database.php`:

```php
'sqlite_testing' => [
    'driver' => 'sqlite',
    'database' => env('DB_DATABASE', database_path('databasetesting.sqlite')),
    'prefix' => '',
    'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
],
```

* Migrar entorno de testing:

```bash
php artisan migrate --env=testing
```

## EJECUCIÓN DE TESTS Y SOLUCIÓN DE ERRORES

Ejecutar los tests:

```bash
php artisan test
```

Si los tests fallan, modificar el código para corregir errores:

* **Configurar Rutas API** en `routes/api.php`:

```php
Route::get('/users/{id}', [UserController::class, 'detail']);
```

* **Crear Controlador** :

```bash
php artisan make:controller UserController
```

* **Implementar la Lógica del Controlador** :

```php
class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }
    public function detail($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json($user);
    }
}
```

* **Crear un Seeder** para poblar usuarios:

```bash
php artisan make:seeder UserSeeder
```

* **Definir el Seeder** :

```php
class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create(['name' => 'Antonio']);
        User::factory(3)->create();
    }
}
```

* **Ejecutar el Seeder** :

```bash
php artisan db:seed --env=testing
```

### Verificación Final

Volver a correr los tests. Si pasan correctamente, realizar el commit al repositorio.

---

# CambiarENV Testing

En Laravel, puedes configurar una base de datos diferente para los tests modificando el archivo de configuración `phpunit.xml` o gestionándolo directamente en `config/database.php`.
