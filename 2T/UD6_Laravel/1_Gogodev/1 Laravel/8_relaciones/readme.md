# Relación 1 A Muchos / Muchos A 1

Una relación 1 a muchos se da cuando un elemento X posee muchos elementos Y, pero esos elementos Y sólo son poseídos por un único elemento X. Un usuario tiene varios teléfonos y esos teléfonos son de ese usuario, no pertenecen a nadie más.

### Modificación de modelos

En el modelo User se agrega:

```php
public function phones(): HasMany
{
    return $this->hasMany(Phone::class);
}
```

En el modelo Phone:

```php
public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}
```

### Creación de datos de prueba

Ejecutamos los siguientes comandos para generar seeders:

```sh
php artisan make:seeder UserSeeder
php artisan make:seeder PhoneSeeder
```

Luego, en `PhoneSeeder.php`, agregamos datos de prueba:

```php
Phone::create([
    'prefix' => 34,
    'phone_number' => '777777',
    'user_id' => 1
]);
```

Ejecutamos las migraciones y seeders:

```sh
php artisan migrate --seed
```

Probamos la API con Thunder Client o Postman.

---

# Relación Muchos A Muchos

Este tipo de relación se da cuando un elemento X posee muchos elementos Y, y un elemento Y es poseído por muchos elementos X. Ejemplo: varios usuarios tienen roles específicos, pero cada rol lo poseen varios usuarios.

### Creación del modelo Role y su migración

```sh
php artisan make:model Role --migration
```

Editamos `create_roles_table.php` y agregamos:

```php
$table->string('name');
```

Migramos la base de datos:

```sh
php artisan migrate
```

### Creación de tabla pivote

```sh
php artisan make:migration create_role_user_table
```

Editamos `create_role_user_table.php` y agregamos:

```php
$table->unsignedBigInteger('role_id');
$table->unsignedBigInteger('user_id');
$table->string('added_by')->nullable();
```

Ejecutamos:

```sh
php artisan migrate
```

### Modificación de modelos

En `User.php`:

```php
public function roles(): BelongsToMany
{
    return $this->belongsToMany(Role::class)->withPivot('added_by');
}
```

En `Role.php`:

```php
public function users(): BelongsToMany
{
    return $this->belongsToMany(User::class)->withPivot('added_by');
}
```

### Creación de datos de prueba

Ejecutamos:

```sh
php artisan make:seeder RoleSeeder
```

En `RoleSeeder.php` agregamos:

```php
Role::create(['id' => 1, 'name' => 'admin']);
Role::create(['id' => 2, 'name' => 'staff']);
```

Relacionamos usuarios con roles en `DatabaseSeeder.php`:

```php
DB::table('role_user')->insert([
    'role_id' => 1,
    'user_id' => 1,
    'added_by' => 'Admin',
]);
```

Ejecutamos:

```sh
php artisan db:seed
```

---

# Relación 1 A 1 Indirecta O Con Modelo De Paso

Este tipo de relación se da cuando un elemento X posee un elemento Y, el cual posee un elemento Z, pero el elemento X no tiene conexión directa con el elemento Z.

Ejemplo: una persona posee un móvil y ese móvil posee una tarjeta SIM.

### Creación del modelo Sim y su migración

```sh
php artisan make:model Sim --migration
```

Editamos `create_sims_table.php`:

```php
$table->string('serial_number');
$table->string('company');
$table->unsignedBigInteger('phone_id');
```

En `Sim.php`:

```php
public function phone(): BelongsTo
{
    return $this->belongsTo(Phone::class);
}
```

En `User.php` establecemos la relación con modelo de paso:

```php
public function phoneSim(): HasOneThrough
{
    return $this->hasOneThrough(Sim::class, Phone::class);
}
```

Ejecutamos:

```sh
php artisan migrate
```

---

# Relación Polimórfica 1 A 1

Este tipo de relación permite que un modelo pueda pertenecer a varios otros modelos utilizando una sola asociación.

Ejemplo: una imagen puede estar asociada a un usuario o a un post.

### Creación de modelos y migraciones

```sh
php artisan make:model Image --migration
```

Editamos `create_images_table.php`:

```php
$table->string('url');
$table->unsignedBigInteger('imageable_id');
$table->string('imageable_type');
```

Migramos:

```sh
php artisan migrate
```

En `Image.php`:

```php
public function imageable(): MorphTo
{
    return $this->morphTo();
}
```

En `User.php` y `Post.php`:

```php
public function image(): MorphOne
{
    return $this->morphOne(Image::class, 'imageable');
}
```

---

## Conclusiones

Con esta documentación, hemos cubierto:

* Relación 1 a muchos
* Relación muchos a muchos
* Relación con modelo de paso
* Relación polimórfica
