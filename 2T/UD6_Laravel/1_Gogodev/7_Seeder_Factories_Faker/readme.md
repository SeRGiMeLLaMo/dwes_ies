# Introducción a Migraciones, Seeders y Factories en Laravel

## 1. Introducción

En el desarrollo de aplicaciones con Laravel, es crucial estructurar la base de datos correctamente y poblarla con datos iniciales. Para ello, Laravel nos proporciona las siguientes herramientas:

* **Migraciones:** Nos permiten definir la estructura de la base de datos.
* **Seeders:** Sirven para poblar la base de datos con datos iniciales.
* **Factories:** Se utilizan para generar grandes volúmenes de datos de prueba de manera automática.
* **Faker:** Permite generar datos falsos realistas para pruebas.

Por ejemplo, al instalar un sistema, es común incluir un usuario administrador por defecto o productos iniciales en una tienda. Para estos casos, los seeders y factories nos ayudan a automatizar la creación de estos datos.

---

## 2. Proyecto Base

### Creación del Proyecto y Configuración de la Base de Datos

Para comenzar, creamos un nuevo proyecto en Laravel:

```sh
composer create-project laravel/laravel databases
cd databases
```

Una vez creado el proyecto, configuramos la base de datos en **MySQL** editando el archivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=databases
DB_USERNAME=root
DB_PASSWORD=root
```

Las carpetas principales dentro de `database/` son:

* **migrations/** (para la estructura de la BD).
* **seeders/** (para insertar datos iniciales).
* **factories/** (para generar datos de prueba).

---

## 3. Seeders

Los **seeders** nos permiten poblar la base de datos con datos iniciales. Para ello, primero creamos un modelo con su migración:

```sh
php artisan make:model Product --migration
```

### Configuración del Modelo Product

En `app/Models/Product.php` agregamos lo siguiente:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
}
```

### Migración del Modelo

En `database/migrations/xxxx_xx_xx_create_products_table.php`, definimos la estructura de la tabla:

```php
public function up(): void
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name', 50);
        $table->string('short_description', 100);
        $table->text('description', 500);
        $table->float('price')->default(20);
        $table->timestamps();
    });
}
```

### Creación del Seeder

Ejecutamos:

```sh
php artisan make:seeder ProductSeeder
```

En `database/seeders/ProductSeeder.php` agregamos datos de prueba:

```php
public function run(): void
{
    Product::create([
        'name'=> 'Example',
        'short_description' => 'Lorem Ipsum',
        'description' => 'Lorem ipsum dolor set aimet',
        'price'=> 42
    ]);
}
```

Para ejecutar el seeder:

```sh
php artisan db:seed --class=ProductSeeder
```

Para ejecutar todos los seeders desde `DatabaseSeeder.php`:

```php
public function run(): void
{
    $this->call([
        ProductSeeder::class
    ]);
}
```

---

## 4. Factories

Los **factories** permiten generar grandes cantidades de datos de prueba. Creamos un factory para `Product`:

```sh
php artisan make:factory ProductFactory
```

En `database/factories/ProductFactory.php`, definimos los datos ficticios:

```php
public function definition(): array
{
    return [
        'name' => Str::random(25),
        'short_description' => Str::random(45),
        'description' => Str::random(150),
        'price' => random_int(1, 125),
    ];
}
```

### Uso del Factory en un Seeder

En `ProductSeeder.php`:

```php
public function run(): void
{
    Product::factory()->count(150)->create();
}
```

Ejecutamos:

```sh
php artisan db:seed
```

---

## 5. Faker

Usamos **Faker** para generar datos realistas:

```php
public function definition(): array
{
    return [
        'name'=>fake()->name,
        'short_description'=>fake()->sentence,
        'description'=>fake()->paragraph(3),
        'price'=>fake()->numberBetween(1,125),
    ];
}
```

Si queremos reiniciar la BD y poblarla de nuevo:

```sh
php artisan migrate:rollback
php artisan migrate
php artisan db:seed
```

---

## 6. Creación de Vista y Controlador

Creamos el controlador:

```sh
php artisan make:controller ProductController
```

En `app/Http/Controllers/ProductController.php`:

```php
class ProductController extends Controller
{
    public function index(): View {
        $products = Product::all();
        return view('product.index', compact('products'));
    }
}
```

En `routes/web.php`:

```php
use App\Http\Controllers\ProductController;
Route::get('/', [ProductController::class, 'index'])->name('product.index');
```

Creamos la vista `resources/views/product/index.blade.php`:

```html
<body>
    <div class="container">
        @forelse($products as $product)
            <div class="card">
                <h3>{{$product->name}}</h3>
                <p>{{$product->short_description}}</p>
                <p>{{$product->price}} USD</p>
            </div>
        @empty
            <h5>No data.</h5>
        @endforelse
    </div>
</body>
```

### Estilizado con CSS

Creamos `public/style.css`:

```css
.row {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
}
.card {
    flex: 1 1 30%;
    padding: 1rem;
    border: 1px solid #ddd;
    border-radius: 8px;
}
@media (max-width: 768px) {
    .card { flex: 1 1 45%; }
}
@media (max-width: 480px) {
    .card { flex: 1 1 100%; }
}
```

En `index.blade.php`, enlazamos el CSS:

```html
<link rel="stylesheet" href="{{ asset('style.css') }}">
```

---

## Conclusiones

Gracias a las  **migraciones** ,  **seeders** , **factories** y  **Faker** , podemos estructurar nuestra base de datos, poblarla con datos realistas y realizar pruebas sin esfuerzo. Esto nos permite desarrollar de manera eficiente y probar nuestras aplicaciones con datos representativos.
